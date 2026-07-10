<?php

// app/Http/Livewire/Guest/Gadget.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class gadget extends Component
{
    public function render()
    {
        return view('livewire.guest.gadget')->layout('frontend.layouts.app');
    }
}
