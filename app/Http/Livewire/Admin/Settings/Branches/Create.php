<?php

namespace App\Http\Livewire\Admin\Settings\Branches;

use App\Helpers\ImageKit;
use App\Helpers\ImageService;
use Livewire\WithFileUploads;
use App\Models\Branch;
use Livewire\Component;
use App\Models\AppointmentTimeSlot;

class Create extends Component
{
    use WithFileUploads;
    public $file;
    public $rand;
    public $data = [];
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

    public function rules()
    {
        return [
            'name' => 'required|string|unique:branches',
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
    }
    function mount()
    {

        $this->loadTimeSlots();
        $this->loadNextComponentData();
    }
    public function loadTimeSlots()
    {
        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];

        foreach ($daysOfWeek as $day) {
            $this->timeSlots[] = [
                'day' => $day,
                'opening_time' => null,
                'closing_time' => null,
                'status' => false,
            ];
        }
    }
    public function saveBranch()
    {
        $this->validate();

        $newBranch = Branch::create([
            'name' => $this->name,
            'image' => $this->file ? ImageService::upload($this->file)->url : $this->image,
            'address_line_1' => $this->address_line_1,
            'address_line_2' => $this->address_line_2,
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

        // Save the time slots for the new branch
        foreach ($this->timeSlots as $timeSlot) {
            $newBranch->appointmentTimeSlots()->create([
                'day' => $timeSlot['day'],
                'opening_time' => $timeSlot['opening_time'],
                'closing_time' => $timeSlot['closing_time'],
                'status' => $timeSlot['status'],
                // ... other time slot properties
            ]);
        }
        session()->flash('message', 'Branch created successfully!');
        return redirect()->route('branches-settings');
        $this->emit('branchCreated');
        $this->resetForm();
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Branch created successfully!']);
    }

    public function toggleStatus($index)
    {
        $this->timeSlots[$index]['status'] = !$this->timeSlots[$index]['status'];
    }
    public function resetForm()
    {
        $this->name = '';
        $this->address_line_1 = '';
        $this->address_line_2 = '';
        $this->town_city = '';
        $this->post_code = '';
        $this->mobile_number = '';
        $this->landline_number = '';
        $this->email = '';
        $this->latitude = '';
        $this->longitude = '';
        $this->loadTimeSlots();
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
        return view('livewire.admin.settings.branches.create')->layout('layouts.admin');
    }
}
