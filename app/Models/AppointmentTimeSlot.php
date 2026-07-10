<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentTimeSlot extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_id',
        'day',  // Add this line to include 'day' in mass assignment
        'opening_time',
        'closing_time',
        'lunch_start',
        'lunch_end',
        'status',
        // ... other attributes
    ];
}
