<?php

namespace App\Http\Livewire\Admin\Repair\Model;

use App\Helpers\ServiceType;
use App\Helpers\Status;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\DeviceSubBrand;
use App\Models\DeviceSeries;
use App\Models\Modal;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;

class Index extends Component
{
    public $categories = [];
    public $selectedCat;
    public $selectedCatId;

    public $devices = [];
    public $selectedDevice;
    public $selectedDeviceId;

    public $subBrands = [];
    public $selectedSubBrand;
    public $selectedSubBrandId; // '' brand-level, 'all' all, numeric = specific

    public $series = [];
    public $selectedSeries;
    public $selectedSeriesId; // '' all

    public $models;
    public $selectedModel;

    public $data;
    public $activeView = 'card';
    public $target = 'Publish';
    public $items = [];

    protected $listeners = [
        'modelCreated' => 'loadUpdatedModels',
        'modelUpdated' => 'loadUpdatedModels',
        'loadArgsData' => 'fetchData',
    ];

    public function mount()
    {
        $this->categories = Category::where('service', ServiceType::REPAIR)->get();

        if ($this->categories->count() > 0) {
            $this->selectedCat   = $this->categories[0];
            $this->selectedCatId = $this->selectedCat->id;

            $this->devices = DeviceType::where('category_id', $this->selectedCatId)
                ->where('service', ServiceType::REPAIR)
                ->get();

            if ($this->devices->count() > 0) {
                $this->selectedDevice   = $this->devices[0];
                $this->selectedDeviceId = $this->selectedDevice->id;
            }
        }

        // default brand-level
        $this->selectedSubBrandId = '';
        $this->selectedSeriesId   = '';

        $this->loadSubBrands();
        $this->loadSeries();
        $this->loadModels();
        $this->loadNextComponentData();
        $this->loadItems();
    }

    public function loadUpdatedModels()
    {
        $this->loadModels();
    }

    public function updated($property)
    {
        if ($property === 'selectedCatId') {
            $this->devices = DeviceType::where('category_id', $this->selectedCatId)
                ->where('service', ServiceType::REPAIR)
                ->get();

            $this->selectedDevice   = $this->devices->first();
            $this->selectedDeviceId = optional($this->selectedDevice)->id;

            $this->selectedSubBrand = null;
            $this->selectedSubBrandId = '';
            $this->selectedSeries = null;
            $this->selectedSeriesId = '';

            $this->loadSubBrands();
            $this->loadSeries();
            $this->loadModels();
        }

        if ($property === 'selectedDeviceId') {
            $this->selectedDevice = $this->selectedDeviceId ? DeviceType::find($this->selectedDeviceId) : null;

            $this->selectedSubBrand = null;
            $this->selectedSubBrandId = '';
            $this->selectedSeries = null;
            $this->selectedSeriesId = '';

            $this->loadSubBrands();
            $this->loadSeries();
            $this->loadModels();
        }

        if ($property === 'selectedSubBrandId') {
            $this->selectedSubBrand = is_numeric($this->selectedSubBrandId)
                ? DeviceSubBrand::find($this->selectedSubBrandId)
                : null;

            $this->selectedSeries = null;
            $this->selectedSeriesId = '';

            $this->loadSeries();
            $this->loadModels();
        }

        if ($property === 'selectedSeriesId') {
            $this->selectedSeries = is_numeric($this->selectedSeriesId)
                ? DeviceSeries::find($this->selectedSeriesId)
                : null;

            $this->loadModels();
        }
    }

    protected function loadSubBrands()
    {
        if (!$this->selectedDeviceId) {
            $this->subBrands = [];
            return;
        }

        $this->subBrands = DeviceSubBrand::where('device_type_id', $this->selectedDeviceId)
            ->orderBy('name')
            ->get();
    }

