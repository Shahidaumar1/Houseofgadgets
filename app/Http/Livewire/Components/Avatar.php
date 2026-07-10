<?php

namespace App\Http\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Avatar extends Component
{
    public $user;
    public function mount()
    {
        $this->user = Auth::user();
    }
    public function render()
    {
        return view('livewire.components.avatar');
    }
}