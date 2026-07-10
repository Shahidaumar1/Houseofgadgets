<?php

namespace App\Http\Livewire\Admin\Repair\RepairPrice;

use App\Helpers\ServiceType;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\DeviceSubBrand;
use App\Models\DeviceSeries;
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

    public $subBrands = [];
    public $selectedSubBrand;
    public $selectedSubBrandId;

    public $series = [];
    public $selectedSeries;
    public $selectedSeriesId;

    public $models = [];
    public $selectedModel;
    public $selectedModelId;

    public $repair_types = [];
    public $selectedRepairType;

    public $editable = false;
    public $price;
    public $data;

    protected $rules = [
        'selectedCatId'       => 'required',
        'selectedDeviceId'    => 'required',
        'selectedModelId'     => 'required',
        'selectedRepairType'  => 'required',
        'price'               => 'required',
    ];

    protected $listeners = ['RepairTypeCreated'];

    public function mount()
    {
        $this->categories = Category::where('service', ServiceType::REPAIR)->get();

        if ($this->categories->count() > 0) {
            $this->selectedCat   = $this->categories->first();
            $this->selectedCatId = $this->selectedCat->id;
        }

        $this->loadDevices();
        $this->loadSubBrands();
        $this->loadSeries();
        $this->loadModels();

        $this->repair_types = RepairType::all();
        $this->loadNextComponentData();
    }

    public function updated($property)
    {
        if ($property === 'selectedCatId') {
            $this->selectedDeviceId    = null;
            $this->selectedDevice      = null;
            $this->selectedSubBrandId  = null;
            $this->selectedSubBrand    = null;
            $this->selectedSeriesId    = null;
            $this->selectedSeries      = null;
            $this->selectedModelId     = null;
            $this->selectedModel       = null;

            $this->loadDevices();
            $this->loadSubBrands();
            $this->loadSeries();
            $this->loadModels();

            $this->emit('categoryId', $this->selectedCatId);
        }

        if ($property === 'selectedDeviceId') {
            $this->selectedDevice = $this->selectedDeviceId
                ? DeviceType::find($this->selectedDeviceId)
                : null;

            $this->selectedSubBrandId = null;
            $this->selectedSubBrand   = null;
            $this->selectedSeriesId   = null;
            $this->selectedSeries     = null;
            $this->selectedModelId    = null;
            $this->selectedModel      = null;

            $this->loadSubBrands();
            $this->loadSeries();
            $this->loadModels();

            $this->emit('deviceId', $this->selectedDeviceId);
        }

        if ($property === 'selectedSubBrandId') {
            $this->selectedSubBrand = $this->selectedSubBrandId
                ? DeviceSubBrand::find($this->selectedSubBrandId)
                : null;

            $this->selectedSeriesId = null;
            $this->selectedSeries   = null;
            $this->selectedModelId  = null;
            $this->selectedModel    = null;

            $this->loadSeries();
            $this->loadModels();
        }

        if ($property === 'selectedSeriesId') {
            $this->selectedSeries = $this->selectedSeriesId
                ? DeviceSeries::find($this->selectedSeriesId)
                : null;

            $this->selectedModelId = null;
            $this->selectedModel   = null;

            $this->loadModels();
        }
    }

    // ---------- helpers ----------

    protected function loadDevices()
    {
        if (!$this->selectedCatId) {
            $this->devices = collect();
            return;
        }

        $this->devices = DeviceType::where('category_id', $this->selectedCatId)
            ->where('service', ServiceType::REPAIR)
            ->get();

        $this->selectedDevice   = $this->devices->first();
        $this->selectedDeviceId = $this->selectedDevice?->id;
    }

    protected function loadSubBrands()
    {
        if (!$this->selectedDeviceId) {
            $this->subBrands = collect();
            return;
        }

        $this->subBrands = DeviceSubBrand::where('device_type_id', $this->selectedDeviceId)
            ->orderBy('name')
            ->get();
    }

    protected function loadSeries()
    {
        if (!$this->selectedSubBrandId) {
            $this->series = collect();
            return;
        }

        $this->series = DeviceSeries::where('sub_brand_id', $this->selectedSubBrandId)
            ->orderBy('name')
            ->get();
    }

    protected function loadModels()
    {
        $query = Modal::query()
            ->where('service', ServiceType::REPAIR);

        if ($this->selectedDeviceId) {
            $query->where('device_type_id', $this->selectedDeviceId);
        }
        if ($this->selectedSubBrandId) {
            $query->where('sub_brand_id', $this->selectedSubBrandId);
        }
        if ($this->selectedSeriesId) {
            $query->where('series_id', $this->selectedSeriesId);
        }

        $this->models = $query->orderBy('order_by')->get();
    }

    // ---------- actions ----------

    public function create()
    {
        $this->validate();

        $device = DeviceType::where('id', $this->selectedDeviceId)->first();

        // check already existing
        $price = Price::where('repair_type_id', $this->selectedRepairType)
            ->where('modal_id', $this->selectedModelId)
            ->first();

        if ($device->repair_types->contains($this->selectedRepairType)
            && $device->modals->contains($this->selectedModelId)
            && $price
        ) {
            return $this->addError('error', 'Price already exists for (device -> model -> repair type)');
        }

        if (!$device->repair_types->contains($this->selectedRepairType)) {
            $device->repair_types()->attach($this->selectedRepairType);
            $device->save();
        }

        $price = new Price();
        $price->repair_type_id = $this->selectedRepairType;
        $price->modal_id       = $this->selectedModelId;
        $price->price          = $this->price;
        $price->save();

        $this->price = '';

        $this->emit('RepairCreated', $this->selectedDeviceId);
        $this->emit('closeM', 'add-new-repair');
    }

    public function toggle()
    {
        $this->editable = !$this->editable;
    }

    public function RepairTypeCreated(RepairType $new_repair_type)
    {
        $this->selectedRepairType = $new_repair_type->id;
        $this->repair_types       = RepairType::all();
    }

    public function loadNextComponentData()
    {
        $this->data = [
            'title'       => 'Devices',
            'route'       => 'repair-devices',
            'button_text' => 'Back',
        ];
    }

    public function render()
    {
        return view('livewire.admin.repair.repair-price.create')
            ->layout('layouts.admin');
    }
}
