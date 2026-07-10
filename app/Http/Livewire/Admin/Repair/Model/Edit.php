<?php

namespace App\Http\Livewire\Admin\Repair\Model;

use App\Helpers\ImageService;
use App\Models\Modal;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $rand;
    public $model;
    public $file;

    protected $rules = [
        'model.name'   => 'required',
        'model.status' => 'required',
    ];

    protected $listeners = ['modelSelected'];

    public function modelSelected(Modal $model)
    {
        $this->model = $model;
        $this->rand  = rand();
    }

    public function update()
    {
        $this->validate();

        if ($this->file) {
            $this->model->file = ImageService::upload($this->file)->url;
        }

        $this->model->save();

        $this->clearForm();
        $this->emit('modelUpdated', $this->model->id);
        $this->emit('closeM', 'edit-repair-model');
    }

    public function clearForm()
    {
        $this->rand = rand();
        $this->file = null;
    }

    public function render()
    {
        return view('livewire.admin.repair.model.edit')
            ->layout('layouts.admin');
    }
}

