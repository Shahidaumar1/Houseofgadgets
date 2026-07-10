<?php

namespace App\Http\Livewire\DeviceType;

use App\Models\DeviceType;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $device_type;
    public $image;
    protected $rules = [
        'device_type.name' => 'required',
        'image' => 'required'
    ];
    public function mount()
    {
        $this->device_type = new DeviceType();
    }

    protected $listeners = ['FileUploaded'];
    public function FileUploaded($file)
    {
        $this->image = $file['result']['url'];
    }

    public function create()
    {
        $this->validate();
        $exist = DeviceType::where('name', $this->device_type->name)->first();
        if ($exist) {
            return $this->addError('error', 'Device Type already exists');
        }
        $this->device_type->image = $this->image;
        $this->device_type->save();
        return redirect()->route('device-type-index');
    }
    public function render()
    {
        return view('livewire.device-type.create')->layout('admin.layouts.app');
    }
}