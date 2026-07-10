<?php

namespace App\Http\Controllers\Admin;

use App\Models\Price;
use App\Models\Product;
use App\Models\Category;
use App\Models\RepairName;
use Illuminate\Http\Request;
use App\Exports\ExportProduct;
use App\Models\MasterCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index(){

        $masterCats = MasterCategory::get();
        // $products = RepairName::with('category','price')
        // ->get();
        $categories = Category::with('repairNames')->get();


        $products = MasterCategory::with('repairNames.price'   , 'Category.price')->first();


        return view('admin.product.index',compact('products','masterCats','categories'));
    }
    public function create(){
        $masterCats = MasterCategory::get();
        return view('admin.product.create' , compact('masterCats'));
    }
    public function store(Request $request){

      RepairName::create([
            'master_id' => $request->master_id ,
            'category_id' => $request->category_id ,
            'name' => $request->repair_name,


        ]);

        $repair_name = RepairName::where('category_id',$request->category_id)->orderBy('created_at', 'desc')->first();






        Price::create([
            'repair_name_id' => $repair_name->id ,
            'category_id' => $request->category_id ,
            'price' => $request->price,
        ]);
        return response()->json($repair_name);
    }

    public function import(Request $request){
        Excel::import(new Product(), $request->file('file')->store('files'));
        return redirect()->back();
    }
    public function export(Request $request){
        return Excel::download(new ExportProduct, 'users.xlsx');
    }

    public function edit($id){
        $masterCats = MasterCategory::get();
        $categories = Category::get();
        $product = Product::where('id' , $id)->first();
        return view('admin.product.edit' , compact('masterCats','categories','product'));
    }

    public function update(Request $request, $id){

        Product::where('id', $id)->update([
            'master_id' => $request->master_id ,
            'category_id' => $request->category_id ,
            'repair_name' => $request->repair_name,
            'price' => $request->price,
        ]);

        return redirect(route('productV'));

    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('productV');
    }
    public function selectCat(Request $request){
        $categories = Category::where('master_id',$request->id)->get();
        return response()->json($categories);
    }
    public function searchCat(Request $request){

        if($request->id == 0){

            $repairAjax = Category::with('product')->get();
            return response()->json($repairAjax);
        }
        else{
            $repairAjax = Category::with('product')->where('master_id',$request->id)->get();
            return response()->json($repairAjax);
        }


    }

}
