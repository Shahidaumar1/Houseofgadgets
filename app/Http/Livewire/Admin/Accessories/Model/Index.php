<?php

namespace App\Http\Livewire\Admin\Accessories\Model;

use App\Helpers\ServiceType;
use App\Helpers\Status;
use App\Http\Livewire\Guest\Sell\Models;
use App\Models\Category;
use App\Models\DeviceType;
use App\Models\Modal;
use Livewire\Component;

class Index extends Component
{
    public $categories = [];
    public $selectedCat;
    public $selectedCatId;
    public $models;
    public $selectedModel;
    public $data;
    public $devices;
    public $selectedDevice;
    public $selectedDeviceId;
    public $activeView = 'card';
    public $target = 'Publish';
    public $items = [];



    protected $rules = [
        'selectedDeviceId' => 'nullable'
    ];
    protected $listeners = ['modelCreated' => 'loadUpdatedModels', 'modelUpdated' => 'loadUpdatedModels', 'loadArgsData' => 'fetchData'];

    public function mount(DeviceType $device)
    {
        $this->categories = Category::where('service', ServiceType::ACCESSORIES)->get();
        if ($this->categories->count() > 0) {
            $this->selectedCat = $this->categories[0];
            $this->selectedCatId = $this->selectedCat->id;
            $this->devices = DeviceType::where('category_id', $this->selectedCatId)->get();
            $this->selectedDevice = $this->devices[0];
            $this->selectedDeviceId = $this->selectedDevice->id;
        }
        $this->loadModels();
        $this->loadNextComponentData();
        $this->loadItems();
    }

    public function updateOrderNumber($orders)
    {
        foreach ($orders as $order) {
            Modal::where('id', (int)$order['value'])->update(['order_number' => $order['order']]);
        }

        $this->loadModels();
    }
    public function loadUpdatedModels()
    {

        $this->loadModels();
    }

    public function updated($property)
    {

        if ($property == 'selectedCatId') {
            $this->devices = DeviceType::where('category_id', $this->selectedCatId)->get();
        }
        if ($property == 'selectedDeviceId') {
            $this->selectedDevice = DeviceType::where('id', $this->selectedDeviceId)->first();
            $this->loadModels();
            $this->emit('deviceId', $this->selectedDevice->id);
        }
    }

    public function selectModel(Modal $modal)
    {
        $this->emit('modelSelected', $modal->id);
        $this->selectedModel = $modal;
        $this->emit('showM', 'edit-buy-model');
    }

    public function loadNextComponentData()
    {

        $this->data = [
            'title' => 'Devices',
            'route' => 'buy-devices',
            'button_text' => 'Back'
        ];
    }


    public function toggleStatus(Modal $modal)
    {

        if ($modal) {
            $modal->update([
                'status' => $modal->status == Status::PUBLISH ? Status::PAUSE : Status::PUBLISH
            ]);

            $this->fetchData($this->target);
        }
    }
    public function activateView($args)
    {
        $this->activeView = $args;
    }

    public function fetchData($args)
    {
        $this->target = $args;
        if ($args == 'Junk') {
            $this->models = $this->selectedDevice ? Modal::onlyTrashed()->where('service', ServiceType::ACCESSORIES)->get() : [];
        } else {
            $this->models = $this->selectedDevice ? Modal::where('device_type_id', $this->selectedDevice->id)->where('status', $args)->get() : [];
        }
        if ($args == 'Top Rated') {
            $this->models = $this->selectedDevice ? Modal::where('service', ServiceType::ACCESSORIES)->where('top_rated', true)->get() : [];
        }
        if ($args == 'New Arrival') {
            $this->models = $this->selectedDevice ? Modal::where('service', ServiceType::ACCESSORIES)->where('new_arrival', true)->get() : [];
        }
    }

    public function loadModels()
    {
        $this->fetchData($this->target);
    }

    public function softDelete(Modal $model)
    {
        $model->update(['status' => Status::PAUSE]);
        $model->delete();
        $this->fetchData($this->target);
    }

    public function restore($item)
    {

        $model = Modal::onlyTrashed()->find($item);
        $model->restore();
        $model->update(['status' => Status::PUBLISH]);
        $this->fetchData($this->target);
    }

    public function setTopRated(Modal $model)
    {
        $model->update(['top_rated' => !$model->top_rated]);
        $this->fetchData($this->target);
    }
    public function setNewArrival(Modal $model)
    {
        $model->update(['new_arrival' => !$model->new_arrival]);
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
                'name' => 'Top Rated',
            ],
            [
                'name' => 'New Arrival',
            ],
            [
                'name' => 'Junk',
            ]
        ];
    }
    public function render()
    {
        return view('livewire.admin.accessories.model.index')->layout('layouts.admin');
    }
}
