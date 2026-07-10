<?php
// app/Http/Livewire/Guest/Treasures.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class treasures extends Component
{
    public function render()
    {
        return view('livewire.guest.treasures')->layout('frontend.layouts.app');
    }
}
