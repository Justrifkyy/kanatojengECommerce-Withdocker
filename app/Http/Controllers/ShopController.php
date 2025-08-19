<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Cache;

class ShopController extends Controller
{
    /**
     * Menampilkan halaman daftar produk dengan filter dan sort.
     */
    public function index(Request $request)
    {
        // 2. Gunakan Cache::remember untuk mengambil daftar kategori
        $categories = Cache::remember('all_categories', now()->addHours(6), function () {
            // Blok kode ini hanya akan dijalankan jika 'all_categories' tidak ada di cache.
            // Setelah dijalankan, hasilnya akan disimpan di cache selama 6 jam.
            return ProductCategory::orderBy('name', 'asc')->get();
        });

        // ... sisa logika untuk query produk tidak berubah ...
        $productsQuery = Product::with('category');

        if ($request->filled('category')) {
            $productsQuery->where('category_id', $request->category);
        }

        if ($request->filled('sort')) {
            if ($request->sort == 'price_asc') {
                $productsQuery->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $productsQuery->orderBy('price', 'desc');
            }
        } else {
            $productsQuery->latest();
        }

        $products = $productsQuery->paginate(9)->withQueryString();

        return view('shop.index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Menampilkan halaman detail untuk satu produk.
     * (Method ini tidak berubah)
     */
    public function show(Product $product)
    {
        // Memuat semua relasi yang dibutuhkan: kategori, ukuran, media, dan WARNA
        $product->load('category', 'sizes', 'media', 'colors');

        return view('shop.show', [
            'product' => $product
        ]);
    }
}
