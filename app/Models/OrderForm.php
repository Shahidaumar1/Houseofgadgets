<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'form_type',
        'branch_name',
        'branch_id',
        'appointment_date',
        'appointment_time',
        'time_slot',
        'address_line_1',
        'address_line_2',
        'city',
        'post_code',
        'note',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
