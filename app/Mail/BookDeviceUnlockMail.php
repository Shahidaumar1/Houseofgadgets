<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookDeviceUnlockMail extends Mailable
{
    use Queueable, SerializesModels;

    public $patient;
    public $buy_detail;
    /**
     * Create a new notification instance.
     */
    public function __construct($patient, $buy_detail)
    {
        $this->patient = $patient;
        $this->buy_detail = $buy_detail;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {

        return new Envelope(
            subject: 'Your ' . $this->buy_detail['device']['name'] . ' ' . $this->buy_detail['modal']['name'] . '  Unlocking with our company…',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        $template = "emails.unlocking.unlock_temp";


        // return dd($this->buy_detail);
        return new Content(
            view: $template,
            with: ['data' => ['patient' => $this->patient, 'buy_detail' => $this->buy_detail]],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
