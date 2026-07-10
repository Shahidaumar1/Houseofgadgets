<?php

namespace App\Http\Livewire\Admin\Settings\Components;

use App\Models\PaymentMethodSetting;
use Livewire\Component;

class Paypal extends Component
{
    public $client_id = '';
    public $secret = '';
    public $mode = 'live';      // live / sandbox
    public $enabled = false;
    public $dirty = false;

    public function mount()
    {
        $pm = PaymentMethodSetting::where('payment_method_', 'Paypal')->first();

        if ($pm) {
            $settings = json_decode($pm->settings, true) ?: [];

            $this->client_id = $settings['client_id'] ?? '';
            $this->secret    = $settings['secret']    ?? '';
            $this->mode      = $settings['mode']      ?? 'live';
            $this->enabled   = (bool)($settings['enabled'] ?? false);
        }
    }

    public function updated()
    {
        $this->dirty = true;
    }

    public function connect()
    {
        $this->validate([
            'client_id' => 'required',
            'secret'    => 'required',
        ]);

        $payload = [
            'client_id' => $this->client_id,
            'secret'    => $this->secret,
            'mode'      => $this->mode ?? 'live',
            'enabled'   => (bool)$this->enabled,
        ];

        $pm = PaymentMethodSetting::firstOrNew([
            'payment_method_' => 'Paypal',
        ]);

        $pm->settings = json_encode($payload);
        $pm->save();

        $this->dirty = false;

        session()->flash('message', 'Connected successfully!');
    }

    public function render()
    {
        return view('livewire.admin.settings.components.paypal');
    }
}
