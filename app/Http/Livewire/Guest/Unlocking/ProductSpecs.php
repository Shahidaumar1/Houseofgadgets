<?php

namespace App\Http\Livewire\Guest\Unlocking;

use App\Helpers\ServiceType;
use App\Models\CategoryText;
use App\Models\Modal;
use App\Models\ProductSpec;
use Livewire\Component;
use Illuminate\Support\Str;


class ProductSpecs extends Component
{
    public $detail;
    public $specification;
    public $warranty;
    public $model;
    public $selectedMemorySize;
    public $selectedGrade;
    public $selectedColor;
    public $network_unlocked;
    public $price;
    public $basic_price = 0;
    public $quantity = 1;
    public $product_id;
    public $imei;
    public $available_quantity;

    public $available_memory_sizes = [];
    public $available_grades = [];
    public $available_colors = [];
    public $selectedOtherSpecId;
    public $data = [];
    public $grades;
    public $category;
    public $grade_text;
    public $activeGrade;
    public $product_spec_image;


    public $modelId;
    public $memorySize;
    public $color;
    public $unlockPrice;

    public function mount(Modal $model, $country = null, $network = null, $imei = null, $unlockPrice = null)
    {
        $this->model = $model;

        // dd($this->memorySize);
        $this->loadAvailableSpecs();
        $this->category = $model->device_type->category;
        // $this->loadGrades();
        $this->selectedMemorySize = $country;
        $this->selectedColor = $network;
        $this->imei = $imei;
        $this->price = $unlockPrice;
        $this->initFirstSpec();
        $this->emit('priceEmitter', $this->price);
        $this->loadData();
    }

    public function  loadData()
    {
        $this->data = [
            'service' => ServiceType::UNLOCKING,
            'device' => $this->model->device_type,
            'modal' => $this->model,
            'memory_size' => $this->selectedMemorySize ?? null,
            'color' => $this->selectedColor ?? null,
            'grade' => $this->selectedGrade ?? null,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'imei' => $this->imei,
            'product_id' => $this->product_id ?? null,
            'network_unlocked' => $this->network_unlocked ?? null,
            'detail' => $this->detail ?? null,
            'warranty' => $this->warranty ?? null,
            'specification' => $this->specification ?? null,
        ];
    }

    public function updated($property)
    {

        if ($property == 'selectedMemorySize' || $property == 'selectedGrade' || $property == 'selectedColor') {
            $query = ProductSpec::where('model_id', $this->model->id)->where('quantity', '>=', 1);
            if ($query && $property == 'selectedMemorySize') {
                $this->price = 0;
                $this->basic_price = 0;
                $this->selectedColor = null;
                $this->available_colors = [];
                $this->available_colors = $query->where('memory_size', $this->selectedMemorySize)->where('grade', $this->selectedGrade)->distinct('color')->pluck('color')->toArray();
                $this->selectedColor = $this->available_colors[0];
            }

            if ($query && $property == 'selectedGrade') {
                $this->selectedColor = null;
                $this->available_colors = [];
                $this->available_colors = $query->where('memory_size', $this->selectedMemorySize)->where('grade', $this->selectedGrade)->distinct('color')->pluck('color')->toArray();
            }
            if ($this->selectedMemorySize || $this->selectedColor) {
                if ($this->selectedColor && $this->selectedGrade) {
                    $product_spec = $query->where('memory_size', $this->selectedMemorySize)->where('color', $this->selectedColor)->first();
                } elseif ($this->selectedMemorySize && $this->selectedGrade) {
                    $product_spec = $query->where('memory_size', $this->selectedMemorySize)->first();
                } else {
                    $product_spec = $query->where('memory_size', $this->selectedMemorySize)->where('color', $this->selectedColor)->first();
                }
                if ($product_spec) {
                    $this->quantity = 1;
                    $this->basic_price = $product_spec->price ?? 0;
                    $this->price = ($product_spec->price * $this->quantity) ?? 0;
                    $this->available_quantity = $product_spec->quantity;
                    $this->product_id = $product_spec->id;
                    // $this->imei = $product_spec->imei;
                    $this->product_spec_image = $product_spec->image;
                    $this->detail = $product_spec->detail;
                    $this->specification = $product_spec->specification;
                    $this->warranty = $product_spec->warranty;
                    $this->emit('priceEmitter', $this->price);
                    $this->loadData();
                    $this->emit('buySpecs', $this->data);
                }
            }
        }
    }

