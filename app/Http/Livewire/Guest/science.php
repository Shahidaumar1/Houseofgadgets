<?php
// app/Http/Livewire/Guest/Science.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class science extends Component
{
    public function render()
    {
        return view('livewire.guest.science')->layout('frontend.layouts.app');
    }
}
