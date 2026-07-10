<?php

namespace App\Http\Livewire\Admin\Service\Components;

use Livewire\Component;

class ServiceNav extends Component
{
    public $active;
    public function mount($active = null)
    {
        $this->active = $active;
    }
    public function render()
    {
        return view('livewire.admin.service.components.service-nav');
    }
}