<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'product_name',
        'checkboxes',
        'other_text',
        'existing_customer',
        'is_business',
        'brand',
        'model',
        'additional_description',
    ];

    protected $casts = [
        'checkboxes' => 'array',
    ];
}
