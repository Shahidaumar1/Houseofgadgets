<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class CkEditor extends Component
{

    public $content = '';
    public $target;



    public function mount($target, $model)
    {

        $this->content = $model;
        $this->target = $target;


    }


    public function updatedContent($value)
    {

        $data = [
            'value' => $value,
            'model' => $this->target
        ];
       $this->emit('updatedContent', $data);
    }


    public function render()
    {
        return view('livewire.components.ck-editor');
    }
}
