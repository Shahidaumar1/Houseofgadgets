<?php

namespace App\Http\Livewire\Admin\Sell\Components;

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
        return view('livewire.admin.sell.components.top-nav');
    }
}