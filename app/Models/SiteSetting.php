<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $table = 'site_settings';

    protected $fillable = [
        'logo',
        'meta_title',
        'buisness_name',
        'website_url',
        'favicon',

        'fb_link',
        'fb_link_status',

        'insta_link',
        'insta_link_status',

        'twitter_link',
        'twitter_link_status',

        'tiktok_link',
        'tiktok_link_status',

        'linkedin_link',
        'linkedin_link_status',

        'snapchat_link',
        'snapchat_link_status',

        'map_link',
        'google_rating',
        'google_review_count', // NOTE: matches your DB column name
        'active_theme',
    ];

    protected $casts = [
        'fb_link_status'       => 'boolean',
        'insta_link_status'    => 'boolean',
        'twitter_link_status'  => 'boolean',
        'tiktok_link_status'   => 'boolean',
        'linkedin_link_status' => 'boolean',
        'snapchat_link_status' => 'boolean',
        'google_rating'        => 'float',
        'google_review_count'  => 'integer',
        'active_theme'         => 'array',
    ];

    public static function getSiteSettings(): self
    {
        // use the first/only row as global settings
        return static::query()->orderBy('id')->first() ?? static::create([]);
    }
}
