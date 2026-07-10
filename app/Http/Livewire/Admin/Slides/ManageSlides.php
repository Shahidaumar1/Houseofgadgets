<?php

namespace App\Http\Livewire\Admin\Slides;

use Livewire\Component;
use App\Models\Slide;

class ManageSlides extends Component
{
    public $slides = [];

    // form fields
    public $slideId = null;
    public $title = '';
    public $image_path = '';
    public $link_url = '';
    public $sort_order = 0;
    public $is_active = true;
    public $placement = 'home_hero';

    protected function rules()
    {
        return [
            'title'      => 'nullable|string|max:255',
            'image_path' => 'required|string|max:255',
            'link_url'   => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active'  => 'boolean',
            'placement'  => 'required|string|max:50',
        ];
    }

    public function mount()
    {
        $this->loadSlides();
    }

    public function loadSlides()
    {
        $this->slides = Slide::orderBy('placement')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
    }

    public function resetForm()
    {
        $this->slideId = null;
        $this->title = '';
        $this->image_path = '';
        $this->link_url = '';
        $this->sort_order = 0;
        $this->is_active = true;
        $this->placement = 'home_hero';
    }

    public function editSlide($id)
    {
        $s = Slide::findOrFail($id);
        $this->slideId   = $s->id;
        $this->title     = $s->title;
        $this->image_path= $s->image_path;
        $this->link_url  = $s->link_url;
        $this->sort_order= $s->sort_order;
        $this->is_active = (bool) $s->is_active;
        $this->placement = $s->placement;
        $this->dispatchBrowserEvent('scroll-top');
    }

    public function deleteSlide($id)
    {
        Slide::whereKey($id)->delete();
        $this->loadSlides();
        $this->resetForm();
        session()->flash('ok', 'Slide deleted.');
    }

    public function toggleActive($id)
    {
        $s = Slide::findOrFail($id);
        $s->is_active = ! $s->is_active;
        $s->save();
        $this->loadSlides();
    }

    // public function saveSlide()
    // {
    //     $data = $this->validate();

    //     if ($this->slideId) {
    //         Slide::whereKey($this->slideId)->update($data);
    //         session()->flash('ok', 'Slide updated.');
    //     } else {
    //         Slide::create($data);
    //         session()->flash('ok', 'Slide created.');
    //     }

    //     $this->loadSlides();
    //     $this->resetForm();
    // }
public function saveSlide()
{
    $data = $this->validate();

    // 🧠 Automatically detect video or image
    $data['media_type'] = (str_ends_with(strtolower($this->image_path), '.mp4') ||
                           str_contains(strtolower($this->image_path), 'video'))
                           ? 'video'
                           : 'image';

    if ($this->slideId) {
        Slide::whereKey($this->slideId)->update($data);
        session()->flash('ok', 'Slide updated.');
    } else {
        Slide::create($data);
        session()->flash('ok', 'Slide created.');
    }

    $this->loadSlides();
    $this->resetForm();
}

    public function render()
    {
        return view('livewire.admin.slides.manage-slides');
    }
}
