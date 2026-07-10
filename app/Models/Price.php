<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $guarded = [];


    public static function findPrice($repair_type, $modal)
    {
        

        $price = Price::where('repair_type_id', $repair_type)->where('modal_id', $modal)->first();
        //dd($price);
        return $price ? $price->price : null;
    }

    public static function calculateTotolPrice($value)
    {
        $prices_array = array();
        $price = 0;
        array_push($prices_array, $value);
        foreach ($prices_array as $value) {
            $price += $value;
        }
        return $price;
    }

    // public function repair_type()
    // {
    //     return $this->belongsTo(RepairType::class);
    // }
     public function repairType()
    {
        return $this->belongsTo(RepairType::class, 'repair_type_id');
    }
     public function modal()
    {
        return $this->belongsTo(Modal::class);
    }
}