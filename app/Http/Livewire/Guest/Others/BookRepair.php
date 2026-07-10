<?php

namespace App\Http\Livewire\Guest\Others;

use App\Mail\BookRepairMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class BookRepair extends Component
{


    public $form_type = 'clinic_form';
    public $repair_price = 0;
    public $data;
    public $modalImage;
    public $other_repair = false;
    public $type;

    public $form;


    public function mount($type = null)
    {
        $this->type = $type;
        if (session()->has('pre_code_price')) {
            session()->forget('pre_code_price');
        }

    }

    public function updated($property)
    {

        if ($this->form_type == 'postal_form') {

            $this->emit('addPrice', 9);
        }
    }



    protected $listeners = ['formToggle'];


    public function formToggle($formType)
    {
        $this->form_type = $formType;
    }




    public function loadSession()
    {
        if (session()->has('other_mobiles_data')) {
            $this->data = session()->get('other_mobiles_data');
        }

        if (session()->has('apple_ipad_data')) {
            $this->data = session()->get('apple_ipad_data');
        }

        if (session()->has('samsung_glaxy_tab_data')) {
            $this->data = session()->get('samsung_glaxy_tab_data');
        }

        if (session()->has('other_tablet_data')) {
            $this->data = session()->get('other_tablet_data');
        }
        if (session()->has('other_macbook_data')) {
            $this->data = session()->get('other_macbook_data');
        }

        if (session()->has('microsoft_surface_data')) {
            $this->data = session()->get('microsoft_surface_data');
        }

        if (session()->has('other_laptop_data')) {
            $this->data = session()->get('other_laptop_data');
        }

        if (session()->has('other_repair_types_data')) {
            $result = session()->get('other_repair_types_data');
            $price = 0;
            foreach ($result['faults'] as $fault) {
                if ($fault != 'Other Fault (Please Specify)') {
                    $explode = explode(':', $fault);
                    $parts = explode(' ', $explode[1]);
                    $price += (int) $parts[2];
                }

            }

            $this->data = $result;
            $this->data['make'] = $result['make']->name;
            $this->data['modal'] = $result['modal']->name;
            $this->modalImage = $result['modal']->image;
            $this->repair_price = $price;
            $this->other_repair = true;

        }


    }




    public function BookRepair()
    {
        $this->loadSession();
        switch ($this->form_type) {
            case 'clinic_form':
                $this->form = session()->get('clinic_form');
                break;
            case 'postal_form':
                $this->form = session()->get('postal_form');
                break;
            case 'collection_form':
                $this->form = session()->get('collection_form');
                break;
            case 'fix_form':
                $this->form = session()->get('fixed_form');
                break;
            default:
                # code...
                break;
        }

        $patient = session()->get('patient');

        $repair_detail = [
            'device' => $this->data ? $this->data['make'] : '',
            'emc' => $this->data && array_key_exists('emc', $this->data) ? $this->data['emc'] : null,
            'model' => $this->data ? $this->data['modal'] : '',
            'fault' => $this->data ? 'Other:' . '' . $this->data['fault'] : '',
            'faults' => $this->data ? $this->data['faults'] : '',
            'quotePrice' => 'TBC',
            'totalPrice' => '£TBC',
            //session()->get('totalPrice')
            'screen_protector' => session()->has('screen_protector')
            ? '£' . session()->get('screen_protector') . ':' . ' Tempered Glass Screen Protector (Half-Price)'
            : null,
            'protective_case' => session()->has('protective_case')
            ? '£' . session()->get('protective_case') . ':' . ' Anti-Shock Protective Case for ' . $this->data['modal'] . '(Half-Price)' : null,
            'warranty' => 'TBC',
            'part_used' => 'TBC',
            'How_long' => 'TBC',
            'postal_price' => $this->form_type == 'postal_form' ? '£9: Postal Repair Surcharge' : null,
            'fix_form_price' => $this->form_type == 'fix_form' ? '£' . session()->get('fix_form_price') . ': Fix At My Address Device Surcharge' : null,
            'collection_form_price' => $this->form_type == 'collection_form' ? '£' . session()->get('collection_form_price') . ': Collect My Device Surcharge' : null,

        ];
        // dd($form);
        if ($this->form && $patient) {
            $emails = ['repair@mobilebitz.co.uk', $patient['email']];
            foreach ($emails as $email) {
                Mail::to($email)->send(new BookRepairMail($patient, $this->form, $repair_detail, $this->form_type));
            }

            $forms_array =
                [
                    'patient',
                    'clinic_form',
                    'postal_form',
                    'collection_form',
                    'fix_form',
                    'pre_code_price',
                    'fix_form_price',
                    'collection_form_price',
                    'other_mobiles_data',
                    'apple_ipad_data',
                    'samsung_glaxy_tab_data',
                    'other_tablet_data',
                    'other_macbook_data',
                    'microsoft_surface_data',
                    'other_laptop_data',
                    'other_repair_types_data',

                ];
            foreach ($forms_array as $form) {
                if (session()->has($form)) {
                    session()->forget($form);
                }
                session()->forget($form);

            }
            return redirect()->route('thank-you');
        } else {
            return $this->addError('error', 'Please complete above forms before Book Repair');

        }

    }
    public function render()
    {
        return view('livewire.guest.others.book-repair');
    }
}