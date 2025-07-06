<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat Admin
        User::create([
            'name' => 'Admin Kana Tojong',
            'email' => 'admin@kanatojong.com',
            'password' => Hash::make('password'), // ganti dengan password yang aman
            'phone_number' => '089518804219',
            'role' => 'admin',
        ]);

        // Membuat User Biasa
        User::create([
            'name' => 'User Biasa',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'phone_number' => '089876543210',
            'role' => 'user',
        ]);
    }
}
