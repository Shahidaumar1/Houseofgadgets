<?php
// app/Http/Livewire/Guest/Insights.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class insights extends Component
{
    public function render()
    {
        return view('livewire.guest.insights')->layout('frontend.layouts.app');
    }
}
