<?php

namespace App\Http\Livewire\Modal;

use App\Models\DeviceType;
use App\Models\Modal;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $modal;
    public $device_types;
    public $image;
    protected $rules = [
        'modal.device_type_id' => 'required',
        'modal.name' => 'required',
        'image' => 'required'
    ];
    public function mount()
    {
        $this->modal = new Modal();
        $this->device_types = DeviceType::all();
    }

    protected $listeners = ['FileUploaded'];
    public function FileUploaded($file)
    {
        $this->image = $file['result']['url'];

        // dd($this->image);

    }

    public function create()
    {
        $this->validate();
        $exist = Modal::where('name',$this->modal->name)->where('device_type_id',$this->modal->device_type_id)->first();
        if($exist){
        return  $this->addError('error','Modal already exists for this Device Type');
        }
        $this->modal->image = $this->image;
        $this->modal->save();
        return redirect()->route('modal-index');
    }
    public function render()
    {
        return view('livewire.modal.create')->layout('admin.layouts.app');
    }
}
