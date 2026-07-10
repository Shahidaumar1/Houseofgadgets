<?php

namespace App\Http\Livewire\Repair\Components;

use App\Models\RepairType;
use Livewire\Component;

class RepairTypeEdit extends Component
{

    public $repair_type;
    public $editable = false;
    public $newRepairType;
    public $image;

    protected $rules = [
        'newRepairType' => 'required',
    ];

    public function mount(RepairType $repair)
    {
        $this->repair_type = $repair;
    }

    protected $listeners = ['FileUploaded'];
    public function FileUploaded($file)
    {
        $this->image = $file['result']['url'];

    }

    public function updated($property)
    {
        if ($property == 'newRepairType') {
            $this->validate();
            $this->repair_type->name = $this->newRepairType;
            $this->repair_type->image = $this->image ? $this->image : 'https://ik.imagekit.io/krgti2xic/New_Project__1__8xEV-IYht.png';
            $this->repair_type->save();
            $this->editable = false;
        }
    }

    public function editable(RepairType $repair_type)
    {
        $this->repair_type = $repair_type;
        $this->newRepairType = $repair_type->name;
        $this->editable = true;
    }

    public function delete(RepairType $repairType)
    {
        if ($repairType->device_types->contains($repairType->id)) {
            return $this->addError('error', 'You are not allowed to delete, this repair type linked with device types');
        }
        $repairType->delete();
        $this->editable = false;
        $this->emit('RepairTypeDeleted');
    }
    public function render()
    {
        return view('livewire.repair.components.repair-type-edit');
    }
}
