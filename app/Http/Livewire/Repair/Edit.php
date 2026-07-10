<?php

namespace App\Http\Livewire\Repair;

use App\Models\DeviceType;
use App\Models\Modal;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $modal;
    public $image;
    public $device_types;
    protected $rules = [
        'modal.device_type_id' => 'required',
        'modal.name' => 'required'
    ];
    public function mount(Modal $modal)
    {

        $this->modal = $modal;
        $this->device_types = DeviceType::all();
    }

    public function update()
    {
        $this->validate();
        if($this->image){
            $this->modal->image = $this->image->store('images/modal', 'custom');
        }
        $this->modal->save();
        return redirect()->route('modal-index');
    }
    public function render()
    {
        return view('livewire.repair.edit')->layout('admin.layouts.app');
    }
}
