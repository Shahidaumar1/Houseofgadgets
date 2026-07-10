<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\MasterCategory;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class MasterCategoryController extends Controller
{
    public function index(){

    }



    public function create(){
        return view('admin.DeviceType.create');
    }



    public function store(Request $request)
{
    $validator = $request->validate([
        'title' => 'required',
        'image' => 'required|image|mimes:jpeg,png,gif',
    ]);

    if ($request->hasFile('image')) {
        $filenameWithExt = $request->file('image')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        $path = $request->file('image')->move('storage/master-category', $fileNameToStore);
        $path = public_path().'/storage/master-category/' . $fileNameToStore;
        move_uploaded_file($_FILES['image']['tmp_name'], $path);
    }

    MasterCategory::create([
        'title' => $request->title,
        'image' => $fileNameToStore
    ]);

    // notify()->success('Master Category added successfully');
    return redirect(route('masterV'));
}

    public function edit($id){
        $masterCats = MasterCategory::where('id' , $id)->first();
        return view('admin.master-category.edit', compact('masterCats'));
    }

    public function update(Request $request , $id){

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('image')->move('storage/master-category', $fileNameToStore);
            $path = public_path().'/storage/master-category/' . $fileNameToStore;
            move_uploaded_file($_FILES['image']['tmp_name'], $path);
            MasterCategory::where('id', $id)->update([
                'image' => $fileNameToStore
            ]);
            }

            MasterCategory::where('id', $id)->update([
                'title' => $request->title,

            ]);

            return redirect(route('masterV'));
        }

        public function destroy($id)
        {
            dd('aaaa');
            MasterCategory::destroy($id);
            return redirect()->route('masterV');
        }
}
