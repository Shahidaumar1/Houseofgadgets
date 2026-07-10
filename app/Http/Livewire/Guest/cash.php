<?php
// app/Http/Livewire/Guest/Cash.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class cash extends Component
{
    public function render()
    {
        return view('livewire.guest.cash')->layout('frontend.layouts.app');
    }
}
