<?php
// app/Http/Livewire/Guest/Marvels.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class marvels extends Component
{
    public function render()
    {
        return view('livewire.guest.marvels')->layout('frontend.layouts.app');
    }
}
