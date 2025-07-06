<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable = ['size_number', 'head_circumference_cm'];
    public $timestamps = false; // Tabel 'sizes' tidak punya kolom timestamps

    // Relasi: Satu ukuran bisa dimiliki oleh banyak produk (melalui tabel variants)
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_variants');
    }
}
