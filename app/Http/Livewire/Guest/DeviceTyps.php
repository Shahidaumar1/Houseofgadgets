<?php

namespace App\Http\Livewire\Guest;

use App\Helpers\Status;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use Livewire\Component;
use App\Mail\CustomerInfoMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class DeviceTyps extends Component
{
    // form fields
    public $category;
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $productName;
    public $productDescription;

    public $checkboxes = [];
    public $otherText = '';

    public $existingCustomer = '';
    public $isBusiness = '';
    public $brand = '';
    public $model = '';
    public $additionalDescription = '';

    // brand list for current category
    public $device_types = [];

    // apple stuff (if needed)
    public $appleDeviceId = null;
    public $appleModels   = [];

    protected $rules = [
        'firstName'              => 'required|string|max:255',
        'lastName'               => 'required|string|max:255',
        'email'                  => 'required|email|max:255',
        'phone'                  => 'required|string|max:15',
        'productName'            => 'required|string|max:255',
        'checkboxes'             => 'array',
        'otherText'              => 'nullable|string|max:255',
        'existingCustomer'       => 'required|in:yes,no',
        'isBusiness'             => 'required|in:yes,no',
        'brand'                  => 'nullable|string|max:255',
        'model'                  => 'nullable|string|max:255',
        'additionalDescription'  => 'nullable|string|max:1000',
    ];

  
public function mount(Category $category)
{
    $this->category = $category;

    $this->device_types = $category->devices->where('status', Status::PUBLISH);

    $appleDevice = $this->device_types->first(function ($d) {
        $n = strtolower(trim($d->name));
        return $n === 'apple' || str_starts_with($n, 'apple ');
    });

    if ($appleDevice) {
        $this->appleDeviceId = $appleDevice->id;

        $query = Modal::query()->where('device_type_id', $appleDevice->id);

        if (Schema::hasColumn('modals', 'status')) {
            $query->where('status', Status::PUBLISH);
        }

        $this->appleModels = $query->orderBy('name')->get();
    }
}
    public function sendCustomerEmail()
    {
        Log::info('sendCustomerEmail method called');

        try {
            $validatedData = $this->validate();
            Log::info('Input data validated', ['validatedData' => $validatedData]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error', ['errors' => $e->errors()]);
            return;
        }

        $data = [
            'firstName'             => $this->firstName,
            'lastName'              => $this->lastName,
            'email'                 => $this->email,
            'phone'                 => $this->phone,
            'productName'           => $this->productName,
            'checkboxes'            => $this->checkboxes,
            'otherText'             => $this->otherText,
            'existingCustomer'      => $this->existingCustomer,
            'isBusiness'            => $this->isBusiness,
            'brand'                 => $this->brand,
            'model'                 => $this->model,
            'additionalDescription' => $this->additionalDescription,
        ];

        try {
            Mail::to($this->email)
                ->cc('shahantw1234@gmail.com')
                ->cc('gamechangersofusa2@gmail.com')
                ->send(new CustomerInfoMail($data));

            Log::info('Email sent successfully to ' . $this->email);
            session()->flash('emailSent', true);
            $this->emit('emailSent');
        } catch (\Exception $e) {
            Log::error('Email sending failed', ['error' => $e->getMessage()]);
            $this->emit('emailSendFailed', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.guest.device-typs')->layout('frontend.layouts.app');
    }
}
