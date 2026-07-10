<?php

namespace App\Http\Livewire\Admin\Unlocking\Category;

use App\Helpers\ImageService;
use App\Helpers\ServiceType;
use App\Helpers\Status;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $rand;
    public $category;
    public $file;

    protected $rules = [
        'category.name' => 'required',
    ];


    protected $listeners = ['catSelected'];
    public function catSelected(Category $category)
    {
        $this->category = $category;
    }


    public function update()
    {

        if ($this->file) {
            $this->category->file = ImageService::upload($this->file)->url;
        }
        $this->category->save();
        $this->clearForm();
        $this->emit('categoryUpdated', $this->category->id);
        $this->emit('closeM', 'edit-unlock-cat');
    }
    public function clearForm()
    {
        $this->rand++;
    }
    public function render()
    {
        return view('livewire.admin.unlocking.category.edit')->layout('layouts.admin');
    }
}
