<?php

namespace App\Http\Livewire\Guest;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Collection
{
    public $post_code_area;

    public $address_line_1;

    public $address_line_2;

    public $city;

    public $post_code;

    public $repair_note;

    public $repair_date;

    public $repair_slot;

}
class CollectionForm extends Component
{
  public $post_code;
    public $responseData = [];
        public $addressName;
       
    public $selectedAddress;
    
         
         

    protected $rules = [
        'collection.post_code_area' => '',
        'collection.address_line_1' => 'required',
        'collection.address_line_2' => '',
        'collection.city' => 'required',
        'collection.post_code' => 'required',
        'collection.repair_note' => '',
        'collection.repair_date' => 'required',
        'collection.repair_slot' => 'required',
    ];
    public $collection = [
        'collection.post_code_area' => '',
        'collection.address_line_1' => '',
        'collection.address_line_2' => '',
        'collection.city' => '',
        'collection.post_code' => '',
        'collection.repair_note' => '',
        'collection.repair_date' => '',
        'collection.repair_slot' => '',
    ];    
    public function submitForm()
    {
        $this->validate(); // Validate all form fields

        // Store clinic form data in session
        session()->put('collection_form', $this->collection);

        // Emit an event to the parent component if validation is successful
        $this->emit('formSubmitted');
    }

    
    public function validateForm()
    {
        $this->validate();

        // Emit an event to the parent component if validation is successful
        $this->emit('formSubmitted', 2); // Pass the current step index (e.g., 2)
    }

    public function mount()
    {
        $collection = new Collection();
        $this->collection = get_object_vars($collection);
        if (session()->has('collection_form')) {
            $this->collection = session()->get('collection_form');
        }
    }

    public function updated($property)
    {
        if ($this->collection['post_code_area'] && $property == 'collection.post_code_area') {
            $parts = explode('-', $this->collection['post_code_area']);
            $priceParts = explode('£', $parts[1]);
            $againPriceParts = explode('.', $priceParts[1]);
            $this->emit('addCodePrice', $againPriceParts[0]);
            $this->emit('addCollectionPrice', $againPriceParts[0]);
        }
        if (array_key_exists($property, $this->rules)) {
            $this->validate();
            session()->put('collection_form', $this->collection);
        }
    }

    public function get_all_postal_code()
    {
        $post_code_areas = [];
        $post_code_areas = \App\Models\PostCodeArea::all();
        return $post_code_areas;
    }


public function addressSelected()
{
    $selectedAddress = $this->addressName;
    $this->emit('addressSelected', $selectedAddress);
}



  public function updatedPostCode()
    {
        $this->changeApiData();
    }

    public function changeApiData()
    {
        // Make API call using Laravel HTTP client
        $response = Http::get('https://www.doogal.co.uk/GetPostcode/' . $this->post_code . '?output=json');

        // Check if API call was successful
        if ($response->successful()) {
            // Get the response data
            $this->responseData = $response->json();
        } else {
            // Handle error if API call fails
            $this->responseData = ['error' => 'API call failed'];
        }
    }


public function updatedSelectedAddress($value)
{
    // Set the selected address to the address input field
    $this->collection['address_line_1'] = $value;
    
      $this->collection['post_code'] = $value;
    $addressParts = explode(',', $value);

    // Check if there are at least two parts (address line and town/city)
    if (count($addressParts) >= 2) {
        // Set the second part (town/city) to the city input field
        $this->collection['city'] = trim($addressParts[1]);
    }
    
    
}




public function setAddressDetails($address)
    {
        // Split the address into lines
        $addressLines = explode(',', $address);
        // Set the address lines and post code
        $this->collection['address_line_1'] = trim($addressLines[0]);
        $this->collection['address_line_2'] = isset($addressLines[1]) ? trim($addressLines[1]) : '';
        $this->collection['city'] = isset($addressLines[2]) ? trim($addressLines[2]) : '';
        $this->collection['post_code'] = trim($this->post_code);
    }





    public function render()
    {
        return view('livewire.guest.collection-form')->with('post_code_areas', $this->get_all_postal_code());
    }
    public function isPublicHoliday($date, $publicHolidays)
    {
        foreach ($publicHolidays as $holiday) {
            if ($date->toDateString() === $holiday->date) {
                return true;
            }
        }
        return false;
    }
}
