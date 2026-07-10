<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeeder extends Seeder
{
    public function run()
    {
        DB::table('payment_methods')->insert([
            // Payment methods for 'buy'
            ['name' => 'Buy PayPal', 'is_enabled' => true],
            ['name' => 'Buy Stripe', 'is_enabled' => true],
            ['name' => 'Buy Klarna', 'is_enabled' => true],
            ['name' => 'Buy Pay at Store', 'is_enabled' => true],

            // Payment methods for 'sell'
            ['name' => 'Sell PayPal', 'is_enabled' => true],
            ['name' => 'Sell Stripe', 'is_enabled' => true],
            ['name' => 'Sell Klarna', 'is_enabled' => true],
            ['name' => 'Sell Pay at Store', 'is_enabled' => true],

            // Payment methods for 'repair'
            ['name' => 'Repair PayPal', 'is_enabled' => true],
            ['name' => 'Repair Stripe', 'is_enabled' => true],
            ['name' => 'Repair Klarna', 'is_enabled' => true],
            ['name' => 'Repair Pay at Store', 'is_enabled' => true],
        ]);
    }
}
