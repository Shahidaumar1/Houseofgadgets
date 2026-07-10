<?php

namespace App\Http\Livewire\Admin\Settings\Branches;

use App\Helpers\ImageKit;
use App\Helpers\ImageService;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Branch;
use App\Models\AppointmentTimeSlot;

class Edit extends Component
{
    use WithFileUploads;
    public $file;
    public $data = [];
    public $rand;
    public $branch;
    public $name;
    public $image;
    public $address_line_1;
    public $address_line_2;
    public $town_city;
    public $post_code;
    public $mobile_number;
    public $landline_number;
    public $email;
    public $latitude;
    public $longitude;
    public $map_link;
    public $description;
    public $addressName;

    public $timeSlots = [];

    public function mount($branchId)
    {
        $this->branch = Branch::findOrFail($branchId);

        $this->rand = $branchId;
        $this->name = $this->branch->name;
        $this->image = $this->branch->image;
        $this->address_line_1 = $this->branch->address_line_1;
        $this->address_line_2 = $this->branch->address_line_2;
        $this->town_city = $this->branch->town_city;
        $this->post_code = $this->branch->post_code;
        $this->mobile_number = $this->branch->mobile_number;
        $this->landline_number = $this->branch->landline_number;
        $this->email = $this->branch->email;
        $this->latitude = $this->branch->latitude;
        $this->longitude = $this->branch->longitude;
        $this->map_link = $this->branch->map_link;
        $this->description = $this->branch->description;

        // Load time slots related to the branch
        $this->loadTimeSlots();
        $this->loadNextComponentData();
    }
    public function loadTimeSlots()
    {
        $this->timeSlots = AppointmentTimeSlot::where('branch_id', $this->branch->id)
            ->get();
    }
    public function rules()
    {


        $rules = [
            'name' => 'required|string|unique:branches,name,' . $this->branch->id,
            'address_line_1' => 'required|string',
            'town_city' => 'required|string',
            'post_code' => 'required|string|min:5|max:8',
            'mobile_number' => 'required|string|min:8|max:14',
            'email' => 'required|email',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'timeSlots.*.opening_time' => 'required',
            'timeSlots.*.closing_time' => 'required',
        ];

        return $rules;
    }

    protected $listeners = ['selectBranch'];
    public function selectBranch(Branch $branch)
    {
        $this->branch = $branch;
    }
    public function updateBranch()
    {
        $this->validate();
        $this->branch->update([
            'name' => $this->name,
            'image' => $this->file ? ImageService::upload($this->file)->url : $this->image,
            'address_line_1' => $this->address_line_1,
            'address_line_2' => "$this->address_line_2",
            'town_city' => $this->town_city,
            'post_code' => $this->post_code,
            'mobile_number' => $this->mobile_number,
            'landline_number' => $this->landline_number,
            'email' => $this->email,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'map_link' => $this->map_link,
            'description' => $this->description,
        ]);

        // Update time slots
        foreach ($this->timeSlots as $timeSlot) {
            $timeSlot->save();
        }
        session()->flash('message', 'Branch updated successfully!');
        return redirect()->route('branches-settings');
        $this->emit('branchUpdated');
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Branch updated successfully!']);
    }

    public function toggleStatus($timeSlotId)
    {
        $timeSlot = AppointmentTimeSlot::findOrFail($timeSlotId);
        $timeSlot->status = !$timeSlot->status;
        $timeSlot->save();

        foreach ($this->timeSlots as $index => $timeSlot) {
            if ($timeSlot['id'] == $timeSlotId) {
                $this->timeSlots[$index]['status'] = !$timeSlot['status'];
                break;
            }
        }
    }
    public function loadNextComponentData()
    {

        $this->data = [
            'title' => 'Branch',
            'route' => 'branches-settings',
            'button_text' => 'Back'
        ];
    }
    public function render()
    {
        return view('livewire.admin.settings.branches.edit')->layout('layouts.admin');
    }
}
