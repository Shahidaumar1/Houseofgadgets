<?php
// app/Http/Livewire/Guest/Blog.php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class blog extends Component
{
    public function render()
    {
        return view('livewire.guest.blog')->layout('frontend.layouts.app');
    }
}
