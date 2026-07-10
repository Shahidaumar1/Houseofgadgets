<?php

namespace App\Http\Livewire\Modal;

use App\Models\DeviceType;
use App\Models\Modal;
use Livewire\Component;

class Index extends Component
{
    public $modals = [];
    public $device_types;
    public $selectedDeviceType;

    public function mount()
    {
        $this->device_types = DeviceType::all();
        if($this->device_types->count() > 0){
            $firstDeviceType = DeviceType::first();
            $this->selectedDeviceType = $firstDeviceType->id;
            $this->modals = $this->getModals($firstDeviceType);
        }



    }

    protected $listeners = ['ModalDeleted'];
    public function ModalDeleted()
    {
        //
    }

    public function updated($property)
    {
        if($property == 'selectedDeviceType'){
        $deviceType = DeviceType::where('id',$this->selectedDeviceType)->first();
         $this->modals = $this->getModals( $deviceType);
        }
    }

    public function delete(Modal $modal)
    {

        if($modal->prices->count() > 0){
            return $this->addError('error', 'You are not allowed to delete, If repair_types & prices exists');
        }
       $modal->delete();
        $this->emit('ModalDeleted');

    }
    public function render()
    {
        return view('livewire.modal.index')->layout('admin.layouts.app');
    }

    //helper

    public function getModals(DeviceType $deviceType)
    {
        return $deviceType ? $deviceType->modals : [];
    }
}
