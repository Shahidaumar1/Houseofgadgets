<?php

namespace App\Http\Livewire\Components;

use App\Helpers\ServiceType;
use App\Helpers\Status;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use Livewire\Component;
use App\Models\FormStatus;

class MegaNav extends Component
{
    public $categories;
    public $selectedCatId;
    public $devices = [];
    public $show = false;
    public $selectedService;
    public $formStatuses;
    public $hoveredService = null;

    public function mount()
    {
        $this->selectedService = 'Sell'; // or default value
        $this->formStatuses = FormStatus::where('name', 'services')->first();
    }

    public function showDevices($serviceType)
    {
        $this->devices = [];
        $this->selectedCatId = null;
        $this->show = true;
        $this->selectedService = $serviceType;
        $this->categories = Category::where('service', $serviceType)->where('status', Status::PUBLISH)->get();
        $this->selectedCatId = $this->categories->first()->id;
        $this->devices = DeviceType::where('category_id', $this->selectedCatId)->with('modals')->get();
    }

    public function hideDevices()
    {
        $this->show = false;
    }

    public function toggleShow()
    {
        $this->show = !$this->show;
        $this->selectedService = null;
    }

    public function setHoveredService($serviceType)
    {
        $this->hoveredService = $serviceType;
        $this->showDevices($serviceType);
    }

    public function clearHoveredService()
    {
        $this->hoveredService = null;
        $this->hideDevices();
    }

  public function render()
{
    $categories = Category::all();
    if ($categories === null) {
        \Log::error('Categories fetch failed or returned null.');
    }

    return view('livewire.components.mega-nav', [
        'categories' => $categories,
        'formStatuses' => $this->formStatuses,
        'selectedService' => $this->selectedService,
        'show' => $this->show,
    ]);
}

}
