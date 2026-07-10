
<div>
    <h1 class="text-center">Payment Methods</h1>
    <div class="payment-methods-container">
        @foreach($paymentMethods as $paymentMethod)
            <div class="payment-method">
                <div class="payment-method-name">{{ str_replace('_', ' ', $paymentMethod->name) }}</div>
                <div class="payment-method-status">
                    <label class="switch">
                        <input type="checkbox" wire:click="togglePaymentMethod({{ $paymentMethod->id }})" {{ $paymentMethod->is_enabled ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
        @endforeach
    </div>

    <style>
        .payment-methods-container {
            display: flex;
            flex-wrap: wrap; /* Allows wrapping to the next row */
            gap: 20px; /* Space between items */
        }

        .payment-method {
            flex: 1 1 calc(33.33% - 20px); /* 3 columns */
            background: #f9f9f9; /* Background color for each payment method */
            padding: 10px;
            border: 1px solid #ddd; /* Light border */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            display: flex;
            justify-content: space-between; /* Align items in each payment method */
            align-items: center; /* Center items vertically */
        }

        .payment-method-name {
            font-weight: bold; /* Bold text for payment method name */
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #29C01E;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }
    </style>
</div>
