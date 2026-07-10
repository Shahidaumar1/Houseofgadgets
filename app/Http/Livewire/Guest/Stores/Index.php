<?php

namespace App\Http\Livewire\Guest\Stores;

use Livewire\Component;
use App\Models\Branch;

class Index extends Component
{
    public $branches;
    public $map_link;
    public $nearestBraches = [];
    public $latitude;
    public $longitude;


    protected $listeners = ['updateLocation' => 'handleUpdateLocation'];
    public function mount()
    {
        $this->getBranches();
    }
    public function getBranches($limit = null)
    {
        $branches = Branch::limit($limit ?? 100)->get();
        $this->branches = $branches;
        $this->map_link = ($branches->first())->map_link;
    }
    public function getMap(Branch $branch)
    {
        // $branches = Branch::limit($limit ?? 100)->get();
        // $this->branches = $branches;
        $this->map_link = $branch->map_link;
    }

    public function handleUpdateLocation($location)
    {
        $this->latitude = $location['latitude'];
        $this->longitude = $location['longitude'];

        // Add logic to find nearest branches or perform other actions
        $this->findNearestBraches();
    }
    public function findNearestBraches()
    {
        $branches = Branch::all();

        // Calculate distances and sort the branches

        $this->nearestBraches = $branches->map(function ($branch) {
            $distance = $this->calculateDistance($this->latitude, $this->longitude, $branch->latitude, $branch->longitude);

            return [
                'branch' => $branch,
                'distance' => $distance,
            ];
        })->sortBy('distance')->values();
        // dd($this->nearestBraches);

        foreach ($this->nearestBraches as $branch) {
            $this->map_link = $branch['branch']['map_link'];
            if ($this->map_link)
                break;
        }
    }
    public function calculateDistance($userLat, $userLng, $branchLat, $branchLng)
    {
        $earthRadius = 6371; // Earth radius in kilometers

        $latDiff = deg2rad($branchLat - $userLat);
        $lngDiff = deg2rad($branchLng - $userLng);

        $a = sin($latDiff / 2) * sin($latDiff / 2) +
            cos(deg2rad($userLat)) * cos(deg2rad($branchLat)) *
            sin($lngDiff / 2) * sin($lngDiff / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        $distance = $earthRadius * $c;
        // km to mile + 25% for turns of roads
        return (($distance + $distance * 0.25) / 1.60934);
    }
    public function render()
    {
        return view('livewire.guest.stores.index')->layout('frontend.layouts.app');
    }
}
