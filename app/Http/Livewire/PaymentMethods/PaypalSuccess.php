<?php

namespace App\Http\Livewire\PaymentMethods;

use Livewire\Component;

class PaypalSuccess extends Component
{

    public function mount()
    {
        session()->flush();
    }

    public function render()
    {
        return view('livewire.payment-methods.paypal-success')->layout('frontend.layouts.app');
    }
}
