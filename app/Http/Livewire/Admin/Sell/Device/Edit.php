<?php

namespace App\Http\Livewire\Admin\Sell\Device;

use App\Helpers\ImageService;
use App\Models\DeviceType;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $rand;
    public $device;
    public $file;

    protected $rules = [
        'device.name' => 'required',
        'device.status' => 'required'
    ];
    protected $listeners = ['deviceSelected'];
    public function deviceSelected(DeviceType $device)
    {
        $this->device = $device;
    }


    public function update()
    {
        $this->validate();
        if ($this->file) {
            $this->device->file = ImageService::upload($this->file)->url;
        }
        $this->device->save();
        $this->clearForm();
        $this->emit('deviceUpdated', $this->device->id);
        $this->emit('closeM', 'edit-sell-device');


    }
    public function clearForm()
    {
        $this->rand++;
    }
    public function render()
    {
        return view('livewire.admin.sell.device.edit')->layout('layouts.admin');
    }
}
