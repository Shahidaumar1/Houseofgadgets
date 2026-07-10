<?php

namespace App\Http\Livewire\Guest;

use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use Livewire\Component;
use Illuminate\Http\Request;

class RepairTypes extends Component
{
    public $category;
    public $device;
    public $modal;
    public $repair_types = [];

    public function mount(Category $category, DeviceType $device, Modal $modal)
    {
        $this->category = $category;
        $this->device = $device;
        $this->modal = $modal;
        $this->repair_types = $this->device ? $this->device->repair_types : [];
    }

    public function storeRepairPrice(Request $request, $category, $device, $modal, $repair, $price)
    {
        session(['repair_price' => $price]);

        return redirect()->route('repair-detail', [
            'category' => $category,
            'device' => $device,
            'modal' => $modal,
            'repair' => $repair,
        ]);
    }

    public function render()
    {
        return view('livewire.guest.repair-types')->layout('frontend.layouts.app');
    }
}