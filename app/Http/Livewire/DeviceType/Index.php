<?php

namespace App\Http\Livewire\DeviceType;

use App\Models\DeviceType;
use Livewire\Component;

class Index extends Component
{
    public $device_types;
    public function mount()
    {
        $this->device_types = DeviceType::all();
    }

    protected $listeners = ['DeviceTypeDeleted'];
    public function DeviceTypeDeleted()
    {
        //
    }

    public function delete(DeviceType $devicetype)
    {
        if($devicetype->modals->count() > 0){
            return $this->addError('error', 'You are not allowed to delete, If modals exists');
        }
        $devicetype->delete();
        $this->emit('DeviceTypeDeleted');

    }
    public function render()
    {
        return view('livewire.device-type.index')->layout('admin.layouts.app');
    }
}
