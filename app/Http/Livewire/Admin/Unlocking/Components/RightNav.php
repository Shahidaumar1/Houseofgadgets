<?php

namespace App\Http\Livewire\Admin\Unlocking\Components;

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
        return view('livewire.admin.unlocking.components.right-nav');
    }
}
