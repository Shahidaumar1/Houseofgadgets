<?php

namespace App\Http\Livewire\Guest\UserDashboard\Profile;

use Livewire\Component;

use App\Models\Profile;

class Index extends Component
{
    public $profile;

    protected $rules = [
        'profile.birthday' => 'nullable|date',
        'profile.gender' => 'nullable|string',
        'profile.mobile' => 'nullable|string',
    ];

    public function mount()
    {
        $this->profile = auth()->user()->profile ?? new Profile();
    }

    public function saveProfile()
    {
        $this->validate();

        $user = auth()->user();
        $user->profile()->updateOrCreate(['user_id' => $user->id], $this->profile->toArray());

        session()->flash('success', 'Profile updated successfully!');
    }

    public function render()
    {
        return view('livewire.guest.user-dashboard.profile.index')
            ->layout('frontend.layouts.user-app');
    }
}
