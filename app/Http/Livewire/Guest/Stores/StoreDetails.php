<?php
namespace App\Http\Livewire\Guest\Stores;

use Livewire\Component;
use App\Models\Branch;
use App\Models\AppointmentTimeSlot;
use App\Helpers\SeoUrl;

class StoreDetails extends Component
{
    public $branch;
    public $map_link;
    public $timeSlots = [];

    // Expect the branch name or slug in the mount method
    public function mount($branchSlug)
    {
        // Decode the slug to get the branch name
        $branchName = SeoUrl::decodeUrl($branchSlug);

        // Find the branch by name
        $this->branch = Branch::where('town_city', $branchName)->firstOrFail();
        
        // Set the map link and fetch the appointment time slots for the branch
        $this->map_link = $this->branch->map_link;

        $this->timeSlots = AppointmentTimeSlot::where('branch_id', $this->branch->id)
            ->get();
    }

    public function render()
    {
        return view('livewire.guest.stores.store-details')->layout('frontend.layouts.app');
    }
}
