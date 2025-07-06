<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        // Nantinya kita bisa menambahkan logika untuk mengambil data promosi, dll.
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }
}
