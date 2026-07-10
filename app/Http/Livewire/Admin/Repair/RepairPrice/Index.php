<?php

namespace App\Http\Livewire\Admin\Repair\RepairPrice;

use App\Helpers\ServiceType;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\DeviceSubBrand;
use App\Models\DeviceSeries;
use App\Models\Modal;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;

class Index extends Component
{
    public $models = [];
    public $devices = [];
    public $categories = [];

    public $selectedDevice;
    public $selectedDeviceId;
    public $selectedCatId;

    public $subBrands = [];
    public $selectedSubBrand;
    public $selectedSubBrandId; // '' brand-level, 'all', numeric

    public $series = [];
    public $selectedSeries;
    public $selectedSeriesId;

    protected $listeners = ['updateRowOrder', 'RepairCreated', 'UpdateDeviceType'];

    public function mount()
    {
        $this->categories = Category::where('service', ServiceType::REPAIR)->get();

        $this->selectedCatId = $this->categories->first()?->id;

        $this->devices = DeviceType::where('category_id', $this->selectedCatId)->get();

        $this->selectedDevice   = $this->devices->first();
        $this->selectedDeviceId = $this->selectedDevice?->id;

        // default brand-level
        $this->selectedSubBrandId = '';
        $this->selectedSeriesId   = '';

        $this->loadSubBrands();
        $this->loadSeries();
        $this->loadModels();
    }

    public function updatedSelectedCatId()
    {
        $this->devices = DeviceType::where('category_id', $this->selectedCatId)->get();

        $this->selectedDevice   = $this->devices->first();
        $this->selectedDeviceId = $this->selectedDevice?->id;

        $this->selectedSubBrandId = '';
        $this->selectedSubBrand   = null;
        $this->selectedSeriesId   = '';
        $this->selectedSeries     = null;

        $this->loadSubBrands();
        $this->loadSeries();
        $this->loadModels();
    }

    public function updatedSelectedDeviceId()
    {
        $this->selectedDevice = DeviceType::find($this->selectedDeviceId);

        $this->selectedSubBrandId = '';
        $this->selectedSubBrand   = null;
        $this->selectedSeriesId   = '';
        $this->selectedSeries     = null;

        $this->loadSubBrands();
        $this->loadSeries();
        $this->loadModels();
    }

    public function updatedSelectedSubBrandId()
    {
        $this->selectedSubBrand = is_numeric($this->selectedSubBrandId)
            ? DeviceSubBrand::find($this->selectedSubBrandId)
            : null;

        $this->selectedSeriesId = '';
        $this->selectedSeries   = null;

        $this->loadSeries();
        $this->loadModels();
    }

    public function updatedSelectedSeriesId()
    {
        $this->selectedSeries = is_numeric($this->selectedSeriesId)
            ? DeviceSeries::find($this->selectedSeriesId)
            : null;

        $this->loadModels();
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
        if (!$this->selectedDeviceId) {
            $this->series = collect();
            return;
        }

        $q = DeviceSeries::where('device_type_id', $this->selectedDeviceId);

        if ($this->selectedSubBrandId === 'all') {
            // no filter
        } elseif (is_numeric($this->selectedSubBrandId)) {
            $q->where('sub_brand_id', $this->selectedSubBrandId);
        } else {
            $q->whereNull('sub_brand_id');
        }

        $this->series = $q->orderBy('name')->get();
    }

    protected function modalsSubBrandColumn(): ?string
    {
        if (!Schema::hasTable('modals')) return null;

        if (Schema::hasColumn('modals', 'sub_brand_id')) return 'sub_brand_id';
        if (Schema::hasColumn('modals', 'device_sub_brand_id')) return 'device_sub_brand_id';

        return null;
    }

    protected function modalsSeriesColumn(): ?string
    {
        if (!Schema::hasTable('modals')) return null;

        if (Schema::hasColumn('modals', 'series_id')) return 'series_id';
        if (Schema::hasColumn('modals', 'device_series_id')) return 'device_series_id';

        return null;
    }

    public function loadModels()
    {
        $subBrandCol = $this->modalsSubBrandColumn();
        $seriesCol   = $this->modalsSeriesColumn();

        $query = Modal::query()
            ->where('service', ServiceType::REPAIR);

        if ($this->selectedDeviceId) {
            $query->where('device_type_id', $this->selectedDeviceId);
        }

        if ($subBrandCol) {
            if ($this->selectedSubBrandId === 'all') {
            } elseif (is_numeric($this->selectedSubBrandId)) {
                $query->where($subBrandCol, $this->selectedSubBrandId);
            } else {
                $query->whereNull($subBrandCol);
            }
        }

        if ($seriesCol && is_numeric($this->selectedSeriesId)) {
            $query->where($seriesCol, $this->selectedSeriesId);
        }

        $this->models = $query->orderBy('sort_order')->get();
    }

    public function updateRowOrder($orderedIds)
    {
        foreach ($orderedIds as $index => $id) {
            Modal::where('id', $id)->update(['sort_order' => $index + 1]);
        }

        $this->loadModels();
        session()->flash('message', 'Order saved successfully!');
    }

    public function RepairCreated(DeviceType $deviceType)
    {
        $this->selectedDevice   = $deviceType;
        $this->selectedDeviceId = $deviceType->id;

        $this->selectedSubBrandId = '';
        $this->selectedSeriesId   = '';

        $this->loadSubBrands();
        $this->loadSeries();
        $this->loadModels();
    }

    public function UpdateDeviceType(DeviceType $deviceType)
    {
        $this->selectedDevice   = $deviceType;
        $this->selectedDeviceId = $deviceType->id;

        $this->selectedSubBrandId = '';
        $this->selectedSeriesId   = '';

        $this->loadSubBrands();
        $this->loadSeries();
        $this->loadModels();
    }

    public function render()
    {
        return view('livewire.admin.repair.repair-price.index')
            ->layout('layouts.admin');
    }
}
