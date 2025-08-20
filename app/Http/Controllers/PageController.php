<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    public function home()
    {
        // FIX: Menambahkan with(['category', 'media']) untuk Eager Loading
        $featuredProducts = Product::with(['category', 'media'])
            ->where('is_featured', true)
            ->latest()
            ->take(5)
            ->get();

        return view('pages.home', [
            'featuredProducts' => $featuredProducts
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }
}
