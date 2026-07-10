<?php

namespace App\Http\Livewire\Guest\Sell;
use App\Helpers\ServiceType;
use Carbon\Carbon;
use App\Mail\BookDeviceSellMail;
use App\Models\Modal;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\Branch;
use App\Models\ServiceCharge;
use App\Models\EmailAddress;

class BookingForm extends Component
{
    public $form_type = 'clinic_form';
    public $data;
    public $pm = 'drop_at';
    public $price;
    public $model;
    public $form = 'paypal';
    public $bankDetail;
    public $paypalDetail;
    public $success = false;
    public $modelName;
    public $bank_checkbox;
    public $bank;
    public $condition1Price;
    public $condition2Price;
    public $condition3Price;
    public $condition4Price;
    public $condition5Price;
    public $condition6Price;
    public $serviceChargeId; // Property to store the ID of the service charge
public $orignalprice;

  public $branchtesting1 = '';


    public function mount(Modal $model, $serviceChargeId = null)

    {
        
        
                if ($serviceChargeId) {
            $this->serviceChargeId = $serviceChargeId;
            $this->fetchPrice($serviceChargeId); // Fetch price for the specified ID
        }

        // Fetch and assign prices based on various conditions
        $this->applyConditions();

        
                $this->model = $model;
                //  $this->loadData();
  $this->modelName = session()->get('modelName');

$this->clinic_name = session()->has('clinic_name') ? session()->get('clinic_name') : null;
        $branch = $this->clinic_name ? Branch::where('name', $this->clinic_name)->first() : Branch::first();

        if ($branch) {
            $this->branch_selected = true;
            $this->name = $branch->name;
            $this->address_line_1 = $branch->address_line_1;
            $this->address_line_2 = $branch->address_line_2;
            $this->town_city = $branch->town_city;
            $this->post_code = $branch->post_code;
            $this->mobile_number = $branch->mobile_number;
            $this->landline_number = $branch->landline_number;
            $this->email = $branch->email;
        } else {
            $this->branch_selected = false;
        }
    



        $this->formType = session()->get('form_type');

    // Adjust the price if the form type is 'postal_form'
    if ($this->formType === 'postal_form') {
        $this->price += $this->condition4Price;
    }
    
        if ($this->formType === 'collection_form') {
        $this->price += $this->condition5Price;
    }
        
        
        


    }


    public function fetchPrice($id)
    {
        $serviceCharge = ServiceCharge::find($id);

        if ($serviceCharge) {
            $this->price = $serviceCharge->price;
        } else {
            $this->price = null; // Default to null if not found
        }
    }


public function applyConditions()
    {
        // Define IDs to check
        $conditionIds = [1, 2, 3, 4, 5, 6];

        foreach ($conditionIds as $id) {
            $serviceCharge = ServiceCharge::find($id);

            // Correct syntax to check if 'charges' is true
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
   
    
    
    public function  loadData()
    {
        $this->data = [
            'service' => ServiceType::SELL,
            'device' => $this->model->device_type,
            'modal' => $this->model,
            'memory_size' => $this->selectedMemorySize ?? '',
            'color' => $this->selectedColor ?? '',
            'condition' => $this->selectedCondition ?? '',
            'price' => $this->price,
            'network_unlocked' => $this->network_unlocked ?? '',
        ];
    }
    
      
    



    public function changeForm($form)
    {
        $this->form = $form;
    }


    protected $listeners = ['formToggle', 'BuyDevice', 'clearSession', 'sellSpecs', 'bankDetail', 'paypalDetail','changePostal','modelNameUpdated', 'formTypeChanged' => 'updateFormType'];
    public function formToggle($formType)
    {
        $this->form_type = $formType;
    }
    
    

    
    
     public function changePostal($data){
        $this->branchtesting1 = $data['id'];
          session()->put('branch_settings', $data['id']);
    }

    
    
    
    // public function sellSpecs($specs)
    // {
    //     $this->data = $specs;
    //     $this->price = $specs['price'];



    // }
    
    public function sellSpecs($specs)
{
 

    $this->data = $specs;
    
    $this->price = $specs['price'];
    $this->orignalprice = $specs['price'];


    // Retrieve the form type from the session
    $this->formType = session()->get('form_type');

    // Adjust the price based on the form type
    if ($this->formType === 'postal_form') {
        $this->price += $this->condition4Price;
    } elseif ($this->formType === 'collection_form') {
        $this->price += $this->condition5Price;
    }

    // Additional logic or operations can be added here if needed
}


    public function bankDetail($bank)
    {
        $this->bankDetail = $bank;
        $this->SellDevice();
    }

    public function paypalDetail($paypal)
    {
        $this->paypalDetail = $paypal;
        $this->SellDevice();
    }

    public function buySpecs($specs)
    {
        $this->data = $specs;
        $this->price = $specs['price'];
        $this->emit('price', $this->price);
    }
    public function SellDevice()
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


        $sell_detail = [
            'specs' => $this->data ?? null,
            'bank' => $this->bankDetail,
            'paypal' => $this->paypalDetail,

        ];

        // dd($sell_detail);
        if ($this->form && $patient && $this->price) {
  $emails = EmailAddress::pluck('email')->toArray();

        // Include patient email
        $emails[] = $patient['email'];

        foreach ($emails as $email) {
            Mail::to($email)->send(new BookDeviceSellMail($patient, $this->form, $sell_detail, $this->form_type));
        }

            $currentDateTime = Carbon::now('Europe/London');
            $date_time = $currentDateTime->format("d-M-Y H:i");

            $order['Service'] = "Sell";
            $order['date_time'] = $date_time;
            $order['patient'] = $patient;
            $order['form'] = $this->form;
            $order['repair_detail'] = $sell_detail;
            $order['form_type'] = $this->form_type;
            $order['selectedBranch'] = '';
                    $order['payment_method'] = $this->pm; // Add the payment method here

            if (isset($this->form['name'])) {
                $order['selectedBranch'] = Branch::where('name', $this->form['name'])->first();
            }

            $orders = $this->getOrders();  // Retrieve existing orders
            $orders[] = $order;             // Append new order

            file_put_contents(storage_path('app/orders.json'), json_encode($orders));
            $this->emit('emailSent');
            $this->success  = true;
            return redirect()->to('/')->with('Sellsuccess', 'Thank You Selling you device with us!');
        } else {
            $this->form = 'paypal';
            return $this->addError('error', 'Please complete above forms and Specification, like ,condition before Sell device');
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



public function submit()
    {

        // $this->validate();
        // $this->loading = true;
        $this->emit('bankDetail', $this->bank);
    }

    
    
     public function getBranchValues(){
        if(isset($this->branchtesting1) && $this->branchtesting1 ){
            $loadedBranch = \App\Models\Branch::where('id', $this->branchtesting1)->first();
        }else{
            $loadedBranch =  \App\Models\Branch::query()->first();
        }
        
        //  \App\Models\Branch::query()->first();
        return $loadedBranch;
    }
    


    public function updateFormType($formType)
    {
        $this->form_type = $formType;
        // Additional logic to handle the updated form type
    }

    

    public function render()
    {
        return view('livewire.guest.sell.booking-form')->layout('frontend.layouts.app');
    }
}
