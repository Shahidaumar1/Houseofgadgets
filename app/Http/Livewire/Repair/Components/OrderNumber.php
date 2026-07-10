<?php

namespace App\Http\Livewire\Repair\Components;

use Livewire\Component;
use App\Models\DeviceType;
use App\Models\RepairType;

class OrderNumber extends Component
{
    public $device_type;
    public $repair_type;
    public $newOrder;
    public $toggle = false;

    public function mount(DeviceType $devicetype, RepairType $repairtype)
    {
        $this->device_type = $devicetype;
        $this->repair_type = $repairtype;
    }

    public function toggle()
    {
        $this->toggle = !$this->toggle;
    }

    function updated()
    {

    }
    public function render()
    {
        return view('livewire.repair.components.order-number');
    }
}
