<?php
// app/Http/Livewire/Guest/Tips.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class tips extends Component
{
    public function render()
    {
        return view('livewire.guest.tips')->layout('frontend.layouts.app');
    }
}
