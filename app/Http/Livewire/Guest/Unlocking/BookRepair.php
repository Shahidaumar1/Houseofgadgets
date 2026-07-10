<?php

namespace App\Http\Livewire\Guest\Unlocking;

use App\Mail\BookDeviceUnlockMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class BookRepair extends Component
{
    public $data;
    public $pm = 'stripe';
    public $price;

    public function mount($data = [])
    {
        $this->data = $data;
    }
    protected $listeners = ['BuyDevice', 'clearSession', 'buySpecs'];


    public function buySpecs($specs)
    {
        $this->data = $specs;
        $this->price = $specs['price'];
        $this->emit('price', $this->price);
    }
    public function BuyDevice()
    {


        $patient = session()->get('patient');

        $buy_detail = $this->data;
        if ($buy_detail && $patient) {
            $emails = ['taswarnaqvi@gmail.com', $patient['email']];

            foreach ($emails as $email) {
                Mail::to($email)->send(new BookDeviceUnlockMail($patient,  $buy_detail));
            }


            $this->emit('emailSent');
        } else {
            $this->emit('loading', false);
            return $this->addError('error', 'Please complete above forms before Unlock Your device');
        }
    }

    public function clearSession()
    {
        $forms_array = ['patient', 'clinic_form', 'postal_form', 'collection_form', 'fix_form', 'pre_code_price', 'fix_form_price', 'collection_form_price'];
        foreach ($forms_array as $f) {
            if (session()->has($f)) {
                session()->forget($f);
            }
            session()->forget($f);
        }
    }

    public function changePm($pm)
    {

        $this->pm = $pm;
    }
    public function render()
    {
        return view('livewire.guest.unlocking.book-repair');
    }
}
