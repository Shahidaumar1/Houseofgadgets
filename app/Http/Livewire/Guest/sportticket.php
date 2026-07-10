<?php

// app/Http/Livewire/Guest/SportTicket.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class sportticket extends Component
{
    public function render()
    {
        return view('livewire.guest.sportticket')->layout('frontend.layouts.app');
    }
}
