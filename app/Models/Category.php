<?php

namespace App\Models;

use App\Helpers\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $gaurded = [];
   protected $fillable = ['status', 'others', 'slug'];

public function getRouteKeyName()
{
    return 'slug';
}
    public function getIsPublishedAttribute()
    {
        return $this->status == Status::PUBLISH ? true : false;
    }


    public function devices()
    {
        return $this->hasMany(DeviceType::class);
    }










}