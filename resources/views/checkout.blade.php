@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Checkout</h2>
        <form method="POST" action="{{ route('checkout') }}">
            @csrf

            <!-- Shipping Address -->
            <div class="form-group">
                <label for="address">Shipping Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>

            <!-- Payment Method -->
            <div class="form-group">
                <label for="payment_method">Payment Method</label>
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Complete Purchase</button>
        </form>
    </div>
@endsection
