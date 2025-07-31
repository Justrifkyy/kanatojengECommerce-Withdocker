<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'material',
        'finishing',
        'price',
    ];

    public function media()
    {
        return $this->hasMany(ProductMedia::class);
    }

    // Relasi: Satu produk milik satu kategori
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    // Relasi: Satu produk punya banyak varian (kombinasi dengan ukuran)
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    // Relasi: Satu produk tersedia dalam banyak ukuran (melalui tabel variants)
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_variants');
    }
}
