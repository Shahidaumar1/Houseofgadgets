<?php

// app/Http/Livewire/Guest/Wisdom.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class wisdom extends Component
{
    public function render()
    {
        return view('livewire.guest.wisdom')->layout('frontend.layouts.app');
    }
}
