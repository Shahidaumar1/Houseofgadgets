<?php

namespace App\Http\Livewire\Admin\Repair\Addon;

use App\Helpers\ServiceType;
use App\Models\Modal;
use App\Models\ProductSpec;
use Livewire\Component;

class AddSpec extends Component
{
    public $rand;
    public $model;
    public $product_specs;
    public $memory_sizes;
    public $conditions;
    public $colors;
    public $selectedMemorySize;
    public $selectedCondition;
    public $selectedColor;
    public $price;
    public $network_unlocked = false;
    public $account_cleared = false;
    public function mount(Modal $model)
    {
        $this->model = $model;
        $this->loadSpecsData();
        $this->loadProductSpecs($model);

    }


    public function selectMemorySize($memory_size)
    {
        $this->selectedMemorySize = $memory_size;
    }
    public function selectCondition($condition)
    {
        $this->selectedCondition = $condition;
    }
    public function selectColor($color)
    {
        $this->selectedColor = $color;
    }

    public function toggleNetworkUnlocked()
    {
        $this->network_unlocked = !$this->network_unlocked;
    }

    public function toggleAccountCleared()
    {
        $this->account_cleared = !$this->account_cleared;
    }

    protected $listeners = ['modelId', 'productsEmited'];

    public function modelId(Modal $model)
    {
        $this->model = $model;
        $this->loadProductSpecs($model);
    }

    public function productsEmited()
    {
        $this->loadProductSpecs($this->model);
    }



    public function save()
    {

        $product_spec = ProductSpec::where('model_id', $this->model->id)->where('memory_size', $this->selectedMemorySize)->where('condition', $this->selectedCondition)->where('color', $this->selectedColor)->first();
        if ($product_spec) {
            return $this->addError('error', 'Price already added for this specification');
        }
        $new_product_spec = new ProductSpec();
        $new_product_spec->memory_size = $this->selectedMemorySize;
        $new_product_spec->condition = $this->selectedCondition;
        $new_product_spec->color = $this->selectedColor;
        $new_product_spec->price = $this->price;
        $new_product_spec->model_id = $this->model->id;
        $new_product_spec->service = ServiceType::REPAIR;
        $new_product_spec->account_cleared = $this->account_cleared;
        $new_product_spec->network_unlocked = $this->network_unlocked;
        $new_product_spec->save();
        $this->clear();
        $this->loadProductSpecs($this->model);
        $this->emit('productAdded');
    }

    public function clear()
    {
        $this->selectedMemorySize = null;
        $this->selectedCondition = null;
        $this->selectedColor = null;
        $this->network_unlocked = false;
        $this->account_cleared = false;
        $this->price = null;
        $this->rand++;
    }
    public function loadProductSpecs($model)
    {
        $this->product_specs = ProductSpec::where('model_id', $model->id)->get();
    }
    public function loadSpecsData()
    {
        $this->memory_sizes = ['32 GB', '64 GB', '128 GB', '256 GB', '500 GB', '1 TB', '2 TB'];
        $this->conditions = ['Excellent', 'Good', 'Fair', 'Poor', 'Faulty'];
        $this->colors = ['Black', 'White', 'Red', 'Green', 'Yellow'];
    }
    public function render()
    {
        return view('livewire.admin.sell.addon.add-spec');
    }
}
