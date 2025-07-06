<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $table = 'cart_items';
    protected $fillable = ['user_id', 'variant_id', 'quantity'];

    // Relasi: Item keranjang ini milik satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Item keranjang ini merujuk ke satu varian produk
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
}
