<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class Store extends Component
{
    public function render()
    {
        return view('livewire.guest.store')->layout('frontend.layouts.app');
    }
}
