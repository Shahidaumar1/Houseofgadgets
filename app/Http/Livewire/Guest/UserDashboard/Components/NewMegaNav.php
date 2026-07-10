<?php

namespace App\Http\Livewire\Guest\UserDashboard\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NewMegaNav extends Component
{
    public $active;
    public $user;

    public function mount($active = null)
    {
        $this->active = $active;
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.guest.user-dashboard.components.newmeganav');
    }
}
