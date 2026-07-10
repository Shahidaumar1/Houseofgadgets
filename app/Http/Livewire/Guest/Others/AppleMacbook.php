<?php

namespace App\Http\Livewire\Guest\Others;

use Livewire\Component;

class AppleMacbook extends Component
{
    public $faults;
    public $selectedFaults = [];
    public $fault;
    public $make = 'Apple Macbook';
    public $emc;
    public $modal;
    public $alert = false;
    public function mount()
    {
        $this->loadFaults();
    }

    protected $messages = [
        'modal' => 'The model field is required.',
        'emc' => 'The EMC field is required.'
    ];

    public function updated()
    {
        $this->validate([
            'emc' => 'required',
            'modal' => 'required',
        ]);
        if (!$this->selectedFaults && !$this->fault) {
            $this->alert = true;
            return;
        }
        $other_macbook_data = [
            'type' => 'AppleMacbook',
            'make' => $this->make,
            'emc' => $this->emc,
            'modal' => $this->modal,
            'faults' => $this->selectedFaults,
            'fault' => $this->fault,
        ];
        $this->alert = false;

        session()->put('other_macbook_data', $other_macbook_data);


    }
    public function render()
    {
        return view('livewire.guest.others.apple-macbook')->layout('frontend.layouts.app');
    }


    function loadFaults()
    {
        $this->faults = [
            'Broken Screen',
            'Battery Replacement',
            'Charging Port Repair',
            'Keyboard Fault',
            'Housing or Hinge Issue',
            'Audio Fault',
            'Water Damage',
            'Data Recovery',
            'Firmware / Software problem',
            'Other Fault (Please Specify)'
        ];
    }
}