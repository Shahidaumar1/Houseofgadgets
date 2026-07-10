<?php

namespace App\Http\Livewire\Repair;

use App\Helpers\ServiceType;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\Price;
use App\Models\RepairType;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $categories = [];
    public $selectedCatId;
    public $selectedCat;

    public $devices = [];
    public $selectedDevice;
    public $selectedDeviceId;

    public $models = [];
    public $selectedModel;
    public $selectedModelId;


    public $repair_types = [];
    public $selectedRepairType;

    public $editable = false;
    public $price;



    protected $rules = [
        'selectedDeviceType' => 'required',
        'selectedModal' => 'required',
        'selectedRepairType' => 'required',
        'price' => 'required'
    ];

    public function mount()
    {
        $this->categories = Category::where('service',ServiceType::REPAIR)->get();
        if ($this->categories->count() > 0) {
            $this->selectedCat = $this->categories[0];
            $this->selectedCatId = $this->selectedCat->id;
            $this->devices = $this->selectedCat->devices;
            $this->selectedDevice = $this->devices[0];
            $this->selectedDeviceId = $this->selectedDevice->id;
            $this->models = $this->getModals($this->selectedDeviceId);
            $this->repair_types = RepairType::all();
        }


    }

    public function updated($property)
    {
        if ($property == 'selectedDeviceType') {
            $deviceType = DeviceType::where('id', $this->selectedDeviceType)->first();
            $this->models = $this->getModals($deviceType);
            $this->emit('UpdateDeviceType', $this->selectedDeviceType);
        }
    }

    public function create()
    {
        $this->validate();
        $device = DeviceType::where('id', $this->selectedDeviceType)->first();
        $price = Price::where('repair_type_id', $this->selectedRepairType)->where('modal_id', $this->selectedModal)->first();
        if ($device->repair_types->contains($this->selectedRepairType) && $device->modals->contains($this->selectedModal) && $price) {
            return $this->addError('error', 'Price already exists for (devicetype->modal->repair_type)');
        }

        if (!$device->repair_types->contains($this->selectedRepairType)) {
            $device = DeviceType::where('id', $this->selectedDeviceType)->first();
            $device->repair_types()->attach($this->selectedRepairType);
            $device->save();
        }

        $price = new Price();
        $price->repair_type_id = $this->selectedRepairType;
        $price->modal_id = $this->selectedModal;
        $price->price = $this->price;
        $price->save();
        $this->price = '';
        $this->emit('RepairCreated', $this->selectedDeviceType);
    }

    public function toggle()
    {
        $this->editable = !$this->editable;
    }

    protected $listeners = ['RepairTypeCreated'];


    public function RepairTypeCreated(RepairType $new_repair_type)
    {
        $this->selectedRepairType = $new_repair_type->id;
        $this->repair_types = RepairType::all();
    }


    public function render()
    {
        return view('livewire.repair.create')->layout('admin.layouts.app');
    }

    public function getModals(DeviceType $deviceType)
    {
        return $deviceType ? $deviceType->modals : [];
    }
}
