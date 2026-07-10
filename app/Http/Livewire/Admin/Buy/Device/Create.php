<?php

namespace App\Http\Livewire\Admin\Buy\Device;

use App\Helpers\ImageService;
use App\Helpers\ServiceType;
use App\Models\Category;
use App\Models\DeviceType;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $rand;
    public $categories;
    public $category;
    public $name;
    public $file;

    public function mount(Category $category)
    {

        $this->category = $category;

    }

    protected $rules = [
        'name' => 'required',
        'file' => 'required',

    ];

    public function save()
    {

        $this->validate([
            'name' => [
                Rule::unique('device_types', 'name')->where(function ($query) {
                    return $query->where('service', ServiceType::BUY)
                        ->where('category_id', $this->category->id);
                }),
            ],

        ]);

        $device = new DeviceType();
        $device->file = ImageService::upload($this->file)->url;
        $device->service = ServiceType::BUY;
        $device->name = $this->name;
        $device->category_id = $this->category->id;
        $device->save();
        $this->emit('closeM', 'add-buy-device');
        $this->emit('deviceCreated');
        $this->clearForm();
    }

    public function clearForm()
    {
        $this->rand++;
        $this->name = '';
    }

    protected $listeners = ['sendCatId'];
    public function sendCatId(Category $category)
    {
        $this->category = $category;
    }
    public function render()
    {
        return view('livewire.admin.buy.device.create');
    }
}