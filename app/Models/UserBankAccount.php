<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBankAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_holder',
        'account_number',
        'bank_name',
        'branch_name',
        // Add any additional fields you may need
    ];

    // Define relationships if necessary
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
