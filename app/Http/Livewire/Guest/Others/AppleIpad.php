<?php

namespace App\Http\Livewire\Guest\Others;

use Livewire\Component;

class AppleIpad extends Component
{

    public $faults;
    public $selectedFaults = [];
    public $fault;
    public $make = 'Apple Ipad';
    public $emc;
    public $modal;
    public $alert = false;
    public function mount()
    {
        $this->loadFaults();
    }

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
        $apple_ipad_data = [
            'type' => 'AppleIpad',
            'make' => $this->make,
            'emc' => $this->emc,
            'modal' => $this->modal,
            'faults' => $this->selectedFaults,
            'fault' => $this->fault,
        ];
        $this->alert = false;
        session()->put('apple_ipad_data', $apple_ipad_data);

    }
    public function render()
    {
        return view('livewire.guest.others.apple-ipad')->layout('frontend.layouts.app');
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