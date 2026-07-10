<?php

namespace App\Http\Livewire\PaymentMethods;

use App\Helpers\ServiceType;
use App\Models\PaymentMethodSetting;
use Livewire\Component;
use Stripe\Charge;

class Stripe extends Component
{
    public $price = 0;
    public $success = false;
    public $service;
    public $color;
    public $tokenId;
    public $loading = false;
    public $public_key;

    public function mount($price = null, $color = null, $service = null)
    {
        $this->price   = $price;
        $this->color   = $color;
        $this->service = $service;

        $pm = PaymentMethodSetting::where('payment_method_', 'Stripe')->first();

        if ($pm) {
            $settings = json_decode($pm->settings, true) ?? [];
            // admin side se "public_key" store karenge
            $this->public_key = $settings['public_key'] ?? ($settings['public'] ?? '');
        }
    }

    protected $listeners = ['tokenCreated' => 'chargeToken', 'nextPriceEmitter', 'price', 'loading'];

    public function nextPriceEmitter($price)
    {
        $this->price = $price;
    }

    public function price($price)
    {
        $this->price = $price;
    }

    public function loading($loading)
    {
        $this->loading = $loading;
    }

    public function chargeToken($tokenId)
    {
        $this->loading = true;

        if ($this->service == ServiceType::REPAIR) {
            $this->emitUp('BookRepair');
        }

        if ($this->service == ServiceType::BUY) {
            $this->emitUp('BuyDevice');
        }

        $this->tokenId = $tokenId;
        $this->chargeStripe();
    }

    public function chargeStripe()
    {
        $pm = PaymentMethodSetting::where('payment_method_', 'Stripe')->first();

        if (! $pm) {
            $this->loading = false;
            $this->addError('error', 'Stripe settings not found in admin.');
            return;
        }

        $settings = json_decode($pm->settings, true) ?? [];
        $enabled  = (bool) ($settings['enabled'] ?? true);
        $secret   = $settings['secret'] ?? null;

        if (! $enabled) {
            $this->loading = false;
            $this->addError('error', 'Stripe payments are disabled.');
            return;
        }

        if (! $secret) {
            $this->loading = false;
            $this->addError('error', 'Stripe secret key not configured.');
            return;
        }

        \Stripe\Stripe::setApiKey($secret);

        try {
            $charge = Charge::create([
                'source'      => $this->tokenId,
                'amount'      => $this->price * 100,
                'currency'    => 'gbp',
                'description' => "Payment for " . $this->service,
            ]);

            if ($charge->status === 'succeeded') {
                $this->success = true;
                $this->emit('emailSent'); // Email sent only after payment success
                $this->emit('clearSession');
            } else {
                $this->loading = false;
                $this->addError('error', 'Payment failed.');
            }
        } catch (\Exception $e) {
            $this->loading = false;
            $this->addError('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.payment-methods.stripe');
    }
}
