<?php

namespace App\Http\Livewire\Account;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remember_me = false;  // Add remember_me property to handle the checkbox state

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    // This method runs before rendering the view
    public function mount()
    {
        // Check if the user is already logged in, if so, set the "remember me" checkbox accordingly
        if (Auth::check() && Auth::viaRemember()) {
            $this->remember_me = true;  // Keep checkbox checked if user is remembered
        }
    }

    public function login()
    {
        // Validate the input
        $this->validate();

        // Fetch user by email
        $user = User::where('email', $this->email)->first();

        // Check for invalid credentials
        $invalidCredentials = $user == null || !Hash::check($this->password, $user->password);
        if ($invalidCredentials) {
            // Return error if credentials are invalid
            return $this->addError('email', 'Invalid email or password');
        }

        // Attempt login with remember me option
        Auth::login($user, $this->remember_me); // The second parameter is the remember_me value

        // Redirect after successful login
        return redirect()->route('buy-categories');
    }

    // Render the Livewire component view
    public function render()
    {
        return view('livewire.account.login')->layout('frontend.layouts.app');
    }
}
