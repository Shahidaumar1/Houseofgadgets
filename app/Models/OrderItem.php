<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'modal_id',
        'quantity',
        'price',
        'service',
        'image',
        'url',
        'name',
        'memory_size',
        'color',
        'grade',
        'network_unlocked',
        'status',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
