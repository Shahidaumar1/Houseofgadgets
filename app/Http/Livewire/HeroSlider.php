<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Slide;

class HeroSlider extends Component
{
    public $slides = [];
    public $placement = 'home_hero';
    public $limit = 4; // aapke 4 indicators ke hisaab se

    public function mount($placement = 'home_hero', $limit = 4)
    {
        $this->placement = $placement;
        $this->limit = (int) $limit;

        $q = Slide::query()
            ->where('is_active', 1)
            ->where('placement', $this->placement)
            ->orderBy('sort_order')
            ->orderBy('id');

        if ($this->limit > 0) {
            $q->take($this->limit);
        }

        $this->slides = $q->get();
    }

    public function render()
    {
        return view('livewire.hero-slider');
    }
}
