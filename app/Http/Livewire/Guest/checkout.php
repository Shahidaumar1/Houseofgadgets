<?php
// app/Http/Livewire/Guest/Checkout.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class checkout extends Component
{
    public function render()
    {
        return view('livewire.guest.checkout')->layout('frontend.layouts.app');
    }
}
