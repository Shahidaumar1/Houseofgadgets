<?php

namespace App\Http\Livewire\Admin;

use App\Models\CustomerInquiry;
use Livewire\Component;
use Carbon\Carbon;

class CustomerInquiries extends Component
{
    public $inquiries;
    
    // Filters
    public $search = '';
    public $fromDateTime = '';
    public $toDateTime = '';
    public $status = '';
    public $showJunk = false;

    protected $listeners = ['refreshInquiries' => 'loadInquiries'];

    public function mount()
    {
        $this->loadInquiries();
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['search', 'fromDateTime', 'toDateTime', 'status', 'showJunk'])) {
            $this->loadInquiries();
        }
    }

    public function loadInquiries()
    {
        $query = CustomerInquiry::query();

        // Junk inquiries
        if ($this->showJunk) {
            $query->onlyTrashed();
        }

        // Search by name/email/phone/brand/model/product
        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('first_name', 'like', '%'.$this->search.'%')
                  ->orWhere('last_name', 'like', '%'.$this->search.'%')
                  ->orWhere('email', 'like', '%'.$this->search.'%')
                  ->orWhere('phone', 'like', '%'.$this->search.'%')
                  ->orWhere('brand', 'like', '%'.$this->search.'%')
                  ->orWhere('model', 'like', '%'.$this->search.'%')
                  ->orWhere('product_name', 'like', '%'.$this->search.'%');
            });
        }

        // DateTime filter
        if (!empty($this->fromDateTime) && !empty($this->toDateTime)) {
            try {
                $from = Carbon::parse($this->fromDateTime)->startOfMinute();
                $to = Carbon::parse($this->toDateTime)->endOfMinute();
                $query->whereBetween('created_at', [$from, $to]);
            } catch (\Exception $e) {
                \Log::error('DateTime parse error: ' . $e->getMessage());
            }
        } elseif (!empty($this->fromDateTime)) {
            try {
                $from = Carbon::parse($this->fromDateTime)->startOfMinute();
                $query->where('created_at', '>=', $from);
            } catch (\Exception $e) {
                \Log::error('FromDateTime parse error: ' . $e->getMessage());
            }
        } elseif (!empty($this->toDateTime)) {
            try {
                $to = Carbon::parse($this->toDateTime)->endOfMinute();
                $query->where('created_at', '<=', $to);
            } catch (\Exception $e) {
                \Log::error('ToDateTime parse error: ' . $e->getMessage());
            }
        }

        // Status filter
        if (!empty($this->status)) {
            $query->where('status', $this->status);
        }

        $this->inquiries = $query->latest('created_at')->get();
    }

    public function updateStatus($id, $status)
    {
        $inquiry = CustomerInquiry::find($id);
        if ($inquiry) {
            $inquiry->update(['status' => $status]);
            session()->flash('message', 'Inquiry status updated successfully!');
        }
        $this->loadInquiries();
    }

    public function viewInquiry($id)
    {
        $this->emit('viewInquiry', $id);
    }

    public function deleteInquiry($id)
    {
        $inquiry = CustomerInquiry::find($id);
        if ($inquiry) {
            $inquiry->delete();
            session()->flash('message', 'Inquiry moved to junk!');
        }
        $this->loadInquiries();
    }

    public function restoreInquiry($id)
    {
        $inquiry = CustomerInquiry::withTrashed()->find($id);
        if ($inquiry) {
            $inquiry->restore();
            session()->flash('message', 'Inquiry restored successfully!');
        }
        $this->loadInquiries();
    }

    public function forceDeleteInquiry($id)
    {
        $inquiry = CustomerInquiry::withTrashed()->find($id);
        if ($inquiry) {
            $inquiry->forceDelete();
            session()->flash('message', 'Inquiry permanently deleted!');
        }
        $this->loadInquiries();
    }

    public function showAllInquiries()
    {
        $this->showJunk = false;
        $this->loadInquiries();
    }

    public function showJunkInquiries()
    {
        $this->showJunk = true;
        $this->loadInquiries();
    }

    public function render()
    {
        return view('livewire.admin.customer-inquiries')->layout('layouts.admin');
    }
}