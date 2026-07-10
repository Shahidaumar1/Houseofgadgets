<?php

namespace App\Http\Livewire\DeviceType;

use App\Models\DeviceType;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $device_type;
    public $image;

    protected $rules = [
        'device_type.name' => 'required',
    ];
    public function mount(DeviceType $deviceType)
    {
        $this->device_type = $deviceType;
    }
    protected $listeners = ['FileUploaded'];
    public function FileUploaded($file)
    {
        $this->image = $file['result']['url'];

        // dd($this->image);

    }

    public function update()
    {
        $this->validate();
        if ($this->image) {
            $this->device_type->image = $this->image;
        }
        $this->device_type->save();
        return redirect()->route('device-type-index');
    }
    public function render()
    {
        return view('livewire.device-type.edit')->layout('admin.layouts.app');
    }
}
