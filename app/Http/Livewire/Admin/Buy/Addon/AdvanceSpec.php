<?php

namespace App\Http\Livewire\Admin\Buy\Addon;

use App\Models\AdvanceProductSpec;
use App\Models\MasterSpecTitle;
use App\Models\Modal;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;

class AdvanceSpec extends Component
{
    public $titles;
    public $title;
    public $selectedTitle;
    public $value;
    public $model;

    public function mount(Modal $model)
    {
        $this->model = $model;
        $this->titles = MasterSpecTitle::all();
    }
    public function addTitle()
    {
        $this->validate([
            'title' => 'required|unique:master_spec_titles,title'
        ]);

        $newTitle = new MasterSpecTitle();
        $newTitle->title = $this->title;
        $newTitle->save();
        $titleName = $this->title;
        if (!Schema::hasColumn('advance_product_specs', $titleName)) {
            Schema::table('advance_product_specs', function (Blueprint $table) use ($titleName) {
                $table->string($titleName)->nullable();
            });
        }
        $this->title = '';
        $this->titles = MasterSpecTitle::all();
    }

    protected $listeners = ['modelId'];

    public function modelId(Modal $model)
    {
        $this->model = $model;

    }
    public function addSpec()
    {

        if (Schema::hasColumn('advance_product_specs', $this->selectedTitle)) {
            $columnName = $this->selectedTitle;
            $columnValue = $this->value;
            $record_exists =  AdvanceProductSpec::where($columnName, $columnValue)->where('model_id', $this->model->id)->first();
            if($record_exists)
            {
                return $this->addError('error', 'This product specification is already added.');
            }else{
                $new_spec = new AdvanceProductSpec();
                $new_spec->$columnName = $columnValue;
                $new_spec->model_id  = $this->model->id;
                $new_spec->save();
                dd('record added successfully');
            }
        } else {
            return $this->addError('error', 'column not found'. $this->selectedTitle);
        }



    }
    public function render()
    {
        return view('livewire.admin.buy.addon.advance-spec');
    }
}
