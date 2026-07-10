<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // public function index()
    // {
    //     $categories = Category::get();
    //     return view('admin.DeviceType.index', compact('categories'));
    // }

    // public function create()
    // {
    //     return view('admin.DeviceType.create');
    // }

    // public function store(Request $request)
    // {
    //     $validator = $request->validate([
    //         'name' => 'required',
    //         'image' => 'required|image|mimes:jpeg,png,gif',
    //     ]);

    //     if ($request->hasFile('image')) {
    //         $filenameWithExt = $request->file('image')->getClientOriginalName();
    //         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    //         $extension = $request->file('image')->getClientOriginalExtension();
    //         $fileNameToStore = $filename . '_' . time() . '.' . $extension;
    //         $path = $request->file('image')->move('storage/master-category', $fileNameToStore);
    //         $path = public_path() . '/storage/master-category/' . $fileNameToStore;
    //         move_uploaded_file($_FILES['image']['tmp_name'], $path);
    //     }
    //     Category::create([
    //         'name' => $request->name,
    //         'image' => $fileNameToStore
    //     ]);
    //     $categories = Category::get();
    //     return redirect('Device-view')->with('categories', $categories);

    //         $validator = $request->validate([
    //             'title' => 'required',
    //             'image' => 'required',
    //             'master_id' => 'required'
    //         ]);

    //     if ($request->hasFile('image')) {
    //         $filenameWithExt = $request->file('image')->getClientOriginalName();
    //         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    //         $extension = $request->file('image')->getClientOriginalExtension();
    //         $fileNameToStore = $filename.'_'.time().'.'.$extension;
    //         $path = $request->file('image')->move('storage/category', $fileNameToStore);
    //         $path = public_path().'/storage/category/' . $fileNameToStore;
    //         move_uploaded_file($_FILES['image']['tmp_name'], $path);


    //     }

    //         Category::create([
    //         'title' => $request->title,
    //         'image' => $fileNameToStore,
    //         'master_id' => $request->master_id
    //     ]);

    //     // notify()->success('Master Category added successfully');
    //     return redirect(route('categoryV'));
    // }

    // public function edit($id)
    // {
    //     $category = Category::where('id', $id)->first();
    //     return view('admin.category.edit', compact('category'));
    // }

    // public function update(Request $request, $id)
    // {
    //     if ($request->hasFile('image')) {
    //         $filenameWithExt = $request->file('image')->getClientOriginalName();
    //         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    //         $extension = $request->file('image')->getClientOriginalExtension();
    //         $fileNameToStore = $filename . '_' . time() . '.' . $extension;
    //         $path = $request->file('image')->move('storage/master-category', $fileNameToStore);
    //         $path = public_path() . '/storage/master-category/' . $fileNameToStore;
    //         move_uploaded_file($_FILES['image']['tmp_name'], $path);
    //         Category::where('id', $id)->update([
    //             'image' => $fileNameToStore
    //         ]);
    //     }
    //     Category::where('id', $id)->update([
    //         'name' => $request->name,
    //     ]);

    //     return redirect()->route('Device-view');
    // }

    // public function destroy($id)
    // {
    //     Category::destroy($id);
    //     return redirect()->route('Device-view');
    // }
}