<?php

namespace App\Http\Livewire\Guest\Components;

use Session;
use Carbon\Carbon;
use App\Mail\BookRepairMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\Branch;
use App\Models\ServiceCharge;
use Illuminate\Support\Facades\Cache;
use App\Models\EmailAddress;
use App\Models\SiteSetting;

class BookRepair extends Component
{
    public $form_type = 'clinic_form';
    public $formType = 'clinic_form';
    public $clinic_name = 'clinic_form';
    public $name, $address_line_1, $address_line_2, $town_city, $post_code, $mobile_number, $landline_number, $email = "";
    public $branch_selected = false;
    public $data;
    public $form;
    public $pm = 'stripe'; // Default payment method
    public $buySpecs;
    public $price;
    public $siteSetting;
    public $serviceCharge;
    public $success = false;
    public $serviceChargeId;
    public $price_service;

    // service charge amounts
    public $condition1Price; // postal repair form
    public $condition2Price; // collection repair form price
    public $condition3Price; // Fix At My Store
    public $condition4Price;
    public $condition5Price;
    public $condition6Price;

    public $branch; // Store branch object

    public function mount($data = [], $serviceChargeId = null)
    {
        if ($serviceChargeId) {
            $this->serviceChargeId = $serviceChargeId;
            $this->fetchPrice($serviceChargeId);
        }

        // load all service-charge based extras (admin panel se)
        $this->applyConditions();

        $this->siteSetting = SiteSetting::first();
        if ($this->siteSetting && $this->siteSetting->google_map_profile_link) {
            session()->put('google_map_profile_link', $this->siteSetting->google_map_profile_link);
        }

        $this->clinic_name = session()->has('clinic_name') ? session()->get('clinic_name') : null;
        $this->branch = $this->clinic_name ? Branch::where('name', $this->clinic_name)->first() : Branch::first();

        $this->data = $data;
        if ($data['service'] == \App\Helpers\ServiceType::REPAIR) {
            $this->price = $data['repair_price'];
        } else {
            $this->price = $data['price'];
        }

        $this->formType = session()->get('form_type');

        // yahan pe ServiceCharges table se aane wale extras add ho rahe
        if ($this->formType === 'postal_form') {
            $this->price += ($this->condition1Price ?? 0);
        }
        if ($this->formType === 'collection_form') {
            $this->price += ($this->condition2Price ?? 0);
        }
        if ($this->formType === 'fix_form') {
            $this->price += ($this->condition3Price ?? 0);
        }

        // total price ko session me store kar do
        session()->put('totalPrice', $this->price);

        // Branch details set karo
        $this->setBranchDetails();
    }

    protected $listeners = [
        'formToggle', 'BookRepair', 'clearSession', 'buySepcs',
        'addPostalPrice', 'removePostalPrice', 'addCollectionPrice', 'removeCollectionPrice',
        'addfixPrice', 'removefixPrice', 'emailSent'
    ];

    private function setBranchDetails()
    {
        if ($this->branch) {
            $this->name          = $this->branch->name;
            $this->address_line_1 = $this->branch->address_line_1;
            $this->address_line_2 = $this->branch->address_line_2;
            $this->town_city     = $this->branch->town_city;
            $this->post_code     = $this->branch->post_code;
            $this->mobile_number = $this->branch->mobile_number;
            $this->landline_number = $this->branch->landline_number;
            $this->email         = $this->branch->email;
        }
    }

    public function formToggle($formType)
    {
        $this->form_type = $formType;
        session()->put('form_type', $formType);
    }

    public function addPostalPrice($price)
    {
        $collectionPrice = session()->get('collection_form_price');
        if (!$collectionPrice) {
            $this->price += (float) $price;
            $this->emit('price', $this->price);
        } else {
            $this->price -= (float) $collectionPrice;
            $this->price += (float) $price;
            session()->forget('collection_form_price');
        }
        session()->put('totalPrice', $this->price);
    }

    public function removePostalPrice($price)
    {
        $this->price -= (float) $price;
        $this->emit('price', $this->price);
        session()->put('totalPrice', $this->price);
    }

    public function addCollectionPrice($price)
    {
        $postalPrice = session()->get('postalPrice');
        if (!$postalPrice) {
            $this->price += (float) $price;
            $this->emit('price', $this->price);
        } else {
            $this->price -= (float) $postalPrice;
            $this->price += (float) $price;
            session()->forget('postalPrice');
        }
        session()->put('totalPrice', $this->price);
    }

