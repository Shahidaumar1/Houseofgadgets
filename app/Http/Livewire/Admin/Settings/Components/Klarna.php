<?php

namespace App\Http\Livewire\Admin\Settings\Components;

use App\Models\PaymentMethodSetting;
use Livewire\Component;

class Klarna extends Component
{
    public $secret = '';
    public $enabled = false;
    public $dirty = false;

    public function mount()
    {
        $pm = PaymentMethodSetting::where('payment_method_', 'Klarna')->first();

        if ($pm) {
            $settings = json_decode($pm->settings, true) ?: [];

            $this->secret  = $settings['secret']  ?? '';
            $this->enabled = (bool)($settings['enabled'] ?? false);
        }
    }

    public function updated()
    {
        $this->dirty = true;
    }

    public function connect()
    {
        $this->validate([
            'secret' => 'required',
        ]);

        $payload = [
            'secret'  => $this->secret,
            'enabled' => (bool)$this->enabled,
        ];

        $pm = PaymentMethodSetting::firstOrNew([
            'payment_method_' => 'Klarna',
        ]);

        $pm->settings = json_encode($payload);
        $pm->save();

        $this->dirty = false;

        session()->flash('message', 'Connected successfully!');
    }

    public function render()
    {
        return view('livewire.admin.settings.components.klarna');
    }
}
