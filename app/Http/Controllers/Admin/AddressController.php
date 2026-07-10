<?php

namespace App\Http\Controllers\Admin;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Address::get();
        return view('admin.address.index', compact('addresses'));
    }
    public function create()
    {
        $address = Address::get();
        return view('admin.address.create', compact('address'));
    }

    public function store(Request $request)
    {
        try {
            $validator = $request->validate([
                'company_name' => 'required',
                'address' => 'required',
                'postal_code' => 'required',
                'type' => 'required',
                'days' => 'required',
                'hours' => 'required',
                'background' => 'required',

            ]);

            if ($request->hasFile('background')) {
                $filenameWithExt = $request->file('background')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('background')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $path = $request->file('background')->move('storage/address/background', $fileNameToStore);
                $path = public_path() . '/storage/address/background/' . $fileNameToStore;
                move_uploaded_file($_FILES['background']['tmp_name'], $path);


            }

            Address::create([
                'company_name' => $request->company_name,
                'address' => $request->address,
                'postal_code' => $request->postal_code,
                'type' => $request->type,
                'days' => $request->days,
                'hours' => $request->hours,
                'background' => $fileNameToStore,
            ]);
            return redirect(route('addressV'))->with('success', 'Address Added Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

    }

    public function edit($id)
    {
        $address = Address::where('id', $id)->first();
        return view('admin.address.edit', compact('address'));
    }
    public function update(Request $request, $id)
    {

        try {
            if ($request->hasFile('background')) {
                $filenameWithExt = $request->file('background')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('background')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $path = $request->file('background')->move('storage/address/background', $fileNameToStore);
                $path = public_path() . '/storage/address/background/' . $fileNameToStore;
                move_uploaded_file($_FILES['background']['tmp_name'], $path);
                Address::where('id', $id)->update([
                    'background' => $fileNameToStore
                ]);
            }

            Address::where('id', $id)->update([
                'company_name' => $request->company_name,
                'address' => $request->address,
                'postal_code' => $request->postal_code,
                'type' => $request->type,
                'days' => $request->days,
                'hours' => $request->hours,

            ]);

            return redirect(route('addressV'))->with('success', 'Address Updated Successfully');

        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            Address::where('id', $id)->delete();
            return redirect(route('addressV'))->with('success', 'Address Deleted Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

}