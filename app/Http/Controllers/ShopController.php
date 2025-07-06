<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    /**
     * Menampilkan halaman daftar produk.
     */
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(9);

        return view('shop.index', [
            'products' => $products
        ]);
    }

    /**
     * Menampilkan halaman detail untuk satu produk.
     */
    public function show(Product $product)
    {
        // Mengambil data produk beserta relasi kategori dan ukuran yang tersedia
        // Eager load relasi untuk efisiensi
        $product->load('category', 'sizes');

        return view('shop.show', [
            'product' => $product
        ]);
    }
}
