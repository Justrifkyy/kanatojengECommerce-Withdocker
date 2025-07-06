<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeSeeder extends Seeder
{
    public function run(): void
    {
        $sizes = [
            ['size_number' => 'No. 3', 'head_circumference_cm' => 53],
            ['size_number' => 'No. 4', 'head_circumference_cm' => 54],
            ['size_number' => 'No. 5', 'head_circumference_cm' => 55],
            ['size_number' => 'No. 6', 'head_circumference_cm' => 56],
            ['size_number' => 'No. 7', 'head_circumference_cm' => 57],
            ['size_number' => 'No. 8', 'head_circumference_cm' => 58],
            ['size_number' => 'No. 9', 'head_circumference_cm' => 59],
            ['size_number' => 'No. 10', 'head_circumference_cm' => 60],
        ];

        foreach ($sizes as $size) {
            Size::create($size);
        }
    }
}
