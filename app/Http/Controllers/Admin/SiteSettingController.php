<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::get();
        // dd($settings);
        return view('admin.site-settings.index', compact('settings'));
    }

    public function create()
    {
        return view('admin.site-settings.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            if ($request->hasFile('logo')) {
                $filenameWithExt = $request->file('logo')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('logo')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $path = $request->file('logo')->move('storage/logo', $fileNameToStore);
                $path = public_path() . '/storage/logo/' . $fileNameToStore;
                move_uploaded_file($_FILES['logo']['tmp_name'], $path);
            }
            if ($request->hasFile('favicon')) {
                $filenameWithExt = $request->file('favicon')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('favicon')->getClientOriginalExtension();
                $fileNameToStores = $filename . '_' . time() . '.' . $extension;
                $path = $request->file('favicon')->move('storage/favicon', $fileNameToStores);
                $path = public_path() . '/storage/favicon/' . $fileNameToStores;
                move_uploaded_file($_FILES['favicon']['tmp_name'], $path);
            }

            SiteSetting::create([
                'meta_title' => $request->meta_title,
                'logo' => $fileNameToStore,
                'favicon' => $fileNameToStores,
                'fb_link' => $request->fb_link,
                'insta_link' => $request->insta_link,
                'twitter_link' => $request->twitter_link,
                'tiktok_link' => $request->tiktok_link,
            ]);
            return redirect(route('settingsV'))->with('success', 'Site Settings Added Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

    }
    public function edit($id)
    {
        $setting = SiteSetting::where('id', $id)->first();
        return view('admin.site-settings.edit', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        try {
            if ($request->hasFile('logo')) {
                $filenameWithExt = $request->file('logo')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('logo')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $path = $request->file('logo')->move('storage/logo', $fileNameToStore);
                $path = public_path() . '/storage/logo/' . $fileNameToStore;
                move_uploaded_file($_FILES['logo']['tmp_name'], $path);
                SiteSetting::where('id', $id)->update([
                    'logo' => $fileNameToStore,
                ]);
            }
            if ($request->hasFile('favicon')) {
                $filenameWithExt = $request->file('favicon')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('favicon')->getClientOriginalExtension();
                $fileNameToStores = $filename . '_' . time() . '.' . $extension;
                $path = $request->file('favicon')->move('storage/favicon', $fileNameToStores);
                $path = public_path() . '/storage/favicon/' . $fileNameToStores;
                move_uploaded_file($_FILES['favicon']['tmp_name'], $path);
                SiteSetting::where('id', $id)->update([
                    'favicon' => $fileNameToStores,
                ]);
            }

            SiteSetting::where('id', $id)->update([
                'meta_title' => $request->meta_title,
                'fb_link' => $request->fb_link,
                'insta_link' => $request->insta_link,
                'twitter_link' => $request->twitter_link,
                'tiktok_link' => $request->tiktok_link,
            ]);
            return redirect(route('settingsV'))->with('success', 'Site Setting Updated Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }

    }

    public function destroy($id)
    {
        try {
            SiteSetting::where('id', $id)->delete();
            return redirect(route('settingsV'))->with('success', 'Site Setting Deleted Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

}