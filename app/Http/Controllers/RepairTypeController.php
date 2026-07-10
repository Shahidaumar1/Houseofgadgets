<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Company;
use App\Models\Modal;
use App\Models\Price;
use App\Models\RepairType;
use Illuminate\Http\Request;

class RepairTypeController extends Controller
{
    public function index()
    {

        $repairTypes = RepairType::with('price')->get();
        return view('admin.Repair.index', compact('repairTypes'));
    }
  

//     public function index()
// {
//     $repairTypes = RepairType::with(['price', 'modal'])
//         ->join('modals', 'repair_types.modal_id', '=', 'modals.id')
//         ->orderBy('modals.sequence', 'ASC')
//         ->select('repair_types.*')
//         ->get();

//     return view('admin.Repair.index', compact('repairTypes'));
// }

    public function create()
    {
        return view('admin.Repair.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'modal_id' => 'required',
            'name' => 'required',

        ]);
        RepairType::create([
            'modal_id' => $request->modal_id,
            'name' => $request->name,
        ]);

        $repairtypeD = RepairType::orderBy('id','DESC')->first();
        Price::create([
            'repair_type_id' =>  $repairtypeD->id,
            'price' => $request->price,
        ]);
        $repairtype = Price::with('repair_type')->get();
        return response()->json($repairtype);
    }

    public function searchCat(Request $request)
    {
        if ($request->id == 0) {

            $repairAjax = RepairType::with('modal')->get();
            return response()->json($repairAjax);
        } else {
            $repairAjax = Company::with('modals')->where('id', $request->id)->get();
            return response()->json($repairAjax);
        }
    }
    public function selectCat(Request $request)
    {
        $categories = Modal::with('company')->where('company_id', $request->id)->get();
        return response()->json($categories);
    }
}
