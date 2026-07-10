<?php

namespace App\Http\Livewire\Admin\Repair\Components;

use Livewire\Component;

class SubNav extends Component
{
    public $active = 'Publish';
    public $items;
    public function mount($items = [])
    {
        $this->items = $items;
    }
    public function showData($args)
    {
        $this->active = $args;
        $this->emitUp('loadArgsData', $args);
    }
    public function render()
    {
        return view('livewire.admin.repair.components.sub-nav');
    }
}
