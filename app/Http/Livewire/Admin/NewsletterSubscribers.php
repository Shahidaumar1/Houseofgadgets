<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;

class NewsletterSubscribers extends Component
{
    public $search = '';
    public $start_date = '';
    public $end_date = '';

    public $subject = '';
    public $message = '';
    public $broadcastSuccess = '';

    public function sendBroadcast()
    {
        $this->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $subscribers = NewsletterSubscriber::all();

        foreach ($subscribers as $subscriber) {
            Mail::raw($this->message, function ($mail) use ($subscriber) {
                $mail->to($subscriber->email)->subject($this->subject);
            });
        }

        $this->subject = '';
        $this->message = '';
        $this->broadcastSuccess = 'Emails sent successfully to all subscribers!';
    }

    public function render()
    {
        $emails = NewsletterSubscriber::when($this->search, function ($query) {
                return $query->where('email', 'like', '%' . $this->search . '%');
            })
            ->when($this->start_date, function ($query) {
                return $query->whereDate('created_at', '>=', $this->start_date);
            })
            ->when($this->end_date, function ($query) {
                return $query->whereDate('created_at', '<=', $this->end_date);
            })
            ->latest()
            ->get();

        return view('livewire.admin.emails.index', compact('emails'));
    }
}