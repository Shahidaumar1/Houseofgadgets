<?php

namespace App\Http\Livewire\Admin\Settings\SiteSettings;

use Illuminate\Support\Facades\Storage;
use App\Models\SiteSetting;
use Livewire\Component;
use Livewire\WithFileUploads;

class SiteSettings extends Component
{
    use WithFileUploads;
    public $test;
    public $data;
    public $logo;
    public $favicon;
    public $siteSetting;

    protected $rules = [
        // 'siteSetting.meta_title' => 'required|string',
        'siteSetting.buisness_name' => 'nullable|string',
              'siteSetting.google_map_profile_link' => 'nullable|url', 
        'siteSetting.website_url' => 'nullable|url',
        'siteSetting.fb_link' => 'nullable|url',
        'siteSetting.insta_link' => 'nullable|url',
        'siteSetting.linkedin_link' => 'nullable|url',
        'siteSetting.twitter_link' => 'nullable|url',
        'siteSetting.logo' => 'nullable|image|max:2048',
        'siteSetting.favicon' => 'nullable|image|max:2048',
        'siteSetting.tiktok_link' => 'nullable|url',
        'siteSetting.snapchat_link' => 'nullable|url',
        'siteSetting.map_link' => 'nullable|string|html',
        'siteSetting.whatsapp_number' => 'nullable|string|max:20',
         'siteSetting.repair_time' => 'nullable|string|max:255',
    'siteSetting.warranty' => 'nullable|string|max:255',

        // Add sometimes rule for toggle fields
        // 'siteSetting.meta_title_status' => 'sometimes|boolean',
        'siteSetting.google_map_profile_link_status' => 'sometimes|boolean',
        'siteSetting.fb_link_status' => 'sometimes|boolean',
        'siteSetting.insta_link_status' => 'sometimes|boolean',
        'siteSetting.linkedin_link_status' => 'sometimes|boolean',
        'siteSetting.twitter_link_status' => 'sometimes|boolean',
        'siteSetting.tiktok_link_status' => 'sometimes|boolean',
        'siteSetting.snapchat_link_status' => 'sometimes|boolean',
    ];

    public function render()
    {
        return view('livewire.admin.settings.site-settings.site-settings')->layout('layouts.admin');
    }

    public function mount()
    {
        $this->siteSetting = SiteSetting::first();
        $this->loadNextComponentData();
    }

    public function updateSiteSettings()
    {



        // $this->test = "assets/logo/logo.png";
        if ($this->siteSetting->logo) {
            // $this->siteSetting->logo->delete();
        }

        if ($this->siteSetting->favicon) {
            // $this->siteSetting->favicon->delete();
        }

        if ($this->logo) {
            $this->siteSetting->logo = $this->logo->storeAs('logo', $this->logo->getClientOriginalName(), 'custom');
            // $this->siteSetting->logo = $this->logo->store('public');
        }

        if ($this->favicon) {
            $this->siteSetting->favicon = $this->favicon->storeAs('logo', $this->favicon->getClientOriginalName(), 'custom');
        }

  // Save Repair Time and Warranty
    $this->siteSetting->repair_time = $this->siteSetting->repair_time;
    $this->siteSetting->warranty = $this->siteSetting->warranty;
    
        $this->siteSetting->save();

        $this->emit('siteUpdated');
    }

    public function loadNextComponentData()
    {

        $this->data = [
            'title' => 'Device',
            'route' => 'buy-devices',
            'button_text' => 'Next'
        ];
    }
}
