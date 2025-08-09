<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Size;
use App\Models\Color;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil data master
        $catGuru = ProductCategory::where('name', 'Songkok Guru')->first();
        $catLontarak = ProductCategory::where('name', 'Songkok Lontarak')->first();
        $catTembaga = ProductCategory::where('name', 'Songkok Tembaga')->first();
        $catMetallic = ProductCategory::where('name', 'Songkok Benang Metallic')->first();

        $sizesAll = Size::whereIn('size_number', ['No. 1', 'No. 2', 'No. 3', 'No. 4', 'No. 5', 'No. 6', 'No. 7', 'No. 8', 'No. 9', 'No. 10'])->pluck('id');
        $sizesLontarak1 = Size::whereIn('size_number', ['No. 6', 'No. 7', 'No. 8'])->pluck('id');
        $sizesLontarak2 = Size::whereIn('size_number', ['No. 4', 'No. 5', 'No. 6', 'No. 7', 'No. 8'])->pluck('id');

        $colorHitam = Color::where('name', 'Hitam')->first();
        $colorKuningEmas = Color::where('name', 'Kuning Emas')->first();
        $colorSilver = Color::where('name', 'Silver')->first();
        $colorMetallic = Color::where('name', 'Metallic')->first();
        $colorHijau = Color::where('name', 'Hijau')->first();
        $colorPutih = Color::where('name', 'Putih Tulang')->first();
        $colorMaroon = Color::where('name', 'Merah Maroon')->first();

        // --- MULAI MEMBUAT PRODUK ---

        $p1 = Product::create([
            'category_id' => $catTembaga->id,
            'name' => 'Songkok Tembaga',
            'description' => 'Songkok Recca mewah dengan bahan dasar tembaga berkualitas tinggi, memberikan kesan kokoh dan elegan.',
            'price' => 3000000,
            'is_featured' => true,
        ]);
        $p1->media()->create(['file_path' => 'images/songkok tembaga.jpg', 'media_type' => 'image']);
        $p1->sizes()->attach(Size::whereIn('size_number', ['No. 2', 'No. 3', 'No. 4', 'No. 5', 'No. 6', 'No. 7', 'No. 8', 'No. 9', 'No. 10'])->pluck('id'));

        $p2 = Product::create([
            'category_id' => $catGuru->id,
            'name' => 'Songkok Guru Benang Emas (Hitam)',
            'description' => 'Songkok Guru klasik dengan kombinasi warna hitam pekat dan benang emas yang berkilau.',
            'price' => 500000,
            'is_featured' => true,
        ]);
        $p2->media()->create(['file_path' => 'images/songkokgurubenangemas.jpg', 'media_type' => 'image']);
        $p2->sizes()->attach($sizesAll);
        $p2->colors()->attach([$colorHitam->id, $colorKuningEmas->id, $colorSilver->id, $colorMetallic->id, $colorHijau->id]);

        $p3 = Product::create([
            'category_id' => $catMetallic->id,
            'name' => 'Songkok Benang Metallic',
            'description' => 'Tampil beda dengan songkok berhias benang metallic yang memberikan efek kilau modern.',
            'price' => 800000,
        ]);
        $p3->media()->create(['file_path' => 'images/songkok_benang_metalic.jpg', 'media_type' => 'image']);
        $p3->sizes()->attach($sizesAll);
        $p3->colors()->attach([$colorHitam->id, $colorMetallic->id, $colorSilver->id, $colorKuningEmas->id, $colorHijau->id]);

        $p4 = Product::create([
            'category_id' => $catGuru->id,
            'name' => 'Songkok Guru Benang Emas (Putih)',
            'description' => 'Varian elegan Songkok Guru dengan warna dasar putih tulang alami, dipadukan dengan kemewahan benang emas.',
            'price' => 800000,
            'is_featured' => true,
        ]);
        $p4->media()->create(['file_path' => 'images/songkok_guru_benang_emas.jpg', 'media_type' => 'image']);
        $p4->sizes()->attach($sizesAll);
        $p4->colors()->attach([$colorPutih->id, $colorKuningEmas->id, $colorSilver->id, $colorMetallic->id]);

        $p5 = Product::create([
            'category_id' => $catGuru->id,
            'name' => 'Songkok Guru Putih Benang Hitam',
            'description' => 'Kombinasi kontras yang menawan antara warna putih tulang alami dengan aksen benang hitam.',
            'price' => 800000,
        ]);
        $p5->media()->create(['file_path' => 'images/songkok_guru_putih_benang_hitam.jpg', 'media_type' => 'image']);
        $p5->sizes()->attach($sizesAll);

        $p6 = Product::create([
            'category_id' => $catGuru->id,
            'name' => 'Songkok Guru Putih Bis Hitam',
            'description' => 'Songkok Guru berwarna putih tulang dengan hiasan benang kuning emas dan bis (garis tepi) hitam yang tegas.',
            'price' => 1000000,
        ]);
        $p6->media()->create(['file_path' => 'images/songkok_guru_putih_benang_kuning_emas_bis_hitam.jpg', 'media_type' => 'image']);
        $p6->sizes()->attach($sizesAll);

        $p7 = Product::create([
            'category_id' => $catLontarak->id,
            'name' => 'Songkok Lontarak Appi Benang Emas',
            'description' => 'Songkok Lontarak dengan motif anyaman Appi (api) yang khas, dihiasi dengan benang emas.',
            'price' => 100000,
        ]);
        $p7->media()->create(['file_path' => 'images/songkok_lontara_appi_benang_emas.jpg', 'media_type' => 'image']);
        $p7->sizes()->attach($sizesLontarak1);

        $p8 = Product::create([
            'category_id' => $catLontarak->id,
            'name' => 'Songkok Lontarak Appi Hitam',
            'description' => 'Varian Songkok Lontarak Appi dengan warna dasar hitam dan aksen benang emas.',
            'price' => 120000,
            'is_featured' => true,
        ]);
        $p8->media()->create(['file_path' => 'images/songkok_lontara_appi_benang_hitam benang emas.jpg', 'media_type' => 'image']);
        $p8->sizes()->attach($sizesLontarak2);
    }
}
