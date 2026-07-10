<?php
namespace App\Http\Livewire\Guest;

use App\Helpers\ServiceType;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\Price;
use App\Models\RepairType;
use Livewire\Component;

class RepairDetail extends Component
{
    public $category;
    public $data;
    public $paywithcardtext = '';
    public $formType = ''; // Define the formType property
    public $showForm = false;
    public $currentStep = 0;
    public $isFormValid = false; // Track form validation status

    protected $listeners = [
        'formValidated' => 'handleFormValidated',
        'storeFormData' => 'handleStoreFormData' // Add a listener for storing form data
    ];

    public function handleFormValidated($formSection)
    {
        $formSectionMap = [
            'repair-info-section' => 0,
            'form-section-1' => 1,
            'form-section-2' => 2,
            'book-repair-section' => 3
        ];
        if (isset($formSectionMap[$formSection])) {
            $this->currentStep = $formSectionMap[$formSection];
        }
        // Enable "Next" button based on form validation
        $this->isFormValid = true;
    }

    public function handleStoreFormData($formData)
    {
        // Store form data in the session
        session()->put('form_data', array_merge(session('form_data', []), $formData));
    }

    // Route uses {category:slug}/{device:slug}/{modal:slug}/{repair:slug}
    // so Laravel already resolves these as full Eloquent models via
    // implicit route model binding. No manual decode/lookup needed here.
    public function mount(Category $category, DeviceType $device, Modal $modal, RepairType $repair)
    {
        $this->category = $category;

        // Get the price based on repair type and modal
        $repair_price = Price::findPrice($repair->id, $modal->id);

        session(['repair_price' => $repair_price]);

        // Clear any previous session data related to pricing
        if (session()->has('pre_code_price')) {
            session()->forget('pre_code_price');
        }

        // Set data to be used in the view
        $this->data = [
            'service'      => ServiceType::REPAIR,
            'device'       => $device,
            'modal'        => $modal,
            'repair_type'  => $repair,
            'repair_price' => $repair_price,
        ];
    }

    public function hideForm()
    {
        // Reset form-related properties
        $this->formType = '';
        $this->showForm = false;
        $this->currentStep = 0;
        $this->isFormValid = false;
        // Emit an event to notify JavaScript that the form is hidden
        $this->emit('formHidden');
    }

    public function showForm($formType)
    {
        // Update form type
        $this->formType = $formType;
        $this->showForm = true;
        // Emit an event to notify JavaScript that the form is shown
        $this->emit('formShown');
    }

    public function render()
    {
        return view('livewire.guest.repair-detail', [
            'device' => $this->data['device'],
            'modal' => $this->data['modal'],
            'formType' => $this->formType, // Pass the formType variable to the Blade view
            'isFormValid' => $this->isFormValid,
            'paywithcardtext' => $this->paywithcardtext // Pass the payment text to the Blade view
        ])->layout('frontend.layouts.app');
    }
}