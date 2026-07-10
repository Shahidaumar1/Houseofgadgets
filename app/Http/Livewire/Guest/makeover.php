<?php
// app/Http/Livewire/Guest/Makeover.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class makeover extends Component
{
    public function render()
    {
        return view('livewire.guest.makeover')->layout('frontend.layouts.app');
    }
}
