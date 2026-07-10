<?php

namespace App\Http\Livewire\Admin\Unlocking\Category;

use App\Helpers\ImageKit;
use App\Helpers\ImageService;
use App\Helpers\ServiceType;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;


class Create extends Component
{
    use WithFileUploads;
    public $rand;
    public $file;
    public $name;

    public function save()
    {

        $this->validate(
            [
                'name' => [
                    'required',
                    Rule::unique('categories')->where(function ($query) {
                        return $query->where('name', $this->name)
                            ->where('service', ServiceType::UNLOCKING);
                    }),
                ],
                'file' => 'required',
            ]
        );
        $category = new Category();
        $category->name = $this->name;
        $category->file = ImageService::upload($this->file)->url;
        $category->service = ServiceType::UNLOCKING;
        $category->save();
        $this->emit('closeM', 'add-unlock-cat');
        $this->emit('categoryCreated');
        $this->clearForm();
    }

    public function clearForm()
    {
        $this->rand++;
        $this->name = '';
    }
    public function render()
    {
        return view('livewire.admin.unlocking.category.create')->layout('layouts.admin');
    }
}
