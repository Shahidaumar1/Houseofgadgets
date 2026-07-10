<?php

namespace App\Http\Livewire\Admin\Sell\Model;

use App\Helpers\ImageService;
use App\Helpers\ServiceType;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\SellModelOption;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $rand;
    public $name;
    public $device;
    public $file;

    public function mount(DeviceType $device)
    {

        $this->device = $device;
    }

    protected $rules = [
        'name' => 'required',
        'file' => 'required',
    ];

    public function save()
    {

        $this->validate([
            'name' => [
                Rule::unique('modals', 'name')->where(function ($query) {
                    return $query->where('service', ServiceType::SELL)
                        ->where('device_type_id', $this->device->id);
                }),
            ],
        ]);
        $model = new Modal();
        $model->file = ImageService::upload($this->file)->url;
        $model->service = ServiceType::SELL;
        $model->device_type()->associate($this->device);
        $model->name = $this->name;
        $model->save();
        $this->emit('closeM', 'add-sell-model');
        $this->emit('modelCreated');
        $this->clearForm();
    }

    public function clearForm()
    {
        $this->rand++;
        $this->name = '';
    }

    protected $listeners = ['deviceId'];
    public function deviceId(DeviceType $device)
    {
        $this->device = $device;
    }
    public function render()
    {
        return view('livewire.admin.sell.model.create')->layout('layouts.admin');
    }
}