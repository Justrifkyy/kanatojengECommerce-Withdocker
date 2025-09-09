<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'is_featured',
        'material',
        'finishing',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function media()
    {
        return $this->hasMany(ProductMedia::class);
    }

    public function sizes()
    {
        // PENTING: Menambahkan withPivot('stock') agar kita bisa mengambil data stok
        return $this->belongsToMany(Size::class, 'product_variants')->withPivot('stock');
    }
    
    // Penambahan relasi ini membantu di Panel Admin
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_product');
    }
}