<?php

namespace App\Http\Livewire\Admin\Settings\Payments;

use Livewire\Component;
use App\Models\PaymentMethod;

class GatewayToggle extends Component
{
    /** paypal | stripe */
    public string $gateway = 'paypal';

    public int $total = 0;
    public int $enabled = 0;

    public function mount(string $gateway)
    {
        $this->gateway = strtolower($gateway) === 'stripe' ? 'stripe' : 'paypal';
        $this->refreshCounts();
    }

    protected function refreshCounts(): void
    {
        $this->total   = PaymentMethod::gateway($this->gateway)->count();
        $this->enabled = PaymentMethod::gateway($this->gateway)->where('is_enabled', 1)->count();
    }

    public function toggleAll(): void
    {
        $turnOn = $this->enabled < $this->total; // if any off -> turn all on, else turn all off
        PaymentMethod::gateway($this->gateway)->update(['is_enabled' => $turnOn ? 1 : 0]);

        $this->refreshCounts();

        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => ucfirst($this->gateway) . ' ' . ($turnOn ? 'enabled' : 'disabled') . ' for Buy/Sell/Repair.',
        ]);
    }

    public function render()
    {
        $allOn = ($this->total > 0 && $this->enabled === $this->total);

        return view('livewire.admin.settings.payments.gateway-toggle', [
            'allOn' => $allOn,
        ]);
    }
}
