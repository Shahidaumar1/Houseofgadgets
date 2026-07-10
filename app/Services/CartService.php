<?php
// app/Services/CartService.php

namespace App\Services;

class CartService
{
    public function getCartCount()
    {
        // Retrieve the cart items and return the count
        return count(session('cart', []));
    }
}
