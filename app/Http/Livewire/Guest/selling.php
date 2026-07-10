<?php
// app/Http/Livewire/Guest/Selling.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class selling extends Component
{
    public function render()
    {
        return view('livewire.guest.selling')->layout('frontend.layouts.app');
    }
}
