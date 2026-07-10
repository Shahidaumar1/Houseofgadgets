<?php

namespace App\Http\Livewire\Admin\Repair\Category;

use App\Helpers\ImageService;
use App\Helpers\ServiceType;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

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
                            ->where('service', ServiceType::REPAIR);
                    }),
                ],
                'file' => 'required',
            ]
        );
        $category = new Category();
        $category->name = $this->name;
        $category->file = ImageService::upload($this->file)->url;
        $category->service = ServiceType::REPAIR;
        $category->save();
        $this->emit('closeM', 'add-repair-cat');
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
        return view('livewire.admin.repair.category.create')->layout('layouts.admin');
    }
}
