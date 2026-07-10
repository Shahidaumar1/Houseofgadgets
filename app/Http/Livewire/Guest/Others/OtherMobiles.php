<?php

namespace App\Http\Livewire\Guest\Others;

use Livewire\Component;

class OtherMobiles extends Component
{
    public $faults;
    public $selectedFaults = [];
    public $fault;
    public $make;
    public $modal;
    public $alert = false;
    public function mount()
    {
        $this->loadFaults();
    }

    protected $messages = [
        'modal' => 'The model field is required.'
    ];
    public function updated()
    {
        $this->validate([
            'make' => 'required',
            'modal' => 'required',
        ]);

        if (!$this->selectedFaults && !$this->fault) {
            $this->alert = true;
            return;
        }
        $other_mobiles_data = [
            'type' => 'OtherMobile',
            'make' => $this->make,
            'modal' => $this->modal,
            'faults' => $this->selectedFaults,
            'fault' => $this->fault,
        ];
        $this->alert = false;

        session()->put('other_mobiles_data', $other_mobiles_data);


    }

    public function render()
    {
        return view('livewire.guest.others.other-mobiles')->layout('frontend.layouts.app');
    }

    public function loadFaults()
    {
        $this->faults = [
            'Broken Screen',
            'Battery Replacement',
            'Charging Port Repair',
            'Housing Issue',
            'Audio Fault',
            'Water Damage',
            'Data Recovery',
            'Firmware / Software problem',
            'Other Fault (Please Specify)'
        ];
    }
}