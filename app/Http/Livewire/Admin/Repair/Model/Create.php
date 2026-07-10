<?php

namespace App\Http\Livewire\Admin\Repair\Model;

use App\Helpers\ImageService;
use App\Helpers\ServiceType;
use App\Models\DeviceType;
use App\Models\Modal;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $rand;
    public $name;
    public $file;

    public $deviceId;    // device_types.id
    public $subBrandId;  // device_sub_brands.id (nullable)
    public $seriesId;    // device_series.id (nullable)

    public $deviceName;  // sirf UI ke liye

    protected $rules = [
        'name' => 'required|string',
        'file' => 'required',
    ];

    // IMPORTANT: yahan koi model type-hint nahi
    public function mount($deviceId = null, $subBrandId = null, $seriesId = null)
    {
        $this->deviceId   = $deviceId;
        $this->subBrandId = $subBrandId ?: null;
        $this->seriesId   = $seriesId ?: null;
        $this->rand       = rand();

        if ($this->deviceId) {
            $device = DeviceType::find($this->deviceId);
            $this->deviceName = $device?->name;
        }
    }

    public function save()
    {
        $this->validate();

        if (!$this->deviceId) {
            $this->addError('deviceId', 'Please select a brand first.');
            return;
        }

        $fileUrl = null;
        if ($this->file) {
            $fileUrl = ImageService::upload($this->file)->url ?? null;
        }

        $model = new Modal();

        $model->file           = $fileUrl;
        $model->service        = ServiceType::REPAIR;
        $model->device_type_id = $this->deviceId;
        $model->sub_brand_id   = $this->subBrandId ?: null;
        $model->series_id      = $this->seriesId ?: null;
        $model->name           = $this->name;
        $model->status         = 'Publish';

        $model->save();

        $this->emit('modelCreated');
        $this->emit('closeM', 'add-repair-model');

        $this->clearForm();
    }


    public function clearForm()
    {
        $this->rand = rand();
        $this->name = '';
        $this->file = null;
    }

    public function render()
    {
        return view('livewire.admin.repair.model.create');
    }
}
