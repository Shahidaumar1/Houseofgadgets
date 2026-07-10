<?php
// app/Http/Livewire/Guest/Choices.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class choices extends Component
{
    public function render()
    {
        return view('livewire.guest.choices')->layout('frontend.layouts.app');
    }
}
