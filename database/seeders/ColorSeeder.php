<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;

    class ColorSeeder extends Seeder
    {
        public function run(): void
        {
            $colors = [
                ['name' => 'Kuning Emas', 'hex_code' => '#FFD700'],
                ['name' => 'Silver', 'hex_code' => '#C0C0C0'],
                ['name' => 'Metallic', 'hex_code' => '#AAA9AD'],
                ['name' => 'Hitam', 'hex_code' => '#000000'],
                ['name' => 'Hijau', 'hex_code' => '#008000'],
                ['name' => 'Putih Tulang', 'hex_code' => '#F5F5DC'],
                ['name' => 'Merah Maroon', 'hex_code' => '#800000'],
            ];

            foreach ($colors as $color) {
                Color::create($color);
            }
        }
    }
