<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'address',
        'postal_code',
        'type',
        'days',
        'hours',
        'background'
    ];
}
