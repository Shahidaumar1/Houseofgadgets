<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class TermsAndConditions extends Component
{
    public function render()
    {
        return view('livewire.guest.terms-and-conditions')->layout('frontend.layouts.app');

    }
}