<?php

namespace App\Http\Livewire\Admin\RepairQuotations;

use Livewire\Component;
use App\Models\QuotationRequest;
use App\Models\QuotationMessage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\QuotationChatMail;

class Index extends Component
{
    public $quotations;

    // Filters
    public $search = '';
    public $fromDateTime = '';
    public $toDateTime = '';
    public $status = '';
    public $showJunk = false;

    // View Modal
    public $viewingQuotation = null;
    public $showViewModal = false;

    // Chat Modal
    public $showChatModal = false;
    public $chatQuotation = null;
    public $chatMessages = [];
    public $newMessage = '';

    protected $listeners =[
       
     'refreshQuotations'  => 'loadQuotations',
    'openQuotationView'  => 'viewQuotation',
];
    public function mount()
    {
        $this->loadQuotations();
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['search', 'fromDateTime', 'toDateTime', 'status', 'showJunk'])) {
            $this->loadQuotations();
        }
    }

    public function loadQuotations()
    {
        $query = QuotationRequest::query();

        if ($this->showJunk) {
            $query->onlyTrashed();
        }

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%')
                    ->orWhere('device', 'like', '%' . $this->search . '%')
                    ->orWhere('modal', 'like', '%' . $this->search . '%')
                    ->orWhere('repair', 'like', '%' . $this->search . '%');
            });
        }

        if (!empty($this->fromDateTime) && !empty($this->toDateTime)) {
            try {
                $from = Carbon::parse($this->fromDateTime)->startOfMinute();
                $to   = Carbon::parse($this->toDateTime)->endOfMinute();
                $query->whereBetween('created_at', [$from, $to]);
            } catch (\Exception $e) {
                Log::error('Quotation filter datetime parse error: ' . $e->getMessage());
            }
        } elseif (!empty($this->fromDateTime)) {
            try {
                $from = Carbon::parse($this->fromDateTime)->startOfMinute();
                $query->where('created_at', '>=', $from);
            } catch (\Exception $e) {
                Log::error('Quotation fromDateTime parse error: ' . $e->getMessage());
            }
        } elseif (!empty($this->toDateTime)) {
            try {
                $to = Carbon::parse($this->toDateTime)->endOfMinute();
                $query->where('created_at', '<=', $to);
            } catch (\Exception $e) {
                Log::error('Quotation toDateTime parse error: ' . $e->getMessage());
            }
        }

        if (!empty($this->status)) {
            $query->where('status', $this->status);
        }

        $this->quotations = $query->latest('created_at')->get();
    }

    // View Modal
    public function viewQuotation($id)
    {
        $this->viewingQuotation = QuotationRequest::withTrashed()->find($id);
        $this->showViewModal = true;
    }

    public function closeViewModal()
    {
        $this->showViewModal = false;
        $this->viewingQuotation = null;
    }

    // Chat Modal
    public function openChat($id)
    {
        $this->chatQuotation = QuotationRequest::withTrashed()
            ->with('messages')
            ->find($id);

        if (!$this->chatQuotation) {
            session()->flash('message', 'Quotation not found.');
            return;
        }

        $this->chatMessages = $this->chatQuotation->messages->toArray();
        $this->newMessage = '';
        $this->showChatModal = true;

        // Mark customer messages as read by admin
        QuotationMessage::where('quotation_id', $id)
            ->where('sender', 'customer')
            ->where('is_read', false)
            ->update(['is_read' => true]);

        $this->dispatchBrowserEvent('scrollChatToBottom');
    }

    public function closeChatModal()
    {
        $this->showChatModal = false;
        $this->chatQuotation = null;
        $this->chatMessages = [];
        $this->newMessage = '';
    }

    public function sendReply()
    {
        $this->validate([
            'newMessage' => 'required|string|max:2000',
        ]);

        if (!$this->chatQuotation) {
            session()->flash('message', 'No quotation selected.');
            return;
        }

        $messageText = trim($this->newMessage);

        if ($messageText === '') {
            session()->flash('message', 'Reply message cannot be empty.');
            return;
        }

        $message = QuotationMessage::create([
            'quotation_id' => $this->chatQuotation->id,
            'sender'       => 'admin',
            'message'      => $messageText,
            'is_read'      => false,
        ]);

        // Send email to customer
        if (!empty($this->chatQuotation->email)) {
            try {
                Mail::to($this->chatQuotation->email)
                    ->send(new QuotationChatMail($this->chatQuotation, $message, 'customer'));
            } catch (\Exception $e) {
                Log::error('Customer quotation reply email failed: ' . $e->getMessage());
            }
        }

        $this->newMessage = '';
        $this->openChat($this->chatQuotation->id);

        session()->flash('message', 'Reply sent successfully.');
    }

    /**
     * Optional helper for future use if you also want admin-side notification logic here.
     */
    protected function getAdminNotificationEmail(): ?string
    {
        $adminEmail = config('mail.admin_notification_email');

        if (!empty($adminEmail)) {
            return $adminEmail;
        }

        try {
            if (class_exists(\App\Models\SiteSetting::class)) {
                $settings = \App\Models\SiteSetting::first();
                if (!empty($settings?->email)) {
                    return $settings->email;
                }
            }
        } catch (\Exception $e) {
            Log::warning('Unable to get admin email from SiteSetting: ' . $e->getMessage());
        }

        try {
            if (class_exists(\App\Models\Branch::class)) {
                $branch = \App\Models\Branch::orderBy('created_at', 'asc')->first();
                if (!empty($branch?->email)) {
                    return $branch->email;
                }
            }
        } catch (\Exception $e) {
            Log::warning('Unable to get admin email from Branch: ' . $e->getMessage());
        }

        return config('mail.from.address');
    }

    // Status / CRUD
    public function updateStatus($id, $status)
    {
        $quotation = QuotationRequest::find($id);

        if ($quotation) {
            $quotation->update(['status' => $status]);
            session()->flash('message', 'Quotation status updated successfully!');
        }

        $this->loadQuotations();
    }

    public function deleteQuotation($id)
    {
        QuotationRequest::find($id)?->delete();
        session()->flash('message', 'Quotation moved to junk!');
        $this->loadQuotations();
    }

    public function restoreQuotation($id)
    {
        QuotationRequest::withTrashed()->find($id)?->restore();
        session()->flash('message', 'Quotation restored successfully!');
        $this->loadQuotations();
    }

    public function forceDeleteQuotation($id)
    {
        QuotationRequest::withTrashed()->find($id)?->forceDelete();
        session()->flash('message', 'Quotation permanently deleted!');
        $this->loadQuotations();
    }

    public function showAllQuotations()
    {
        $this->showJunk = false;
        $this->loadQuotations();
    }

    public function showJunkQuotations()
    {
        $this->showJunk = true;
        $this->loadQuotations();
    }

    public function render()
    {
        return view('livewire.admin.repair-quotations.index')->layout('layouts.admin');
    }
}