<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Modal;
class RepairType extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function prices()
    {
        return $this->hasMany(Price::class);
    }

public function getRouteKeyName()
{
    return 'slug';
}

    public function device_types()
    {
        return $this->belongsToMany(DeviceType::class);
    }

}
