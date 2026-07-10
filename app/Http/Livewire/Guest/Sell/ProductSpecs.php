<?php

namespace App\Http\Livewire\Guest\Sell;

use App\Models\Modal;
use App\Models\ProductSpec;
use Livewire\Component;

class ProductSpecs extends Component
{
    public $network_unlocked;
    public $model;
    public $memory_sizes;
    public $conditions;
    public $colors;
    public $selectedMemorySize;
    public $selectedCondition;
    public $selectedColor;
    public $price;
    public $available_memory_sizes = [];
    public $available_conditions = [];
    public $available_colors = [];

    public function mount(Modal $model)
    {
        $this->model = $model;
        $this->loadSpecs();
        $this->loadAvailableSpecs();
    }

    public function updated($property)
    {
        if ($property == 'selectedMemorySize') {
            $product_specs = ProductSpec::where('model_id', $this->model->id)->where('memory_size', $this->selectedMemorySize)->get();
            foreach ($product_specs as $product_spec) {
                $this->available_conditions = [];
                array_push($this->available_conditions, $product_spec->condition);
            }
        }

        if ($property == 'selectedCondition') {
            $product_specs = ProductSpec::where('model_id', $this->model->id)->where('condition', $this->selectedCondition)->get();
            foreach ($product_specs as $product_spec) {
                $this->available_colors = [];
                array_push($this->available_colors, $product_spec->color);
            }
        }
        if ($property == 'selectedColor') {
            $product_spec = ProductSpec::where('model_id', $this->model->id)->where('color', $this->selectedColor)->first();
            $this->price = $product_spec->price ?? 0;
            $this->network_unlocked = $product_spec->network_unlocked;
        }



    }

    public function loadAvailableSpecs()
    {
        $this->available_memory_sizes = $this->model->memory_sizes;
        $this->available_conditions = $this->model->conditions;
        $this->available_colors = $this->model->colors;
    }


    public function loadSpecs()
    {
        $this->memory_sizes = ['32 GB', '64 GB', '128 GB', '256 GB', '500 GB', '1 TB', '2 TB'];
        $this->conditions = ['Excellent', 'Good', 'Fair', 'Poor', 'Faulty'];
        $this->colors = ['Black', 'White', 'Red', 'Green', 'Yellow'];
    }

    public function render()
    {
        return view('livewire.guest.sell.product-specs')->layout('frontend.layouts.app');
    }
}