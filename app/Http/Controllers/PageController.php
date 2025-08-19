<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Pastikan model Product di-import

class PageController extends Controller
{
    public function home()
    {
        // FIX: Mengambil produk yang ditandai sebagai 'is_featured = true' dari database
        // Kita juga memuat relasi 'category' dan 'media' agar tidak ada error di view
        $featuredProducts = Product::with(['category', 'media'])
            ->where('is_featured', true)
            ->latest() // Mengambil yang terbaru
            ->take(7)  // Mengambil maksimal 7 produk
            ->get();

        // Kirim data yang sudah benar ke view
        return view('pages.home', [
            'featuredProducts' => $featuredProducts
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }
}
