<?php

namespace App\Http\Livewire\Admin\Unlocking\Addon;

use App\Models\Modal;
use App\Models\ProductSpec;
use Livewire\Component;

class MoreSpec extends Component
{

    public $detail;
    public $specification;
    public $warranty;
    public $model;
    public $product_spec;
    public $editor = 'Detail';
    public $content;

    public function mount(Modal $model)
    {
        $this->model = $model;
    }
    protected $rules = [
        'detail' => 'required',
        'specification' => 'required',
        'warranty' => 'required',
    ];

    protected $listeners = ['productId'];
    public function updatedContent($value)
    {


        if ($this->editor == 'Detail') {
            $this->detail = $value;
        }

        if ($this->editor == 'Specification') {
            $this->specification = $value;
        }

        if ($this->editor == 'Warranty') {
            $this->warranty = $value;
        }
    }

    public function toggleEditor($editor)
    {
        $this->editor = $editor;

        if ($this->editor == 'Warranty') {
            $this->content = $this->warranty;
        }

        if ($this->editor == 'Specification') {
            $this->content = $this->specification;
        }
        if ($this->editor == 'Detail') {
            $this->content = $this->detail;
        }

        $this->emit('editorTypeChanged', $this->content);
    }
    public function productId($productId)
    {


        $this->product_spec = ProductSpec::find($productId);
        $this->detail = $this->product_spec->detail;
        $this->specification = $this->product_spec->specification;
        $this->warranty = $this->product_spec->warranty;
        $this->content = $this->detail;
        $this->emit('editorTypeChanged');
        if ($this->product_spec) {
            $this->model = Modal::where('id', $this->product_spec->model_id)->first();
        }
    }

    public function save()
    {

        $this->validate();
        $product_spec = ProductSpec::where('id', $this->product_spec->id)->first();
        $product_spec->detail = $this->detail;
        $product_spec->specification = $this->specification;
        $product_spec->warranty = $this->warranty;
        $product_spec->update();
        $this->emit('closeM', 'add-model-more-spec');
    }
    public function render()
    {
        return view('livewire.admin.unlocking.addon.more-spec');
    }
}
