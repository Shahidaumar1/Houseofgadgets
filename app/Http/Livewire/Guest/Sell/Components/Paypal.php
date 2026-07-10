<?php

namespace App\Http\Livewire\Guest\Sell\Components;

use Livewire\Component;
class PaypalDetail {
    public $account_name;
    public $email;
}
class Paypal extends Component
{

    public $paypalDetail;
    public $data;
    public $loading = false;
    protected $rules = [
        'paypalDetail.account_name' =>'required',
        'paypalDetail.email' =>'required',
    ];
    public function mount()
    {
        $paypalDetailObj = new PaypalDetail();
        $this->paypalDetail = get_object_vars($paypalDetailObj);
    }
    protected $listeners = ['product_selling_specs', 'emailSent'];

    public function emailSent()
    {
        $this->loading = false;
    }
    public function product_selling_specs($specs)
    {
        $this->data = $specs;
    }
    public function submit(){

        $this->validate();
        $this->loading = true;
        $this->emit('paypalDetail',$this->paypalDetail);
        $this->clearForm();
    }

    public function clearForm(){
        $this->paypalDetail['account_name'] = null;
        $this->paypalDetail['email'] = null;
    }
    public function render()
    {
        return view('livewire.guest.sell.components.paypal');
    }
}
