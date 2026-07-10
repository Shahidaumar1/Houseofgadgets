<?php

namespace App\Http\Livewire\Admin\Unlocking\Addon;

use App\Helpers\ImageService;
use App\Helpers\ServiceType;
use App\Models\Modal;
use App\Models\ProductSpec;
use App\Models\DeviceType;
use Livewire\Component;
use Livewire\WithFileUploads;


class AddSpec extends Component
{
    use WithFileUploads;
    public $rand;
    public $model;
    public $product_specs;
    public $memory_sizes;
    public $grades;
    public $colors;
    public $selectedMemorySize;
    public $selectedGrade;
    public $selectedColor;
    public $price;
    public $quantity;
    public $imei = [];
    public $editable = false;
    public $image;

    public $selectedCatId;

    public function mount(Modal $model)
    {
        $this->quantity = 1; // Set your default quantity
        $this->model = $model;

        $this->loadSpecsData();
        $this->loadProductSpecs($model);
        $this->getSelectedCatId($model);
    }

    public function getSelectedCatId($model)
    {

        $this->selectedCatId = DeviceType::select('category_id')->where('id', $model->device_type_id)->first()->category_id;
    }
    public function selectMemorySize($memory_size)
    {
        $this->selectedMemorySize = $memory_size;
    }
    public function selectGrade($grade)
    {
        $this->selectedGrade = $grade;
    }
    public function selectColor($color)
    {
        $this->selectedColor = $color;
    }


    protected $listeners = ['modelId', 'productsEmited'];

    public function modelId(Modal $model)
    {
        $this->model = $model;
        $this->loadProductSpecs($model);
        $this->getSelectedCatId($model);
    }

    public function productsEmited()
    {
        $this->loadProductSpecs($this->model);
    }


    public function save()
    {
        $this->validate([
            'price' => 'required',
        ]);
        $product_spec = ProductSpec::where('model_id', $this->model->id)->where('memory_size', $this->selectedMemorySize)->where('grade', $this->selectedGrade)->where('color', $this->selectedColor)->first();
        if ($product_spec) {
            return $this->addError('error', 'Price already added for this specification');
        }
        $new_product_spec = new ProductSpec();
        $new_product_spec->memory_size = $this->selectedMemorySize ?? null;
        $new_product_spec->grade = $this->selectedGrade ?? null;
        $new_product_spec->color = $this->selectedColor ?? null;
        $new_product_spec->price = $this->price;
        $new_product_spec->quantity = $this->quantity;

        $imeiStatus = [];
        foreach ($this->imei as $imei) {
            $imeiStatus[] = [
                'imei' => $imei,
                'status' => 'Available', // Default status is set to "available"
            ];
        }
        $new_product_spec->imei = json_encode($imeiStatus);
        $new_product_spec->model_id = $this->model->id;
        $new_product_spec->service = ServiceType::UNLOCKING;

        // if ($this->image) {
        //     $new_product_spec->image = ImageService::upload($this->image)->url;
        // }

        if ($this->image) {
            // Save multiple images as a JSON array
            $imageUrls = [];

            foreach ($this->image as $img) {
                $imageUrls[] = ImageService::upload($img)->url;
            }

            // $new_product_spec->image = json_encode($imageUrls);
            // If there's only one image, save it as a single URL instead of an array
            $new_product_spec->image = count($imageUrls) === 1 ? $imageUrls[0] : json_encode($imageUrls);
        }
        $new_product_spec->save();
        $this->clear();
        $this->loadProductSpecs($this->model);
        $this->emit('productAdded');
    }

    public function clear()
    {
        $this->selectedMemorySize = null;
        $this->selectedGrade = null;
        $this->selectedColor = null;
        $this->price = null;
        $this->quantity = 1;
        $this->imei = [];
        $this->rand++;
    }
    public function loadProductSpecs($model)
    {
        $this->product_specs = ProductSpec::where('model_id', $model->id)->get();
    }
    public function loadSpecsData()
    {
        $this->memory_sizes = ['32 GB', '64 GB', '128 GB', '256 GB', '500 GB', '1 TB', '2 TB'];
        $this->grades = ['A', 'B', 'C'];
        $this->colors = ['Black', 'White', 'Red', 'Green', 'Yellow'];
    }


    public function render()
    {
        return view('livewire.admin.unlocking.addon.add-spec');
    }
}
