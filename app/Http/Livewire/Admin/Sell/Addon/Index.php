<?php

namespace App\Http\Livewire\Admin\Sell\Addon;

use App\Helpers\ServiceType;
use App\Helpers\Status;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\ProductSpec;
use Livewire\Component;
use Illuminate\Support\Str;

class Index extends Component
{

    public $mobileMode =  true;
    public $tabletMode;
    public $consoleMode;
    public $laptopMode;
    public $watchMode;

    public $categories = [];
    public $selectedCat;
    public $selectedCatId;
    public $devices = [];
    public $selectedDevice;
    public $selectedDeviceId;
    public $models = [];
    public $selectedModel;
    public $selectedModelId;
    public $product_specs;
    public $data;
    public $editableProductSpecId;
    public $price;


    protected $rules = [
        'selectedDeviceId' => 'nullable'
    ];
    public function mount(Modal $model)
    {

        $this->categories = Category::where('service', ServiceType::SELL)->get();

        if ($this->categories->count() > 0) {
            $this->selectedCat = $this->categories[0];
            $this->selectedCatId = $this->selectedCat->id;
            $this->loadDevices($this->selectedCatId);
        }


        $this->loadProductSpecs($this->selectedModelId);
        $this->loadNextComponentData();
    }

    public function updated($property)
    {
        if ($property == 'selectedCatId') {
            $this->selectedDeviceId = null;
            $this->selectedDeviceId = null;
            $this->devices = DeviceType::where('category_id', $this->selectedCatId)->get();
        }

        if ($property == 'selectedDeviceId') {
            $this->selectedModelId = null;
            $this->loadProductSpecs($this->selectedModelId);
            $this->models = Modal::where('device_type_id', $this->selectedDeviceId)->get();
        }

        if ($property == 'selectedModelId') {
            $this->loadProductSpecs($this->selectedModelId);
            $this->emit('modelId', $this->selectedModelId);
            $this->selectedModel = Modal::where('id', $this->selectedModelId)->first();
            $this->changeSpecForm();
        }
    }





    protected $listeners = ['conditionPriceUpdated' => 'fetchData', 'memorySizesUpdated' => 'fetchData', 'colorsUpdated' => 'fetchData', 'productAdded', 'ProductUpdate'];
    public function fetchData()
    {
        $this->loadModels($this->selectedDevice);
    }

    public function ProductUpdate($productId)
    {
        $this->price = ProductSpec::where('id', $productId)->first()->price;
    }
    public function productAdded()
    {
        $this->loadProductSpecs($this->selectedModelId);
    }
    public function editModelConditionPrice(Modal $model)
    {
        $this->emit('selectedModel', $model->id);
        $this->emit('showM', 'edit-model-condition-price');
    }
    public function loadNextComponentData()
    {

        $this->data = [
            'title' => 'Devices',
            'route' => 'sell-devices',
            'button_text' => 'Back'
        ];
    }

    public function loadDevices($categoryId)
    {
        $this->devices = $categoryId ? DeviceType::where('category_id', $categoryId)->get() : [];
        if ($this->devices->count() > 0) {
            $this->selectedDevice = $this->devices[0];
            $this->selectedDeviceId = $this->selectedDevice->id;
            $this->loadModels($this->selectedDeviceId);
        }
    }

    public function loadModels($deviceId)
    {
        $this->models = $deviceId ? Modal::where('device_type_id', $deviceId)->get() : [];
        if ($this->models->count() > 0) {
            $this->selectedModel = $this->models[0];
            $this->selectedModelId = $this->selectedModel->id;
            $this->loadProductSpecs($this->selectedModelId);
        }
    }
    public function loadProductSpecs($modelId)
    {
        $this->product_specs = $modelId ? ProductSpec::where('model_id', $modelId)->get() : [];
    }

    public function toggleEditable($productId)
    {
        $this->editableProductSpecId = $productId;
        $productSpec = ProductSpec::where('id', $productId)->first();
        $this->price = $productSpec->price;
    }

    public function updateProductPrice($productId)
    {
        $productSpec = ProductSpec::where('id', $productId)->first();
        $productSpec->price = $this->price;
        $productSpec->save();
        $this->editableProductSpecId = null;
        $this->emit('ProductUpdate', $productSpec);
    }



    public function delete(ProductSpec $product)
    {
        $product->delete();
        $this->emit('productsEmited');
        $this->loadProductSpecs($this->selectedModelId);
    }


    public function changeSpecForm()
    {

        $this->mobileMode = Str::contains($this->selectedModel->device_type->category->name, 'Phone');
        $this->tabletMode = Str::contains($this->selectedModel->device_type->category->name, 'Tabled&Ipaid');
        $this->consoleMode = Str::contains($this->selectedModel->device_type->category->name, 'Console');
        $this->watchMode = Str::contains($this->selectedModel->device_type->category->name, 'Watch');
        $this->laptopMode = Str::contains($this->selectedModel->device_type->category->name, 'Laptop');
    }


    public function render()
    {
        return view('livewire.admin.sell.addon.index')->layout('layouts.admin');
    }
}
