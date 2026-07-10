<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image'
    ];

    public function Category()
    {
        return $this->hasMany(Category::class, 'master_id');
    }

    // public function products()
    // {
    //     return $this->hasManyThrough(Product::class, Category::class, 'master_id', 'category_id');
    // }
    public function repairNames()
{
    return $this->hasMany(RepairName::class, 'master_id');
}

}
