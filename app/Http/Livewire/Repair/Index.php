<?php

namespace App\Http\Livewire\Repair;

use App\Helpers\ServiceType;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use Livewire\Component;

class Index extends Component
{
    public $categories = [];
    public $selectedCat;
    public $selectedCatId;

    public $devices = [];
    public $selectedDevice;
    public $selectedDeviceId;
    public $models = [];
    public $selectedModel;
    public $selectedModelId;

    public $page;


    public function mount($page = null)
    {
        $this->page = $page;
        $this->categories = Category::where('service',ServiceType::REPAIR)->get();

        if ($this->categories->count() > 0) {
            $this->selectedCat = $this->categories[0];
            $this->selectedCatId = $this->selectedCat->id;
            $this->devices = $this->selectedCat->devices;
            $this->selectedDevice = $this->devices[0];
            $this->selectedDeviceId = $this->selectedDevice->id;
            $this->models = $this->selectedDevice->modals;
            $this->selectedModel = $this->models[0];
            $this->selectedModelId = $this->selectedModel->id;
        }


    }

    protected $listeners = ['PriceDeleted', 'UpdateDeviceType','RepairCreated'];
    public function PriceDeleted()
    {
        //
    }

    public function RepairCreated(DeviceType $deviceType)
    {
        $this->selectedDevice = $deviceType;
        $this->models = $deviceType->modals;
    }

    public function UpdateDeviceType(DeviceType $deviceType)
    {
        $this->selectedDeviceId = $deviceType->id;
        $this->selectedDevice = $deviceType;
        $this->models = $deviceType->modals;
    }

    public function updated($property)
    {

        if ($property == 'selectedDeviceId') {
            $this->selectedDevice = DeviceType::where('id', $this->selectedDeviceId)->first();
            $this->models = $this->selectedDevice->modals;
        }
    }

    public function updateTaskOrder($orders)
    {

        foreach($orders as $order)
        {
            $this->selectedDevice->repair_types()->updateExistingPivot((int)$order['value'], ['order_number' => $order['order']]);
        }
        return back();

    }



    public function render()
    {
        return view('livewire.repair.index')->layout('admin.layouts.app');
    }


}
