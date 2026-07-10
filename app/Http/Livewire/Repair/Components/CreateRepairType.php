<?php

namespace App\Http\Livewire\Repair\Components;

use App\Models\RepairType;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateRepairType extends Component
{
    use WithFileUploads;
    public $repair_type_name;
    public $image;

    protected $listeners = ['FileUploaded'];
    public function FileUploaded($file)
    {
        $this->image = $file['result']['url'];

    }
    public function save()
    {
        $this->validate([
            'repair_type_name' => 'required',
        ]);
        $repair_type_name_exits = RepairType::where('name', $this->repair_type_name)->first();
        if ($repair_type_name_exits) {
            return $this->addError('error', 'Repair Type already exists');
        }

        $new_repair_type = new RepairType();
        $new_repair_type->name = $this->repair_type_name;
        $new_repair_type->image = $this->image;
        $new_repair_type->save();
        $this->repair_type_name = '';
        $this->emit('RepairTypeCreated', $new_repair_type->id);
    }
    public function render()
    {
        return view('livewire.repair.components.create-repair-type');
    }
}
