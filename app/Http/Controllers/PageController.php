<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // <-- Import model Product

class PageController extends Controller
{
    public function home()
    {
        // Ambil produk yang ditandai sebagai unggulan
        // Ambil maksimal 4, urutkan dari yang terbaru
        $featuredProducts = Product::with('category')
            ->where('is_featured', true)
            ->latest()
            ->take(4)
            ->get();

        // Kirim data ke view
        return view('pages.home', [
            'featuredProducts' => $featuredProducts
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }
}
