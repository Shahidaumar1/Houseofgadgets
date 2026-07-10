<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Branch;

class BookDeviceSellMail extends Mailable
{
    use Queueable, SerializesModels;

    public $patient;
    public $form;
    public $branch;
    public $sell_detail;
    public $type;

    /**
     * Create a new notification instance.
     */
    public function __construct($patient, $form, $sell_detail, $type)
    {
        $this->patient = $patient;
        $this->form = $form;
        $this->sell_detail = $sell_detail;
        $this->type = $type;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Selling Mobile booking with our company created…',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $template = "emails.sell.clinic_repair_lb_temp";
        
        if (session('form_type') == 'clinic_form') {
            switch (session('form_type') == 'clinic_form') {
                case 'London Bridge Surgery':
                    $template = 'emails.sell.clinic_repair_lb_temp';
                    break;
                case 'Liverpool Street Clinic':
                    $template = 'emails.sell.clinic_repair_ls_temp';
                    break;
                case 'Canary Wharf Clinic':
                    $template = 'emails.sell.clinic_repair_cw_temp';
                    break;
                default:
                    // default template
                    break;
            }
        } elseif (session('form_type') == 'postal_form') {
            $template = 'emails.sell.postal_repair_temp';
        } elseif (session('form_type') == 'fix_form') {
            $template = 'emails.sell.fix_at_my_address_temp';
        } elseif (session('form_type') == 'collection_form') {
            $template = 'emails.sell.collect_my_device_temp';
        }

        // Check if $this->form['name'] is set and session('form_type') is not null
        if (isset($this->form['name']) && session('form_type') !== null) {
            $this->branch = Branch::where('name', $this->form['name'])->first();
        } else {
            $this->branch = null;
        }

        return new Content(
            view: $template,
            with: [
                'data' => [
                    'patient' => $this->patient,
                    'form' => $this->form,
                    'sell_detail' => $this->sell_detail,
                    'selectedBranch' => $this->branch,
                ],
            ]
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
