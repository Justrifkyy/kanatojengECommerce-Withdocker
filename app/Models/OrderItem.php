<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'product_name',
        'size_info',
        'quantity',
        'price',
    ];
    public $timestamps = false; // Tabel 'order_items' tidak punya timestamps

    // Relasi: Item ini adalah bagian dari satu pesanan
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
