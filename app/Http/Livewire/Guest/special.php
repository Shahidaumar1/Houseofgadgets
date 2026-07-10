<?php
// app/Http/Livewire/Guest/Special.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class special extends Component
{
    public function render()
    {
        return view('livewire.guest.special')->layout('frontend.layouts.app');
    }
}
