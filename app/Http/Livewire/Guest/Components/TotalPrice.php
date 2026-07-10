<?php

namespace App\Http\Livewire\Guest\Components;

use Livewire\Component;

class TotalPrice extends Component
{
    public $totalPrice = 0;
    public $tbc; //to be confirmed
    public function mount($repairprice, $tbc = null)
    {

        $this->totalPrice = $repairprice == 'TBC' ? 0 : $repairprice;
        $this->tbc = $tbc;
        session()->put('totalPrice', $this->totalPrice);

    }

    protected $listeners = ['addPrice', 'removePrice', 'SPaddPrice', 'SPremovePrice', 'PCaddPrice', 'PCremovePrice', 'addCollectionPrice', 'addFixPrice', 'addPostalPrice', 'removePostalPrice'];

    public function addFixPrice($price)
    {
        if (session()->has('fix_form_price')) {
            $p = session()->get('fix_form_price');
            $this->totalPrice -= (int) $p;
            $this->totalPrice -= $price;
            session()->forget('fix_form_price');

            session()->put('fix_form_price', $price);

        } else {
            $this->totalPrice += $price;
            session()->put('fix_form_price', $price);
        }

    }


    public function addPostalPrice($price)
    {
        $collectionPrice = session()->get('collection_form_price');
        if(!$collectionPrice){
            $this->totalPrice += (int) $price;
            $this->emit('price', $this->totalPrice);
        }else{
            $this->totalPrice -= (int) $collectionPrice;
            $this->totalPrice += (int) $price;
            session()->forget('collection_form_price');
        }


    }

    public function removePostalPrice($price)
    {
        $this->totalPrice -= (int) $price;
        $this->emit('price', $this->totalPrice);

    }

    public function addCollectionPrice($price)
    {

        $postalPrice = session()->get('postalPrice');
        if(!$postalPrice){
            $this->totalPrice += (int) $price;
            $this->emit('price', $this->totalPrice);
        }else{
            $this->totalPrice -= (int) $postalPrice;
            $this->totalPrice += (int) $price;
            session()->forget('postalPrice');
        }

    }

    public function removeCollectionPrice($price)
    {
        $this->totalPrice -= (int) $price;
        $this->emit('price', $this->totalPrice);

    }
    public function addPrice($price)
    {

        $this->totalPrice += (int) $price;
        session()->put('totalPrice', $this->totalPrice);
    }






    public function SPaddPrice($price)
    {

        $this->totalPrice += (int) $price;


        session()->put('totalPrice', $this->totalPrice);

    }

    public function SPremovePrice($price)
    {
        $this->totalPrice -= (int) $price;
        session()->put('totalPrice', $this->totalPrice);

    }

    public function PCaddPrice($price)
    {

        $this->totalPrice += (int) $price;
        session()->put('totalPrice', $this->totalPrice);

    }

    public function PCremovePrice($price)
    {
        $this->totalPrice -= (int) $price;
        session()->put('totalPrice', $this->totalPrice);

    }

    public function render()
    {
        return view('livewire.guest.components.total-price');
    }
}
