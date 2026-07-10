<?php
// app/Http/Livewire/Guest/SignUp.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class signup extends Component
{
    public function render()
    {
        return view('livewire.guest.signup')->layout('frontend.layouts.app');
    }
}
