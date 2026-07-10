<?php

namespace App\Http\Livewire\Guest\Buy;

use App\Helpers\ServiceType;
use App\Helpers\Status;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\ProductSpec;
use Livewire\Component;

class Index extends Component
{
    public $search = '';
    public $categories = [];
    public $selectedCategoryId;        // always a real category id now
    public $devices = [];
    public $selectedDevice;
    public $models = [];

    public $memory_sizes;
    public $selectedMemorySize;
    public $grades;
    public $selectedGrade;
    public $colors;
    public $selectedColor;
    public $price;

    public function mount()
    {
        // load all BUY categories
        $this->categories = Category::where('service', ServiceType::BUY)
            ->where('status', Status::PUBLISH)
            ->orderBy('id')
            ->get();

        // DEFAULT: "Buy a Mobile" (fallback: first category)
        $mobile = $this->categories->firstWhere('name', 'Buy a Mobile');
        $this->selectedCategoryId = optional($mobile)->id ?? optional($this->categories->first())->id;

        // prime filters
        $this->grades = ['A', 'B', 'C'];
        $this->colors = ['Black', 'White', 'RED', 'GREEN', 'YELLOW'];
        $this->memory_sizes = ['32 GB', '64 GB', '128 GB', '256 GB', '500 GB', '1 TB', '2 TB'];

        // load devices/models for current category
        $this->loadDevices($this->selectedCategoryId);
        $this->selectedDevice = $this->devices->first();
        $this->loadModels($this->selectedDevice);
    }

    public function updated($property)
    {
        if ($property === 'selectedCategoryId') {
            // when category changes -> refresh devices/models for that category
            $this->models = [];
            $this->loadDevices($this->selectedCategoryId);

            if ($this->devices->count() > 0) {
                $this->selectedDevice = $this->devices->first();
                $this->loadModels($this->selectedDevice);
            } else {
                $this->selectedDevice = null;
                $this->loadModels(null);
            }
        }

        if ($property === 'search') {
            $query = Modal::where('service', ServiceType::BUY)
                ->where('status', Status::PUBLISH)
                ->where('name', 'LIKE', '%' . $this->search . '%');

            $this->models = $this->selectedDevice
                ? $query->where('device_type_id', $this->selectedDevice->id)->get()
                : $query->get();
        }

        if ($property === 'price') {
            $this->applyFileter(); // keeping your original method name
        }
    }

    public function clearFilter()
    {
        // reset back to "Buy a Mobile" (or first category)
        $mobile = $this->categories->firstWhere('name', 'Buy a Mobile');
        $this->selectedCategoryId = optional($mobile)->id ?? optional($this->categories->first())->id;

        $this->selectedDevice = null;
        $this->selectedMemorySize = null;
        $this->selectedGrade = null;
        $this->selectedColor = null;
        $this->price = null;

        $this->loadDevices($this->selectedCategoryId);
        $this->selectedDevice = $this->devices->first();
        $this->loadModels($this->selectedDevice);
    }

    public function filterByGrade($value)
    {
        $this->selectedGrade = $value;
        $this->applyFileter();
    }

    public function filterByColor($value)
    {
        $this->selectedColor = $value;
        $this->applyFileter();
    }

    public function filterByMemorySize($value)
    {
        $this->selectedMemorySize = $value;
        $this->applyFileter();
    }

    public function applyFileter()
    {
        // start from current device’s models (or all in category)
        $this->loadModels($this->selectedDevice);

        $ids = collect($this->models)->pluck('id');
        $query = ProductSpec::whereIn('model_id', $ids);

        if ($this->selectedGrade) {
            $query->where('grade', $this->selectedGrade);
        }
        if ($this->selectedColor) {
            $query->where('color', $this->selectedColor);
        }
        if ($this->selectedMemorySize) {
            $query->where('memory_size', $this->selectedMemorySize);
        }
        if ($this->price) {
            $query->where('price', $this->price);
        }

        $product_specs = $query->get();
        $mIds = $product_specs->pluck('model_id');
        $this->models = Modal::whereIn('id', $mIds)->get();
    }

    public function selectDevice(DeviceType $device)
    {
        $this->selectedDevice = $device;
        $this->models = $device->modals()
            ->where('service', ServiceType::BUY)
            ->where('status', Status::PUBLISH)
            ->orderBy('order_by', 'asc')
            ->get();
    }

    public function loadDevices($categoryId = null)
    {
        // only devices under the chosen category
        $categoryId = $categoryId ?? $this->selectedCategoryId;

        $this->devices = DeviceType::where('service', ServiceType::BUY)
            ->when($categoryId, fn($q) => $q->where('category_id', $categoryId))
            ->orderBy('id')
            ->get();
    }

    public function loadModels($device = null)
    {
        $query = Modal::where('service', ServiceType::BUY)
            ->where('status', Status::PUBLISH)
            ->orderBy('order_by', 'asc');

        $this->models = $device
            ? $query->where('device_type_id', $device->id)->get()
            : $query->get();
    }

    public function render()
    {
        return view('livewire.guest.buy.index')->layout('frontend.layouts.app');
    }
}
