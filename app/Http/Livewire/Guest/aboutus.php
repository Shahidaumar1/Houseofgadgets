<?php
// app/Http/Livewire/Guest/AboutUs.php


namespace App\Http\Livewire\Guest;

use Livewire\Component;

class aboutus extends Component
{
    public function render()
    {
        return view('livewire.guest.aboutus')->layout('frontend.layouts.app');
    }
}
