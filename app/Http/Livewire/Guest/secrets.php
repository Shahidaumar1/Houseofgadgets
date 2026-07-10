<?php
// app/Http/Livewire/Guest/Secrets.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class secrets extends Component
{
    public function render()
    {
        return view('livewire.guest.secrets')->layout('frontend.layouts.app');
    }
}
