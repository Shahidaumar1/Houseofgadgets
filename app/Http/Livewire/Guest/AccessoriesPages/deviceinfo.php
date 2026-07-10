<?php

// app/Http/Livewire/Guest/AccessoriesPages/DeviceInfo.php

namespace App\Http\Livewire\Guest\AccessoriesPages;

use Livewire\Component;

class DeviceInfo extends Component
{
    public function render()
    {
        return view('livewire.guest.accessoriespages.deviceinfo')->layout('frontend.layouts.app');
    }
}
