<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected

        $fillable = [
            'name',
            'image',
            'address_line_1',
            'address_line_2',
            'town_city',
            'post_code',
            'mobile_number',
            'landline_number',
            'email',
            'latitude',
            'longitude',
            'map_link',
            'description',
        ];

    protected $casts = [
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
    ];
    public function appointmentTimeSlots()
    {
        return $this->hasMany(AppointmentTimeSlot::class, 'branch_id');
    }
}
