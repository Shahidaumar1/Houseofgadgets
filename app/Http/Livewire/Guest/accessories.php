<?php

// app/Http/Livewire/Guest/Accessories.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class Accessories extends Component
{
    public function render()
    {
        return view('livewire.guest.accessories')->layout('frontend.layouts.app');
    }
}
