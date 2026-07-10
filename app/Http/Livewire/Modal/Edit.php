<?php

namespace App\Http\Livewire\Modal;

use App\Models\DeviceType;
use App\Models\Modal;
use ImageKit\ImageKit;
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
        'modal.name' => 'required',
    ];
    public function mount(Modal $modal)
    {

        $this->modal = $modal;
        $this->device_types = DeviceType::all();
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

        $exist = Modal::where('name', $this->modal->name)->first();
        if ($exist && !$this->image) {
            return $this->addError('error', 'Modal already exists for this Device Type');
        }
        if ($this->image) {

            $this->modal->image = $this->image;
        }
        $this->modal->save();

        return redirect()->route('modal-index');
    }

    public function render()
    {
        return view('livewire.modal.edit')->layout('admin.layouts.app');
    }
}
