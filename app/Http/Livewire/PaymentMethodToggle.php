<?php
namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\PaymentMethod;

class PaymentMethodToggle extends Component
{
    public $paymentMethods;
    
    public function mount()
    {
        $this->paymentMethods = PaymentMethod::all();
        
    }

    public function togglePaymentMethod($id)
    {
        $paymentMethod = PaymentMethod::find($id);
        $paymentMethod->is_enabled = !$paymentMethod->is_enabled;
        $paymentMethod->save();

        $this->paymentMethods = PaymentMethod::all(); // Refresh the list
    }

    public function render()
    {
        return view('livewire.account.payment-method-toggle');
    }
}
