<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LandingPage;
use App\Models\SectionOneHeading;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $section_one = LandingPage::get();
        $enteries = LandingPage::count();
        $heading = SectionOneHeading::first();
        return view('admin.landing_page_mg.index' , compact('section_one','enteries','heading'));
    }
    public function create(){

        return view('admin.landing_page_mg.create');
    }
    public function store(Request $request)
    {
        if ($request->hasFile('icon')) {
            $filenameWithExt = $request->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('icon')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('icon')->move('storage/icon', $fileNameToStore);
            $path = public_path().'/storage/icon/' . $fileNameToStore;
            move_uploaded_file($_FILES['icon']['tmp_name'], $path);
        }

        LandingPage::create([
            'icon' => $fileNameToStore,
            'sub_heading' => $request->sub_heading,
            'description' => $request->description,
        ]);

        return redirect(route('landing.s1V'));
    }
    public function edit($id){
        $section_one = LandingPage::where('id' , $id)->first();
        return view('admin.landing_page_mg.edit', compact('section_one'));
    }

    public function update(Request $request, $id){
        if ($request->hasFile('icon')) {
            $filenameWithExt = $request->file('icon')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('icon')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('icon')->move('storage/icon', $fileNameToStore);
            $path = public_path().'/storage/icon/' . $fileNameToStore;
            move_uploaded_file($_FILES['icon']['tmp_name'], $path);
            LandingPage::where('id', $id)->update([
                'icon' => $fileNameToStore,
            ]);
        }
        LandingPage::where('id', $id)->update([
            'sub_heading' => $request->sub_heading,
            'description' => $request->description,
        ]);

        return redirect(route('landing.s1V'));

    }

    public function destroy($id)
    {
        LandingPage::destroy($id);
        return redirect()->route('landing.s1V');
    }

    public function headingS(Request $request){
        SectionOneHeading::create([
            'heading' => $request->heading,
        ]);
        return redirect(route('landing.s1V'));
    }
    public function headingC(){
        return view('admin.landing_page_mg.heading_create');
    }
    public function headingU(Request $request, $id){
        SectionOneHeading::where('id', $id)->update(['heading'=> $request->heading]);
        return redirect(route('landing.s1V'));
    }
    public function headingE($id){
        $heading = SectionOneHeading::where('id', $id)->first();
        return view('admin.landing_page_mg.heading_edit', compact('heading'));
    }
}
