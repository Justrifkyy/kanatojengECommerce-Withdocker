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

        $sizesAll = Size::whereIn('size_number', ['No. 1', 'No. 2', 'No. 3', 'No. 4', 'No. 5', 'No. 6', 'No. 7', 'No. 8', 'No. 9', 'No. 10'])->get();

        $colorHitam = Color::where('name', 'Hitam')->first();
        $colorKuningEmas = Color::where('name', 'Kuning Emas')->first();
        $colorSilver = Color::where('name', 'Silver')->first();
        $colorMetallic = Color::where('name', 'Metallic')->first();
        $colorHijau = Color::where('name', 'Hijau')->first();
        $colorPutih = Color::where('name', 'Putih Tulang')->first();
        $colorMaroon = Color::where('name', 'Merah Maroon')->first();

        // --- FUNGSI HELPER UNTUK MEMBUAT VARIAN DENGAN STOK ---
        $createVariants = function ($sizes) {
            $variantsData = [];
            foreach ($sizes as $size) {
                // Beri stok acak antara 0 dan 15 untuk setiap ukuran
                $variantsData[$size->id] = ['stock' => rand(0, 15)];
            }
            return $variantsData;
        };

        // --- MULAI MEMBUAT PRODUK BERDASARKAN DATA ASLI ---

        // 1. Songkok Tembaga
        $p1 = Product::create([
            'category_id' => $catTembaga->id,
            'name' => 'Songkok Tembaga Eksklusif',
            'description' => 'Songkok Recca mewah dengan bahan dasar tembaga berkualitas tinggi, memberikan kesan kokoh dan elegan.',
            'price' => 3000000,
        ]);
        $p1->media()->create(['file_path' => 'images/songkok_tembaga.jpg', 'media_type' => 'image']);
        $p1->sizes()->sync($createVariants(Size::whereIn('size_number', ['No. 2', 'No. 3', 'No. 4', 'No. 5', 'No. 6', 'No. 7', 'No. 8', 'No. 9', 'No. 10'])->get()));

        // 2. Songkok Guru Benang Emas (Hitam)
        $p2 = Product::create([
            'category_id' => $catGuru->id,
            'name' => 'Songkok Guru Benang Emas (Dasar Hitam)',
            'description' => 'Songkok Guru klasik dengan kombinasi warna hitam pekat dan benang emas yang berkilau. Tersedia dalam berbagai pilihan warna kombinasi.',
            'price' => 500000,
            'is_featured' => true, // Unggulan
        ]);
        $p2->media()->create(['file_path' => 'images/songkokgurubenangemas.jpg', 'media_type' => 'image']);
        $p2->sizes()->sync($createVariants($sizesAll));
        $p2->colors()->sync([$colorHitam->id, $colorKuningEmas->id, $colorSilver->id, $colorMetallic->id, $colorHijau->id]);

        // 3. Songkok Benang Metallic
        $p3 = Product::create([
            'category_id' => $catMetallic->id,
            'name' => 'Songkok Benang Metallic Modern',
            'description' => 'Tampil beda dengan songkok berhias benang metallic yang memberikan efek kilau modern dan mewah.',
            'price' => 800000,
            'is_featured' => true, // Unggulan
        ]);
        $p3->media()->create(['file_path' => 'images/songkok_benang_metalic.jpg', 'media_type' => 'image']);
        $p3->sizes()->sync($createVariants($sizesAll));
        $p3->colors()->sync([$colorHitam->id, $colorMetallic->id, $colorSilver->id, $colorKuningEmas->id, $colorHijau->id]);

        // 4. Songkok Guru Benang Emas (Putih)
        $p4 = Product::create([
            'category_id' => $catGuru->id,
            'name' => 'Songkok Guru Benang Emas (Dasar Putih)',
            'description' => 'Varian elegan Songkok Guru dengan warna dasar putih tulang alami, dipadukan dengan kemewahan benang emas.',
            'price' => 800000,
            'is_featured' => true, // Unggulan
        ]);
        $p4->media()->create(['file_path' => 'images/songkok_guru_benang_emas.jpg', 'media_type' => 'image']);
        $p4->sizes()->sync($createVariants($sizesAll));
        $p4->colors()->sync([$colorPutih->id, $colorKuningEmas->id, $colorSilver->id, $colorMetallic->id]);

        // 5. Songkok Guru Putih Benang Hitam
        $p5 = Product::create([
            'category_id' => $catGuru->id,
            'name' => 'Songkok Guru Putih Benang Hitam',
            'description' => 'Kombinasi kontras yang menawan antara warna putih tulang alami dengan aksen benang hitam yang tegas.',
            'price' => 800000,
        ]);
        $p5->media()->create(['file_path' => 'images/songkok_guru_putih_benang_hitam.jpg', 'media_type' => 'image']);
        $p5->sizes()->sync($createVariants($sizesAll));

        // 6. Songkok Guru Putih Bis Hitam
        $p6 = Product::create([
            'category_id' => $catGuru->id,
            'name' => 'Songkok Guru Putih Bis Hitam',
            'description' => 'Songkok Guru berwarna putih tulang dengan hiasan benang kuning emas dan bis (garis tepi) hitam yang tegas.',
            'price' => 1000000,
            'is_featured' => true, // Unggulan
        ]);
        $p6->media()->create(['file_path' => 'images/songkok_guru_putih_benang_kuning_emas_bis_hitam.jpg', 'media_type' => 'image']);
        $p6->sizes()->sync($createVariants($sizesAll));

        // 7. Songkok Lontarak Appi Benang Emas
        $p7 = Product::create([
            'category_id' => $catLontarak->id,
            'name' => 'Songkok Lontarak Appi Benang Emas',
            'description' => 'Songkok Lontarak dengan motif anyaman Appi (api) yang khas, dihiasi dengan benang emas.',
            'price' => 100000,
        ]);
        $p7->media()->create(['file_path' => 'images/songkok_lontara_appi_benang_emas.jpg', 'media_type' => 'image']);
        $p7->sizes()->sync($createVariants(Size::whereIn('size_number', ['No. 6', 'No. 7', 'No. 8'])->get()));

        // 8. Songkok Lontarak Appi Hitam
        $p8 = Product::create([
            'category_id' => $catLontarak->id,
            'name' => 'Songkok Lontarak Appi Hitam Benang Emas',
            'description' => 'Varian Songkok Lontarak Appi dengan warna dasar hitam dan aksen benang emas yang elegan.',
            'price' => 120000,
        ]);
        $p8->media()->create(['file_path' => 'images/songkok_lontara_appi_benang_hitam benang emas.jpg', 'media_type' => 'image']);
        $p8->sizes()->sync($createVariants(Size::whereIn('size_number', ['No. 4', 'No. 5', 'No. 6', 'No. 7', 'No. 8'])->get()));

        // 9. Songkok Guru Benang Emas (Murah)
        $p9 = Product::create([
            'category_id' => $catGuru->id,
            'name' => 'Songkok Guru Benang Emas Ekonomis',
            'description' => 'Pilihan ekonomis untuk Songkok Guru Benang Emas, tetap dengan kualitas anyaman yang baik.',
            'price' => 150000,
        ]);
        $p9->media()->create(['file_path' => 'images/songkok_guru_benang_emas6.jpg', 'media_type' => 'image']);
        $p9->sizes()->sync($createVariants(Size::whereIn('size_number', ['No. 3', 'No. 4', 'No. 5', 'No. 6', 'No. 7', 'No. 8', 'No. 9', 'No. 10'])->get()));
        $p9->colors()->sync([$colorHitam->id, $colorKuningEmas->id, $colorSilver->id, $colorMetallic->id]);
    }
}
