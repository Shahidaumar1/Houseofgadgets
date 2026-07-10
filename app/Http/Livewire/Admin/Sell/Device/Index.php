<?php

namespace App\Http\Livewire\Admin\Sell\Device;

use App\Helpers\ServiceType;
use App\Helpers\Status;
use App\Models\Category;
use App\Models\DeviceType;
use Livewire\Component;

class Index extends Component
{

    public $devices;
    public $selectedDevice;
    public $data;
    public $categories;
    public $selectedCategory;
    public $selectedCatId;
    public $target = 'Publish';


    protected $rules = [
        'selectedCatId' => 'nullable'
    ];
    public function mount(Category $category)
    {
        // $this->authorize('')
        $this->categories = Category::where('service', ServiceType::SELL)->get();
        if ($this->categories->count() > 0) {
            $this->selectedCategory = $category->exists ? $category : $this->categories[0];
            $this->selectedCatId = $category->id;
        }
        $this->loadDevices();
        $this->loadNextComponentData();
        $this->loadItems();

    }

    protected $listeners = ['deviceCreated' => 'loadUpdatedDevices', 'deviceUpdated' => 'loadUpdatedDevices', 'loadArgsData' => 'fetchData'];

    public function loadUpdatedDevices()
    {

        $this->loadDevices();
    }

    public function updated($property)
    {
        if ($property == 'selectedCatId') {
            $this->selectedCategory = Category::where('id', $this->selectedCatId)->first();
            $this->loadDevices();
            $this->emit('sendCatId', $this->selectedCategory->id);
        }

    }

    public function selectDevice(DeviceType $deivce)
    {
        $this->emit('deviceSelected', $deivce->id);
        $this->selectedDevice = $deivce;
        $this->emit('showM', 'edit-sell-device');
    }

    public function loadNextComponentData()
    {

        $this->data = [
            'title' => 'Models',
            'route' => 'sell-models',
            'button_text' => 'Next'
        ];

    }
    public function toggleStatus(DeviceType $device)
    {

        if ($device) {
            $device->update([
                'status' => $device->status == Status::PUBLISH ? Status::PAUSE : Status::PUBLISH
            ]);

            $this->loadDevices();
        }
    }
    public function toggleOthers(Category $category)
    {

        if ($category) {
            $category->update([
                'others' => !$category->others
            ]);
            $this->loadDevices();
        }
    }


    public function fetchData($args)
    {
        $this->target = $args;
        if ($args == 'Junk') {
            $this->devices = $this->selectedCategory ? DeviceType::onlyTrashed()->where('service', ServiceType::SELL)->get() : [];
        } else {
            $this->devices = $this->selectedCategory ? DeviceType::where('category_id', $this->selectedCategory->id)->where('status', $args)->get() : [];

        }

    }

    public function loadDevices()
    {
        $this->fetchData($this->target);
    }

    public function softDelete(DeviceType $device)
    {
        $device->update(['status' => Status::PAUSE]);
        $device->delete();
        $this->fetchData($this->target);
    }

    public function restore($item)
    {

        $device = DeviceType::onlyTrashed()->find($item);
        $device->restore();
        $device->update(['status' => Status::PUBLISH]);
        $this->fetchData($this->target);
    }

    public function loadItems()
    {
        $this->items = [
            [
                'name' => 'Publish',
            ],
            [
                'name' => 'Pause',
            ],
            [
                'name' => 'Junk',
            ]
        ];
    }

    public function render()
    {
        return view('livewire.admin.sell.device.index')->layout('layouts.admin');
    }
}