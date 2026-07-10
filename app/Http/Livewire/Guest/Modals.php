<?php

namespace App\Http\Livewire\Guest;

use App\Helpers\Status;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\DeviceSubBrand;
use App\Models\DeviceSeries;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;


class Modals extends Component
{
    public $device;
    public $category;
    // UI data
    public $subBrands = [];
    public $seriesList = [];
    public $modals = [];

    // step state
    public $step = 'models'; // sub_brands | series | models
    public $selectedSubBrandId = null;
    public $selectedSeriesId = null;

    // ===== helpers: resolve actual column names safely =====
    protected function modalsSubBrandColumn(): ?string
    {
        if (!Schema::hasTable('modals')) return null;

        if (Schema::hasColumn('modals', 'device_sub_brand_id')) return 'device_sub_brand_id';
        if (Schema::hasColumn('modals', 'sub_brand_id')) return 'sub_brand_id';

        return null;
    }

    protected function modalsSeriesColumn(): ?string
    {
        if (!Schema::hasTable('modals')) return null;

        if (Schema::hasColumn('modals', 'device_series_id')) return 'device_series_id';
        if (Schema::hasColumn('modals', 'series_id')) return 'series_id';

        return null;
    }

    protected function seriesSubBrandColumn(): ?string
    {
        if (!Schema::hasTable('device_series')) return null;

        if (Schema::hasColumn('device_series', 'sub_brand_id')) return 'sub_brand_id';

        return null;
    }

   public function mount(Category $category, DeviceType $device)
{
    $this->category = $category;
    $this->device = $device;

    $subBrandSlug = request()->query('sub_brand');
    $seriesSlug   = request()->query('series');

    $this->selectedSubBrandId = null;
    $this->selectedSeriesId   = null;

    // ---- load sub-brands ----
    $subBrandQuery = DeviceSubBrand::where('device_type_id', $device->id)
        ->when(Schema::hasColumn('device_sub_brands', 'status'), function ($q) {
            $q->where('status', Status::PUBLISH);
        });

    if (Schema::hasColumn('device_sub_brands', 'order')) {
        $subBrandQuery->orderBy('order')->orderBy('name');
    } else {
        $subBrandQuery->orderBy('name');
    }

    $this->subBrands = $subBrandQuery->get();

    // resolve sub_brand slug -> model/id
    $selectedSubBrand = null;
    if (!empty($subBrandSlug)) {
        $selectedSubBrand = $this->subBrands->firstWhere('slug', $subBrandSlug);
        if (!$selectedSubBrand) {
            abort(404);
        }
        $this->selectedSubBrandId = $selectedSubBrand->id;
    }

    if ($this->subBrands->count() > 0 && empty($this->selectedSubBrandId)) {
        $this->step = 'sub_brands';
        $this->seriesList = collect();
        $this->modals = collect();
        return;
    }

    // ---- load series list ----
    $seriesQuery = DeviceSeries::query();

    if (Schema::hasColumn('device_series', 'device_type_id')) {
        $seriesQuery->where('device_type_id', $device->id);
    }

    $seriesSubBrandCol = $this->seriesSubBrandColumn();
    if ($seriesSubBrandCol) {
        if ($selectedSubBrand) {
            $seriesQuery->where($seriesSubBrandCol, $selectedSubBrand->id);
        } else {
            $seriesQuery->whereNull($seriesSubBrandCol);
        }
    }

    if (Schema::hasColumn('device_series', 'status')) {
        $seriesQuery->where('status', Status::PUBLISH);
    }

    if (Schema::hasColumn('device_series', 'order')) {
        $seriesQuery->orderBy('order')->orderBy('name');
    } else {
        $seriesQuery->orderBy('name');
    }

    $this->seriesList = $seriesQuery->get();

    // resolve series slug -> model/id
    if (!empty($seriesSlug)) {
        $selectedSeries = $this->seriesList->firstWhere('slug', $seriesSlug);
        if (!$selectedSeries) {
            abort(404);
        }
        $this->selectedSeriesId = $selectedSeries->id;
    }

    if ($this->seriesList->count() > 0 && empty($this->selectedSeriesId)) {
        $this->step = 'series';
        $this->modals = collect();
        return;
    }

    $this->loadModals();
}
    protected function loadModals()
    {
        $subBrandCol = $this->modalsSubBrandColumn();
        $seriesCol   = $this->modalsSeriesColumn();

        $query = $this->device->modals()
            ->when(Schema::hasColumn('modals', 'status'), function ($q) {
                $q->where('status', Status::PUBLISH);
            })
            ->orderBy('order_by', 'asc'); // already your custom order for models

        // sub-brand filter
        if (!empty($this->selectedSubBrandId) && $subBrandCol) {
            $query->where($subBrandCol, (int)$this->selectedSubBrandId);
        } elseif ($subBrandCol) {
            // ✅ brand-level models (no sub-brand) only when no sub_brand param
            $query->whereNull($subBrandCol);
        }

        // series filter
        if (!empty($this->selectedSeriesId) && $seriesCol) {
            $query->where($seriesCol, (int)$this->selectedSeriesId);
        } else {
            // ✅ if no series selected -> allow only active series models + null-series models
            if (Schema::hasTable('device_series') && $seriesCol) {
                $seriesQ = DeviceSeries::query();

                if (Schema::hasColumn('device_series', 'device_type_id')) {
                    $seriesQ->where('device_type_id', $this->device->id);
                }

                if (!empty($this->selectedSubBrandId) && Schema::hasColumn('device_series', 'sub_brand_id')) {
                    $seriesQ->where('sub_brand_id', (int)$this->selectedSubBrandId);
                } elseif (Schema::hasColumn('device_series', 'sub_brand_id')) {
                    $seriesQ->whereNull('sub_brand_id');
                }

                if (Schema::hasColumn('device_series', 'status')) {
                    $seriesQ->where('status', Status::PUBLISH);
                }

                $activeSeriesIds = $seriesQ->pluck('id')->all();

                $query->where(function ($q) use ($seriesCol, $activeSeriesIds) {
                    if (!empty($activeSeriesIds)) {
                        $q->whereNull($seriesCol)->orWhereIn($seriesCol, $activeSeriesIds);
                    } else {
                        $q->whereNull($seriesCol);
                    }
                });
            }
        }

        $this->modals = $query->get();
        $this->step   = 'models';
    }

    public function render()
    {
        return view('livewire.guest.modals')->layout('frontend.layouts.app');
    }
}
