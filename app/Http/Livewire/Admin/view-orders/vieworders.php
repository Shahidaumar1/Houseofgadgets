<?php
namespace App\Http\Livewire;

use Livewire\Component;

class vieworders extends Component
{
    public $active;

    public function mount($active = 'orders')
    {
        $this->active = $active;
    }

    public function render()
    {
        return view('livewire.admin-navigation');
    }
}
