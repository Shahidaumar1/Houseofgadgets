<?php
// app/Http/Livewire/Guest/Galore.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class galore extends Component
{
    public function render()
    {
        return view('livewire.guest.galore')->layout('frontend.layouts.app');
    }
}
