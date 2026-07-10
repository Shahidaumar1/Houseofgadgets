<?php

namespace App\Http\Livewire\Admin\Service;

use Livewire\Component;

class ShowServices extends Component
{
    public function render()
    {
        return view('livewire.admin.service.show-services')->layout('admin.layouts.app');
    }
}