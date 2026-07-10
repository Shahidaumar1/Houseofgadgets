<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log; // Import Log

class CustomerInfoMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        // Log the initialization data
        Log::info('CustomerInfoMail initialized with data', ['data' => $data]);

        $this->data = $data;
    }

    public function build()
    {
        Log::info('Building CustomerInfoMail with data', ['data' => $this->data]);

        return $this
            ->from(config('mail.from.address'), config('mail.from.name')) // Default 'from' address
            ->subject('Your Product Information') // Email subject
            ->view('emails.customer-info') // Blade view for the email body
            ->with($this->data); // Pass the data to the view
    }
}
