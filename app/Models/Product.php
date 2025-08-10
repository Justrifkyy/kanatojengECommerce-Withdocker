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
        'material',
        'finishing',
        'price',
        'is_featured', // <-- FIX: Tambahkan 'is_featured' di sini
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_featured' => 'boolean', // <-- Tambahan: Pastikan nilainya selalu boolean (true/false)
    ];

    // ... relasi lainnya (category, sizes, media, colors) ...

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_variants');
    }

    public function media()
    {
        return $this->hasMany(ProductMedia::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }
}