    public function removeCollectionPrice($price)
    {
        $this->price -= (float) $price;
        $this->emit('price', $this->price);
        session()->put('totalPrice', $this->price);
    }

    public function addfixPrice($price)
    {
        $collectionPrice = session()->get('collection_form_price');
        if (!$collectionPrice) {
            $this->price += (float) $price;
            $this->emit('price', $this->price);
        } else {
            $this->price -= (float) $collectionPrice;
            $this->price += (float) $price;
            session()->forget('collection_form_price');
        }
        session()->put('totalPrice', $this->price);
    }

    public function removefixPrice($price)
    {
        $this->price -= (float) $price;
        $this->emit('price', $this->price);
        session()->put('totalPrice', $this->price);
    }

    public function fetchPrice($id)
    {
        $serviceCharge = ServiceCharge::find($id);
        if ($serviceCharge) {
            $this->price = $serviceCharge->price;
        } else {
            $this->price = null;
        }
        session()->put('totalPrice', $this->price);
    }

    private function getChargeAmount($name)
    {
        $serviceCharge = ServiceCharge::whereRaw('TRIM(name) = ?', [$name])->first();
        if ($serviceCharge && $serviceCharge->charges) {
            return (float) $serviceCharge->price;
        }
        return 0;
    }

    public function applyConditions()
    {
        $this->condition1Price = $this->getChargeAmount('postal repair form');
        $this->condition2Price = $this->getChargeAmount('collection repair form price');
        $this->condition3Price = $this->getChargeAmount('Fix At My Store');
        $this->condition4Price = 0;
        $this->condition5Price = 0;
        $this->condition6Price = 0;
    }

    public function buySepcs($specs)
    {
        $this->buySpecs = $specs;
    }

    public function BookRepair()
    {
        // FIX: Cache ki jagah session use kar rahe hain
        $formType = session()->get('form_type');
        $this->form_type = $formType;

        switch ($formType) {
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
                $this->form = session()->get('fix_form');
                break;
            default:
                $this->form = null;
                break;
        }

        if (!$this->form) {
            $this->form = [
                'address_line_1' => 'Ground Floor And Basement, 14 Brushfield Street, London',
                'city'           => '14 Brushfield Street',
                'post_code'      => 'Ground Floor And Basement, 14 Brushfield Street, London',
                'repair_note'    => '',
                'repair_date'    => '2024-09-14',
                'repair_time'    => '8:00 AM - 11:00 AM',
                'address_line_2' => 'hjnkml'
            ];
        }

        $patient        = session()->get('patient');
        $trackingNumber = $this->generateTrackingNumber();
        session()->put('trackingNumber', $trackingNumber);

        $totalPrice = session()->get('totalPrice', $this->price);

        $repair_detail = [
            'tracking_number'      => $trackingNumber,
            'device'               => $this->data['device']['name'],
            'model'                => $this->data['modal']['name'],
            'fault'                => $this->data['repair_type']['name'],
            'quotePrice'           => $this->data['repair_price'],
            'totalPrice'           => $totalPrice,
            'repair_type_name'     => $this->getRepairTypeName($formType),
            'screen_protector'     => session()->has('screen_protector')
                ? '£' . session()->get('screen_protector') . ': Tempered Glass Screen Protector (Half-Price)'
                : null,
            'pm'                   => $this->pm,
            'protective_case'      => session()->has('protective_case')
                ? '£' . session()->get('protective_case') . ': Anti-Shock Protective Case for ' . $this->data['modal']['name'] . ' (Half-Price)'
                : null,
            'profilelink'          => $this->siteSetting->google_map_profile_link ?? null,
            'warranty'             => $this->data['repair_type']['warranty'],
            'part_used'            => $this->data['repair_type']['part_used'],
            'How_long'             => $this->data['repair_type']['duration'],
            'postal_price'         => $formType == 'postal_form'     ? '£' . ($this->condition1Price ?? 0) . ': Postal Repair Surcharge'              : null,
            'fix_form_price'       => $formType == 'fix_form'        ? '£' . ($this->condition3Price ?? 0) . ': Fix At My Address Device Surcharge'   : null,
            'collection_form_price'=> $formType == 'collection_form' ? '£' . ($this->condition2Price ?? 0) . ': Collect My Device Surcharge'          : null,
        ];

        if ($this->form && $patient) {
            if ($this->pm === 'pay_at_store') {
                // pay_at_store: turant email bhejo
                $emails   = EmailAddress::pluck('email')->toArray();
                $emails[] = $patient['email'];

                $currentDateTime = Carbon::now('Europe/London');
                $date_time       = $currentDateTime->format("d-M-Y H:i");

                $order = [
                    'Service'        => "Repairing",
                    'tracking_number'=> $trackingNumber,
                    'date_time'      => $date_time,
                    'patient'        => $patient,
                    'form'           => $this->form,
                    'repair_detail'  => $repair_detail,
                    'form_type'      => $formType,
                    'payment_method' => $this->pm,
                ];

                foreach ($emails as $email) {
                    Mail::to($email)->send(new BookRepairMail(
                        $patient,
                        $this->form,
                        $formType,
                        $repair_detail,
                        $this->getRepairTypeName($formType)
                    ));
                }

                $orders   = $this->getOrders();
                $orders[] = $order;
                file_put_contents(storage_path('app/orders.json'), json_encode($orders));

                $this->success = true;
                session()->forget('form_type');
                $this->emit('clearSession');

            } else {
                // Online payment (stripe, klarna, paypal)
                session()->put('repair_data', [
                    'patient'       => $patient,
                    'form'          => $this->form,
                    'repair_detail' => $repair_detail,
                    'form_type'     => $formType,
                    'branch'        => $this->branch ? $this->branch->toArray() : null,
                ]);
                session()->put('payment-method', $this->pm);
            }
        } else {
            $this->emit('loading', false);
            $this->addError('error', 'Please complete the above forms before Book Repair');
        }
    }

