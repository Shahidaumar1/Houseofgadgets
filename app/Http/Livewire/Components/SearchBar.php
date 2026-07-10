<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use App\Models\DeviceType;
use App\Models\Modal;
use App\Models\Price;
use App\Models\RepairType;
use App\Helpers\SeoUrl;

class SearchBar extends Component
{
    public string $search = '';
    public Collection $results;

    public function mount()
    {
        $this->results = collect();
    }

    public function updatedSearch()
    {
        $term = trim($this->search);

        if (mb_strlen($term) < 3) {
            $this->results = collect();
            return;
        }

        // ---- EXACTS FIRST ----
        $exactModals = Modal::query()
            ->where('name', $term)
            ->whereHas('deviceType', fn($q) => $q->where('service','repair'))
            ->whereHas('prices', fn($q) => $q->where('price','>',0))
            ->with([
                'deviceType:id,name,service',
                'prices' => fn($q) => $q->where('price','>',0)->with('repairType:id,name')->limit(30),
            ])
            ->limit(10)->get();

        $exactRepairTypes = RepairType::query()
            ->where('name', $term)
            ->whereHas('prices', function ($q) {
                $q->where('price','>',0)
                  ->whereHas('modal.deviceType', fn($qq) => $qq->where('service','repair'));
            })
            ->with(['prices' => function ($q) {
                $q->where('price','>',0)
                  ->with([
                      'modal:id,name,device_type_id',
                      'modal.deviceType:id,name,service',
                      'repairType:id,name'
                  ])->limit(40);
            }])
            ->limit(5)->get();

        $exactDeviceTypes = DeviceType::query()
            ->where('service','repair')
            ->where('name', $term)
            ->whereHas('modals.prices', fn($q) => $q->where('price','>',0))
            ->with(['modals' => function ($q) {
                $q->select('id','name','device_type_id')
                  ->whereHas('prices', fn($qq) => $qq->where('price','>',0))
                  ->with(['prices' => fn($qq) => $qq->where('price','>',0)->with('repairType:id,name')->limit(30)])
                  ->limit(20);
            }])
            ->limit(3)->get();

        // ---- PARTIALS AFTER ----
        $deviceTypes = DeviceType::query()
            ->where('service','repair')
            ->where('name','like',"%{$term}%")
            ->whereHas('modals.prices', fn($q) => $q->where('price','>',0))
            ->with(['modals' => function ($q) {
                $q->select('id','name','device_type_id')
                  ->whereHas('prices', fn($qq) => $qq->where('price','>',0))
                  ->with(['prices' => fn($qq) => $qq->where('price','>',0)->with('repairType:id,name')->limit(20)])
                  ->limit(12);
            }])
            ->limit(5)->get();

        $modals = Modal::query()
            ->where('name','like',"%{$term}%")
            ->where('name','!=',$term)
            ->whereHas('deviceType', fn($q) => $q->where('service','repair'))
            ->whereHas('prices', fn($q) => $q->where('price','>',0))
            ->with([
                'deviceType:id,name,service',
                'prices' => fn($q) => $q->where('price','>',0)->with('repairType:id,name')->limit(30),
            ])
            ->limit(12)->get();

        $prices = Price::query()
            ->with([
                'modal:id,name,device_type_id',
                'modal.deviceType:id,name,service',
                'repairType:id,name'
            ])
            ->where(function ($q) use ($term) {
                $q->where('price','like',"%{$term}%")
                  ->orWhereHas('modal', fn($qq) => $qq->where('name','like',"%{$term}%"))
                  ->orWhereHas('repairType', fn($qq) => $qq->where('name','like',"%{$term}%"));
            })
            ->whereHas('modal.deviceType', fn($q) => $q->where('service','repair'))
            ->where('price','>',0)
            ->limit(15)->get();

        $repairTypes = RepairType::query()
            ->where('name','like',"%{$term}%")
            ->whereHas('prices', function ($q) {
                $q->where('price','>',0)
                  ->whereHas('modal.deviceType', fn($qq) => $qq->where('service','repair'));
            })
            ->with(['prices' => function ($q) {
                $q->where('price','>',0)
                  ->with([
                      'modal:id,name,device_type_id',
                      'modal.deviceType:id,name,service',
                      'repairType:id,name'
                  ])->limit(30);
            }])
            ->limit(8)->get();

        $this->results = collect()
            ->concat($exactModals)
            ->concat($exactRepairTypes)
            ->concat($exactDeviceTypes)
            ->concat($deviceTypes)
            ->concat($modals)
            ->concat($prices)
            ->concat($repairTypes);
    }

    public function navigate($type, $id)
    {
        if ($type === 'deviceType') {
            $deviceType = DeviceType::find($id);
            if ($deviceType) {
                Log::info('Device type found. Device ID: ' . $deviceType->id);
                return redirect()->route('modals', ['device' => $deviceType->id]);
            }
            Log::warning('Device type not found for ID ' . $id);
            abort(404);
        } elseif ($type === 'modal') {
            $modal = Modal::with('deviceType')->find($id);
            if ($modal && $modal->deviceType) {
                Log::info('Redirecting to repair-types. Device ID: ' . $modal->deviceType->id . ', Modal ID: ' . $modal->id);
                return redirect()->route('repair-types', ['device' => $modal->deviceType->id, 'modal' => $modal->id]);
            }
            Log::warning('Modal or device type missing for ID ' . $id);
            abort(404);
        } elseif ($type === 'price') {
            $price = Price::with('modal.deviceType', 'repairType')->find($id);
            if ($price && $price->modal && $price->modal->deviceType && $price->repairType) {
                session(['repair_price' => $price->price]);
                $modalSlug  = SeoUrl::encodeUrl($price->modal->name);
                $deviceSlug = SeoUrl::encodeUrl($price->modal->deviceType->name);
                $repairSlug = SeoUrl::encodeUrl($price->repairType->name);
                Log::info('Redirecting to repair detail. Device: '.$deviceSlug.' Modal: '.$modalSlug.' Repair: '.$repairSlug);
                return redirect()->route('repair-detail', [
                    'device' => $deviceSlug,
                    'modal'  => $modalSlug,
                    'repair' => $repairSlug
                ]);
            }
            Log::warning('Price/modal/deviceType/repairType missing for ID ' . $id);
            abort(404);
        } elseif ($type === 'repairType') {
            $repairType = RepairType::with('prices.modal.deviceType')->find($id);
            if ($repairType && $repairType->prices->isNotEmpty()) {
                $first = $repairType->prices->first();
                session(['repair_price' => $first->price]);
                Log::info('Redirecting (via repairType) to repair detail.');
                return redirect()->route('repair-detail', [
                    'device' => $first->modal->deviceType->name,
                    'modal'  => $first->modal->name,
                    'repair' => $repairType->name,
                ]);
            }
            Log::warning('No prices for Repair Type ID ' . $id);
            abort(404);
        }

        Log::warning('Invalid type or ID: ' . $type . ', ' . $id);
        abort(404);
    }

    public function render()
    {
        return view('livewire.components.search-bar');
    }
}
