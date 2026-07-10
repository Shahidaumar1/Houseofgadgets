<?php

namespace App\Models;

use App\Helpers\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Modal extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $fillable = ['status', 'top_rated', 'new_arrival', 'sequence'];
    
    public function getRouteKeyName()
{
    return 'slug';
}

    public function getIsPublishedAttribute()
    {
        return $this->status == Status::PUBLISH;
    }

    public function add_ons()
    {
        return $this->hasOne(SellModelOption::class);
    }

    public function add_ons_count()
    {
        return $this->hasMany(ProductSpec::class,'model_id', 'id')->count();
    }

    public function device_type()
    {
        return $this->belongsTo(DeviceType::class);
    }

    public function deviceType()
    {
        return $this->belongsTo(DeviceType::class, 'device_type_id');
    }

    // 🔹 optional sub brand relation
    public function subBrand()
    {
        return $this->belongsTo(DeviceSubBrand::class, 'sub_brand_id');
    }

    // 🔹 optional series relation
    public function series()
    {
        return $this->belongsTo(DeviceSeries::class, 'series_id');
    }

    public function repair_types()
    {
        return $this->hasMany(RepairType::class);
    }

    public function repairs()
    {
        return $this->hasManyThrough(
            RepairType::class,
            Price::class,
            'modal_id',        // Foreign key on prices table
            'id',              // Local key on repair_types
            'id',              // Local key on modals
            'repair_type_id'   // Foreign key on prices pointing to repair_types
        );
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function specs()
    {
        return $this->hasMany(ProductSpec::class);
    }

    public function getRamsAttribute()
    {
        return ProductSpec::where('model_id', $this->id)
            ->distinct('ram')
            ->pluck('ram')
            ->toArray();
    }

    public function getHardDrivesAttribute()
    {
        return ProductSpec::where('model_id', $this->id)
            ->distinct('hard_drive')
            ->pluck('hard_drive')
            ->toArray();
    }

    public function getCoresAttribute()
    {
        return ProductSpec::where('model_id', $this->id)
            ->distinct('core')
            ->pluck('core')
            ->toArray();
    }

    public function getGenerationsAttribute()
    {
        return ProductSpec::where('model_id', $this->id)
            ->distinct('generation')
            ->pluck('generation')
            ->toArray();
    }

    public function getScreenSizesAttribute()
    {
        return ProductSpec::where('model_id', $this->id)
            ->distinct('screen_size')
            ->pluck('screen_size')
            ->toArray();
    }

    public function getMmsAttribute()
    {
        return ProductSpec::where('model_id', $this->id)
            ->distinct('mm')
            ->pluck('mm')
            ->toArray();
    }

    public function getControllersAttribute()
    {
        return ProductSpec::where('model_id', $this->id)
            ->distinct('controller')
            ->pluck('controller')
            ->toArray();
    }

    public function getMemorySizesAttribute()
    {
        return ProductSpec::where('model_id', $this->id)
            ->distinct('memory_size')
            ->pluck('memory_size')
            ->toArray();
    }

    public function getGradesAttribute()
    {
        return ProductSpec::where('model_id', $this->id)
            ->distinct('grade')
            ->pluck('grade')
            ->toArray();
    }

    public function getColorsAttribute()
    {
        return ProductSpec::where('model_id', $this->id)
            ->distinct('color')
            ->pluck('color')
            ->toArray();
    }

    public function getConditionsAttribute()
    {
        return ProductSpec::where('model_id', $this->id)
            ->distinct('condition')
            ->pluck('condition')
            ->toArray();
    }
}
