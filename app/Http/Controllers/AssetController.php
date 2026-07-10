<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// apni settings model use karo
use App\Models\SiteSetting; // ya jahan tumhara theme store hota ho

class AssetController extends Controller
{
    public function theme(Request $request)
    {
        // Theme colors DB se nikaalo (apni field ke mutabiq adjust kar lo)
        $settings = SiteSetting::first(); // <-- change if needed
        $stored = [];
        if ($settings && !empty($settings->theme_colors)) {
            // e.g. theme_colors = '["#0f0f0f","#1a1a1a", ...]'
            $stored = json_decode($settings->theme_colors, true) ?? [];
        }

        // 8 defaults
        $defaults = ['#111827','#1F2937','#374151','#9CA3AF','#E5E7EB','#6B7280','#4B5563','#111827'];

        // merge (stored overwrite defaults by index)
        $colors = $defaults;
        foreach ($stored as $i => $val) {
            if (isset($colors[$i]) && is_string($val) && $val !== '') {
                $colors[$i] = $val;
            }
        }

        // Render CSS from a blade view
        $css = view('css.theme', ['colors' => $colors])->render();

        // Strong caching control + ETag so CDN/browser right behave
        $etag = md5($css);
        if ($request->headers->get('If-None-Match') === $etag) {
            return response('', 304)->header('ETag', $etag);
        }

        return response($css, 200)
            ->header('Content-Type', 'text/css; charset=UTF-8')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0')
            ->header('Pragma', 'no-cache')
            ->header('ETag', $etag);
    }
}
