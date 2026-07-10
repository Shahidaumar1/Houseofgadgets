<?php

namespace App\Http\Livewire\Admin\Settings\Payments;

use Livewire\Component;
use App\Models\PaymentMethod;

class PaymentToggles extends Component
{
    /** @var \Illuminate\Support\Collection */
    public $methods;

    protected $listeners = ['refreshPaymentToggles' => '$refresh'];

    public function mount()
    {
        // Load all methods once
        $this->methods = PaymentMethod::query()
            ->orderBy('name')
            ->get()
            ->map(function ($m) {
                // Cast to bool for UI switches
                $m->is_enabled = (bool) $m->is_enabled;
                return $m;
            });
    }

    public function toggle($id)
    {
        $m = PaymentMethod::find($id);
        if (!$m) return;

        $m->is_enabled = !$m->is_enabled;
        $m->save();

        // Update local copy so UI reflects immediately
        $this->methods = $this->methods->map(function ($row) use ($m) {
            if ((int)$row->id === (int)$m->id) {
                $row->is_enabled = (bool)$m->is_enabled;
            }
            return $row;
        });

        $this->dispatchBrowserEvent('notify', [
            'type' => 'success',
            'message' => $m->name . ' is now ' . ($m->is_enabled ? 'ON' : 'OFF'),
        ]);
    }

    public function render()
    {
        // Group by prefix so UI mnemonics bante rahein: Buy_, Sell_, Repair_
        $grouped = $this->methods->groupBy(function ($m) {
            if (str_starts_with($m->name, 'Buy_'))    return 'Buy';
            if (str_starts_with($m->name, 'Sell_'))   return 'Sell';
            if (str_starts_with($m->name, 'Repair_')) return 'Repair';
            return 'Other';
        });

        return view('livewire.admin.settings.payments.payment-toggles', [
            'grouped' => $grouped,
        ]);
    }
}
