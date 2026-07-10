<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\DeviceType;
use App\Helpers\Status;

class BrandSeries extends Component
{
    public DeviceType $device;   // the brand (e.g., Apple or Samsung)
    public $series = [];         // array of ['label'=>..., 'href'=>..., 'file'=>...]

    public function mount(DeviceType $device)
    {
        $this->device = $device;
        $name = trim($device->name ?? '');

        if (stripos($name, 'Apple') !== false) {
            // Build Apple series from Apple models
            $models = $device->modals()
                ->where(function ($q) {
                    $q->where('status', Status::PUBLISH)
                      ->orWhere('status', 1)
                      ->orWhere('status', '1')
                      ->orWhere('status', true);
                })->get();

            // Series key
            $seriesKey = function ($n) {
                if (preg_match('/\b(?:apple\s*)?iphone\s*(\d{1,2})\b/iu', $n, $m)) return ltrim($m[1], '0');
                if (preg_match('/\biphone\s*x(s|r)?\b/iu', $n)) return 'X';
                if (preg_match('/\biphone\s*se\b/iu', $n)) return 'SE';
                return null;
            };

            $grouped = [];
            foreach ($models as $m) {
                $k = $seriesKey($m->name ?? '');
                if (!$k) continue;
                $grouped[$k] = true;
            }

            // Order numeric desc, then X, SE
            $nums = collect(array_keys($grouped))
                ->filter(fn($k)=>is_numeric($k))
                ->map(fn($k)=>(int)$k)->sortDesc()->map(fn($k)=>(string)$k)->values()->all();
            $fixed = array_values(array_filter(['X','SE'], fn($k)=> isset($grouped[$k])));

            $ordered = array_merge($nums, $fixed);

            $this->series = array_map(function($k) use ($device) {
                $label = is_numeric($k) ? "iPhone {$k} Series" : ($k==='X' ? 'iPhone X Series' : 'iPhone SE Series');
                $href  = route('modals', ['device' => $device->id]) . '?series=' . urlencode($k);
                return ['label'=>$label, 'href'=>$href, 'file'=> $device->file ?? ''];
            }, $ordered);

        } elseif (stripos($name, 'Samsung') !== false) {
            // Show Samsung *Series* device_types as cards (S/Z/Note/A/J ...)
            $prefer = [
                'Samsung Galaxy Z Series',
                'Samsung Galaxy S Series',
                'Samsung Galaxy Note Series',
                'Samsung Galaxy A Series',
                'Samsung Galaxy J Series',
            ];

            $rows = DeviceType::query()
                ->where('name', 'like', 'Samsung Galaxy % Series')
                ->orderBy('name')
                ->get();

            // Reorder by $prefer
            $rows = $rows->sortBy(function($d) use ($prefer){
                $idx = array_search(trim($d->name), $prefer);
                return $idx === false ? 999 : $idx;
            })->values();

            $this->series = $rows->map(fn($r)=>[
                'label' => $r->name,
                'href'  => route('modals', $r->id),
                'file'  => $r->file ?? '',
            ])->all();
        } else {
            // For other brands, send directly to models (still show a single card)
            $this->series = [[
                'label' => $this->device->name,
                'href'  => route('modals', $this->device->id),
                'file'  => $this->device->file ?? '',
            ]];
        }
    }

    public function render()
    {
        return view('livewire.guest.brand-series')->layout('frontend.layouts.app');
    }
}
