<?php

namespace App\Http\Livewire\Admin\Repair\Components;

use Livewire\Component;

class TopNav extends Component
{
    public $active;

    public function mount($active = null)
    {
        $this->active = $active;

    }
    public function render()
    {
        return view('livewire.admin.repair.components.top-nav');
    }
}
