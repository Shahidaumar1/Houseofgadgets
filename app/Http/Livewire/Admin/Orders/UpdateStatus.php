<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderStatus;

class UpdateStatus extends Component
{
    public $order;
    public $newStatus;
    public $note;

    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function updateStatus()
    {
        $this->validate([
            'newStatus' => 'required|string',
            'note' => 'nullable|string',
        ]);

        // Update order status
        $this->order->update(['status' => $this->newStatus]);

        // Add a new status entry with the note
        OrderStatus::create([
            'order_id' => $this->order->id,
            'status' => $this->newStatus,
            'note' => $this->note,
        ]);

        // Refresh the order details page
        $this->emit('refreshOrderDetails');

        session()->flash('success', 'Order status updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.orders.update-status');
    }
}
