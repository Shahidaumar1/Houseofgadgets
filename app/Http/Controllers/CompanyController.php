<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index()
    {
        $Companies = Company::get();
        return view('admin.Company.index', compact('Companies'));
    }
    public function create(Request $request)
    {
        $categories = category::get();
        return view('admin.Company.create', compact('categories'));
    }

    public function edit($id)
    {
        $Company = Company::where('id', $id)->first();
        return view('admin.company.edit', compact('Company'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',

        ]);

        Company::where('id', $id)->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);
        return redirect('/companies-view');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',

        ]);
        $Company = new Company();
        $Company->category_id = $request->category_id;
        $Company->name = $request->name;
        $Company->save();
        return redirect('/companies-view');
    }


    public function destroy($id)
    {
        Company::destroy($id);
        return redirect('/companies-view');
    }
}
