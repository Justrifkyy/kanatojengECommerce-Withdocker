<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SizeSeeder::class,
            ColorSeeder::class, // Panggil seeder warna
            ProductCategorySeeder::class,
            ProductSeeder::class, // Seeder produk yang sudah diupdate
            // ProductVariantSeeder tidak perlu dipanggil lagi karena sudah ditangani di dalam ProductSeeder
        ]);
    }
}
