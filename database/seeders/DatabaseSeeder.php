<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SizeSeeder::class, // Panggil seeder data master dulu
            ProductCategorySeeder::class,
            ProductSeeder::class, // Baru panggil seeder yang bergantung pada data master
            ProductVariantSeeder::class,
        ]);
    }
}
