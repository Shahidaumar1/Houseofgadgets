<?php

namespace App\Http\Livewire\Guest\UserDashboard\WishList;

use Livewire\Component;
use App\Models\WishList;

class Index extends Component
{

    public $user;
    public $wishListItems;

    public function mount()
    {
        $this->user = auth()->user();
        $this->wishListItems = $this->user->wishList;
    }



    public function deleteItem($itemId)
    {
        // Find the wishlist item and delete it
        $item = WishList::find($itemId);

        if ($item) {
            $item->delete();
            $this->wishListItems = auth()->user()->wishList; // Update the wishlist items
        }
    }
    public function render()
    {
        return view('livewire.guest.user-dashboard.wish-list.index')
            ->layout('frontend.layouts.user-app');
    }
}
