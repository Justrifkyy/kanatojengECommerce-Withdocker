<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class ShopController extends Controller
{
    /**
     * Menampilkan halaman daftar produk dengan filter dan sort.
     */
    public function index(Request $request)
    {
        // 1. Ambil semua kategori untuk ditampilkan di sidebar filter
        $categories = ProductCategory::orderBy('name', 'asc')->get();

        // 2. Mulai query dasar untuk produk
        $productsQuery = Product::with('category');

        // 3. Terapkan filter berdasarkan kategori jika ada permintaan
        if ($request->filled('category')) {
            $productsQuery->where('category_id', $request->category);
        }

        // 4. Terapkan pengurutan produk
        if ($request->filled('sort')) {
            if ($request->sort == 'price_asc') {
                $productsQuery->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $productsQuery->orderBy('price', 'desc');
            }
        } else {
            // Jika tidak ada permintaan sort, urutkan berdasarkan yang terbaru
            $productsQuery->latest();
        }

        // 5. Eksekusi query dan ambil hasilnya dengan paginasi
        // withQueryString() memastikan parameter filter/sort tetap ada saat pindah halaman
        $products = $productsQuery->paginate(9)->withQueryString();

        // 6. Kirim semua data yang dibutuhkan ke view
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
        $product->load('category', 'sizes');
        return view('shop.show', [
            'product' => $product
        ]);
    }
}
