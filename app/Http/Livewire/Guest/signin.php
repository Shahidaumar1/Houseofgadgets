<?php

// app/Http/Livewire/Guest/SignIn.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class signin extends Component
{
    public function render()
    {
        return view('livewire.guest.signin')->layout('frontend.layouts.app');
    }
}
