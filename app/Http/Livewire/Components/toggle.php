<?php

namespace App\Http\Livewire\Components;


use App\Helpers\ServiceType;
use App\Helpers\Status;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use Livewire\Component;
use App\Models\FormStatus;
class toggle extends Component
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
    $this->selectedService = 'Sell'; // Default service or based on user selection
    $this->formStatuses = FormStatus::where('name', 'services')->first();
    
    // Define deviceTypeIds for 'Sell' (specific IDs)
    $deviceTypeIds = [3, 72, 73, 74, 75];

    // Fetch categories for 'Sell' with custom device_type_ids
    $this->sellCategories = Modal::where('service', 'Sell')
        ->where('status', 'Publish')
        ->whereIn('device_type_id', $deviceTypeIds)
        ->groupBy('device_type_id')
        ->select('device_type_id')
        ->with(['deviceType' => function ($query) {
            $query->select('id', 'name');
        }])
        ->get()
        ->mapWithKeys(function ($category) {
            return [$category->device_type_id => [
                'name' => $category->deviceType->name,
                'items' => Modal::where('device_type_id', $category->device_type_id)
                    ->where('service', 'Sell')
                    ->where('status', 'Publish')
                    ->take(10)
                    ->get(['id', 'name'])
            ]];
        });

    // Fetch only 5 categories for 'Buy'
    $this->buyCategories = Modal::where('service', 'Buy')
        ->where('status', 'Publish')
        ->groupBy('device_type_id')
        ->select('device_type_id')
        ->with(['deviceType' => function ($query) {
            $query->select('id', 'name');
        }])
        ->limit(5) // Limit to 5 device types
        ->get()
        ->mapWithKeys(function ($category) {
            return [$category->device_type_id => [
                'name' => $category->deviceType->name,
                'items' => Modal::where('device_type_id', $category->device_type_id)
                    ->where('service', 'Buy')
                    ->where('status', 'Publish')
                    ->take(10)
                    ->get(['id', 'name'])
            ]];
        });

    // Fetch only 5 categories for 'Repair'
    $this->repairCategories = Modal::where('service', 'Repair')
        ->where('status', 'Publish')
        ->groupBy('device_type_id')
        ->select('device_type_id')
        ->with(['deviceType' => function ($query) {
            $query->select('id', 'name');
        }])
        ->limit(5) // Limit to 5 device types for Repair
        ->get()
        ->mapWithKeys(function ($category) {
            return [$category->device_type_id => [
                'name' => $category->deviceType->name,
                'items' => Modal::where('device_type_id', $category->device_type_id)
                    ->where('service', 'Repair')
                    ->where('status', 'Publish')
                    ->take(10)
                    ->get(['id', 'name'])
            ]];
        });
}

  public function render()
{
    $categories = Category::all();
    if ($categories === null) {
        \Log::error('Categories fetch failed or returned null.');
    }

    return view('livewire.components.toggle', [
        'categories' => $categories,
        'formStatuses' => $this->formStatuses,
        'selectedService' => $this->selectedService,
        'show' => $this->show,
    ]);
}



}