    public function emailSent()
    {
        $repairData = session()->get('repair_data');
        if ($repairData) {
            $emails   = EmailAddress::pluck('email')->toArray();
            $emails[] = $repairData['patient']['email'];

            $currentDateTime = Carbon::now('Europe/London');
            $date_time       = $currentDateTime->format("d-M-Y H:i");

            $order = [
                'Service'        => "Repairing",
                'tracking_number'=> $repairData['repair_detail']['tracking_number'],
                'date_time'      => $date_time,
                'patient'        => $repairData['patient'],
                'form'           => $repairData['form'],
                'repair_detail'  => $repairData['repair_detail'],
                'form_type'      => $repairData['form_type'],
                'payment_method' => $this->pm,
            ];

            foreach ($emails as $email) {
                Mail::to($email)->send(new BookRepairMail(
                    $repairData['patient'],
                    $repairData['form'],
                    $repairData['form_type'],
                    $repairData['repair_detail'],
                    $this->getRepairTypeName($repairData['form_type'])
                ));
            }

            $orders   = $this->getOrders();
            $orders[] = $order;
            file_put_contents(storage_path('app/orders.json'), json_encode($orders));

            $this->success = true;
            session()->forget('form_type');
            session()->forget('repair_data');
            $this->emit('clearSession');
        }
    }

    private function generateTrackingNumber()
    {
        $currentDateTime = Carbon::now('Europe/London');
        $random          = strtoupper(substr(md5(uniqid(rand(), true)), 0, 6));
        $prefix          = $this->branch ? preg_replace('/[^A-Za-z0-9]/', '', $this->branch->name) : 'Repair';
        return "{$prefix}-{$currentDateTime->format('Ymd')}-{$random}";
    }

    private function getRepairTypeName($formType)
    {
        switch ($formType) {
            case 'clinic_form':     return 'Store Repair';
            case 'postal_form':     return 'Postal Repair';
            case 'fix_form':        return 'Fix at My Address';
            case 'collection_form': return 'Collect My Device';
            default:                return 'Unknown Repair Type';
        }
    }

    public function getOrders()
    {
        $path = storage_path('app/orders.json');
        if (!file_exists($path)) {
            return [];
        }
        $json = file_get_contents($path);
        return json_decode($json, true) ?? [];
    }

    public function clearSession()
    {
        $forms_array = [
            'patient', 'clinic_form', 'postal_form', 'collection_form',
            'fix_form', 'pre_code_price', 'fix_form_price', 'collection_form_price'
        ];
        foreach ($forms_array as $f) {
            if (session()->has($f)) {
                session()->forget($f);
            }
        }
    }

    public function changePm($pm)
    {
        $this->pm = $pm;
        if (session()->has('clinic_name')) {
            $this->clinic_name    = session()->get('clinic_name');
            $this->branch         = Branch::where('name', $this->clinic_name)->first();
            $this->branch_selected = true;
        } else {
            $this->branch_selected = false;
            $this->branch          = Branch::first();
        }
        $this->setBranchDetails();
    }

    public function render()
    {
        return view('livewire.guest.components.book-repair');
    }
}