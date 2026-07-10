<?php

namespace App\Http\Livewire\Guest\Others;

use Livewire\Component;

class MicrosoftSurface extends Component
{
    public $faults;
    public $selectedFaults = [];
    public $fault;
    public $make = 'Microsoft Surface';
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
            'modal' => 'required',
        ]);
        if (!$this->selectedFaults && !$this->fault) {
            $this->alert = true;
            return;
        }
        $microsoft_surface_data = [
            'type' => 'MicrosoftSurface',
            'make' => $this->make,
            'modal' => $this->modal,
            'faults' => $this->selectedFaults,
            'fault' => $this->fault,
        ];
        $this->alert = false;

        session()->put('microsoft_surface_data', $microsoft_surface_data);


    }
    public function render()
    {
        return view('livewire.guest.others.microsoft-surface')->layout('frontend.layouts.app');
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