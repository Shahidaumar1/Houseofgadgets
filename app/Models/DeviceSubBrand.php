<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceSubBrand extends Model
{
    protected $table = 'device_sub_brands';

    protected $fillable = [
        'device_type_id', // parent brand (DeviceType)
        'name',
        'file',
        'status',
        'slug',
    ];

    /**
     * Brand (Apple, Samsung, etc.)
     */
    public function deviceType()
    {
        return $this->belongsTo(DeviceType::class, 'device_type_id');
    }

    /**
     * Series under this sub brand
     * e.g. iPhone -> iPhone 15 Series, iPhone 16 Series
     */
    public function series()
    {
        return $this->hasMany(DeviceSeries::class, 'sub_brand_id');
    }

    /**
     * (Optional but useful)
     * All models under this sub brand via series
     */
    public function modals()
    {
        return $this->hasManyThrough(
            Modal::class,        // final model
            DeviceSeries::class, // through model
            'sub_brand_id',      // FK on device_series table
            'series_id',         // FK on modals table
            'id',                // local key on device_sub_brands
            'id'                 // local key on device_series
        );
    }
}


