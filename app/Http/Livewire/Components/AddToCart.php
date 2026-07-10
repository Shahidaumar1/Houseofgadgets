<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class AddToCart extends Component
{
    public $product;
    public $cartCount;
    public $order_type;
    public $cartItems;
    public $wish = false;
    public $wish_add = false;

    protected $listeners = ['productEmitter'];

    public function productEmitter($product)
    {

        $this->product = $product;
        $item = WishList::where('product_id', $this->product['product_id'])->where('modal_id', $this->product['modal_id'])->first();

        if ($item) {
            $this->wish = true;
            $this->wish_add = false;
        } else {
            $this->wish = false;
            $this->wish_add = true;
        }
    }
    public function addToCart()
    {
        // Add logic to add $this->product to the cart
        // You might want to use Laravel Session, a dedicated cart package, etc.
        // Example using session:

        session()->push('cart', $this->product);
        $this->cartCount = count(session('cart', []));

        $this->emit('cartCount', $this->cartCount);

        $this->emit('showM', 'view-product');


        // Optionally, you can emit an event to notify the parent component or other components
        // $this->emit('productAddedToCart');

        // Reset the product variable for the next use
        // $this->product = null;
    }
    public function addToWishList()
    {
        if ($this->wish_add) {
            $this->wish = true;
            $this->wish_add = false;
            $wishlist = new WishList();
            $wishlist->user_id = Auth::id();
            $wishlist->product_id = $this->product['product_id'];
            $wishlist->modal_id = $this->product['modal_id'];
            $wishlist->quantity = $this->product['quantity'];
            $wishlist->price = $this->product['price'];
            $wishlist->service = $this->product['service'];
            $wishlist->image = $this->product['image'];
            $wishlist->url = $this->product['url'];
            $wishlist->name = $this->product['name'];
            $wishlist->memory_size = $this->product['memory_size'];
            $wishlist->color = $this->product['color'];
            $wishlist->grade = $this->product['grade'];
            $wishlist->network_unlocked = $this->product['network_unlocked'];
            $wishlist->save();
        }
    }

    public function clearCart()
    {
        // Clear the entire cart in the session
        session()->forget('cart');
    }
    public function clearCAP()
    {
        $this->clearCart();
        session()->push('cart', $this->product);
        $this->cartCount = count(session('cart', []));

        return redirect()->route('view-cart');
    }
    public function render()
    {
        $this->cartItems = session('cart', []);
        if (!empty($this->cartItems))
            foreach ($this->cartItems as $item) {
                $this->order_type = $item['service'];
                break;
            }
        return view('livewire.components.add-to-cart');
    }
}
