<?php

namespace App\Http\Livewire\Admin\Repair\Series;

use App\Helpers\ServiceType;
use App\Helpers\Status;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\DeviceSubBrand;
use App\Models\DeviceSeries;
use App\Models\Modal;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithFileUploads;

    public $categories;
    public $selectedCatId;
    public $selectedCategory;

    public $brands = [];
    public $selectedBrandId;
    public $selectedBrand;

    public $subBrands = [];
    public $selectedSubBrandId; // OPTIONAL now (can be null/empty)
    public $selectedSubBrand;

    public $series = [];

    // create fields
    public $newSeriesName;
    public $newSeriesImage;

    // edit fields
    public $editingSeriesId = null;
    public $editSeriesName;
    public $editSeriesImage;

    public function mount()
    {
        $this->categories = Category::where('service', ServiceType::REPAIR)->get();

        if ($this->categories->count() > 0) {
            $this->selectedCategory = $this->categories[0];
            $this->selectedCatId    = $this->selectedCategory->id;
        }

        $this->loadBrands();
        $this->loadSeries(); // so it doesn't stay blank forever
    }

    public function updated($property)
    {
        if ($property === 'selectedCatId') {
            $this->selectedCategory = Category::find($this->selectedCatId);
            $this->loadBrands();

            $this->selectedBrandId    = null;
            $this->selectedBrand      = null;

            $this->selectedSubBrandId = null;
            $this->selectedSubBrand   = null;
            $this->subBrands          = [];
            $this->series             = [];
        }

        if ($property === 'selectedBrandId') {
            $this->selectedBrand = $this->selectedBrandId
                ? DeviceType::find($this->selectedBrandId)
                : null;

            $this->loadSubBrands();

            // sub brand optional → default brand-level series view
            $this->selectedSubBrandId = null;
            $this->selectedSubBrand   = null;

            $this->loadSeries();
        }

        if ($property === 'selectedSubBrandId') {
            $this->selectedSubBrand = $this->selectedSubBrandId
                ? DeviceSubBrand::find($this->selectedSubBrandId)
                : null;

            $this->loadSeries();
        }
    }

    public function loadBrands()
    {
        if (!$this->selectedCategory) {
            $this->brands = [];
            return;
        }

        $this->brands = DeviceType::where('category_id', $this->selectedCategory->id)
            ->orderBy('name')
            ->get();
    }

    public function loadSubBrands()
    {
        if (!$this->selectedBrandId) {
            $this->subBrands = [];
            return;
        }

        $this->subBrands = DeviceSubBrand::where('device_type_id', $this->selectedBrandId)
            ->orderBy('name')
            ->get();
    }

    /**
     * - If sub brand selected → show series under that sub brand
     * - If no sub brand selected → show brand-level series (sub_brand_id NULL)
     */
    public function loadSeries()
    {
        if (!$this->selectedBrandId) {
            $this->series = [];
            return;
        }

        $query = DeviceSeries::where('device_type_id', $this->selectedBrandId);

        if ($this->selectedSubBrandId) {
            $query->where('sub_brand_id', $this->selectedSubBrandId);
        } else {
            $query->whereNull('sub_brand_id'); // brand-level series
        }

        // ⬇️ order column + name (for drag & drop)
        if (Schema::hasColumn('device_series', 'order')) {
            $query->orderBy('order')->orderBy('name');
        } else {
            $query->orderBy('name');
        }

        $this->series = $query->get();
    }

    /** ---------- CREATE ---------- */
    public function createSeries()
    {
        $this->validate([
            'selectedBrandId'    => 'required|exists:device_types,id',
            'selectedSubBrandId' => 'nullable|exists:device_sub_brands,id',
            'newSeriesName'      => 'required|string|max:255',
            'newSeriesImage'     => 'nullable|image|max:2048',
        ]);

        $path = null;
        if ($this->newSeriesImage) {
            $path = $this->newSeriesImage->store('images/series', 'custom');
        }

        $data = [
            'device_type_id' => $this->selectedBrandId,
            'sub_brand_id'   => $this->selectedSubBrandId ?: null,
            'name'           => $this->newSeriesName,
            'file'           => $path,
            'status'         => Status::PUBLISH,
            'slug'           => Str::slug($this->newSeriesName),
        ];

        // set next order per (brand + sub_brand) if column exists
        if (Schema::hasColumn('device_series', 'order')) {
            $orderQuery = DeviceSeries::where('device_type_id', $this->selectedBrandId);

            if ($this->selectedSubBrandId) {
                $orderQuery->where('sub_brand_id', $this->selectedSubBrandId);
            } else {
                $orderQuery->whereNull('sub_brand_id');
            }

            $maxOrder = $orderQuery->max('order');
            $data['order'] = $maxOrder ? $maxOrder + 1 : 1;
        }

        DeviceSeries::create($data);

        $this->reset('newSeriesName', 'newSeriesImage');
        $this->loadSeries();
    }

    /** ---------- EDIT ---------- */
    public function startEdit($id)
    {
        $s = DeviceSeries::findOrFail($id);

        $this->editingSeriesId = $s->id;
        $this->editSeriesName  = $s->name;
        $this->editSeriesImage = null;
    }

    public function cancelEdit()
    {
        $this->editingSeriesId = null;
        $this->reset('editSeriesName', 'editSeriesImage');
    }

    public function updateSeries()
    {
        $this->validate([
            'editSeriesName'  => 'required|string|max:255',
            'editSeriesImage' => 'nullable|image|max:2048',
        ]);

        $s = DeviceSeries::findOrFail($this->editingSeriesId);
        $s->name = $this->editSeriesName;

        if ($this->editSeriesImage) {
            if ($s->file) {
                Storage::disk('custom')->delete($s->file);
            }
            $s->file = $this->editSeriesImage->store('images/series', 'custom');
        }

        $s->slug = Str::slug($s->name);
        $s->save();

        $this->cancelEdit();
        $this->loadSeries();
    }

    /** ---------- STATUS TOGGLE (CASCADE) ---------- */
    public function toggleStatus($id)
    {
        $s = DeviceSeries::findOrFail($id);

        $s->status = $s->status == Status::PUBLISH
            ? Status::PAUSE
            : Status::PUBLISH;

        $s->save();

        $newStatus = $s->status;

        // cascade to models under this series
        if (Schema::hasTable('modals') && Schema::hasColumn('modals', 'status')) {
            $modalsQuery = Modal::where('device_type_id', $s->device_type_id);

            if (Schema::hasColumn('modals', 'device_series_id')) {
                $modalsQuery->where('device_series_id', $s->id);
            } elseif (Schema::hasColumn('modals', 'series_id')) {
                $modalsQuery->where('series_id', $s->id);
            }

            $modalsQuery->update(['status' => $newStatus]);
        }

        $this->loadSeries();
    }

    /** ---------- DELETE IMAGE ---------- */
    public function deleteImage($id)
    {
        $s = DeviceSeries::findOrFail($id);

        if ($s->file) {
            Storage::disk('custom')->delete($s->file);
            $s->file = null;
            $s->save();
        }

        $this->loadSeries();
    }

    /** ---------- DELETE SERIES ---------- */
    public function deleteSeries($id)
    {
        $s = DeviceSeries::findOrFail($id);

        if ($s->file) {
            Storage::disk('custom')->delete($s->file);
        }

        $s->delete();
        $this->loadSeries();
    }

    /** ---------- REORDER (DRAG & DROP) ---------- */
    // $orderedIds = [id1, id2, id3, ...] in new order
    public function reorderSeries($orderedIds)
    {
        if (!Schema::hasColumn('device_series', 'order')) {
            return;
        }

        foreach ($orderedIds as $index => $id) {
            $query = DeviceSeries::where('id', $id)
                ->where('device_type_id', $this->selectedBrandId);

            if ($this->selectedSubBrandId) {
                $query->where('sub_brand_id', $this->selectedSubBrandId);
            } else {
                $query->whereNull('sub_brand_id');
            }

            $query->update(['order' => $index + 1]); // 1,2,3...
        }

        $this->loadSeries();
    }

    public function render()
    {
        return view('livewire.admin.repair.series.index')
            ->layout('layouts.admin');
    }
}
