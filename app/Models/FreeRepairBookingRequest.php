<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FreeRepairBookingRequest extends Model
{
    use SoftDeletes;

    protected $table = 'free_repair_booking_requests';

    protected $fillable = [
        'device','modal','repair',
        'name','email','phone','message',
        'status',
    ];
}
