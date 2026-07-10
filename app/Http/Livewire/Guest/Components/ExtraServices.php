<?php

namespace App\Http\Livewire\Guest\Components;

use Livewire\Component;

class ExtraServices extends Component
{

    public $screen_protector;
    public $protective_case;
    public $modal;

    public function mount($model = null)
    {
        $this->modal = $model;
    }

    public function updated($property)
    {

        if ($property == 'screen_protector' && $this->screen_protector) {
            session()->put('screen_protector', 6);
            $this->emit('SPaddPrice', 6);
        }
        if ($property == 'screen_protector' && $this->screen_protector == false) {
            session()->forget('screen_protector');
            $this->emit('SPremovePrice', 6);

        }

        if ($property == 'protective_case' && $this->protective_case) {
            session()->put('protective_case', 9);
            $this->emit('PCaddPrice', 9);

        }
        if ($property == 'protective_case' && $this->protective_case == false) {
            session()->forget('protective_case', 9);
            $this->emit('PCremovePrice', 9);

        }

    }
    public function render()
    {
        return view('livewire.guest.components.extra-services');
    }
}