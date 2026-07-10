<?php

namespace App\Http\Livewire\Admin\Settings\Components;

use App\Models\PaymentMethodSetting;
use Livewire\Component;

class Stripe extends Component
{
    public $secret = '';
    public $public_key = '';
    public $enabled = false;
    public $dirty = false;

    public function mount()
    {
        $pm = PaymentMethodSetting::where('payment_method_', 'Stripe')->first();

        if ($pm) {
            $settings = json_decode($pm->settings, true) ?: [];

            $this->secret     = $settings['secret']     ?? '';
            $this->public_key = $settings['public_key'] ?? '';
            $this->enabled    = (bool)($settings['enabled'] ?? false);
        }
    }

    public function updated()
    {
        $this->dirty = true;
    }

    public function connect()
    {
        $this->validate([
            'secret'     => 'required',
            'public_key' => 'required',
        ]);

        $payload = [
            'secret'     => $this->secret,
            'public_key' => $this->public_key,
            'enabled'    => (bool)$this->enabled,
        ];

        $pm = PaymentMethodSetting::firstOrNew([
            'payment_method_' => 'Stripe',
        ]);

        $pm->settings = json_encode($payload);
        $pm->save();

        $this->dirty = false;

        session()->flash('message', 'Connected successfully!');
    }

    public function render()
    {
        return view('livewire.admin.settings.components.stripe');
    }
}
