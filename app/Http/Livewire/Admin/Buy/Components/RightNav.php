<?php

namespace App\Http\Livewire\Admin\Buy\Components;

use Livewire\Component;

class RightNav extends Component
{

    public $data;
    public function mount($data = null)
    {
        $this->data = $data;
    }
    public function render()
    {
        return view('livewire.admin.buy.components.right-nav');
    }
}