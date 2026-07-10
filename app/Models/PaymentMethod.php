<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = ['name', 'is_enabled'];

    protected $casts = [
        'is_enabled' => 'boolean',
    ];

    /** Scope: paypal/stripe groups like Buy_PayPal, Sell_PayPal, Repair_PayPal */
    public function scopeGateway($q, string $gateway)
    {
        $g = strtolower($gateway);
        if ($g === 'paypal') {
            return $q->where('name', 'like', '%PayPal');
        }
        if ($g === 'stripe') {
            return $q->where('name', 'like', '%Stripe');
        }
        return $q;
    }
}
