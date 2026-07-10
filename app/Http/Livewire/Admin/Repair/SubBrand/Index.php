<?php

namespace App\Http\Livewire\Admin\Repair\SubBrand;

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

    // create fields
    public $newSubBrandName;
    public $newSubBrandImage;

    // edit fields
    public $editingSubBrandId = null;
    public $editSubBrandName;
    public $editSubBrandImage;

    public function mount()
    {
        $this->categories = Category::where('service', ServiceType::REPAIR)->get();

        if ($this->categories->count() > 0) {
            $this->selectedCategory = $this->categories[0];
            $this->selectedCatId    = $this->selectedCategory->id;
        }

        $this->loadBrands();
        $this->loadSubBrands();
    }

    public function updated($property)
    {
        if ($property === 'selectedCatId') {
            $this->selectedCategory = Category::find($this->selectedCatId);
            $this->loadBrands();

            $this->selectedBrandId = null;
            $this->selectedBrand   = null;
            $this->subBrands       = [];
        }

        if ($property === 'selectedBrandId') {
            $this->selectedBrand = $this->selectedBrandId
                ? DeviceType::find($this->selectedBrandId)
                : null;

            $this->loadSubBrands();
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

        $query = DeviceSubBrand::where('device_type_id', $this->selectedBrandId);

        // IMPORTANT: use `order` column if it exists, otherwise fall back to name
        if (Schema::hasColumn('device_sub_brands', 'order')) {
            $query->orderBy('order')->orderBy('name');
        } else {
            $query->orderBy('name');
        }

        $this->subBrands = $query->get();
    }

    /** ---------- CREATE ---------- */
    public function createSubBrand()
    {
        $this->validate([
            'selectedBrandId'  => 'required|exists:device_types,id',
            'newSubBrandName'  => 'required|string|max:255',
            'newSubBrandImage' => 'nullable|image|max:2048',
        ]);

        $path = null;
        if ($this->newSubBrandImage) {
            $path = $this->newSubBrandImage->store('images/sub-brands', 'custom');
        }

        // keep it simple: let DB default handle `order` for new ones
        DeviceSubBrand::create([
            'device_type_id' => $this->selectedBrandId,
            'name'           => $this->newSubBrandName,
            'file'           => $path,
            'status'         => Status::PUBLISH,
            'slug'           => Str::slug($this->newSubBrandName),
        ]);

        $this->reset('newSubBrandName', 'newSubBrandImage');
        $this->loadSubBrands();
    }

    /** ---------- EDIT ---------- */
    public function startEdit($id)
    {
        $sb = DeviceSubBrand::findOrFail($id);

        $this->editingSubBrandId = $sb->id;
        $this->editSubBrandName  = $sb->name;
        $this->editSubBrandImage = null;
    }

    public function cancelEdit()
    {
        $this->editingSubBrandId = null;
        $this->reset('editSubBrandName', 'editSubBrandImage');
    }

    public function updateSubBrand()
    {
        $this->validate([
            'editSubBrandName'  => 'required|string|max:255',
            'editSubBrandImage' => 'nullable|image|max:2048',
        ]);

        $sb = DeviceSubBrand::findOrFail($this->editingSubBrandId);
        $sb->name = $this->editSubBrandName;

        if ($this->editSubBrandImage) {
            if ($sb->file) {
                Storage::disk('custom')->delete($sb->file);
            }
            $sb->file = $this->editSubBrandImage->store('images/sub-brands', 'custom');
        }

        $sb->slug = Str::slug($sb->name);
        $sb->save();

        $this->cancelEdit();
        $this->loadSubBrands();
    }

    /** ---------- STATUS TOGGLE (CASCADE) ---------- */
    public function toggleStatus($id)
    {
        $sb = DeviceSubBrand::findOrFail($id);

        // flip sub brand status
        $sb->status = $sb->status == Status::PUBLISH
            ? Status::PAUSE
            : Status::PUBLISH;

        $sb->save();

        $newStatus = $sb->status;

        // 1) cascade to series under this sub brand
        if (Schema::hasTable('device_series') && Schema::hasColumn('device_series', 'status')) {
            DeviceSeries::where('sub_brand_id', $sb->id)
                ->update(['status' => $newStatus]);
        }

        // 2) cascade to models under this sub brand
        if (Schema::hasTable('modals') && Schema::hasColumn('modals', 'status')) {
            $modalsQuery = Modal::where('device_type_id', $sb->device_type_id);

            if (Schema::hasColumn('modals', 'device_sub_brand_id')) {
                $modalsQuery->where('device_sub_brand_id', $sb->id);
            } elseif (Schema::hasColumn('modals', 'sub_brand_id')) {
                $modalsQuery->where('sub_brand_id', $sb->id);
            }

            $modalsQuery->update(['status' => $newStatus]);
        }

        $this->loadSubBrands();
    }

    /** ---------- DELETE IMAGE ---------- */
    public function deleteImage($id)
    {
        $sb = DeviceSubBrand::findOrFail($id);

        if ($sb->file) {
            Storage::disk('custom')->delete($sb->file);
            $sb->file = null;
            $sb->save();
        }

        $this->loadSubBrands();
    }

    /** ---------- DELETE SUB BRAND ---------- */
    public function deleteSubBrand($id)
    {
        $sb = DeviceSubBrand::findOrFail($id);

        if ($sb->file) {
            Storage::disk('custom')->delete($sb->file);
        }

        // optional: delete / cleanup children here if you want

        $sb->delete();
        $this->loadSubBrands();
    }

    /** ---------- REORDER (DRAG & DROP) ---------- */
    // gets array of IDs in new order: [id1, id2, id3, ...]
    public function reorderSubBrands($orderedIds)
    {
        if (!Schema::hasColumn('device_sub_brands', 'order')) {
            return;
        }

        foreach ($orderedIds as $index => $id) {
            DeviceSubBrand::where('id', $id)
                ->where('device_type_id', $this->selectedBrandId)
                ->update(['order' => $index + 1]); // 1,2,3...
        }

        $this->loadSubBrands();
    }

    public function render()
    {
        return view('livewire.admin.repair.sub-brand.index')
            ->layout('layouts.admin');
    }
}
