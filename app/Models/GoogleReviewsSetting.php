<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoogleReviewsSetting extends Model
{
    protected $table = 'google_reviews_settings';

    protected $fillable = [
        'rating',
        'reviews_count',
        'review_url',
    ];

    protected $casts = [
        'rating'        => 'float',
        'reviews_count' => 'integer',
    ];

    /** Return the single settings row (create defaults if empty). */
    public static function getSingleton(): self
    {
        return static::query()->orderBy('id')->first() ?: static::create([
            'rating'        => 5.0,
            'reviews_count' => 0,
            'review_url'    => '#',
        ]);
    }

    /** Clamp 0..5 and round to nearest 0.5 for UI. */
    public function getRoundedRatingAttribute(): float
    {
        $clamped = max(0, min(5, (float) $this->rating));
        return round($clamped * 2) / 2.0;
    }

    /** Star breakdown for Blade (full/half/empty). */
    public function getStarsAttribute(): array
    {
        $r     = $this->rounded_rating;
        $full  = (int) floor($r);
        $half  = (($r - $full) >= 0.5) ? 1 : 0;
        $empty = 5 - $full - $half;
        return compact('full','half','empty');
    }
}
