<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class ThankYou extends Component
{
    public function render()
    {
        return view('livewire.guest.thank-you')->layout('frontend.layouts.app');;
    }
}
