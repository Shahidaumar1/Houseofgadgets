<?php

namespace App\Http\Livewire\Components;

use App\Helpers\ServiceType;
use App\Helpers\Status;
use App\Models\Category;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class AddressCommon extends Component
{
    public $responseData;

    public $post_code;

    public $addressName;

    public $selectedOption  = 'no address selected';

    public $writeYourSelf;

    public function mount($writeYourSelf = false)
    {
        $this->writeYourSelf = $writeYourSelf;
        // info('what is the reason', [$writeYourSelf]);
    }

    public function render()
    {
        return view('livewire.components.address-common');
    }

    public function changeApiData()
    {
        // Make API call using Laravel HTTP client
        $response = Http::get('https://www.doogal.co.uk/GetPostcode/'. $this->post_code.'?output=json');

        // Check if API call was successful
        if ($response->successful()) {
            // Get the response data
            $this->responseData = $response->json();
        } else {
            // Handle error if API call fails
            $this->responseData = ['error' => 'API call failed'];
        }
    }

    public function toggleAddressFields()
    {
        $this->writeYourSelf = !$this->writeYourSelf;
        $this->emitUp('writeYourSelfLis', !$this->writeYourSelf); 
    }
    
    public function addAddressData()
    {
        //         $keysToDuplicate = ['postTown',
        // 'ttwa',
        // 'latitude',
        // 'longitude',
        // 'district',
        // 'county',
        // 'region',
        // 'country'];

        // Filter original array to only include keys that need to be duplicated
        // $duplicatedKeys = array_intersect_key($this->responseData, array_flip($keysToDuplicate));

        // Combine keys with "_duplicate" suffix with their corresponding values
        // $address = array_combine(array_map(function($key) { return $key; }, array_keys($duplicatedKeys)), $duplicatedKeys);
        $address['postTown'] = $this->responseData['postTown'];
        $address['address'] = $this->selectedOption;
        // info('selected address',[$this->selectedOption]);
        $this->emitUp('addAddressDataLis', $address);
    }
}
