<?php

namespace App\Http\Livewire\Account;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $currentPassword;
    public $newPassword;
    public $confirmPassword;

    protected $rules = [
        'currentPassword' => 'required',
        'newPassword' => 'required|min:8',
        'confirmPassword' => 'required|same:newPassword',
    ];

    public function update()
    {
        $this->validate();

        // Verify current password
        if (!Hash::check($this->currentPassword, auth()->user()->password)) {
            $this->addError('currentPassword', 'Current password is incorrect.');
            return;
        }

        // Update password
        auth()->user()->update([
            'password' => Hash::make($this->newPassword),
        ]);

        session()->flash('success', 'Password updated successfully.');

        $this->reset(); // Clear input fields

        // Redirect or emit event if needed
        return redirect()->route('buy-categories');
     }

    public function render()
    {
        return view('livewire.account.change-password')->layout('frontend.layouts.app');
    }
}
