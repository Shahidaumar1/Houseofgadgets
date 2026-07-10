<?php

namespace App\Http\Livewire\PaymentMethods;

use App\Helpers\ServiceType;
use App\Models\PaymentMethodSetting;
use Livewire\Component;

class Klarna extends Component
{
    public $price = 0;
    public $success = false;
    public $service;
    public $color;
    public $loading = false;

    public function mount($price = null, $color = null, $service = null)
    {
        $this->price   = $price;
        $this->color   = $color;
        $this->service = $service;
    }

    protected $listeners = ['nextPriceEmitter', 'price', 'loading'];

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

    // Button is method ko call kar raha hai
    public function createPayment()
    {
        $this->sendEmailBeforePay();
    }

    public function sendEmailBeforePay()
    {
        if ($this->service == ServiceType::REPAIR) {
            $this->loading = true;
            $this->emitUp('BookRepair');
        }

        if ($this->service == ServiceType::BUY) {
            $this->loading = true;
            $this->emitUp('BuyDevice');
        }

        $this->payWithKlarna();
    }

    public function payWithKlarna()
    {
        $pm = PaymentMethodSetting::where('payment_method_', 'Klarna')->first();

        if (! $pm) {
            $this->loading = false;
            $this->addError('error', 'Klarna settings not found in admin.');
            return;
        }

        $settings = json_decode($pm->settings, true) ?? [];
        $enabled  = (bool) ($settings['enabled'] ?? true); // default true for old data
        $secret   = $settings['secret'] ?? null;

        if (! $enabled) {
            $this->loading = false;
            $this->addError('error', 'Klarna payments are disabled.');
            return;
        }

        if (! $secret) {
            $this->loading = false;
            $this->addError('error', 'Klarna secret key not configured.');
            return;
        }

        \Stripe\Stripe::setApiKey($secret);

        try {
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['klarna'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'gbp',
                        'product_data' => [
                            'name' => $this->service . ' Price',
                        ],
                        'unit_amount' => $this->price * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode'        => 'payment',
                'success_url' => env('APP_URL') . '/klarna-success?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url'  => env('APP_URL') . '/',
            ]);

            return redirect($session->url);
        } catch (\Exception $e) {
            $this->loading = false;
            $this->addError('error', $e->getMessage());
        }
    }

    public function handleKlarnaSuccess($sessionId)
    {
        $pm = PaymentMethodSetting::where('payment_method_', 'Klarna')->first();

        if (! $pm) {
            $this->addError('error', 'Klarna settings not found in admin.');
            return;
        }

        $settings = json_decode($pm->settings, true) ?? [];
        $secret   = $settings['secret'] ?? null;

        if (! $secret) {
            $this->addError('error', 'Klarna secret key not configured.');
            return;
        }

        \Stripe\Stripe::setApiKey($secret);

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);

            if ($session->payment_status === 'paid') {
                $this->success = true;
                // Payment success ke baad hi email emit ho rahi hai
                $this->emit('emailSent');
            } else {
                $this->addError('error', 'Payment not completed.');
            }
        } catch (\Exception $e) {
            $this->addError('error', $e->getMessage());
        }

        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.payment-methods.klarna');
    }
}
