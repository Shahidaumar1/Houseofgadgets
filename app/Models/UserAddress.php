<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 'address_line_1', 'address_line_2',
        'town_city', 'post_code', 'label', 'is_default',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
