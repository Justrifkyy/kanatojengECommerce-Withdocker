{{-- SEO Meta Tags --}}
@push('meta')
<meta name="description" content="Dashboard Admin - Kelola bisnis Anda dengan mudah. Lihat statistik penjualan, pesanan terbaru, dan analitik lengkap.">
<meta name="keywords" content="admin dashboard, manajemen bisnis, statistik penjualan, kelola pesanan">
<meta name="author" content="Admin Dashboard">
<meta property="og:title" content="Dashboard Admin - Kelola Bisnis Anda">
<meta property="og:description" content="Platform manajemen bisnis terlengkap dengan analitik real-time dan laporan komprehensif">
<meta property="og:type" content="website">
<meta name="twitter:card" content="summary_large_image">
<meta name="robots" content="noindex, nofollow">
@endpush

@push('styles')
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }
    
    .animate-fadeInUp {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    
    .animate-slideInLeft {
        animation: slideInLeft 0.5s ease-out forwards;
    }
    
    .animate-pulse-gentle {
        animation: pulse 2s infinite;
    }
    
    .card-hover {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .card-hover:hover {
        transform: translateY(-4px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }
    
    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    .glass-effect {
        backdrop-filter: blur(16px) saturate(180%);
        -webkit-backdrop-filter: blur(16px) saturate(180%);
        background-color: rgba(255, 255, 255, 0.75);
        border: 1px solid rgba(255, 255, 255, 0.125);
    }
</style>
@endpush

<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 mb-1">Dashboard</h1>
                <p class="text-gray-600">Selamat datang kembali! Berikut ringkasan bisnis Anda hari ini.</p>
            </div>
            <div class="hidden md:flex items-center space-x-3">
                <div class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-4 py-2 rounded-lg text-sm font-medium">
                    {{ now()->format('d M Y') }}
                </div>
            </div>
        </div>
    </x-slot>

    <div class="space-y-8">
        {{-- Hero Statistics Cards --}}
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" role="region" aria-label="Statistik Utama">
            {{-- Kartu Pendapatan Total --}}
            <article class="group bg-white p-7 rounded-2xl shadow-lg border border-gray-100 card-hover animate-fadeInUp relative overflow-hidden">
                <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-green-400/20 to-emerald-500/20 rounded-full -mr-10 -mt-10"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-gradient-to-br from-green-500 to-emerald-600 p-3 rounded-xl shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="text-green-500 text-xs font-semibold bg-green-50 px-2 py-1 rounded-full">Pendapatan</div>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 mb-2 tracking-wide uppercase">Pendapatan Total</h3>
                        <p class="text-3xl font-bold text-gray-900 mb-1">Rp{{ number_format($totalRevenue, 0, ',', '.') }}</p>
                        <p class="text-xs text-gray-400">Bulan ini</p>
                    </div>
                </div>
            </article>

            {{-- Kartu Pesanan Baru --}}
            <article class="group bg-white p-7 rounded-2xl shadow-lg border border-gray-100 card-hover animate-fadeInUp relative overflow-hidden" style="animation-delay: 0.1s">
                <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-blue-400/20 to-indigo-500/20 rounded-full -mr-10 -mt-10"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-gradient-to-br from-blue-500 to-indigo-600 p-3 rounded-xl shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                        </div>
                        <div class="text-blue-500 text-xs font-semibold bg-blue-50 px-2 py-1 rounded-full">Pesanan</div>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 mb-2 tracking-wide uppercase">Pesanan Baru</h3>
                        <p class="text-3xl font-bold text-gray-900 mb-1">{{ $newOrdersCount }}</p>
                        <p class="text-xs text-gray-400">Perlu diproses</p>
                    </div>
                </div>
            </article>

            {{-- Kartu Total Produk --}}
            <article class="group bg-white p-7 rounded-2xl shadow-lg border border-gray-100 card-hover animate-fadeInUp relative overflow-hidden" style="animation-delay: 0.2s">
                <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-amber-400/20 to-yellow-500/20 rounded-full -mr-10 -mt-10"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-gradient-to-br from-amber-500 to-yellow-600 p-3 rounded-xl shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <div class="text-amber-500 text-xs font-semibold bg-amber-50 px-2 py-1 rounded-full">Aktif</div>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 mb-2 tracking-wide uppercase">Total Produk</h3>
                        <p class="text-3xl font-bold text-gray-900 mb-1">{{ $totalProducts }}</p>
                        <p class="text-xs text-gray-400">Item tersedia</p>
                    </div>
                </div>
            </article>

            {{-- Kartu Total Pengguna --}}
            <article class="group bg-white p-7 rounded-2xl shadow-lg border border-gray-100 card-hover animate-fadeInUp relative overflow-hidden" style="animation-delay: 0.3s">
                <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-purple-400/20 to-violet-500/20 rounded-full -mr-10 -mt-10"></div>
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <div class="bg-gradient-to-br from-purple-500 to-violet-600 p-3 rounded-xl shadow-lg group-hover:shadow-xl transition-shadow duration-300">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="text-purple-500 text-xs font-semibold bg-purple-50 px-2 py-1 rounded-full">Pengguna</div>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-500 mb-2 tracking-wide uppercase">Total Pengguna</h3>
                        <p class="text-3xl font-bold text-gray-900 mb-1">{{ $totalUsers }}</p>
                        <p class="text-xs text-gray-400">Terdaftar</p>
                    </div>
                </div>
            </article>
        </section>

        {{-- Recent Orders Section --}}
        <section class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden animate-fadeInUp" style="animation-delay: 0.4s" role="region" aria-label="Pesanan Terbaru">
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-8 py-6 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-xl font-bold text-gray-900 mb-1">Pesanan Terbaru</h2>
                        <p class="text-sm text-gray-600">Kelola dan pantau pesanan yang masuk</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                            <span class="text-xs text-gray-500 font-medium">Live Updates</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50/50">
                            <tr>
                                <th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center space-x-1">
                                        <span>Order ID</span>
                                        <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                        </svg>
                                    </div>
                                </th>
                                <th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Pelanggan</th>
                                <th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal</th>
                                <th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Total</th>
                                <th scope="col" class="px-8 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                                <th scope="col" class="relative px-8 py-4">
                                    <span class="sr-only">Aksi</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($recentOrders as $index => $order)
                                <tr class="hover:bg-gray-50/50 transition-colors duration-200 animate-slideInLeft" style="animation-delay: {{ $index * 0.05 }}s">
                                    <td class="px-8 py-5 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center text-white text-xs font-bold mr-3">
                                                {{ substr($order->id, -2) }}
                                            </div>
                                            <span class="text-sm font-semibold text-gray-900">#{{ $order->id }}</span>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-gradient-to-br from-gray-200 to-gray-300 rounded-full flex items-center justify-center text-gray-600 text-sm font-medium mr-3">
                                                {{ strtoupper(substr($order->user->name, 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="text-sm font-medium text-gray-900">{{ $order->user->name }}</div>
                                                <div class="text-xs text-gray-500">Pelanggan</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-5 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 font-medium">{{ $order->order_date->format('d M Y') }}</div>
                                        <div class="text-xs text-gray-500">{{ $order->order_date->format('H:i') }}</div>
                                    </td>
                                    <td class="px-8 py-5 whitespace-nowrap">
                                        <div class="text-sm font-bold text-gray-900">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</div>
                                        <div class="text-xs text-gray-500">Total pembayaran</div>
                                    </td>
                                    <td class="px-8 py-5 whitespace-nowrap">
                                        <span class="inline-flex items-center px-3 py-1.5 rounded-full text-xs font-semibold ring-1 ring-inset
                                            @if($order->status == 'Baru') 
                                                bg-blue-50 text-blue-800 ring-blue-600/20
                                            @elseif($order->status == 'Dalam Proses') 
                                                bg-yellow-50 text-yellow-800 ring-yellow-600/20
                                            @elseif($order->status == 'Dikirim') 
                                                bg-green-50 text-green-800 ring-green-600/20
                                            @elseif($order->status == 'Selesai') 
                                                bg-gray-50 text-gray-800 ring-gray-600/20
                                            @elseif($order->status == 'Dibatalkan') 
                                                bg-red-50 text-red-800 ring-red-600/20
                                            @endif
                                        ">
                                            <div class="w-1.5 h-1.5 rounded-full mr-2
                                                @if($order->status == 'Baru') bg-blue-400
                                                @elseif($order->status == 'Dalam Proses') bg-yellow-400 animate-pulse
                                                @elseif($order->status == 'Dikirim') bg-green-400 animate-pulse
                                                @elseif($order->status == 'Selesai') bg-gray-400
                                                @elseif($order->status == 'Dibatalkan') bg-red-400
                                                @endif
                                            "></div>
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-5 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.orders.show', $order) }}" 
                                           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-xs font-semibold rounded-lg hover:from-indigo-600 hover:to-purple-700 transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                                            <svg class="w-3 h-3 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-8 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center space-y-3">
                                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                                </svg>
                                            </div>
                                            <div class="text-center">
                                                <h3 class="text-lg font-medium text-gray-900 mb-1">Belum ada pesanan</h3>
                                                <p class="text-sm text-gray-500">Pesanan baru akan muncul di sini ketika ada pelanggan yang memesan</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</x-admin-layout>