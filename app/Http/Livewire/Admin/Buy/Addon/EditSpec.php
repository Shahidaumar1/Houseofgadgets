<?php

namespace App\Http\Livewire\Admin\Buy\Addon;

use App\Models\ProductSpec;
use Livewire\Component;

class EditSpec extends Component
{
    public $product;
    protected $listeners = ['productEmited'];
    public function productEmited(ProductSpec $productSpec)
    {
        $this->product = $productSpec;
    }

    public function render()
    {
        return view('livewire.admin.buy.addon.edit-spec');
    }
}