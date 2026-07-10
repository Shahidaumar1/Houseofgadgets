<?php
// app/Http/Livewire/Guest/Detail.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class detail extends Component
{
    // Your component logic goes here

    public function render()
    {
        return view('livewire.guest.detail')->layout('frontend.layouts.app');
    }
}
