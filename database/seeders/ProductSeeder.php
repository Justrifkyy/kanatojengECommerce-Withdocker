<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $biasa = ProductCategory::where('name', 'Biasa')->first();
        $pamiring = ProductCategory::where('name', 'Pamiring')->first();
        $ulaweng = ProductCategory::where('name', 'Ulaweng Bubbu')->first();

        Product::create([
            'category_id' => $biasa->id,
            'name' => 'Songkok Recca Polos',
            'description' => 'Songkok Recca asli dengan anyaman serat lontar berkualitas tinggi, tanpa hiasan tambahan.',
            'material' => 'Serat Pelepah Lontar Pilihan',
            'finishing' => 'Natural',
            'price' => 150000,
            'image_path' => 'product-images/default.jpg',
        ]);

        Product::create([
            'category_id' => $pamiring->id,
            'name' => 'Songkok Recca Pamiring Emas',
            'description' => 'Songkok Recca dengan hiasan benang emas di bagian pinggir (pamiring). Memberikan kesan mewah dan elegan.',
            'material' => 'Serat Pelepah Lontar Pilihan',
            'finishing' => 'Benang Emas 24 Karat',
            'price' => 350000,
            'image_path' => 'product-images/default.jpg',
        ]);

        Product::create([
            'category_id' => $ulaweng->id,
            'name' => 'Songkok Recca Ulaweng Bubbu',
            'description' => 'Songkok Recca berlapis emas murni, simbol status dan kehormatan tertinggi dalam adat Bugis.',
            'material' => 'Serat Lontar, Emas Murni',
            'finishing' => 'Lapis Emas',
            'price' => 2500000,
            'image_path' => 'product-images/default.jpg',
        ]);
    }
}
