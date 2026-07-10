<?php
// app/Http/Livewire/Guest/Goldmine.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class goldmines extends Component
{
    public function render()
    {
        return view('livewire.guest.goldmines')->layout('frontend.layouts.app');
    }
}
