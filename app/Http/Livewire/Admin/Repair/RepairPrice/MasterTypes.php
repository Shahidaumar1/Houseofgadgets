<?php

namespace App\Http\Livewire\Admin\Repair\RepairPrice;

use App\Helpers\ServiceType;
use App\Models\RepairType;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class MasterTypes extends Component
{
    use WithFileUploads;

    public $repair_types;
    public $repairTypeFields;
    public $newImage;
    public $newFieldValue;
    public $editable = false;
    public $data;

    public function mount()
    {
        $this->repair_types = RepairType::all();
        $this->loadNextComponentData();
    }

    public function addRepairType()
    {
        $this->editable = true;
    }

    protected $listeners = ['RepairTypeCreated', 'RepairTypeDeleted'];
    public function RepairTypeCreated(RepairType $new_repair_type)
    {
        $this->repair_types = RepairType::all();
    }

    public function RepairTypeDeleted()
    {
        //
    }


    public function edit($id)
    {
        $this->newFieldValue = $id;

    }
    public function updateField($repairTypeId, $field)
    {


        $this->validate([
            'newFieldValue' => 'required',
        ]);

        $repairType = RepairType::findOrFail($repairTypeId);
        $repairType->$field = $this->newFieldValue;
        // $this->repairTypeFields =  $repairType->toArray();
        $repairType->save();

        $this->newFieldValue = $repairType->$field;

    }
    public function deleteImage($id)
    {
        $repairType = RepairType::findOrFail($id);
        if ($repairType->image) {
            Storage::delete($repairType->image);
            $repairType->image = "";
            $repairType->save();
        }
    }
    public function updateImage($id)
    {
        $repairType = RepairType::findOrFail($id);
        if ($this->newImage) {
            $repairType->image = $this->newImage->store('images/repair_types', 'custom');
            $repairType->save();
        }
    }

    public function loadNextComponentData()
    {

        $this->data = [
            'title' => 'Devices',
            'route' => 'repair-devices',
            'button_text' => 'Back'
        ];

    }




    public function render()
    {
        return view('livewire.admin.repair.repair-price.master-types')->layout('layouts.admin');
    }
}
