<?php

namespace App\Http\Livewire\Admin\Unlocking\Addon;

use App\Helpers\ServiceType;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\ProductSpec;
use Livewire\Component;
use Illuminate\Support\Str;

class Index extends Component
{

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
    public $editableProductSpecId;
    public $price;
    public $quantity = 1;
    public $imei = [];

    public $data;

    public $activeView = 'list';
    public $target = 'Publish';
    public $editMemorySizes = false;
    public $memory_sizes;
    public $editColors = false;
    public $colors;

    protected $rules = [
        'selectedDeviceId' => 'nullable'
    ];
    public function mount(Modal $model)
    {

        $this->categories = Category::where('service', ServiceType::UNLOCKING)->get();

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
            'route' => 'unlock-devices',
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

        $this->product_specs = $modelId ? ProductSpec::where('model_id', $modelId)->get() : collect([]);
    }



    public function delete(ProductSpec $product)
    {
        $product->delete();
        $this->emit('productsEmited');
        $this->loadProductSpecs($this->selectedModelId);
    }

    public function editOrUpdateSpec($product)
    {
        $this->emit('showM', 'add-model-more-spec');
        $this->emit('productId', $product);
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
    public function updateProductQuantity($productId)
    {
        $productSpec = ProductSpec::where('id', $productId)->first();
        $productSpec->quantity = $productSpec->quantity +  $this->quantity;
        $imeiStatus = [];
        foreach ($this->imei as $imei) {
            $imeiStatus[] = [
                'imei' => $imei,
                'status' => 'Available', // Default status is set to "available"
            ];
        }

        // Decode JSON strings into PHP arrays
        $array1 = json_decode($productSpec->imei, true) ?? [];
        $array2 = $imeiStatus;

        // Merge arrays
        $mergedArray = array_merge($array1, $array2);

        // Custom sorting function
        usort($mergedArray, function ($a, $b) {
            return strcmp($a['status'], $b['status']);
        });

        // Encode the sorted array back to JSON
        $sortedJson = json_encode($mergedArray);
        $productSpec->imei = $sortedJson;
        $productSpec->save();
        $this->editableProductSpecId = null;
        $this->emit('ProductUpdate', $productSpec);
    }



    public function render()
    {
        return view('livewire.admin.unlocking.addon.index')->layout('layouts.admin');
    }
}
