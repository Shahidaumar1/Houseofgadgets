<?php

namespace App\Http\Livewire\PaymentMethods\Components;

use Livewire\Component;

class KlarnaInstallmentsBadge extends Component
{
    public $price;
    public function mount($price = 0)
    {
        $this->price =  round($price / 3,2);
    }


    protected $listeners = ['price'];
    public function price($price)
    {
        $this->price = round($price / 3,2);
    }


    public function render()
    {
        return view('livewire.payment-methods.components.klarna-installments-badge');
    }
}
