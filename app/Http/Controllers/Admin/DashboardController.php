<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil semua data statistik yang dibutuhkan
        
        // 1. Total Pendapatan dari pesanan yang sudah 'Selesai'
        $totalRevenue = Order::where('status', 'Selesai')->sum('total_amount');

        // 2. Jumlah Pesanan Baru yang perlu diproses
        $newOrdersCount = Order::where('status', 'Baru')->count();

        // 3. Total Produk yang ada di toko
        $totalProducts = Product::count();
        
        // 4. Total Pengguna (yang bukan admin)
        $totalUsers = User::where('role', 'user')->count();

        // 5. Mengambil 5 pesanan terakhir untuk ditampilkan di daftar
        $recentOrders = Order::with('user')->latest()->take(5)->get();
        
        // Mengirim semua data ke view
        return view('admin.dashboard', compact(
            'totalRevenue', 
            'newOrdersCount', 
            'totalProducts', 
            'totalUsers', 
            'recentOrders'
        ));
    }
}