    public function loadAvailableSpecs()
    {
        $this->available_memory_sizes = $this->model->memory_sizes;
        $this->available_grades = $this->model->grades;
        $this->available_colors = $this->model->colors;
    }

    public function loadGrades()
    {
        $this->grades = ['A', 'B', 'C'];
    }

    public function updatedSelectedGrade()
    {

        if ($this->category) {
            $category_text = CategoryText::where('category_id', $this->category->id)->first();
            if ($category_text) {
                switch ($this->selectedGrade) {
                    case 'A':
                        $this->grade_text = $category_text ?  json_decode($category_text->grade_text)->A : null;
                        break;
                    case 'B':
                        $this->grade_text = $category_text ?  json_decode($category_text->grade_text)->B : null;
                        break;
                    case 'C':
                        $this->grade_text = $category_text ?  json_decode($category_text->grade_text)->C : null;
                        break;
                    default:
                        # code...
                        break;
                }
            }
        }
    }

    public function initFirstSpec()
    {
        $query = ProductSpec::where('model_id', $this->model->id)->where('quantity', '>=', 1);
        // if (in_array(!null, $this->available_memory_sizes)) {
        //     $this->selectedMemorySize = $this->available_memory_sizes[0];
        //     $this->available_grades = $query->where('memory_size', $this->selectedMemorySize)->distinct('grade')->pluck('grade')->toArray();
        // }

        // if (in_array(!null, $this->available_colors)) {
        //     $this->selectedColor = $this->available_colors[0];
        // }
        if ($this->selectedMemorySize && $this->selectedColor) {
            $product_spec = $query->where('memory_size', $this->selectedMemorySize)->where('color', $this->selectedColor)->first();
            $this->price = $product_spec->price ?? 0;
            $this->basic_price = $product_spec->price ?? 0;
            $this->available_quantity = $product_spec->quantity ?? 0;
            $this->product_id = $product_spec->id;
            $this->product_spec_image = $product_spec->image;
            $this->updatedSelectedGrade();
        }
    }

    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        } else {
            $this->quantity = 1;
        }
        $this->price = ($this->basic_price * $this->quantity) ?? 0;
        $this->emit('priceEmitter', $this->price);
        $this->loadData();
        $this->emit('buySpecs', $this->data);
    }

    public function increaseQuantity()
    {
        // You can add any additional validation logic here
        if ($this->quantity < $this->available_quantity) {
            $this->quantity++;
        } else {
            $this->quantity = $this->available_quantity;
        }
        $this->price = ($this->basic_price * $this->quantity) ?? 0;
        $this->emit('priceEmitter', $this->price);
        $this->loadData();
        $this->emit('buySpecs', $this->data);
    }

    public function quantityChanged()
    {
        if ($this->quantity < 1) {
            $this->quantity = 1;
        } else if ($this->quantity > $this->available_quantity) {

            $this->quantity = $this->available_quantity;
        }

        $this->price = ($this->basic_price * $this->quantity) ?? 0;
        $this->emit('priceEmitter', $this->price);
        $this->loadData();
        $this->emit('buySpecs', $this->data);
    }
    public function validateIMEI()
    {
        // $this->validate([
        //     'imei' => ['required', 'numeric', 'digits:15'],
        // ]);
        $this->loadData();
        $this->emit('buySpecs', $this->data);
    }
    public function render()
    {
        return view('livewire.guest.unlocking.product-specs')->layout('frontend.layouts.app');
    }
}
