<?php

namespace App\Http\Livewire\Guest\UserDashboard\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SideNave extends Component
{
    public $active;
    public $user;
    public function mount($active = null)
    {
        $this->active = $active;
        $this->user = Auth::user();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function render()
    {
        return view('livewire.guest.user-dashboard.components.side-nave');
    }
}
