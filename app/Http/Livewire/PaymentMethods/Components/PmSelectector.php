<?php

namespace App\Http\Livewire\PaymentMethods\Components;

use Livewire\Component;

class PmSelectector extends Component
{
    public $selectedPm = 'stripe';
    public $price = 0;
    public $color;
    public $service;
    public function mount($price = 0, $color = 'black',$service = null)
    {
        $this->price = $price;
        $this->color = $color;
        $this->service = $service;
    }

    public function changePm($pm)
    {
        $this->selectedPm = $pm;
    }
    protected $listeners = ['priceEmitter', 'BookRepair'];
    public function priceEmitter($price)
    {
        $this->emit('nextPriceEmitter', $price);

    }
    public function BookRepair()
    {
        $this->emit('BookRepair');

    }
    public function render()
    {
        return view('livewire.payment-methods.components.pm-selectector');
    }
}
