<?php

namespace App\Http\Livewire\Components\Slider;

use App\Models\DeviceType;
use Livewire\Component;
use App\Helpers\SeoUrl;
use App\Models\Modal;

class SearchForm extends Component
{
    public $selectedDeviceType;
    public $selectedModal;
    public $device_types;
    public $modals;
    public $device_type;
    public $modal;

    public function mount()
    {
        $this->device_types = DeviceType::all();
        $this->modals = [];
    }

    public function selectDeviceType($device_type)
    {
        $this->selectedDeviceType = $device_type;
        $this->device_type = DeviceType::where('id', $device_type)->first();
        $this->modals = $this->device_type->modals;

    }

    public function selectModal($modal)
    {
        $this->selectedModal = $modal;
        if ($this->selectedModal) {
            $this->modal = Modal::where('id', $this->selectedModal)->first();
        }
    }

    public function Go()
    {


        $d = SeoUrl::encodeUrl($this->device_type->name);
        $m = SeoUrl::encodeUrl($this->modal->name);
        return redirect()->route('repair-types', ['device' => $d, 'modal' => $m]);
    }
    public function render()
    {
        return view('livewire.components.slider.search-form')->layout('frontend.layouts.app');
    }
}