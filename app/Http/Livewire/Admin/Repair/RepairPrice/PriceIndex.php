<?php

namespace App\Http\Livewire\Admin\Repair\RepairPrice;

use App\Models\DeviceType;
use App\Models\Modal;
use Livewire\Component;

class PriceIndex extends Component
{

    public $modals = [];
    public $device_types;
    public $selectedDeviceType;
    public $page;


    public function mount($page = null)
    {

        $this->page = $page;
        $this->device_types = DeviceType::all();
        if ($this->device_types->count() > 0) {
            $firstDeviceType = DeviceType::first();
            $this->selectedDeviceType = $firstDeviceType;
            $this->modals = $firstDeviceType->modals;
        }
    }


    public function updated($property)
    {


    }

    public function loadModalWithPrice($device_type)
    {
        $this->selectedDeviceType = DeviceType::where('id', $device_type)->first();
        $this->modals = $this->selectedDeviceType != null ? $this->selectedDeviceType->modals : [];
    }



    public function render()
    {
        return view('livewire.admin.repair.repair-price.index')->layout('frontend.layouts.app');
    }
}
