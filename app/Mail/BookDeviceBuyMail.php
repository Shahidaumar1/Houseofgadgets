<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Branch;

class BookDeviceBuyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $patient;
    public $form;
    public $branch;
    public $buy_detail;
    public $type;

    /**
     * Create a new notification instance.
     */
    public function __construct($patient, $form, $buy_detail, $type)
    {
        $this->patient = $patient;
        $this->form = $form;
        $this->buy_detail = $buy_detail;
        $this->type = $type;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your ' . $this->buy_detail['device']['name'] . ' ' . $this->buy_detail['modal']['name'] . ' booking with our company...',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $template = "emails.buy.clinic_repair_lb_temp";

        if (session('form_type') == 'clinic_form') {
            switch ($this->form['name'] ?? '') {
                case 'London Bridge Surgery':
                    $template = 'emails.buy.clinic_repair_lb_temp';
                    break;
                case 'Liverpool Street Clinic':
                    $template = 'emails.buy.clinic_repair_ls_temp';
                    break;
                case 'Canary Wharf Clinic':
                    $template = 'emails.buy.clinic_repair_cw_temp';
                    break;
                default:
                    // Log or handle unexpected clinic names
                    break;
            }
        }

        if (session('form_type') == 'postal_form') {
            $template = 'emails.buy.postal_repair_temp';
        }

        if (session('form_type') == 'fix_form') {
            $template = 'emails.buy.fix_at_my_address_temp';
        }

        if (session('form_type') == 'collection_form') {
            $template = 'emails.buy.collect_my_device_temp';
        }

        if (isset($this->form['name'])) {
            $this->branch = Branch::where('name', $this->form['name'])->first();
        }

        return new Content(
            view: $template,
            with: [
                'data' => [
                    'patient' => $this->patient,
                    'form' => $this->form,
                    'buy_detail' => $this->buy_detail,
                    'selectedBranch' => $this->branch,
                ],
            ]
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
