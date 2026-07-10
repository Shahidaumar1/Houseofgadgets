<?php

namespace App\Http\Livewire\Guest\Others;

use App\Helpers\SeoUrl;
use App\Models\DeviceType;
use App\Models\Modal;
use Livewire\Component;

class BookingForm extends Component
{


    public $type;
    public $make;
    public $modal;

    public function mount($type = null, DeviceType $device = null, Modal $modal = null, )
    {


        if ($type == 'other-repair-types') {
            $this->make = $device;
            $this->modal = $modal;
        }
        $this->type = $type;
    }



    public function render()
    {
        return view('livewire.guest.others.booking-form')->layout('frontend.layouts.app');
    }
}
