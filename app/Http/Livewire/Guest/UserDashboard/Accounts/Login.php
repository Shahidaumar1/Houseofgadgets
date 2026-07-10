<?php

namespace App\Http\Livewire\Guest\UserDashboard\Accounts;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    protected $rules = [
        'email' => 'required',
        'password' => 'required'
    ];

    public function login()
    {
        $this->validate();
        $user = User::where('email', $this->email)->first();
        $invalidCredentials = $user == null || !Hash::check($this->password, $user->password);
        if ($invalidCredentials) {
            return $this->addError('email', 'Invalid email or password');
        }
        Auth::login($user);
        return redirect()->route('user-dashboard');
    }
    public function render()
    {
        return view('livewire.guest.user-dashboard.accounts.login')->layout('frontend.layouts.user-app');
    }
}