    /**
     * ✅ series loader:
     * ''      => brand-level series (sub_brand_id NULL)
     * 'all'   => all series for brand
     * numeric => series for that sub brand
     */
    protected function loadSeries()
    {
        if (!$this->selectedDeviceId) {
            $this->series = [];
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

    public function loadNextComponentData()
    {
        $this->data = [
            'title'       => 'Devices',
            'route'       => 'buy-devices',
            'button_text' => 'Back',
        ];
    }

    public function activateView($args)
    {
        $this->activeView = $args;
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

    public function fetchData($args)
    {
        $this->target = $args;

        $subBrandCol = $this->modalsSubBrandColumn();
        $seriesCol   = $this->modalsSeriesColumn();

        $base = Modal::query()->where('service', ServiceType::REPAIR);

        if ($this->selectedDeviceId) {
            $base->where('device_type_id', $this->selectedDeviceId);
        }

        if ($subBrandCol) {
            if ($this->selectedSubBrandId === 'all') {
                // no filter
            } elseif (is_numeric($this->selectedSubBrandId)) {
                $base->where($subBrandCol, $this->selectedSubBrandId);
            } else {
                $base->whereNull($subBrandCol);
            }
        }

        if ($seriesCol && is_numeric($this->selectedSeriesId)) {
            $base->where($seriesCol, $this->selectedSeriesId);
        }

        if ($args === 'Junk') {
            $junk = Modal::onlyTrashed()->where('service', ServiceType::REPAIR);

            if ($this->selectedDeviceId) $junk->where('device_type_id', $this->selectedDeviceId);

            if ($subBrandCol) {
                if ($this->selectedSubBrandId === 'all') {
                } elseif (is_numeric($this->selectedSubBrandId)) {
                    $junk->where($subBrandCol, $this->selectedSubBrandId);
                } else {
                    $junk->whereNull($subBrandCol);
                }
            }

            if ($seriesCol && is_numeric($this->selectedSeriesId)) {
                $junk->where($seriesCol, $this->selectedSeriesId);
            }

            $this->models = $junk->orderBy('order_by')->get();
            return;
        }

        if ($args === 'Top Rated') {
            $this->models = (clone $base)->where('top_rated', true)->orderBy('order_by')->get();
            return;
        }

        if ($args === 'New Arrival') {
            $this->models = (clone $base)->where('new_arrival', true)->orderBy('order_by')->get();
            return;
        }

        $this->models = $base->where('status', $args)->orderBy('order_by')->get();
    }

    public function loadModels()
    {
        $this->fetchData($this->target);
    }

    public function selectModel(Modal $modal)
    {
        $this->emit('modelSelected', $modal->id);
        $this->selectedModel = $modal;
        $this->emit('showM', 'edit-repair-model');
    }

    public function toggleStatus(Modal $modal)
    {
        $modal->update([
            'status' => $modal->status == Status::PUBLISH ? Status::PAUSE : Status::PUBLISH,
        ]);

        $this->fetchData($this->target);
    }

    public function softDelete(Modal $model)
    {
        $model->update(['status' => Status::PAUSE]);
        $model->delete();
        $this->fetchData($this->target);
    }

    public function restore($item)
    {
        $model = Modal::onlyTrashed()->find($item);
        if ($model) {
            $model->restore();
            $model->update(['status' => Status::PUBLISH]);
        }
        $this->fetchData($this->target);
    }

    public function setTopRated(Modal $model)
    {
        $model->update(['top_rated' => !$model->top_rated]);
        $this->fetchData($this->target);
    }

    public function setNewArrival(Modal $model)
    {
        $model->update(['new_arrival' => !$model->new_arrival]);
        $this->fetchData($this->target);
    }

    public function loadItems()
    {
        $this->items = [
            ['name' => 'Publish'],
            ['name' => 'Pause'],
            ['name' => 'Top Rated'],
            ['name' => 'New Arrival'],
            ['name' => 'Junk'],
        ];
    }

    public function updateOrder($order)
    {
        foreach ($order as $index => $id) {
            Modal::where('id', $id)->update(['order_by' => $index + 1]);
        }
        $this->loadModels();
    }

    public function render()
    {
        return view('livewire.admin.repair.model.index')
            ->layout('layouts.admin');
    }
}
