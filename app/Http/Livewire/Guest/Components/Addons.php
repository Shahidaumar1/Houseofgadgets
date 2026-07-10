<?php

namespace App\Http\Livewire\Guest\Components;

use App\Models\LandingPage;
use App\Models\SectionOneHeading;
use Livewire\Component;

class Addons extends Component
{
    public $addOns;
    public $heading;
    public function mount(){
        $this->addOns =    LandingPage::all();
        $this->heading = SectionOneHeading::first();
     }
    public function render()
    {
        return view('livewire.guest.components.addons');
    }
}
