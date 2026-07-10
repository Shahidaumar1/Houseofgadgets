<?php

namespace App\Http\Livewire\Guest\Sell;

use App\Helpers\ServiceType;
use App\Models\CategoryText;
use App\Models\Modal;
use App\Models\ProductSpec;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;



class ModelDetail extends Component
{

    public $mobileMode =  true;
    public $tabletMode;
    public $consoleMode;
    public $laptopMode;
    public $watchMode;
    public $branchtesting1 = '';
    public $form = 'paypal';
    public $network_unlocked = false;
    public $account_cleared;
    public $model;
    public $selectedMemorySize;
    public $selectedCondition;
    public $selectedColor;
    public $price;
    public $available_memory_sizes = [];
    public $available_conditions = [];
    public $available_colors = [];
    public $data;
    public $selectedOtherSpecId;
    public $conditions;
    public $category;
    public $condition_text;
    public $product_spec_image;
    public $rand;
    public  $product_spec;
    public $currentStep = 1; // Start with step 1
    public $network_providers = ['Vodafone', 'o2', 'Smarty', 'EE', 'Asda', 'Tesco']; // Network providers

     
     public $selectedNetwork;

     public function moveToPreviousStep()
     {
         if ($this->currentStep > 1) {
             $this->currentStep--;
         }
     }
    public function mount(Modal $model)
    {

        info("Network Providers at Mount: " . json_encode($this->network_providers)); // Debug the array
        $this->model = $model;
        session()->put('modelName', $this->model->name);

        // $this->emit('modelNameUpdated', $this->model->name);
        // Debug statement
        // dd('Event emitted with model name: ' . $this->model->name);

        $product_spec = ProductSpec::where('model_id', $model->id)->first(); // Fetch the first matching product spec

        if ($product_spec) {
            $this->selectedNetwork = $product_spec->network_unlocked; // Use this only if $product_spec is not null
        }
        $this->category = $model->device_type->category;

        $this->loadAvailableSpecs();
        $this->loadData();
        $this->loadConditions();
        $this->changeSpecForm();
        
        // $this->initFirstSpec();
    }
    protected $listeners = ['changePostal' , 'formValidated' => 'moveToNextStep',
    'formInvalid' => 'handleFormInvalid',];


    public function handleFormValidated($formSection)
    {
        $formSectionMap = [
            'product-info-section' => 0,
            'form-toggle-section' => 1,
            'patient-detail-section' => 2,
            'booking-section' => 3
        ];

        if (isset($formSectionMap[$formSection])) {
            $this->currentStep = $formSectionMap[$formSection];
        }

        $this->emit('formSubmitted');
    }

