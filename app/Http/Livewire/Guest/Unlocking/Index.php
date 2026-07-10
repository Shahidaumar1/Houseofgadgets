<?php

namespace App\Http\Livewire\Guest\Unlocking;

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
    public $selectedDeviceId;
    public $selectedModelId;
    public $models = [];

    public $memory_sizes;
    public $selectedMemorySize;
    public $grades;
    public $selectedGrade;
    public $colors;
    public $selectedColor;
    public $imei;
    public $price;
    public $unlock_price = 0;




    public function mount()
    {
        $this->categories = Category::where('service', ServiceType::UNLOCKING)->where('status', Status::PUBLISH)->get();
        if ($this->categories->count() > 0) {
            $this->selectedCategoryId = $this->categories[0]->id;

            $this->models  = [];
            $this->devices = DeviceType::where('category_id', $this->selectedCategoryId)->get();
            if ($this->devices->count() > 0) {
                $this->selectedDevice = $this->devices->first();
                $this->loadModels($this->selectedDevice);

                $this->selectedDeviceId = $this->selectedDevice->id;
            }
        } else {
            $this->selectedCategoryId = 'All';
            $this->loadDevices();
            $this->loadModels();
        }
        // $this->grades = ['A', 'B', 'C'];
        // $this->colors = ['Black', 'White', 'RED', 'GREEN', 'YELLOW'];
        // $this->memory_sizes = ['32 GB', '64 GB', '128 GB', '256 GB', '500 GB', '1 TB', '2 TB'];
    }
    private function handleSelectedModelIdChange()
    {
        $query = ProductSpec::where('model_id', $this->selectedModelId);
        $this->memory_sizes = $query->distinct('memory_size')->pluck('memory_size')->toArray();

        if ($this->memory_sizes) {
            $this->selectedMemorySize = $this->memory_sizes[0];
        }
        $this->colors = $query->where('memory_size', $this->selectedMemorySize)->distinct('color')->pluck('color')->toArray();
        $this->grades = $query->distinct('grade')->pluck('grade')->toArray();


        if ($this->colors) {
            $this->selectedColor = $this->colors[0];
        }

        if ($this->memory_sizes && $this->colors)
            $this->unlock_price = ($query->where('memory_size', $this->selectedMemorySize)->where('color', $this->selectedColor)->first())->price;
    }
    public function updated($property)
    {
        if ($property == 'selectedCategoryId') {
            $this->models  = [];
            $this->devices = DeviceType::where('category_id', $this->selectedCategoryId)->get();
            if ($this->devices->count() > 0) {
                $this->selectedDevice = $this->devices->first();
                $this->selectedDeviceId = $this->selectedDevice->id;
                $this->loadModels($this->selectedDevice);
            }
        }

        if ($property == 'selectedCategoryId' && $this->selectedCategoryId == 'All') {
            $this->selectedDevice = null;
            $this->loadDevices();
            $this->loadModels();
        }

        if ($property == 'search') {
            $query = Modal::where('service', ServiceType::UNLOCKING)->where('status', Status::PUBLISH)->where('name', 'LIKE', '%' . $this->search . '%');
            $this->models = $this->selectedDevice ? $query->where('device_type_id', $this->selectedDevice->id)->get() : $query->get();
        }
        if ($property == 'selectedDeviceId') {
            if ($this->selectedDeviceId) {
                $this->models  = [];
                $device = DeviceType::find($this->selectedDeviceId);
                $this->selectedDevice = $device;

                $this->loadModels($this->selectedDevice);
            }
        }
        if ($property == 'selectedModelId') {
            $this->handleSelectedModelIdChange();
        }
        if ($property == 'selectedMemorySize') {

            $query =  ProductSpec::where('model_id', $this->selectedModelId)->where('memory_size', $this->selectedMemorySize);
            $this->colors = $query->distinct('color')->pluck('color')->toArray();
            if ($this->colors[0])
                $this->selectedColor = $this->colors[0];
        }

        if ($this->memory_sizes && $this->colors) {
            $query =  ProductSpec::where('model_id', $this->selectedModelId)->where('memory_size', $this->selectedMemorySize)->where('color', $this->selectedColor)->first();
            $this->unlock_price = $query->price;
        }
    }
    public function clearFilter()
    {
        $this->selectedDeviceId = "";
        $this->selectedMemorySize = null;
        $this->selectedGrade = null;
        $this->selectedColor = null;
        $this->price = null;

        $this->selectedCategoryId = 'All';
        $this->loadDevices();
        $this->loadModels();
    }


    public function filterByGrade($value)
    {

        $this->selectedGrade = $value;
        // $this->applyFileter();
    }

    public function filterByColor($value)
    {
        $this->selectedColor = $value;
        // $this->applyFileter();
    }

    public function filterByMemorySize($value)
    {

        $this->selectedMemorySize = $value;
        // $this->applyFileter();
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
        $this->selectedDeviceId = $this->selectedDevice->id;


        $this->handleSelectedModelIdChange();
    }

    public function loadDevices()
    {
        $this->devices = DeviceType::where('service', ServiceType::UNLOCKING)->get();
        if ($this->devices->count() > 0) {
            $this->selectedDevice = $this->devices->first();
            $this->selectedDeviceId = $this->selectedDevice->id;
        }
    }
    public function loadModels($device = null)
    {
        $query = Modal::where('service', ServiceType::UNLOCKING);
        if ($this->selectedDeviceId) {
            $this->models  = $query->where('device_type_id', $this->selectedDeviceId)->get();
        } else {
            $this->models  = $device ?  $query->where('device_type_id', $device->id)->get() : $query->get();
        }
        if ($this->models->count() > 0) {
            $selectedRow = $this->models->first();
            $this->selectedModelId = $selectedRow->id;
        } else {

            $this->selectedModelId = 0;
        }
        if ($this->selectedModelId) {
            $this->handleSelectedModelIdChange();
        } else {
            $ids = collect($this->models)->pluck('id');
            $query =  ProductSpec::whereIn('model_id', $ids);
            $this->memory_sizes = $query->distinct('memory_size')->pluck('memory_size')->toArray();
            // dd($this->memory_sizes);
            if ($this->memory_sizes)
                $this->selectedMemorySize = $this->memory_sizes[0];
            $this->selectedMemorySize = 0;
            $this->colors = $query->where('memory_size', $this->selectedMemorySize)->distinct('color')->pluck('color')->toArray();

            $this->grades = $query->distinct('grade')->pluck('grade')->toArray();

            if ($this->colors)
                $this->selectedColor = $this->colors[0];
            if ($this->memory_sizes && $this->colors)
                $this->unlock_price = ($query->where('memory_size', $this->selectedMemorySize)->where('color', $this->selectedColor)->first())->price;
        }
    }
    public function render()
    {

        return view('livewire.guest.unlocking.index')->layout('frontend.layouts.app');
    }
}
