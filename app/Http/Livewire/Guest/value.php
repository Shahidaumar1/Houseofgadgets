<?php
// app/Http/Livewire/Guest/Value.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class value extends Component
{
    public function render()
    {
        return view('livewire.guest.value')->layout('frontend.layouts.app');
    }
}
