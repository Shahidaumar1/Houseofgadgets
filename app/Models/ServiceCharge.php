<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCharge extends Model
{
    use HasFactory;

    // Specify the table name (optional if using Laravel conventions)
    protected $table = 'service_charges';

    // Define which attributes are mass-assignable (optional)
    protected $fillable = ['name', 'price', 'charges'];

    // Example for other model-specific settings (timestamps, etc.)
    // protected $timestamps = true;
}
