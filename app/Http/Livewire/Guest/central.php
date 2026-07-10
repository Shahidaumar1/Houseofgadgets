<?php
// app/Http/Livewire/Guest/Central.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class central extends Component
{
    public function render()
    {
        return view('livewire.guest.central')->layout('frontend.layouts.app');
    }
}
