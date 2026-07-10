<?php

namespace App\Http\Livewire\Guest\UserDashboard\Order;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;

class Index extends Component
{
    use WithPagination;
    public $orderCount = 5;

    protected $paginationTheme = 'bootstrap';

    // public $orders;

    public function mount()
    {
        // $this->loadOrders();
    }

    public function loadOrders()
    {
        // $this->orders = Order::where('user_id', auth()->id())->latest()->limit($this->orderCount)->get();
        // $this->orders = Order::where('user_id', auth()->id())->latest()->paginate($this->orderCount);
    }

    public function render()
    {
        return view('livewire.guest.user-dashboard.order.index', [
            'orders' => Order::where('user_id', auth()->id())->latest()->paginate($this->orderCount),
        ])->layout('frontend.layouts.user-app');
    }
}
