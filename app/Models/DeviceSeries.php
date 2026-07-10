<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceSeries extends Model
{
    protected $table = 'device_series';

    protected $fillable = [
        'device_type_id',   // brand (DeviceType)
        'sub_brand_id',     // new: sub brand (DeviceSubBrand)
        'name',
        'file',
        'status',
        'slug',
        'image', 
    ];

    /**
     * Brand / device type (Apple, Samsung, etc.)
     */
    public function deviceType()
    {
        return $this->belongsTo(DeviceType::class);
    }

    /**
     * Sub brand (e.g. iPhone, iPad, Galaxy S, Galaxy A...)
     */
    public function subBrand()
    {
        return $this->belongsTo(DeviceSubBrand::class, 'sub_brand_id');
    }

    /**
     * Models under this series (iPhone 15 Pro Max, etc.)
     * – optional, but useful later
     */
    public function modals()
    {
        return $this->hasMany(Modal::class, 'series_id');
        // if your model class is named differently (e.g. Modals),
        // change Modal::class accordingly
    }
}

