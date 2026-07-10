<?php

use App\Models\SiteSetting;

if (!function_exists('setting')) {
    function setting()
    {
        return SiteSetting::getSiteSettings();
    }
}
