<?php
namespace App\Http\Livewire\Account;

use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Log;

class ResetPassword extends Component
{
    public $email;
    public $password;
    public $password_confirmation;
    public $token;

    public function mount($token = null)
    {
        $this->token = $token;
    }

    public function sendResetLinkEmail()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status == Password::RESET_LINK_SENT) {
            session()->flash('status', __($status));
        } else {
            $this->addError('email', __($status));
        }
    }

    public function resetPassword()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Log::info('Attempting to reset password for email: ' . $this->email);

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));

                Auth::login($user);
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            Log::info('Password reset successful for email: ' . $this->email);
            return redirect()->route('login')->with('status', __($status));
        } else {
            Log::error('Password reset failed for email: ' . $this->email . ' with status: ' . $status);
            $this->addError('email', __($status));
        }
    }

    public function render()
    {
        return view('livewire.account.reset-password')
            ->layout('frontend.layouts.app'); // Adjust 'frontend.layouts.app' to match your actual layout file path
    }
}
