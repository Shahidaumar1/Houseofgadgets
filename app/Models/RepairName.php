<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairName extends Model
{
    use HasFactory;

    protected $fillable = [
        'master_id',
        'category_id',
        'name',
    ];



    public function master()
{
    return $this->belongsTo(MasterCategory::class);
}
public function category()
{
    return $this->belongsTo(Category::class);
}
public function price()
{
    return $this->hasOne(Price::class, 'repair_name_id');
}
}
