<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'existing_user',
        'business',
        'company_name',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
