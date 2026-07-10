<?php

namespace App\Http\Livewire\Repair\Components;

use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Models\Product;
use App\Models\Template;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ImportExport extends Component
{
    use WithFileUploads;
    public $excel_file;
    public $template_file;

    public $template;


    public function mount()
    {
        $templates = Template::all();
        if ($templates->count() > 0) {
            $this->template = Template::first();
        }
    }
    public function updated($property)
    {
        if ($property == 'excel_file') {
            $this->validate([
                'excel_file' => 'required|mimes:xlsx,xls',
            ]);

            $excel_file_array = Excel::toArray(new ProductImport, $this->excel_file)[0] != [] ? Excel::toArray(new ProductImport, $this->excel_file)[0][0] : [];
            $array_keys = array_keys($excel_file_array);
            if (count($array_keys) == 4 && $array_keys[0] == 'device_type' && $array_keys[1] == 'models' && $array_keys[2] == 'repairs' && $array_keys[3] == 'prices') {
                Excel::import(new ProductImport, $this->excel_file);
                return back()->with('success', 'Products imported successfully');
            } else {
                return $this->addError('error', 'Invalid format ! rows name should be Device Type, Models,Repairs and Prices');
            }
        }

        if ($property == 'template_file') {
            $this->validate([
                'template_file' => 'required|mimes:xlsx,xls'
            ]);
            $template = new Template();
            $template->url = $this->template_file->store('template/sheet','custom');
            $template->save();
            $this->emit('TemplateUploaded',$template->id);
        }

    }

    protected $listeners = ['TemplateUploaded','TemplateDeleted'];
    public function TemplateUploaded(Template $template)
    {
        $this->template = $template;
    }

    public function TemplateDeleted()
    {
        $this->template = null;
    }

    public function downloadTemplate()
    {
     return response()->download($this->template->url, 'sheet-template.xlsx');
    }

    public function deleteTemplate()
    {
        $this->template->delete();
        $this->emit('TemplateDeleted');
    }

    public function export()
    {

        return Excel::download(new ProductExport,'products.xlsx');

    }
    public function render()
    {
        return view('livewire.repair.components.import-export');
    }
}