    public function handleFormInvalid()
    {
        $this->emit('formInvalid');
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
            'network_unlocked' => $this->selectedNetwork ?? '',
            // 'network_unlocked' => $this->network_unlocked ?? '',
        ];
    }

    public function toggleNetworkUnlocked()
    {
        $this->network_unlocked = !$this->network_unlocked;
    }

    public function selectNetwork($network) // Method to select network
    {
        $this->selectedNetwork = $network; // Set the selected network
        $this->updated('selectedNetwork'); // Trigger the updated logic
    }


    public function toggleAccountCleared()
    {
        $this->account_cleared = !$this->account_cleared;
    }


    public function changeForm($form)
    {
        $this->form = $form;
    }
     


    public function updated($property)

    {
        $query = ProductSpec::where('model_id', $this->model->id);

        if ($property == 'selectedMemorySize') {
            $this->selectedCondition = null; // Reset condition
            $this->available_conditions = [];
            $this->price = 0;

            // Get available conditions based on selected memory size
            $this->available_conditions = $query
                ->where('memory_size', $this->selectedMemorySize)
                ->distinct('condition')
                ->pluck('condition')
                ->toArray();
        }

        if ($property == 'selectedCondition' && $this->selectedMemorySize) {
            // Get networks for the selected memory size and condition
            $this->network_providers = $query
                ->where('memory_size', $this->selectedMemorySize)
                ->where('condition', $this->selectedCondition)
                ->distinct('network_unlocked')
                ->pluck('network_unlocked')
                ->toArray();

            // If there's only one network available, select it automatically
            if (count($this->network_providers) == 1) {
                $this->selectedNetwork = $this->network_providers[0];
            }
        }

        if ($this->selectedMemorySize && $this->selectedCondition && $this->selectedNetwork) {
            // Get the product spec with the current selection
            $product_spec = $query
                ->where('memory_size', $this->selectedMemorySize)
                ->where('condition', $this->selectedCondition)
                ->where('network_unlocked', $this->selectedNetwork)
                ->first();

            if ($product_spec) {
                $this->price = $product_spec->price ?? 0;
                $this->product_spec_image = $product_spec->image;
                $this->loadData(); // Refresh the data
                $this->emit('sellSpecs', $this->data);
            }
        }

    }


    //    the below updated method is used when the price is indepent of network models
    // public function updated($property)
    // {
    //     $query = ProductSpec::where('model_id', $this->model->id);

    //     // When memory size changes, update available conditions
    //     if ($property == 'selectedMemorySize') {
    //         $this->selectedCondition = null;
    //         $this->available_conditions = [];
    //         $this->price = 0;

    //         $this->available_conditions = $query
    //             ->where('memory_size', $this->selectedMemorySize)
    //             ->distinct('condition')
    //             ->pluck('condition')
    //             ->toArray();
    //     }

    //     // When condition changes, update available networks and set a default if there's only one
    //     if ($property == 'selectedCondition' && $this->selectedMemorySize) {
    //         $this->network_providers = $query
    //             ->where('memory_size', $this->selectedMemorySize)
    //             ->where('condition', $this->selectedCondition)
    //             ->distinct('network_unlocked')
    //             ->pluck('network_unlocked')
    //             ->toArray();

    //         if (count($this->network_providers) == 1) {
    //             $this->selectedNetwork = $this->network_providers[0];
    //         }
    //     }

    //     // Fetch the price based on memory size and condition, without requiring network selection
    //     if ($this->selectedMemorySize && $this->selectedCondition) {
    //         $product_spec = $query
    //             ->where('memory_size', $this->selectedMemorySize)
    //             ->where('condition', $this->selectedCondition)
    //             ->first();

    //         if ($product_spec) {
    //             $this->price = $product_spec->price ?? 0; // Set the price regardless of network
    //             $this->product_spec_image = $product_spec->image;
    //             $this->loadData();
    //             $this->emit('sellSpecs', $this->data);
    //         }
    //     }
    // }

    public function loadAvailableSpecs()
    {
        $this->available_memory_sizes = $this->model->memory_sizes;
        $this->available_conditions = $this->model->conditions;
        $this->available_colors = $this->model->colors;

        $product_specs = ProductSpec::where('model_id', $this->model->id)->get();
        // Extract unique valid network names, avoiding '1' or '0'
        $networks_in_specs = $product_specs
            ->pluck('network_unlocked')
            ->filter(fn ($network) => in_array($network, $this->network_providers)) // Only valid networks
            ->unique()
            ->toArray();

        $this->network_providers = $networks_in_specs;
    }



    public function loadConditions()
    {
        $this->conditions = ['Excellent', 'Good', 'Fair', 'Poor', 'Faulty'];
    }

    public function updatedSelectedCondition()
    {

        $category_text = CategoryText::where('category_id', $this->category->id)->first();
        if ($category_text) {
            switch ($this->selectedCondition) {
                case 'Excellent':
                    $this->condition_text = $category_text ?  json_decode($category_text->condition_text)->Excellent : null;
                    break;
                case 'Good':
                    $this->condition_text = $category_text ?  json_decode($category_text->condition_text)->Good : null;
                    break;
                case 'Fair':
                    $this->condition_text = $category_text ?  json_decode($category_text->condition_text)->Fair : null;
                    break;
                case 'Faulty':
                    $this->condition_text = $category_text ?  json_decode($category_text->condition_text)->Faulty : null;
                    break;
                case 'Poor':
                    $this->condition_text = $category_text ?  json_decode($category_text->condition_text)->Poor : null;
                    break;
                default:
                    # code...
                    break;
            }
        }
    }




    public function changeSpecForm()
    {

        $this->mobileMode = Str::contains($this->model->device_type->category->name, 'Phone');
        $this->tabletMode = Str::contains($this->model->device_type->category->name, 'Tablet&Ipad');
        $this->consoleMode = Str::contains($this->model->device_type->category->name, 'Console');
        $this->watchMode = Str::contains($this->model->device_type->category->name, 'Watch');
        $this->laptopMode = Str::contains($this->model->device_type->category->name, 'Laptop');
    }

    public function initFirstSpec()
    {
        $query = ProductSpec::where('model_id', $this->model->id);
        if (in_array(!null, $this->available_memory_sizes)) {
            $this->selectedMemorySize = $this->available_memory_sizes[0];
            $this->available_conditions = $query->where('memory_size', $this->selectedMemorySize)->distinct('condition')->pluck('condition')->toArray();
        }
        if (in_array(!null, $this->available_conditions)) {
            $this->selectedCondition = $this->available_conditions[0];
        }
        if ($this->selectedMemorySize && $this->selectedCondition) {
            $product_spec = $query->where('memory_size', $this->selectedMemorySize)->where('condition', $this->selectedCondition)->where('network_unlocked', $this->network_unlocked)->first();
            $this->price = $product_spec->price ?? 0;
            $this->updatedSelectedCondition();
        }
    }


    public function getBranchValues()
    {
        if (isset($this->branchtesting1) && $this->branchtesting1) {
            $loadedBranch = \App\Models\Branch::where('id', $this->branchtesting1)->first();
        } else {
            $loadedBranch =  \App\Models\Branch::query()->first();
        }

        //  \App\Models\Branch::query()->first();
        return $loadedBranch;
    }




    public function render()
    {
        Session::put($this->price, 'modelprice');

        return view('livewire.guest.sell.model-detail' , [ 'currentStep' => $this->currentStep])->layout('frontend.layouts.app');
    }
}
