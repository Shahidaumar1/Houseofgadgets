<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AddStaff extends Component
{
    use WithFileUploads;

    // Form fields
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $photo; // uploaded file

    // UI state
    public $staffList = [];
    public $showForm = false;
    public $editingId = null;
    public $successMessage = '';
    public $errorMessage = '';

    public function mount()
    {
        $this->loadStaff();
    }

    public function loadStaff()
    {
        $this->staffList = User::where('role', 'staff')->latest()->get()->toArray();
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->photo = null;
        $this->editingId = null;
        $this->successMessage = '';
        $this->errorMessage = '';
    }

    public function saveStaff()
    {
        if ($this->editingId) {
            $rules = [
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|max:255|unique:users,email,' . $this->editingId,
                'password' => 'nullable|min:8|confirmed',
                'photo'    => 'nullable|image|max:2048',
            ];
        } else {
            $rules = [
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|max:255|unique:users,email',
                'password' => 'required|min:8|confirmed',
                'photo'    => 'nullable|image|max:2048',
            ];
        }

        $this->validate($rules);

        try {
            $photoPath = null;
            if ($this->photo) {
                $photoPath = $this->photo->store('staff-photos', 'public');
            }

            if ($this->editingId) {
                $staff = User::findOrFail($this->editingId);
                $staff->name  = $this->name;
                $staff->email = $this->email;
                if ($this->password) {
                    $staff->password = Hash::make($this->password);
                }
                if ($photoPath) {
                    // Delete old photo if exists
                    if ($staff->profile_photo_path) {
                        Storage::disk('public')->delete($staff->profile_photo_path);
                    }
                    $staff->profile_photo_path = $photoPath;
                }
                $staff->save();
                $this->successMessage = 'Staff member updated successfully!';
            } else {
                User::create([
                    'name'                => $this->name,
                    'email'               => $this->email,
                    'password'            => Hash::make($this->password),
                    'role'                => 'staff',
                    'profile_photo_path'  => $photoPath,
                ]);
                $this->successMessage = 'Staff member added successfully!';
            }

            $this->showForm = false;
            $this->resetForm();
            $this->loadStaff();

        } catch (\Exception $e) {
            $this->errorMessage = 'Something went wrong: ' . $e->getMessage();
        }
    }

    public function editStaff($id)
    {
        $staff = User::findOrFail($id);
        $this->editingId   = $staff->id;
        $this->name        = $staff->name;
        $this->email       = $staff->email;
        $this->password    = '';
        $this->password_confirmation = '';
        $this->photo       = null;
        $this->showForm    = true;
        $this->successMessage = '';
        $this->errorMessage   = '';
    }

    public function deleteStaff($id)
    {
        try {
            $staff = User::where('id', $id)->where('role', 'staff')->first();
            if ($staff) {
                if ($staff->profile_photo_path) {
                    Storage::disk('public')->delete($staff->profile_photo_path);
                }
                $staff->delete();
            }
            $this->successMessage = 'Staff member deleted successfully!';
            $this->loadStaff();
        } catch (\Exception $e) {
            $this->errorMessage = 'Could not delete: ' . $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.admin.add-staff')
            ->layout('layouts.admin');
    }
}