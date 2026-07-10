<?php
namespace App\Http\Livewire\Account;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ForgetPassword extends Component
{
    public function render()
    {
        return view('livewire.account.forget-password');
    }

    public function sendPasswordResetLink()
    {
        // Retrieve user's email from the database
        $user = DB::table('users')->where('email', '=', 'user@email.com')->first();

        if ($user) {
            // Generate password reset token and save it
            $token = \Str::random(60);
            DB::table('password_resets')->insert([
                'email' => $user->email,
                'token' => \Hash::make($token),
                'created_at' => now(),
            ]);

            // Send email with password reset link
            \Mail::to($user->email)->send(new \App\Mail\ResetPassword($token));

            session()->flash('message', 'Password reset link sent to your email.');
        } else {
            session()->flash('message', 'User not found.'); // Handle if user not found
        }
    }
}

