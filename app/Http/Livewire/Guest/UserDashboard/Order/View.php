<?php

namespace App\Http\Livewire\Guest\UserDashboard\Order;

use Livewire\Component;
use App\Models\Order;

class View extends Component
{
    public $order;

    public function mount(Order $order)
    {
        // Fetch the order by ID and store it in the $order property
        $this->order = $order;
    }
    public function render()
    {
        return view('livewire.guest.user-dashboard.order.view')->layout('frontend.layouts.user-app');
    }
}
