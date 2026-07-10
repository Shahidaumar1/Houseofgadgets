<?php

namespace App\Http\Livewire\PaymentMethods;

use Livewire\Component;

class KlarnaSuccess extends Component
{

    public function mount()
    {
        session()->flush();
    }
    public function render()
    {
        return view('livewire.payment-methods.klarna-success');
    }
}
