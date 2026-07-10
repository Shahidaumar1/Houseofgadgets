<?php

// app/Http/Livewire/Guest/Details.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class details extends Component
{
    public function render()
    {
        return view('livewire.guest.details')->layout('frontend.layouts.app');
    }
}
