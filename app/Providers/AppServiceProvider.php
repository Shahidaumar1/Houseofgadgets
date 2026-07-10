<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

// Models
use App\Models\SiteSetting;
use App\Models\Branch;
use App\Models\WebsiteContent;
use App\Models\GoogleReviewsSetting;

// Livewire
use Livewire\Livewire;
use App\Http\Livewire\Guest\RepairDetail;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        /** Site settings shared everywhere */
        $siteSettings = SiteSetting::getSiteSettings();
        View::share('siteSettings', $siteSettings);

        // dynamic head title
        $dynamicTitle = $siteSettings?->meta_title ?: ($siteSettings?->buisness_name ?: 'Website');
        View::share('dynamicTitle', $dynamicTitle);

        /** Branch + website content */
        $siteBranch = Branch::first();
        View::share('siteBranch', $siteBranch);

        $webContent = [];
        foreach (WebsiteContent::all() as $content) {
            $webContent[$content->key] = $content->text;
        }
        View::share('webContent', (object) $webContent);

        /** Livewire components */
        Livewire::component(
            'guest.components.clinic-repair-form',
            \App\Http\Livewire\Guest\Components\ClinicRepairForm::class
        );
        Livewire::component('guest.repair-detail', RepairDetail::class);

        /** Theme (safe defaults) */
        $theme = $siteSettings?->active_theme ?? [
            'name'   => 'Default',
            'colors' => ['#111827','#1F2937','#374151','#9CA3AF','#E5E7EB'],
        ];
        $colors = $theme['colors'] ?? [];
        for ($i = 0; $i < 8; $i++) {
            $colors[$i] = $colors[$i] ?? ($colors[0] ?? '#111827');
        }
        View::share('activeTheme', [
            'name'   => $theme['name'] ?? 'Default',
            'colors' => $colors,
        ]);

        /** Google Reviews: row + rounded rating + star breakdown */
        $gr = GoogleReviewsSetting::getSingleton();
        View::share('googleReviews', $gr);
        View::share('googleReviewsRounded', $gr->rounded_rating); // 0.5 steps
        View::share('googleStars', $gr->stars);                   // ['full'=>x,'half'=>y,'empty'=>z]
    }
}
