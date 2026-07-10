<?php

namespace App\Http\Livewire\Guest\Accessories;

use App\Helpers\ServiceType;
use App\Helpers\Status;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\ProductSpec;
use Livewire\Component;

use function PHPSTORM_META\map;

class Index extends Component
{
    public $search = '';
    public $categories = [];
    public $selectedCategoryId;
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
        $this->categories = Category::where('service', ServiceType::ACCESSORIES)->where('status', Status::PUBLISH)->get();
        $this->selectedCategoryId = 'All';
        $this->loadDevices();
        $this->loadModels();

        $this->grades = ['A', 'B', 'C'];
        $this->colors = ['Black', 'White', 'RED', 'GREEN', 'YELLOW'];
        $this->memory_sizes = ['32 GB', '64 GB', '128 GB', '256 GB', '500 GB', '1 TB', '2 TB'];
    }
    public function updated($property)
    {
        if ($property == 'selectedCategoryId') {
            $this->models  = [];
            $this->devices = DeviceType::where('category_id', $this->selectedCategoryId)->get();
            if ($this->devices->count() > 0) {
                $this->selectedDevice = $this->devices->first();
                $this->loadModels($this->selectedDevice);
            }
        }

        if ($property == 'selectedCategoryId' && $this->selectedCategoryId == 'All') {
            $this->selectedDevice = null;
            $this->loadDevices();
            $this->loadModels();
        }

        if ($property == 'search') {
            $query = Modal::where('service', ServiceType::ACCESSORIES)->where('status', Status::PUBLISH)->where('name', 'LIKE', '%' . $this->search . '%');
            $this->models = $this->selectedDevice ? $query->where('device_type_id', $this->selectedDevice->id)->get() : $query->get();
        }

        if ($property == 'price') {
            $this->applyFileter();
        }
    }
    public function clearFilter()
    {
        $this->selectedCategoryId = 'All';
        $this->loadDevices();
        $this->loadModels();
        $this->selectedMemorySize = null;
        $this->selectedGrade = null;
        $this->selectedColor = null;
        $this->price = null;
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


        $this->loadModels();
        $ids = collect($this->models)->pluck('id');

        $query =  ProductSpec::whereIn('model_id', $ids);

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
        $this->models = $device->modals;
    }

    public function loadDevices()
    {
        $this->devices = DeviceType::where('service', ServiceType::ACCESSORIES)->get();
    }
    public function loadModels($device = null)
    {
        $query = Modal::where('service', ServiceType::ACCESSORIES);
        $this->models  = $device ?  $query->where('device_type_id', $device->id)->get() : $query->get();
    }
    public function render()
    {

        return view('livewire.guest.accessories.index')->layout('frontend.layouts.app');
    }
}
