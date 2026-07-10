<?php

namespace App\Http\Livewire\Guest\UserDashboard\Accounts;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $agreeTerms = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'agreeTerms' => 'required|accepted',
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 'user', // Set the role to 'user' by default
        ]);

        // Log in the user
        auth()->login($user);

        return redirect()->route('user-dashboard');
    }

    public function render()
    {
        return view('livewire.guest.user-dashboard.accounts.register')->layout('frontend.layouts.user-app');
    }
}
