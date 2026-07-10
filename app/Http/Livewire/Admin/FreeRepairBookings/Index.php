<?php

namespace App\Http\Livewire\Admin\FreeRepairBookings;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\FreeRepairBookingRequest;
use App\Models\FreeRepairBookingMessage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\FreeRepairBookingChatMail;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $fromDate = '';
    public $toDate = '';
    public $status = '';
    public $showJunk = false;

    public $showViewModal = false;
    public $viewingItem = null;

    public $showChatModal = false;
    public $chatBooking = null;
    public $chatMessages = [];
    public $newMessage = '';

    protected $listeners = ['refreshFreeRepairBookings' => '$refresh'];

    public function updatingSearch() { $this->resetPage(); }
    public function updatingFromDate() { $this->resetPage(); }
    public function updatingToDate() { $this->resetPage(); }
    public function updatingStatus() { $this->resetPage(); }
    public function updatingShowJunk() { $this->resetPage(); }

    public function showAllItems()
    {
        $this->showJunk = false;
        $this->resetPage();
    }

    public function showJunkItems()
    {
        $this->showJunk = true;
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->search = '';
        $this->fromDate = '';
        $this->toDate = '';
        $this->status = '';
        $this->resetPage();
    }

    public function viewItem($id)
    {
        $this->viewingItem = FreeRepairBookingRequest::withTrashed()->find($id);
        $this->showViewModal = true;
    }

    public function closeViewModal()
    {
        $this->showViewModal = false;
        $this->viewingItem = null;
    }

    public function openChat($id)
    {
        $this->chatBooking = FreeRepairBookingRequest::withTrashed()
            ->with('messages')
            ->find($id);

        if (!$this->chatBooking) {
            session()->flash('message', 'Booking not found.');
            return;
        }

        $this->chatMessages = $this->chatBooking->messages->toArray();
        $this->newMessage = '';
        $this->showChatModal = true;

        FreeRepairBookingMessage::where('booking_id', $id)
            ->where('sender', 'customer')
            ->where('is_read', false)
            ->update(['is_read' => true]);

        $this->dispatchBrowserEvent('scrollFreeRepairChatToBottom');
    }

    public function closeChatModal()
    {
        $this->showChatModal = false;
        $this->chatBooking = null;
        $this->chatMessages = [];
        $this->newMessage = '';
    }

    public function sendReply()
    {
        $this->validate([
            'newMessage' => 'required|string|max:2000',
        ]);

        if (!$this->chatBooking) {
            session()->flash('message', 'No booking selected.');
            return;
        }

        $messageText = trim($this->newMessage);

        if ($messageText === '') {
            session()->flash('message', 'Reply message cannot be empty.');
            return;
        }

        $message = FreeRepairBookingMessage::create([
            'booking_id' => $this->chatBooking->id,
            'sender'     => 'admin',
            'message'    => $messageText,
            'is_read'    => false,
        ]);

        if (!empty($this->chatBooking->email)) {
            try {
                Mail::to($this->chatBooking->email)
                    ->send(new FreeRepairBookingChatMail($this->chatBooking, $message, 'customer'));
            } catch (\Exception $e) {
                Log::error('Free repair customer reply email failed: ' . $e->getMessage());
            }
        }

        $this->newMessage = '';
        $this->openChat($this->chatBooking->id);

        session()->flash('message', 'Reply sent successfully.');
    }

    public function updateStatus($id, $status)
    {
        $row = FreeRepairBookingRequest::withTrashed()->find($id);
        if ($row) {
            $row->update(['status' => $status]);
            session()->flash('message', 'Status updated successfully!');
        }
    }

    public function junk($id)
    {
        $row = FreeRepairBookingRequest::find($id);
        if ($row) {
            $row->delete();
            session()->flash('message', 'Moved to junk!');
        }
        $this->resetPage();
    }

    public function restore($id)
    {
        $row = FreeRepairBookingRequest::withTrashed()->find($id);
        if ($row) {
            $row->restore();
            session()->flash('message', 'Restored successfully!');
        }
        $this->resetPage();
    }

    public function deleteForever($id)
    {
        $row = FreeRepairBookingRequest::withTrashed()->find($id);
        if ($row) {
            $row->forceDelete();
            session()->flash('message', 'Deleted forever!');
        }
        $this->resetPage();
    }

    // ============================================================
    // NEW METHOD: Today's bookings for notification bell
    // ============================================================
    public function getTodayBookings()
    {
        $bookings = FreeRepairBookingRequest::whereDate('created_at', today())
            ->latest('created_at')
            ->get(['id', 'name', 'device', 'modal', 'repair', 'created_at']);

        return response()->json([
            'total'    => $bookings->count(),
            'bookings' => $bookings,
        ]);
    }

    public function render()
    {
        $query = FreeRepairBookingRequest::query();

        if ($this->showJunk) {
            $query->onlyTrashed();
        }

        if (!empty($this->search)) {
            $s = $this->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', '%'.$s.'%')
                  ->orWhere('email', 'like', '%'.$s.'%')
                  ->orWhere('phone', 'like', '%'.$s.'%')
                  ->orWhere('device', 'like', '%'.$s.'%')
                  ->orWhere('modal', 'like', '%'.$s.'%')
                  ->orWhere('repair', 'like', '%'.$s.'%');
            });
        }

        if (!empty($this->fromDate) && !empty($this->toDate)) {
            try {
                $from = Carbon::parse($this->fromDate)->startOfDay();
                $to   = Carbon::parse($this->toDate)->endOfDay();
                $query->whereBetween('created_at', [$from, $to]);
            } catch (\Exception $e) {
                \Log::error('FreeRepair date parse error: ' . $e->getMessage());
            }
        } elseif (!empty($this->fromDate)) {
            try {
                $from = Carbon::parse($this->fromDate)->startOfDay();
                $query->where('created_at', '>=', $from);
            } catch (\Exception $e) {
                \Log::error('FreeRepair fromDate parse error: ' . $e->getMessage());
            }
        } elseif (!empty($this->toDate)) {
            try {
                $to = Carbon::parse($this->toDate)->endOfDay();
                $query->where('created_at', '<=', $to);
            } catch (\Exception $e) {
                \Log::error('FreeRepair toDate parse error: ' . $e->getMessage());
            }
        }

        if (!empty($this->status)) {
            $query->where('status', $this->status);
        }

        $items = $query->latest('created_at')->paginate(15);

        return view('livewire.admin.free-repair-bookings.index', compact('items'))
            ->layout('layouts.admin');
    }
}