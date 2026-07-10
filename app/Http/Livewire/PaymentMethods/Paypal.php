<?php

namespace App\Http\Livewire\PaymentMethods;

use App\Helpers\ServiceType;
use App\Models\PaymentMethodSetting;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Paypal extends Component
{
    public $price = 0;
    public $service;
    public $color;
    public $loading = false;

    public function mount($price = 0, $color = null, $service = null)
    {
        $this->price   = $price;
        $this->color   = $color;
        $this->service = $service;
    }

    protected $listeners = ['price', 'loading'];

    public function price($price)
    {
        $this->price = $price;
    }

    public function loading($loading)
    {
        $this->loading = $loading;
    }

    public function createPayment()
    {
        $this->loading = true;

        if ($this->service == ServiceType::REPAIR) {
            $this->emitUp('BookRepair');
        }

        if ($this->service == ServiceType::BUY) {
            $this->emitUp('BuyDevice');
        }

        $this->chargPaypal();
    }

    protected function getSettings(): ?array
    {
        $pm = PaymentMethodSetting::where('payment_method_', 'Paypal')->first();

        if (! $pm) {
            return null;
        }

        return json_decode($pm->settings, true) ?? null;
    }

    protected function getApiBase(array $settings): string
    {
        $mode = $settings['mode'] ?? 'live';

        return $mode === 'sandbox'
            ? 'https://api-m.sandbox.paypal.com'
            : 'https://api.paypal.com';
    }

    public function chargPaypal()
    {
        try {
            $settings = $this->getSettings();

            if (! $settings) {
                $this->addError('error', 'Paypal is not configured in admin.');
                $this->loading = false;
                return;
            }

            if (! ($settings['enabled'] ?? true)) {
                $this->addError('error', 'Paypal payments are disabled.');
                $this->loading = false;
                return;
            }

            $apiUrl = $this->getApiBase($settings);

            $headers = [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->getAccessToken($settings),
            ];

            $body = [
                "intent" => "sale",
                "payer" => [
                    "payment_method" => "paypal",
                ],
                "transactions" => [
                    [
                        "amount" => [
                            "total"    => number_format($this->price, 2, '.', ''),
                            "currency" => "GBP",
                        ],
                        "description" => "Payment for " . $this->service,
                    ],
                ],
                "redirect_urls" => [
                    "return_url" => route('payment.success'),
                    "cancel_url" => route('home'),
                ],
            ];

            $response = Http::withHeaders($headers)->post("$apiUrl/v1/payments/payment", $body);

            if ($response->successful()) {
                $approvalLink = data_get($response->json(), 'links.1.href');
                return redirect($approvalLink);
            } else {
                $this->addError('error', 'Failed to create payment');
                $this->loading = false;
            }
        } catch (\Throwable $th) {
            $this->loading = false;
            $this->addError('error', $th->getMessage());
        }
    }

    public function confirmPayment($paymentId, $payerId)
    {
        try {
            $settings = $this->getSettings();

            if (! $settings) {
                $this->addError('error', 'Paypal is not configured in admin.');
                $this->loading = false;
                return;
            }

            $apiUrl = $this->getApiBase($settings);

            $headers = [
                'Content-Type'  => 'application/json',
                'Authorization' => 'Bearer ' . $this->getAccessToken($settings),
            ];

            $body = [
                "payer_id" => $payerId,
            ];

            $response = Http::withHeaders($headers)->post("$apiUrl/v1/payments/payment/$paymentId/execute", $body);

            if ($response->successful()) {
                $this->submitOrder();
                $this->emit('emailSent'); // Email sent only after payment success
            } else {
                $this->emit('paymentFailed');
                $this->loading = false;
            }
        } catch (\Throwable $th) {
            $this->loading = false;
            $this->addError('error', $th->getMessage());
        }
    }

    private function submitOrder()
    {
        $this->emit('orderSubmitted');
    }

    private function getAccessToken(array $settings)
    {
        $client_id = $settings['client_id'] ?? null;
        $secret    = $settings['secret'] ?? null;

        if (! $client_id || ! $secret) {
            $this->addError('error', 'Unauthorized keys are not valid');
            $this->loading = false;
            return null;
        }

        $apiUrl = $this->getApiBase($settings);

        $response = Http::asForm()
            ->withBasicAuth($client_id, $secret)
            ->post("$apiUrl/v1/oauth2/token", [
                'grant_type' => 'client_credentials',
            ]);

        return $response['access_token'] ?? null;
    }

    public function render()
    {
        return view('livewire.payment-methods.paypal');
    }
}
