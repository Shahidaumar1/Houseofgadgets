<?php

namespace App\Http\Livewire\Guest\Quotation;

use Livewire\Component;
use App\Mail\CustomerInfoMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class Index extends  Component
{
    public $firstName;
    public $lastName;
    public $email;
    public $phone;
    public $productName;
    public $productDescription;

    public $otherText = '';
    public $existingCustomer = '';
    public $isBusiness = '';
    public $brand = '';
    public $model = '';
    public $additionalDescription = '';

    public function mount()
    {
    }

    protected $rules = [
        'firstName' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'productName' => 'required|string|max:255',
        'otherText' => 'nullable|string|max:1000',
        'existingCustomer' => 'nullable|in:yes,no',
        'isBusiness' => 'nullable|in:yes,no',
        'brand' => 'nullable|string|max:255',
        'model' => 'nullable|string|max:255',
        'additionalDescription' => 'nullable|string|max:1000',
    ];

    public function sendCustomerEmail()
    {
        // dd('shahida is cute');
        try {
            $validatedData = $this->validate();
            Log::info('Input data validated', ['validatedData' => $validatedData]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error', ['errors' => $e->errors()]);
            return;
        }

        $data = [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'productName' => $this->productName,
            'otherText' => $this->otherText,
            'existingCustomer' => $this->existingCustomer,
            'isBusiness' => $this->isBusiness,
            'brand' => $this->brand,
            'model' => $this->model,
            'additionalDescription' => $this->additionalDescription,
        ];

        try {
            Mail::to($this->email)
                ->cc('screenscity@gmail.com')
                ->send(new CustomerInfoMail($data));

            session()->flash('emailSent', true);
            $this->emit('emailSent');
        } catch (\Exception $e) {
            Log::error('Email sending failed', ['error' => $e->getMessage()]);
            $this->emit('emailSendFailed', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.guest.quotation.index')
            ->layout('frontend.layouts.app');
    }
}
