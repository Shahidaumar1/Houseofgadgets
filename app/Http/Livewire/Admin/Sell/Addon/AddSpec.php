<?php

namespace App\Http\Livewire\Admin\Sell\Addon;

use App\Helpers\ImageService;
use App\Helpers\ServiceType;
use App\Models\Modal;
use App\Models\ProductSpec;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class AddSpec extends Component
{
    use WithFileUploads;
    public $mobileMode =  true;
    public $tabletMode;
    public $consoleMode;
    public $laptopMode;
    public $watchMode;

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
    public $image;


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



    protected $listeners = ['modelId', 'productsEmited'];

    public function modelId(Modal $model)
    {
        $this->model = $model;
        $this->loadProductSpecs($model);
        $this->changeSpecForm();
    }

    public function productsEmited()
    {
        $this->loadProductSpecs($this->model);
    }



    public function save()
    {
        $this->validate([
            'price' => 'required',
            'selectedCondition' => 'required',
        ]);
        $product_spec = ProductSpec::where('model_id', $this->model->id)->where('memory_size', $this->selectedMemorySize)->where('condition', $this->selectedCondition)->where('network_unlocked', $this->network_unlocked)->first();
        if ($product_spec) {
            return $this->addError('error', 'Price already added for this specification');
        }
        $new_product_spec = new ProductSpec();
        $new_product_spec->memory_size = $this->selectedMemorySize ?? null;
        $new_product_spec->condition = $this->selectedCondition ?? null;
        $new_product_spec->price = $this->price;
        $new_product_spec->model_id = $this->model->id;
        $new_product_spec->service = ServiceType::SELL;
        $new_product_spec->network_unlocked = $this->network_unlocked;
        if ($this->image) {
            $new_product_spec->image = ImageService::upload($this->image)->url;
        }
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

    public function changeSpecForm()
    {

        $this->mobileMode = Str::contains($this->model->device_type->category->name, 'Phone');
        $this->tabletMode = Str::contains($this->model->device_type->category->name, 'Tablet&Ipaid');
        $this->consoleMode = Str::contains($this->model->device_type->category->name, 'Console');
        $this->watchMode = Str::contains($this->model->device_type->category->name, 'Watch');
        $this->laptopMode = Str::contains($this->model->device_type->category->name, 'Laptop');
    }
    public function render()
    {
        return view('livewire.admin.sell.addon.add-spec');
    }
}
