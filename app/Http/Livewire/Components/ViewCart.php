<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class ViewCart extends Component
{
    public $cartItems;
    public $subtotal;
    public $tax;
    public $orderTotal;

    public function updateQuantity($productId, $quantity)
    {
        // Update the quantity for the specific product in the cart
        $cartItems = session('cart', []);
        foreach ($cartItems as &$item) {
            if ($item['id'] == $productId) {
                if ($item['available_quantity'] >= $quantity && $quantity >= 1)
                    $item['quantity'] = $quantity;
                break;
            }
        }

        // Save the updated cart to the session
        session(['cart' => $cartItems]);


        // Trigger Livewire to re-render the component
        // $this->emit('cartUpdated');
    }

    public function removeFromCart($key)
    {
        // Remove the item from the cart array
        unset($this->cartItems[$key]);

        // Update the session with the modified cart array
        session(['cart' => $this->cartItems]);

        $this->emit('cartCount', count(session('cart', [])));
    }
    public function clearCart()
    {
        // Clear the entire cart in the session
        session()->forget('cart');
    }
    private function calculateSubtotal($cartItems)
    {
        $subtotal = 0;

        foreach ($cartItems as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        return $subtotal;
    }

    private function calculateTax($subtotal)
    {
        // Implement your tax calculation logic here
        // For example, you can apply a fixed tax rate or use a more complex formula
        $taxRate = 0.00; // 0% tax rate
        return $subtotal * $taxRate;
    }
    public function render()
    {
        $this->cartItems = session('cart', []);
        // Calculate Subtotal, Tax, and Order Total
        $this->subtotal = $this->calculateSubtotal($this->cartItems);
        $this->tax = $this->calculateTax($this->subtotal); // Adjust this based on your tax calculation logic
        $this->orderTotal = $this->subtotal + $this->tax;
        return view('livewire.components.view-cart')->layout('frontend.layouts.app');
    }
}
