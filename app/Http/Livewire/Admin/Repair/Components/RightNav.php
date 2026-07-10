<?php

namespace App\Http\Livewire\Admin\Repair\Components;

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
        return view('livewire.admin.repair.components.right-nav');
    }
}
