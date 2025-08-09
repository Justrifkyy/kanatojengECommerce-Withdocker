<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        // Kategori berdasarkan "Jenis Songkok" dari dokumen Anda
        $categories = ['Songkok Guru', 'Songkok Lontarak', 'Songkok Tembaga', 'Songkok Benang Metallic'];

        foreach ($categories as $category) {
            ProductCategory::create(['name' => $category]);
        }
    }
}
