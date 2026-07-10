<?php

namespace App\Http\Livewire\Guest\Sell;

use App\Helpers\Status;
use App\Models\DeviceType;
use Livewire\Component;

class Models extends Component
{
    public $device;
    public $idd = [];
    public $models = [];
    // public function mount(DeviceType $device)
    // {
    //     $this->device = $device;
    //     // $this->models = $device->modals->where('status', Status::PUBLISH);

    //     $this->models = $device->modals()
    //         ->where('status', Status::PUBLISH)
    //         ->orderBy('order_by')
    //         ->get();
    // }
    
      public function mount(DeviceType $device)
    {
        $this->device = $device;
        $this->models = $device->modals()
            ->where('status', Status::PUBLISH)
            ->orderBy('order_by', 'asc') // You can change 'asc' to 'desc' if needed
            ->get();
    }
    public function render()
    {
        return view('livewire.guest.sell.models')->layout('frontend.layouts.app');
    }
}
