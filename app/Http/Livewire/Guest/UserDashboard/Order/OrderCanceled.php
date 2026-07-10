<?php

namespace App\Http\Livewire\Guest\UserDashboard\Order;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;

class OrderCanceled extends Component
{
    use WithPagination;
    public $orderCount = 5;

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.guest.user-dashboard.order.order-canceled', [
            'orders' => Order::where('user_id', auth()->id())->where('status', 'canceled')->latest()->paginate($this->orderCount),
        ])->layout('frontend.layouts.user-app');
    }
}
