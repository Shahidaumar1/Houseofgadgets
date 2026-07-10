<?php

namespace App\Http\Livewire\Guest\Others;

use Livewire\Component;

class SamsungGlaxyTab extends Component
{

    public $faults;
    public $selectedFaults = [];
    public $fault;
    public $make = 'Samsung Glaxy Tab';
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
        $samsung_glaxy_tab_data = [
            'type' => 'SamsungGlaxyTab',
            'make' => $this->make,
            'modal' => $this->modal,
            'faults' => $this->selectedFaults,
            'fault' => $this->fault,
        ];
        $this->alert = false;
        session()->put('samsung_glaxy_tab_data', $samsung_glaxy_tab_data);

    }
    public function render()
    {
        return view('livewire.guest.others.samsung-glaxy-tab')->layout('frontend.layouts.app');

    }

    function loadFaults()
    {
        $this->faults = [
            'Broken Screen',
            'Battery Replacement',
            'Charging Port Repair',
            'Audio Fault',
            'Water Damage',
            'Data Recovery',
            'Firmware / Software problem',
            'Other Fault (Please Specify)'
        ];
    }
}