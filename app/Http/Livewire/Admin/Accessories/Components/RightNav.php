<?php

namespace App\Http\Livewire\Admin\Accessories\Components;

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
        return view('livewire.admin.accessories.components.right-nav');
    }
}
