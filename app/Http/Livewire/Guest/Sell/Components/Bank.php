<?php

namespace App\Http\Livewire\Guest\Sell\Components;

use Livewire\Component;

class BankDetail {
    public $name;
    public $account_number;
    public $sort_code;
    public $account_title;
}

class Bank extends Component
{
    public $bank;
    public $data;
    public $loading = false;
    protected $rules = [
        'bank.name' => 'required',
        'bank.account_number' =>'required',
        'bank.sort_code' =>'required',
        'bank.account_title' =>'required',
    ];
    public function mount()
    {
        $bankObj = new BankDetail();
        $this->bank = get_object_vars($bankObj);
    }
    protected $listeners = ['emailSent'];
    public function emailSent()
    {
        $this->loading = false;
    }
    public function submit(){

        $this->validate();
        $this->loading = true;
        $this->emit('bankDetail',$this->bank);

    }
    
    
    // In your Livewire component class
public function refreshComponent()
{
    // You can add any logic here if needed
    // For a simple refresh, you can leave this method empty
}

    
    
    public function render()
    {
        return view('livewire.guest.sell.components.bank');
    }
}
