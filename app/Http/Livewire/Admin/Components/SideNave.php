<?php

namespace App\Http\Livewire\Admin\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\FormStatus;

class SideNave extends Component
{
    public $active;
    public $formStatuses;
    public function mount($active = null)
    {
        $this->active = $active;
        $this->formStatuses = FormStatus::all();
    }

    public function toggleStatus($id, $field)
    {
        // Toggle the status of the specified field for the given form status
        $formStatus = FormStatus::find($id);
        $formStatus->$field = !$formStatus->$field;
        $formStatus->save();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function render()
    {
        return view('livewire.admin.components.side-nave');
    }
}
