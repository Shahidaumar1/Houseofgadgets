<?php

namespace App\Http\Livewire\Guest\Sell;

use App\Helpers\Status;
use App\Models\Category;
use App\Models\DeviceType;
use Livewire\Component;

class DeviceTypes extends Component
{
    public $category;
    public $models = [];
    public $selectedDevice;
    public $devices;
    public function mount(Category $category)
    {
        $this->category = $category;
        $this->devices = $category->devices->where('status', Status::PUBLISH);
        if ($this->devices->count() > 0) {
            $this->selectedDevice = $this->devices[0]->id;
            $device = DeviceType::where('id', $this->selectedDevice)->first();
            $this->models = $device->modals;
        }
    }

    public function updated($property)
    {
        if ($property == 'selectedDevice') {
            $device = DeviceType::where('id', $this->selectedDevice)->first();
            $this->models = $device->modals;
        }
    }
    public function render()
    {
        return view('livewire.guest.sell.device-types')->layout('frontend.layouts.app');
    }
}
