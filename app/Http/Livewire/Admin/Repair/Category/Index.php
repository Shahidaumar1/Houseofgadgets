<?php

namespace App\Http\Livewire\Admin\Repair\Category;

use App\Helpers\ServiceType;
use App\Helpers\Status;
use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public $rand;
    public $categories;
    public $selectedCat;
    public $data;
    public $stats;
    public $target = 'Publish';
    public $items;


    protected $rules = [
        'status' => ''
    ];

    public function mount()
    {
        $this->loadCategories();
        $this->loadNextComponentData();
        $this->loadItems();
    }

    protected $listeners = ['categoryCreated' => 'loadUpdatedCat', 'categoryUpdated' => 'loadUpdatedCat', 'loadArgsData' => 'fetchData'];

    public function loadUpdatedCat()
    {
        $this->loadCategories();
    }
    public function fetchData($args)
    {
        $this->target = $args;
        if ($args == 'Junk') {
            $this->categories = Category::onlyTrashed()->where('service', ServiceType::REPAIR)->get();
        } else {
            $this->categories = Category::where('service', ServiceType::REPAIR)->where('status', $args)->get();
        }

    }

    public function selectCat(Category $category)
    {
        $this->emit('catSelected', $category->id);
        $this->selectedCat = $category;
        $this->emit('showM', 'edit-repair-cat');
    }

    public function loadCategories()
    {
        $this->fetchData($this->target);
    }

    public function softDelete(Category $category)
    {
        $category->update(['status' => Status::PAUSE]);
        $category->delete();
        $this->fetchData($this->target);
    }

    public function restore($item)
    {

        $category = Category::onlyTrashed()->find($item);
        $category->restore();
        $category->update(['status' => Status::PUBLISH]);
        $this->fetchData($this->target);
    }



    public function loadNextComponentData()
    {

        $this->data = [
            'title' => 'Device',
            'route' => 'repair-devices',
            'button_text' => 'Next'
        ];

    }
    public function clearForm()
    {
        $this->rand++;
    }

    public function toggleStatus(Category $category)
    {

        if ($category) {
            $category->update([
                'status' => $category->status == Status::PUBLISH ? Status::PAUSE : Status::PUBLISH
            ]);
        }
        $this->fetchData($this->target);
    }
    public function loadItems()
    {
        $this->items = [
            [
                'name' => 'Publish',
            ],
            [
                'name' => 'Pause',
            ],
            [
                'name' => 'Junk',
            ]
        ];
    }

    public function render()
    {
        return view('livewire.admin.repair.category.index')->layout('layouts.admin');
    }
}
