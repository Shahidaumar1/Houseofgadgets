<?php

namespace App\Http\Livewire\Guest\Buy;

use Carbon\Carbon;
use App\Mail\BookDeviceBuyMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\ProductSpec;

class BookRepair extends Component
{
    public $form_type = 'clinic_form';
    public $data;
    public $form;
    public $pm = 'stripe';
    public $price;

    public function mount($data = [])
    {
        $this->data = $data;
    }
    protected $listeners = ['formToggle', 'BuyDevice', 'clearSession', 'buySpecs'];
    public function formToggle($formType)
    {
        $this->form_type = $formType;
    }

    public function buySpecs($specs)
    {
        $this->data = $specs;
        $this->price = $specs['price'];
        $this->emit('price', $this->price);
    }
    public function BuyDevice()
    {

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

        $buy_detail = $this->data;

        if ($this->form && $patient) {
            $emails = ['taswarnaqvi@gmail.com', $patient['email']];

            foreach ($emails as $email) {
                Mail::to($email)->send(new BookDeviceBuyMail($patient, $this->form, $buy_detail, $this->form_type));
            }

            $productSpec = ProductSpec::where('id', $buy_detail['product_id'])->first();
            if ($productSpec) {
                $productSpec->quantity = ($productSpec->quantity -  $buy_detail['quantity']);
                if ($productSpec->imei) {
                    // Decode the JSON array of IMEIs and statuses
                    $imeiStatus = json_decode($productSpec->imei, true);
                    // Find the first $this->quantity number of available IMEIs and update their status to "Sold"
                    for ($i = 0; $i < $buy_detail['quantity']; $i++) {
                        if (isset($imeiStatus[$i]) && $imeiStatus[$i]['status'] === 'Available') {
                            $imeiStatus[$i]['status'] = 'Sold';
                        }
                    }

                    // Update the JSON array with the modified statuses
                    $productSpec->imei = json_encode($imeiStatus);
                }
                $productSpec->save();
            }

            $currentDateTime = Carbon::now('Europe/London');
            $date_time = $currentDateTime->format("d-M-Y H:i");

            $order['Service'] = "Buy";
            $order['date_time'] = $date_time;
            $order['patient'] = $patient;
            $order['form'] = $this->form;
            $order['repair_detail'] = $buy_detail;
            $order['form_type'] = $this->form_type;

            $orders = $this->getOrders();  // Retrieve existing orders
            $orders[] = $order;             // Append new order

            file_put_contents(storage_path('app/orders.json'), json_encode($orders));
            $this->emit('emailSent');
        } else {
            $this->emit('loading', false);
            return $this->addError('error', 'Please complete above forms before Buy device');
        }
    }

    public function getOrders()
    {
        $json = file_get_contents(storage_path('app/orders.json'));
        return json_decode($json, true) ?? [];  // Decode JSON or return empty array
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
        return view('livewire.guest.buy.book-repair');
    }
}
