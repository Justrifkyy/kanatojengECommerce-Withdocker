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
        // Mengambil kategori dari cache untuk performa
        $categories = Cache::remember('all_categories', now()->addHours(6), function () {
            return ProductCategory::orderBy('name', 'asc')->get();
        });

        // Eager load relasi untuk optimasi (mencegah N+1 query problem)
        $productsQuery = Product::with(['category', 'media']);

        // Filter berdasarkan kategori
        if ($request->filled('category')) {
            $productsQuery->where('category_id', $request->category);
        }

        // Urutkan produk
        if ($request->filled('sort')) {
            if ($request->sort == 'price_asc') {
                $productsQuery->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $productsQuery->orderBy('price', 'desc');
            }
        } else {
            $productsQuery->latest(); // Default: urutkan berdasarkan yang terbaru
        }

        // Ambil produk dengan paginasi
        $products = $productsQuery->paginate(8)->withQueryString();

        return view('shop.index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Menampilkan halaman detail untuk satu produk.
     */
    public function show(Product $product)
    {
        // Memuat semua relasi yang dibutuhkan dengan cara yang benar
        // 'sizes' akan otomatis membawa data 'stock' dari tabel pivot
        $product->load('category', 'sizes', 'media', 'colors');

        return view('shop.show', [
            'product' => $product
        ]);
    }
}
