<?php

namespace App\Http\Livewire\Guest\UserDashboard\Profile;

use Livewire\Component;

use App\Models\UserBankAccount;

class PaymentOptions extends Component
{
    public $user;
    public $bankAccounts;
    public $selectedBankAccount;
    public $editMode = false;
    public $addNew = false;

    protected $rules = [
        'selectedBankAccount.account_holder' => 'required',
        'selectedBankAccount.account_number' => 'required',
        'selectedBankAccount.bank_name' => 'required',
        'selectedBankAccount.branch_name' => 'required',
    ];

    public function mount()
    {
        $this->user = auth()->user();
        $this->bankAccounts = $this->user->bankAccounts;
        $this->selectedBankAccount = new UserBankAccount();
    }
    public function editBankAccount($bankAccountId)
    {
        $this->editMode = true;
        $this->selectedBankAccount = UserBankAccount::find($bankAccountId);
    }



    public function deleteBankAccount($bankAccountId)
    {
        $bankAccount = UserBankAccount::find($bankAccountId);

        if ($bankAccount) {
            $bankAccount->delete();
            $this->bankAccounts = $this->user->bankAccounts()->get();
        }
    }
    public function addNew()
    {
        $this->addNew = true;
    }
    public function saveBankAccount()
    {
        $this->validate();

        if ($this->editMode) {
            $this->selectedBankAccount->save();
        } else {
            $this->user->bankAccounts()->save($this->selectedBankAccount);
        }

        $this->resetForm();
        $this->bankAccounts = $this->user->bankAccounts()->get();
    }

    public function resetForm()
    {
        $this->editMode = false;
        $this->addNew = false;
        $this->selectedBankAccount = new UserBankAccount();
    }

    public function render()
    {
        return view('livewire.guest.user-dashboard.profile.payment-options')
            ->layout('frontend.layouts.user-app');
    }
}
