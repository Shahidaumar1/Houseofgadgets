<?php

namespace App\Http\Livewire\Guest\Sell;

use App\Helpers\ServiceType;
use App\Helpers\Status;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Categories extends Component
{
    public $paragraphText;
    public $headupText;

    public $categories = [];

    protected $listeners = ['textUpdated']; // Listen for the textUpdated event




    public function mount()
    {
        $this->categories = Category::where('service', ServiceType::SELL)->where('status', Status::PUBLISH)->get();
        $this->paragraphText = Session::get('inputText', '');
        $this->headupText = Session::get('inputText2', '');
    }
    public function render()
    {
        return view('livewire.guest.sell.categories')->layout('frontend.layouts.app');
    }
}
