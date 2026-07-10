<?php

namespace App\Http\Livewire\Admin;

use App\Models\TermPolicy;
use Livewire\Component;

class TermsPolicy extends Component
{
    public $data;

    protected $rules = [
        'data.terms' => 'required',
        'data.policies' => 'required'
    ];
    public function mount()
    {
        $this->data = TermPolicy::first();
    }

    public function updated()
    {

        $this->validate();
        $dataExists = TermPolicy::count() > 0;
        if ($dataExists) {
            $data = TermPolicy::first();
            $data->terms = $this->data->terms;
            $data->policies = $this->data->policies;
            $data->save();
        } else {
            $data = new TermPolicy;
            $data->terms = $this->data['terms'];
            $data->policies = $this->data['policies'];
            $data->save();
        }
    }
    public function render()
    {
        return view('livewire.admin.terms-policy')->layout('admin.layouts.app');
    }
}