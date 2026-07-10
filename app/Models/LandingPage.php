<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    use HasFactory;


    protected $fillable = [
        'heading',
        'icon',
        'sub_heading',
        'description',
    ];
}
