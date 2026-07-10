<?php
namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\EmailAddress;

class ManageEmails extends Component
{
    public $email, $emails = [];

    public function mount()
    {
        $this->emails = EmailAddress::all();
    }

    public function addEmail()
    {
        $this->validate(['email' => 'required|email|unique:email_addresses,email']);
        EmailAddress::create(['email' => $this->email]);
        $this->emails = EmailAddress::all();
        $this->email = '';
        session()->flash('message', 'Email added successfully.');
    }

    public function deleteEmail($id)
    {
        EmailAddress::find($id)->delete();
        $this->emails = EmailAddress::all();
        session()->flash('message', 'Email deleted successfully.');
    }

    public function render()
    {
        return view('livewire.admin.manage-emails');
    }
}
