<?php 
// app/Http/Controllers/NewsletterController.php
namespace App\Http\Controllers;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    // Show all email subscribers with filtering
    public function showEmails(Request $request)
    {
        $search = $request->input('search');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $emails = NewsletterSubscriber::when($search, function ($query) use ($search) {
            return $query->where('email', 'like', "%$search%");
        })
        ->when($startDate, function ($query) use ($startDate) {
            return $query->where('created_at', '>=', $startDate);
        })
        ->when($endDate, function ($query) use ($endDate) {
            return $query->where('created_at', '<=', $endDate);
        })
        ->latest()
        ->get();

        return view('livewire.admin.emails.index', compact('emails'));
    }

    // AJAX subscription handler
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $already = NewsletterSubscriber::where('email', $request->email)->exists();

        if ($already) {
            return response()->json(['success' => false, 'message' => 'You are already subscribed!'], 200);
        }

        NewsletterSubscriber::create(['email' => $request->email]);

        return response()->json(['success' => true, 'message' => 'Successfully subscribed! Thank you.'], 200);
    }

    // Broadcast email to all subscribers
    public function sendBroadcastEmail(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $subscribers = NewsletterSubscriber::all();

        foreach ($subscribers as $subscriber) {
            Mail::raw($request->message, function ($message) use ($subscriber, $request) {
                $message->to($subscriber->email)
                        ->subject($request->subject);
            });
        }

        return back()->with('message', 'Emails sent successfully to all subscribers!');
    }
}