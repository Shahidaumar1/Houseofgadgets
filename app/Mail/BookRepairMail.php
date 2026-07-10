<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Branch;
use Illuminate\Support\Facades\Log;

class BookRepairMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $selectedBranch;
    public $patient;
    public $form;
    public $branch;

    // NOTE:
    // $repair_detail kabhi string hota (clinic_form / postal_form etc)
    // hum view ke liye always array banayenge
    public $repair_detail;
    public $type;

    public function __construct($patient, $form, $repair_detail, $type)
    {
        $this->patient = $patient;
        $this->form = $form;
        $this->repair_detail = $repair_detail;
        $this->type = $type;
    }

    /**
     * ✅ Always return a safe array for templates
     */
    protected function normalizedRepairDetail(): array
    {
        // if already array, ok
        if (is_array($this->repair_detail)) {
            return $this->repair_detail;
        }

        // if string (postal_form etc), details are usually in $this->type
        if (is_array($this->type)) {
            return $this->type;
        }

        // fallback empty
        return [];
    }

    public function envelope(): Envelope
    {
        $rd = $this->normalizedRepairDetail();

        $device = $rd['device'] ?? 'device';
        $model  = $rd['model'] ?? 'model';

        return new Envelope(
            subject: "Your {$device} {$model} repair booking with us"
        );
    }

    public function content(): Content
    {
        // ✅ session key mismatch fix
        $formType = session('clinic-name') ?? session('clinic_name') ?? $this->repair_detail;

        Log::info('BookRepairMail form type:', [
            'session_form_type' => $formType,
            'raw_repair_detail' => $this->repair_detail,
        ]);

        // Default template
        $template = 'emails.clinic_repair_lb_temp';

        switch ($formType) {
            case 'clinic_form':
                $branchName = is_array($this->form) ? ($this->form['name'] ?? null) : null;

                if ($branchName) {
                    switch ($branchName) {
                        case 'London Bridge Surgery':
                            $template = 'emails.clinic_repair_lb_temp';
                            break;
                        case 'Liverpool Street Clinic':
                            $template = 'emails.clinic_repair_ls_temp';
                            break;
                        case 'Canary Wharf Clinic':
                            $template = 'emails.clinic_repair_cw_temp';
                            break;
                        default:
                            $template = 'emails.clinic_repair_lb_temp';
                            Log::warning('Unexpected clinic branch name', ['name' => $branchName]);
                            break;
                    }
                } else {
                    $template = 'emails.clinic_repair_lb_temp';
                    Log::warning('Clinic form: branch name missing in form');
                }
                break;

            case 'postal_form':
                $template = 'emails.postal_repair_temp';
                break;

            case 'fix_form':
                $template = 'emails.fix_at_my_address_temp';
                break;

            case 'collection_form':
                $template = 'emails.collect_my_device_temp';
                break;

            default:
                // fallback
                $template = 'emails.clinic_repair_lb_temp';
                Log::warning('Unexpected form type', ['type' => $formType]);
                break;
        }

        // ✅ branch fetch only if clinic_form and name exists
        $this->branch = null;
        if ($formType === 'clinic_form') {
            $branchName = is_array($this->form) ? ($this->form['name'] ?? null) : null;
            if ($branchName) {
                $this->branch = Branch::where('name', $branchName)->first();
            }
        }

        $repairDetailArray = $this->normalizedRepairDetail();

        Log::info('BookRepairMail payload preview', [
            'template' => $template,
            'repair_detail_is_array' => is_array($repairDetailArray),
            'repair_detail_keys' => array_keys($repairDetailArray),
        ]);

        return new Content(
            view: $template,
            with: [
                'data' => [
                    'patient'       => is_array($this->patient) ? $this->patient : (array) $this->patient,
                    'form'          => is_array($this->form) ? $this->form : (array) $this->form,
                    // ✅ IMPORTANT: view will always get array here
                    'repair_detail' => $repairDetailArray,
                    'branch'        => $this->branch,
                    'form_type'     => $formType,
                ],
            ]
        );
    }

    public function attachments()
    {
        return [];
    }
}
