<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuotationRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'repair_type_id',
        'device',
        'modal',
        'repair',
        'name',
        'email',
        'phone',
        'message',
        'status',
    ];

    protected $dates = ['deleted_at'];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
    
     public function repairType()
    {
        return $this->belongsTo(RepairType::class);
    }


}


   