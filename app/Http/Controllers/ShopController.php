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
        $categories = Cache::remember('all_categories', now()->addHours(6), function () {
            return ProductCategory::orderBy('name', 'asc')->get();
        });

        // FIX: Menambahkan with(['category', 'media']) untuk Eager Loading
        $productsQuery = Product::with(['category', 'media']);

        // ... sisa logika filter dan sort tidak berubah ...
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
