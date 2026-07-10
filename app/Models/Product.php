<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Repair;
class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'master_id',
        'category_id',
        'repair_name',
        'price',

    ];

    public function master()
    {
        return $this->belongsTo(MasterCategory::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

}
