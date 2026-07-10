<?php
namespace App\Http\Livewire\Guest\UserDashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;
use App\Models\EmailAddress; // Assuming you have a model for storing email addresses

class Index extends Component
{
    public $user;
    public $email;
    public $name;
    public $phone;
    public $message;
    public $selectedOption;
    public $otherOption;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function sendEmail()
    {
        // Validate input fields
        $this->validate([
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'selectedOption' => 'required', // Ensure selected option is required
        ]);

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'selected_option' => $this->selectedOption,
            'other_option' => $this->otherOption,
            'message' => $this->message,
        ]);

        // Compose email content
        $emailContent = "
        Name: $this->name\n
        Email: $this->email\n
        Phone: $this->phone\n
        Selected Option: $this->selectedOption\n";

        // If the selected option is "Other", include the input from the "Other" field
        if ($this->selectedOption == 'Other') {
            $emailContent .= "Other Option: $this->otherOption\n";
        }

        $emailContent .= "Message:\n$this->message";

        // Send email to the original recipient
        Mail::raw($emailContent, function ($message) {
            $message->to($this->email)->subject('Contact Information');
        });

        // Dynamically fetch additional recipients from the database
        $additionalRecipients = EmailAddress::pluck('email')->toArray();

        // Send email to additional recipients
        foreach ($additionalRecipients as $recipient) {
            Mail::raw($emailContent, function ($message) use ($recipient) {
                $message->to($recipient)->subject('Contact Information');
            });
        }

        session()->flash('message', 'Email sent and data stored successfully!');
    }

    public function render()
    {
        return view('livewire.guest.user-dashboard.index')->layout('frontend.layouts.user-app');
    }
}
