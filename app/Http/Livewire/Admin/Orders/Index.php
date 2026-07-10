<?php 

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;
use App\Models\Order;
use Carbon\Carbon;

class Index extends Component
{
    public $orders;
    
    // Filters
    public $search = '';
    public $fromDate = '';
    public $toDate = '';
    public $status = '';
    public $payment_method = '';
    public $order_type = '';
    public $showJunk = false;

    protected $listeners = ['refreshOrders' => 'loadOrders'];

    public function mount()
    {
        $this->loadOrders();
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['search', 'fromDate', 'toDate', 'status', 'payment_method', 'order_type', 'showJunk'])) {
            $this->loadOrders();
        }
    }

    public function loadOrders()
    {
        $query = Order::query();

        if ($this->showJunk) {
            $query->onlyTrashed();
        }

        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('customer_name', 'like', '%'.$this->search.'%')
                  ->orWhere('customer_email', 'like', '%'.$this->search.'%');
            });
        }

        // Date filter
        if (!empty($this->fromDate) && !empty($this->toDate)) {
            try {
                $from = Carbon::parse($this->fromDate)->startOfDay();
                $to = Carbon::parse($this->toDate)->endOfDay();
                $query->whereBetween('created_at', [$from, $to]);
            } catch (\Exception $e) {
                \Log::error('Date parse error: ' . $e->getMessage());
            }
        } elseif (!empty($this->fromDate)) {
            try {
                $from = Carbon::parse($this->fromDate)->startOfDay();
                $query->where('created_at', '>=', $from);
            } catch (\Exception $e) {
                \Log::error('FromDate parse error: ' . $e->getMessage());
            }
        } elseif (!empty($this->toDate)) {
            try {
                $to = Carbon::parse($this->toDate)->endOfDay();
                $query->where('created_at', '<=', $to);
            } catch (\Exception $e) {
                \Log::error('ToDate parse error: ' . $e->getMessage());
            }
        }

        if (!empty($this->status)) {
            $query->where('status', $this->status);
        }

        if (!empty($this->payment_method)) {
            $query->where('payment_method', $this->payment_method);
        }

        if (!empty($this->order_type)) {
            $query->where('order_type', $this->order_type);
        }

        $this->orders = $query->latest('created_at')->get();
    }

    public function updateStatus($id, $status)
    {
        $order = Order::find($id);
        if ($order) {
            $order->update(['status' => $status]);
            session()->flash('message', 'Order status updated successfully!');
        }
        $this->loadOrders();
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        if ($order) {
            $order->delete();
            session()->flash('message', 'Order moved to junk!');
        }
        $this->loadOrders();
    }

    public function restoreOrder($id)
    {
        $order = Order::withTrashed()->find($id);
        if ($order) {
            $order->restore();
            session()->flash('message', 'Order restored successfully!');
        }
        $this->loadOrders();
    }

    public function forceDeleteOrder($id)
    {
        $order = Order::withTrashed()->find($id);
        if ($order) {
            $order->forceDelete();
            session()->flash('message', 'Order permanently deleted!');
        }
        $this->loadOrders();
    }

    public function showAllOrders()
    {
        $this->showJunk = false;
        $this->loadOrders();
    }

    public function showJunkOrders()
    {
        $this->showJunk = true;
        $this->loadOrders();
    }

    public function render()
    {
        return view('livewire.admin.orders.index')->layout('layouts.admin');
    }
}