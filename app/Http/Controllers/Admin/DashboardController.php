<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil beberapa data untuk ditampilkan di dashboard
        $totalProducts = Product::count();
        $totalUsers = User::where('role', 'user')->count();

        return view('admin.dashboard', compact('totalProducts', 'totalUsers'));
    }
}
