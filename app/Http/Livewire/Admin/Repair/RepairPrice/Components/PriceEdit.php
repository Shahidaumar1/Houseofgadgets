<?php

namespace App\Http\Livewire\Admin\Repair\RepairPrice\Components;

use App\Models\Price;
use Livewire\Component;

class PriceEdit extends Component
{
    public $price;
    public $editablePrice = false;

    public $newPrice;

    protected $rules = [
        'newPrice' => 'Optional'
    ];

    public function mount(Price $price)
    {
        $this->price = $price;
    }

    public function updated($property)
    {
        if($property == 'newPrice'){

            $this->price->price = $this->newPrice ? $this->newPrice : 0;
            $this->price->save();
            $this->editablePrice = false;
        }
    }



    public function editablePrice(Price $price)
    {
        $this->price = $price;
        $this->newPrice = $price->price;
        $this->editablePrice = true;
    }

    public function delete(Price $priece)
    {
        $priece->delete();
        $this->editablePrice = false;
        $this->emit('PriceDeleted');
    }
    public function render()
    {
        return view('livewire.repair.components.price-edit');
    }
}
