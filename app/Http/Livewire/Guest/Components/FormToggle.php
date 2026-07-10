<?php

namespace App\Http\Livewire\Guest\Components;

use Livewire\Component;
use App\Models\FormStatus;
use App\Models\ServiceCharge;
use Session;
use Illuminate\Support\Facades\Cache;

class FormToggle extends Component
{
    public $form_type = '';
    public $data;
    public $postalCode;
    public $formStatuses;
    public $serviceChargeId; // Property to store the ID of the service charge
    public $price; // Property to store the fetched price
    public $condition1Price;
    public $condition2Price;
    public $condition3Price;
    public $condition4Price;
    public $condition5Price;
    public $condition6Price;
    public $showGrid = true; // Initially show the grid
    public $showForm = false; // Initially hide the form

    // Method to show the form and hide the grid
    public function showForm($formType)
    {
        // Update form type
        $this->form_type = $formType;
        
        // Store form type in session
        session()->put('form_type', $formType);
        
        // Store form type in cache with a timeout (e.g., 10 minutes)
        Cache::put('form_type', $formType, now()->addMinutes(10));
        
        $this->showForm = true;
        $this->showGrid = false;

        // Emit an event to notify JavaScript that the form is shown
        $this->emit('formShown');
    }

    // Method to hide the form and show the grid
    public function hideForm()
    {
        $this->showGrid = true;
        $this->showForm = false;

        // Clear form type from session and cache
        session()->forget('form_type');
        Cache::forget('form_type');

        $this->form_type = null;
        $this->emit('FormHidden');
    }

    public function mount($data = null, $serviceChargeId = null)
    {
        // Ensure 'data' has the required information
        if ($data && isset($data['service'])) {
            session()->put('serviceType', $data['service']);  // Store service type
        }

        if ($serviceChargeId) {
            $this->serviceChargeId = $serviceChargeId;
            $this->fetchPrice($serviceChargeId); // Fetch price for the specified ID
        }

        // Fetch and assign prices based on various conditions
        $this->applyConditions();
        $this->data = $data;

        $formService = strtolower($data['service']);

        // Retrieve form status data from the database
        $this->formStatuses = FormStatus::all();
        
        foreach ($this->formStatuses as $index => $formStatus) {
            if ($formStatus->$formService) {
                $this->form_type = $formStatus->name;
                break;
            }
        }

        // Retrieve form type from session or cache
        $this->form_type = session()->get('form_type', Cache::get('form_type'));

        // Set option labels based on form service
        $this->setOptionLabels($formService);
    }

    public function setOptionLabels($formService)
    {
        switch ($formService) {
            case 'sell':
                $this->optionLabels = [
                    'Store Repair' => 'Sell at Store',
                    'Collect My Device' => 'Collect My Device',
                    'Call Out Repair' => 'Call Out Repair',
                    'Postal Repair' => 'Postal Sell',
                ];
                break;
            case 'buy':
                $this->optionLabels = [
                    'Store Repair' => 'Buy at Store',
                    'Collect My Device' => 'Collect My Device',
                    'Call Out Repair' => 'Call Out Repair',
                    'Postal Repair' => 'Postal Buy',
                ];
                break;
            case 'repair':
                $this->optionLabels = [
                    'Store Repair' => 'Store Repair',
                    'Collect My Device' => 'Collect My Device',
                    'Call Out Repair' => 'Call Out Repair',
                    'Postal Repair' => 'Postal Repair',
                ];
                break;
            default:
                $this->optionLabels = [
                    'Store Repair' => 'Store Repair',
                    'Collect My Device' => 'Collect My Device',
                    'Call Out Repair' => 'Call Out Repair',
                    'Postal Repair' => 'Postal Repair',
                ];
                break;
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

    public function updated()
    {
        // Update form type in session and cache
        session()->put('form_type', $this->form_type);
        Cache::put('form_type', $this->form_type, now()->addMinutes(10));

        // Emit an event to notify about form toggle changes
        $this->emit('formToggle', $this->form_type, $this->data);
    }

    public function submitForm()
    {
        // Method logic
        $this->emit('formSubmitted', $this->data);
    }

    public function render()
    {
        return view('livewire.guest.components.form-toggle');
    }
}
