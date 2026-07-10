<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Modal;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class ModalController extends Controller
{
    public function index()
    {
        $modals = Modal::with('company')->get();
        return view('admin.modals.index', compact('modals'));
    }

    public function create()
    {
        $Companies = Company::get();
        return view('admin.Modals.create', compact('Companies'));
    }
    public function store(Request $request)
    {
        $validator = $request->validate([
            'company_id' => 'required',
            'name' => 'required',
            'image' => 'required',

        ]);

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->move('storage/category', $fileNameToStore);
            $path = public_path() . '/storage/category/' . $fileNameToStore;
            move_uploaded_file($_FILES['image']['tmp_name'], $path);
        }
        Modal::create([
            'company_id' => $request->company_id,
            'name' => $request->name,
            'image' => $fileNameToStore
        ]);
        $modals = Modal::with('company')->get();
        return redirect('/Modal-view')->with('modals', $modals);
    }

    public function edit($id)
    {
        $modals = Modal::with('company')->where('id', $id)->first();
        return view('admin.Modals.edit', compact('modals'));
    }

    public function update(Request $request, $id)
    {
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->move('/storage/category/', $fileNameToStore);
            $path = public_path() . '/storage/category/' . $fileNameToStore;
            move_uploaded_file($_FILES['image']['tmp_name'], $path);
            Modal::where('id', $id)->update([
                'image' => $fileNameToStore
            ]);
        }

        Modal::where('id', $id)->update([
            'company_id' => $request->company_id,
            'name' => $request->name,
        ]);

        return redirect('/Modal-view');
    }
    
//     public function updateOrder(Request $request)
// {
//     $order = $request->input('order');
//     foreach ($order as $index => $id) {
//         \App\Models\Modal::where('id', $id)->update(['sequence' => $index + 1]);
//     }
//     return response()->json(['success' => true]);
// }
public function updateOrder(Request $request)
{
    $orderedIds = $request->orderedIds ?? [];

    foreach ($orderedIds as $index => $id) {
        \App\Models\Modal::where('id', $id)->update(['sort_order' => $index + 1]);
    }

    return response()->json(['status' => 'success']);
}


    public function destroy($id)
    {
        Modal::destroy($id);
        return redirect('/Modal-view');
    }
}
