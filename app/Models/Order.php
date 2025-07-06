<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_amount', 'status', 'order_date'];

    protected $casts = [
        'order_date' => 'datetime',
    ];

    // Relasi: Pesanan ini milik satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Satu pesanan punya banyak item
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
