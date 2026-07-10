<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class OtherRepairTypes extends Component
{

    public $faults;
    public $selectedFaults = [];
    public $fault;
    public $make;
    public $modal;
    public $alert = false;
    public function mount($make, $modal)
    {



        $this->make = $make;
        $this->modal = $modal;
        $this->loadFaults();
    }


    public function updated()
    {

        if (!$this->selectedFaults && !$this->fault) {
            $this->alert = true;
            return;
        }
        $other_repair_types_data = [
            'type' => 'OtherRepairTypes',
            'make' => $this->make,
            'modal' => $this->modal,
            'faults' => $this->selectedFaults,
            'fault' => $this->fault,
        ];
        $this->alert = false;
        session()->put('other_repair_types_data', $other_repair_types_data);


    }
    public function render()
    {
        return view('livewire.guest.other-repair-types')->layout('frontend.layouts.app');
    }

    public function loadFaults()
    {
        $this->faults = [
            'Charging Port Repair: £ TBC',
            'Camera Lens Repair: £ TBC',
            'Main Camera Repair: £ TBC',
            'Speaker Repair: £ TBC',
            'Microphone Repair: £ TBC',
            'Water Damage: £ TBC',
            'Data Recovery: £ TBC',
            'Other Fault (Please Specify)'
        ];

    }
}
