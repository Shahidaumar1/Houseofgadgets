<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;

use App\Models\FormStatus;
use Session;
use App\Models\ServiceCharge;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;



class ServicesSettings extends Component
{
    public $data = [];
    public $formStatuses;

    public $customToggleStatus = true;


    public $anotherToggleStatus = true;
    public $toggleNewCustomStatus;
    public $inputValue;

    public $collectionRepairPriceInput;
    public $newCustomToggleStatus;





    // New properties for the ServiceCharge inputs
    public $serviceChargeName;
    public $serviceChargePrice;
    public $serviceChargeCharges;

    public $serviceCharges = []; // New property to hold fetched service charges

    public $editingServiceChargeId; // ID of the service charge to edit





    public function storeInput()
    {

        $validatedData = Validator::make(
            ['inputValue' => $this->inputValue],
            ['inputValue' => 'required|numeric']
        )->validate();



        $intValue = intval($this->inputValue);

        // Store the integer value in the session
        Session::put('storedInputValue', $intValue);
        // Reset the input value after storing it
        $this->inputValue = '';
    }



    // for collection repair

    public function storeCollectionRepairPrice()
    {
        // Validate the input value
        $validatedData = Validator::make(
            ['collectionRepairPriceInput' => $this->collectionRepairPriceInput],
            ['collectionRepairPriceInput' => 'required|numeric']
        )->validate();

        // Convert the input value to an integer
        $collectionRepairPrice = intval($this->collectionRepairPriceInput);

        // Store the integer value in the session
        Session::put('collectionRepairPrice', $collectionRepairPrice);

        // Reset the input value after storing it
        $this->collectionRepairPriceInput = '';
    }




    public function toggleAnotherStatus()
    {
        $this->anotherToggleStatus = !$this->anotherToggleStatus;
        // Store the toggle status in session
        Session::put('anotherToggleStatus', $this->anotherToggleStatus);
    }




    public function toggleCustomStatus()
    {
        $this->customToggleStatus = !$this->customToggleStatus;
        // Store the toggle status in session
        Session::put('toggleStatus', $this->customToggleStatus);
    }






    // fix at my address

    public function toggleNewCustomStatus()
    {
        $this->newCustomToggleStatus = !$this->newCustomToggleStatus;
        // Store the toggle status in session
        Session::put('newToggleStatus', $this->newCustomToggleStatus);
    }




    function mount()
    {

        $this->loadNextComponentData();

        // Retrieve form status data from the database
        $this->formStatuses = FormStatus::all();
        $this->serviceCharges = $this->getServiceCharges();
    }




    public function getServiceCharges()
    {
        return ServiceCharge::all();
    }

    public function storeServiceCharge()
    {
        $serviceCharge = new ServiceCharge();
        $serviceCharge->name = $this->serviceChargeName;
        $serviceCharge->price = $this->serviceChargePrice;
        $serviceCharge->charges = $this->serviceChargeCharges;
        $serviceCharge->save();

        $this->serviceCharges = $this->getServiceCharges(); // Refresh the list

        $this->resetServiceChargeInputs();
    }

    public function startEdit($id)
    {
        // Find the service charge to edit by its ID
        $serviceCharge = ServiceCharge::find($id);

        // Store the ID and other properties to be edited
        $this->editingServiceChargeId = $serviceCharge->id;
        $this->serviceChargeName = $serviceCharge->name;
        $this->serviceChargePrice = $serviceCharge->price;
        $this->serviceChargeCharges = $serviceCharge->charges;
    }

    public function updateServiceCharge()
    {
        // Find the existing service charge by ID
        $serviceCharge = ServiceCharge::find($this->editingServiceChargeId);

        // Update its properties with the new values
        $serviceCharge->name = $this->serviceChargeName;
        $serviceCharge->price = $this->serviceChargePrice;
        $serviceCharge->charges = $this->serviceChargeCharges;
        $serviceCharge->save();

        $this->serviceCharges = $this->getServiceCharges(); // Refresh the list

        $this->resetServiceChargeInputs(); // Clear the editing fields
    }

    private function resetServiceChargeInputs()
    {
        // Clear the service charge editing fields
        $this->serviceChargeName = '';
        $this->serviceChargePrice = '';
        $this->serviceChargeCharges = false;
        $this->editingServiceChargeId = null;
    }



    public function toggleStatus($id, $field)
    {
        // Toggle the status of the specified field for the given form status
        $formStatus = FormStatus::find($id);
        $formStatus->$field = !$formStatus->$field;
        $formStatus->save();
    }
    public function loadNextComponentData()
    {

        $this->data = [
            'title' => 'Branch',
            'route' => 'branches-settings',
            'button_text' => 'Back'
        ];
    }
    public function render()
    {
        return view('livewire.admin.settings.services-settings')->layout('layouts.admin');
    }
}
