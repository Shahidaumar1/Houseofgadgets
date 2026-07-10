<?php

namespace App\Http\Livewire\Guest\Buy;

use Carbon\Carbon;
use App\Mail\BookDeviceBuyMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\ProductSpec;
use App\Models\Branch;
use App\Models\ServiceCharge;
use App\Models\EmailAddress;

class BookRepair extends Component
{
    public $form_type = 'clinic_form';
    public $data;
    public $form;
    public $name, $address_line_1, $address_line_2, $town_city, $post_code, $mobile_number, $landline_number, $email = "";
    public $pm = '';
    public $price;
    public $branch_selected = false;
    public $serviceChargeId;
    public $price_service;
    public $condition1Price;
    public $condition2Price;
    public $condition3Price;
    public $condition4Price;
    public $condition5Price;
    public $condition6Price;

    public function mount($data = [], $serviceChargeId = null)
    {
        $this->data = $data;

        // Fetch price and apply conditions based on service charge ID
        if ($serviceChargeId) {
            $this->serviceChargeId = $serviceChargeId;
            $this->fetchPrice($serviceChargeId);
        }
        $this->applyConditions();

        // Set base price from session
        if (isset($data['price'])) {
            session()->put('base_price', $data['price']);
            $this->price = $data['price'];
        }

        // Retrieve clinic name from session and fetch branch details
$this->clinic_name = session()->has('clinic_name') ? session()->get('clinic_name') : null;
        $branch = $this->clinic_name ? Branch::where('name', $this->clinic_name)->first() : Branch::first();
    }

    protected $listeners = ['formToggle', 'BuyDevice', 'clearSession', 'buySpecs'];

    public function formToggle($formType)
    {
        $this->form_type = $formType;
        $this->adjustPriceBasedOnForm();
    }

    public function fetchPrice($id)
    {
        $serviceCharge = ServiceCharge::find($id);
        $this->price_service = $serviceCharge ? $serviceCharge->price : null;
    }

    public function applyConditions()
    {
        $conditionIds = [1, 2, 3, 4, 5, 6];

        foreach ($conditionIds as $id) {
            $serviceCharge = ServiceCharge::find($id);

            if ($serviceCharge && $serviceCharge->charges) {
                switch ($id) {
                    case 1:
                        $this->condition1Price = $serviceCharge->price;
                        break;
                    case 2:
                        $this->condition2Price = $serviceCharge->price;
                        break;
                    case 3:
                        $this->condition3Price = $serviceCharge->price;
                        break;
                    case 4:
                        $this->condition4Price = $serviceCharge->price;
                        break;
                    case 5:
                        $this->condition5Price = $serviceCharge->price;
                        break;
                    case 6:
                        $this->condition6Price = $serviceCharge->price;
                        break;
                }
            }
        }
    }

    public function adjustPriceBasedOnForm()
    {
        $base_price = session()->get('base_price', 0);

        if ($this->form_type == 'postal_form') {
            $this->price = $base_price + $this->condition6Price;
        } else {
            $this->price = $base_price;
        }

        $this->emit('price', $this->price);
    }

    public function buySpecs($specs)
    {
        $this->adjustPriceBasedOnForm();
        $specs['price'] = $this->price;
        $this->emit('price', $this->price);
        $this->data = $specs;
    }

    public function BuyDevice()
    {
        $this->setFormData();

        $patient = session()->get('patient');
        $buy_detail = $this->data;

        if ($this->form && $patient) {
        $emails = EmailAddress::pluck('email')->toArray();

        // Include patient email
        $emails[] = $patient['email'];

        foreach ($emails as $email) {
            Mail::to($email)->send(new BookDeviceBuyMail($patient, $this->form, $buy_detail, $this->form_type));
        }

            $this->updateProductSpec($buy_detail);

            $this->storeOrderDetails($patient, $buy_detail);

            $this->emit('emailSent');
            return redirect()->to('/')->with('Buysuccess', 'Your Order has been successfully booked!');

        } else {
            $this->emit('loading', false);
            return $this->addError('error', 'Please complete the necessary forms before proceeding with the device purchase.');
        }
    }

    public function clearSession()
    {
        $forms_array = ['patient', 'clinic_form', 'postal_form', 'collection_form', 'fix_form', 'pre_code_price', 'fix_form_price', 'collection_form_price'];
        foreach ($forms_array as $f) {
            session()->forget($f);
        }
    }

    public function changePm($pm)
    {
        $this->pm = $pm;
        $this->setBranchDetails();
    }

    public function render()
    {
        return view('livewire.guest.buy.book-repair');
    }

    protected function setBranchDetails()
    {
        if (session()->has('clinic_name')) {
            $this->clinic_name = session()->get('clinic_name');
            $branch = Branch::where('name', $this->clinic_name)->first();
            $this->branch_selected = true;
        } else {
            $branch = Branch::first();
        }

        if ($branch) {
            $this->name = $branch->name;
            $this->address_line_1 = $branch->address_line_1;
            $this->address_line_2 = $branch->address_line_2;
            $this->town_city = $branch->town_city;
            $this->post_code = $branch->post_code;
            $this->mobile_number = $branch->mobile_number;
            $this->landline_number = $branch->landline_number;
            $this->email = $branch->email;
        }
    }

    protected function setFormData()
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
                break;
        }
    }

    protected function updateProductSpec($buy_detail)
    {
        $productSpec = ProductSpec::where('id', $buy_detail['product_id'])->first();

        if ($productSpec) {
            $productSpec->quantity -= $buy_detail['quantity'];

            if ($productSpec->imei) {
                $imeiStatus = json_decode($productSpec->imei, true);

                for ($i = 0; $i < $buy_detail['quantity']; $i++) {
                    if (isset($imeiStatus[$i]) && $imeiStatus[$i]['status'] === 'Available') {
                        $imeiStatus[$i]['status'] = 'Sold';
                    }
                }

                $productSpec->imei = json_encode($imeiStatus);
            }

            $productSpec->save();
        }
    }

    protected function storeOrderDetails($patient, $buy_detail)
    {
        $currentDateTime = Carbon::now('Europe/London');
        $date_time = $currentDateTime->format("d-M-Y H:i");

        $order = [
            'Service' => "Buy",
            'date_time' => $date_time,
            'patient' => $patient,
            'form' => $this->form,
            'repair_detail' => $buy_detail,
            'form_type' => $this->form_type,
        'payment_method' => $this->pm, 

        ];
        session()->put('payment-method',$this->pm );


        $orders = $this->getOrders();
        $orders[] = $order;

        file_put_contents(storage_path('app/orders.json'), json_encode($orders));
    }

    protected function getOrders()
    {
        $json = file_get_contents(storage_path('app/orders.json'));
        return json_decode($json, true) ?? [];
    }
}
