<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'service',
        'user id',
        'date_time',
        'branch_id',      // ✅ FIX: yeh add kiya — pehle missing tha, isliye null tha
        'customer_name',
        'customer_email',
        'amount',
        'total_price',
        'tax',
        'shipping',
        'order_type',
        'tracking_number',
        'payment_method',
        'status',
        'patient',
        'form',
        'repair_detail',
    ];
    protected $casts = [
    'form' => 'array',
];

    protected $dates = ['deleted_at'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function statuses()
    {
        return $this->hasMany(OrderStatus::class);
    }
    public function forms()
    {
        return $this->hasMany(OrderForm::class);
    }
    public function orderUser()
    {
        return $this->hasOne(OrderUser::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}