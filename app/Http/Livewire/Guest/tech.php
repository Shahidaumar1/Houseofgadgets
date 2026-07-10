<?php
// app/Http/Livewire/Guest/Tech.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class tech extends Component
{
    public function render()
    {
        return view('livewire.guest.tech')->layout('frontend.layouts.app');
    }
}
