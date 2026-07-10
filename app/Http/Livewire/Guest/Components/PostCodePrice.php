<?php

namespace App\Http\Livewire\Guest\Components;

use Livewire\Component;

class PostCodePrice extends Component
{

    public $codePrice = 0;
    public $form_type;

    protected $listeners = ['addCodePrice'];

    public function mount($form)
    {
        $this->form_type = $form;
    }

    public function addCodePrice($price)
    {
        $this->codePrice = $price;

    }
    public function render()
    {
        return view('livewire.guest.components.post-code-price');
    }
}
