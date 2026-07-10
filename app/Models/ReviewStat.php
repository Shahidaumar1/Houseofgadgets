<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ReviewStat extends Model
{
    protected $table = 'review_stats';
    protected $fillable = ['source','rating','review_count','url'];

    public static function cached($source = 'google')
    {
        return Cache::remember("review_stat_{$source}", now()->addHours(12), function () use ($source) {
            return static::where('source', $source)->first();
        });
    }

    public function flushCache()
    {
        Cache::forget("review_stat_{$this->source}");
    }
}
