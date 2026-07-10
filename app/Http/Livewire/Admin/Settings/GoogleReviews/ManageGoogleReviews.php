<?php

namespace App\Http\Livewire\Admin\Settings\GoogleReviews;

use Livewire\Component;
use App\Models\GoogleReviewsSetting;

class ManageGoogleReviews extends Component
{
    public $form = [
        'rating'        => 5.0,
        'reviews_count' => 0,
        'review_url'    => '#',
    ];

    protected $rules = [
        'form.rating'        => 'required|numeric|min:0|max:5',
        'form.reviews_count' => 'required|integer|min:0',
        'form.review_url'    => 'required|url',
    ];

    public function mount()
    {
        $row = GoogleReviewsSetting::getSingleton();
        $this->form['rating']        = (float) ($row->rating ?? 5.0);
        $this->form['reviews_count'] = (int)   ($row->reviews_count ?? 0);
        $this->form['review_url']    = (string)($row->review_url ?? '#');
    }

    public function save()
    {
        $this->validate();

        $row = GoogleReviewsSetting::getSingleton();
        $row->fill($this->form);
        $row->save();

        $this->dispatchBrowserEvent('notify', ['type' => 'success', 'message' => 'Google reviews updated.']);
        session()->flash('success', 'Google reviews updated.');
    }

    public function render()
    {
        return view('livewire.admin.settings.google-reviews.manage-google-reviews');
    }
}
