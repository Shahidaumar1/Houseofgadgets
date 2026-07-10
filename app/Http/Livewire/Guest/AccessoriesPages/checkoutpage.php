<?php

// app/Http/Livewire/Guest/AccessoriesPages/CheckoutPage.php

namespace App\Http\Livewire\Guest\AccessoriesPages;

use Livewire\Component;

class CheckoutPage extends Component
{
    public function render()
    {
        return view('livewire.guest.accessoriespages.checkoutpage')->layout('frontend.layouts.app');
    }
}
