<x-admin-layout>
    {{-- SEO Meta Tags --}}
    <x-slot name="head">
        <title>Manajemen Pesanan - Dashboard Admin</title>
        <meta name="description" content="Kelola dan pantau semua pesanan pelanggan dengan mudah melalui dashboard admin yang responsif dan modern.">
        <meta name="keywords" content="manajemen pesanan, dashboard admin, e-commerce, order management">
        <meta name="robots" content="noindex, nofollow">
    </x-slot>

    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="p-2 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Manajemen Pesanan</h1>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            {{-- Header Section with Stats --}}
            <div class="mb-8 bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 px-8 py-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-white mb-2">Dashboard Pesanan</h2>
                            <p class="text-indigo-100 text-sm">Kelola dan pantau semua pesanan pelanggan Anda</p>
                        </div>
                        <div class="hidden md:block">
                            <div class="bg-white/20 backdrop-blur-sm rounded-xl px-4 py-2">
                                <span class="text-white font-semibold">{{ $orders->total() }} Total Pesanan</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Filter Status Buttons --}}
                <div class="px-8 py-6 bg-white">
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('admin.orders.index') }}" 
                           class="group inline-flex items-center px-5 py-2.5 text-sm font-medium rounded-full transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 
                                  {{ !request('status') ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-lg shadow-indigo-500/30' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            <span class="w-2 h-2 rounded-full mr-2 {{ !request('status') ? 'bg-white' : 'bg-gray-400' }}"></span>
                            Semua
                        </a>
                        <a href="{{ route('admin.orders.index', ['status' => 'Baru']) }}" 
                           class="group inline-flex items-center px-5 py-2.5 text-sm font-medium rounded-full transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2
                                  {{ request('status') == 'Baru' ? 'bg-gradient-to-r from-blue-500 to-blue-600 text-white shadow-lg shadow-blue-500/30' : 'bg-gray-100 text-gray-700 hover:bg-blue-50 hover:text-blue-700' }}">
                            <span class="w-2 h-2 rounded-full mr-2 {{ request('status') == 'Baru' ? 'bg-white' : 'bg-blue-400' }}"></span>
                            Baru
                        </a>
                        <a href="{{ route('admin.orders.index', ['status' => 'Dalam Proses']) }}" 
                           class="group inline-flex items-center px-5 py-2.5 text-sm font-medium rounded-full transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2
                                  {{ request('status') == 'Dalam Proses' ? 'bg-gradient-to-r from-yellow-500 to-orange-500 text-white shadow-lg shadow-yellow-500/30' : 'bg-gray-100 text-gray-700 hover:bg-yellow-50 hover:text-yellow-700' }}">
                            <span class="w-2 h-2 rounded-full mr-2 {{ request('status') == 'Dalam Proses' ? 'bg-white' : 'bg-yellow-400' }}"></span>
                            Dalam Proses
                        </a>
                        <a href="{{ route('admin.orders.index', ['status' => 'Dikirim']) }}" 
                           class="group inline-flex items-center px-5 py-2.5 text-sm font-medium rounded-full transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2
                                  {{ request('status') == 'Dikirim' ? 'bg-gradient-to-r from-green-500 to-emerald-500 text-white shadow-lg shadow-green-500/30' : 'bg-gray-100 text-gray-700 hover:bg-green-50 hover:text-green-700' }}">
                            <span class="w-2 h-2 rounded-full mr-2 {{ request('status') == 'Dikirim' ? 'bg-white' : 'bg-green-400' }}"></span>
                            Dikirim
                        </a>
                        <a href="{{ route('admin.orders.index', ['status' => 'Selesai']) }}" 
                           class="group inline-flex items-center px-5 py-2.5 text-sm font-medium rounded-full transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2
                                  {{ request('status') == 'Selesai' ? 'bg-gradient-to-r from-gray-500 to-gray-600 text-white shadow-lg shadow-gray-500/30' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                            <span class="w-2 h-2 rounded-full mr-2 {{ request('status') == 'Selesai' ? 'bg-white' : 'bg-gray-400' }}"></span>
                            Selesai
                        </a>
                        <a href="{{ route('admin.orders.index', ['status' => 'Dibatalkan']) }}" 
                           class="group inline-flex items-center px-5 py-2.5 text-sm font-medium rounded-full transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2
                                  {{ request('status') == 'Dibatalkan' ? 'bg-gradient-to-r from-red-500 to-red-600 text-white shadow-lg shadow-red-500/30' : 'bg-gray-100 text-gray-700 hover:bg-red-50 hover:text-red-700' }}">
                            <span class="w-2 h-2 rounded-full mr-2 {{ request('status') == 'Dibatalkan' ? 'bg-white' : 'bg-red-400' }}"></span>
                            Dibatalkan
                        </a>
                    </div>
                </div>
            </div>

            {{-- Table Section --}}
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                            <tr>
                                <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                        </svg>
                                        <span>Order ID</span>
                                    </div>
                                </th>
                                <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span>Pelanggan</span>
                                    </div>
                                </th>
                                <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4M8 7h8m-8 0a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2V9a2 2 0 00-2-2"></path>
                                        </svg>
                                        <span>Tanggal</span>
                                    </div>
                                </th>
                                <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                        <span>Total</span>
                                    </div>
                                </th>
                                <th class="px-8 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Status</span>
                                    </div>
                                </th>
                                <th class="relative px-8 py-4">
                                    <span class="sr-only">Aksi</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @forelse ($orders as $order)
                                <tr class="hover:bg-gray-50 transition-colors duration-200 group">
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center">
                                                <span class="text-white text-sm font-bold">#</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-bold text-gray-900">#{{ $order->id }}</div>
                                                <div class="text-xs text-gray-500">Order ID</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center">
                                                <span class="text-white text-sm font-bold">{{ substr($order->user->name, 0, 1) }}</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $order->user->name }}</div>
                                                <div class="text-xs text-gray-500">Pelanggan</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 font-medium">{{ $order->order_date->format('d M Y') }}</div>
                                        <div class="text-xs text-gray-500">{{ $order->order_date->format('H:i') }} WIB</div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <div class="text-lg font-bold text-gray-900">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</div>
                                        <div class="text-xs text-gray-500">Total Pembayaran</div>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap">
                                        <span class="inline-flex items-center px-4 py-2 text-xs font-bold rounded-full border-2 
                                            @if($order->status == 'Baru') bg-blue-50 text-blue-700 border-blue-200 @endif
                                            @if($order->status == 'Dalam Proses') bg-yellow-50 text-yellow-700 border-yellow-200 @endif
                                            @if($order->status == 'Dikirim') bg-green-50 text-green-700 border-green-200 @endif
                                            @if($order->status == 'Selesai') bg-gray-50 text-gray-700 border-gray-200 @endif
                                            @if($order->status == 'Dibatalkan') bg-red-50 text-red-700 border-red-200 @endif
                                        ">
                                            <span class="w-2 h-2 rounded-full mr-2 
                                                @if($order->status == 'Baru') bg-blue-400 @endif
                                                @if($order->status == 'Dalam Proses') bg-yellow-400 @endif
                                                @if($order->status == 'Dikirim') bg-green-400 @endif
                                                @if($order->status == 'Selesai') bg-gray-400 @endif
                                                @if($order->status == 'Dibatalkan') bg-red-400 @endif
                                            "></span>
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td class="px-8 py-6 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.orders.show', $order) }}" 
                                           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-sm font-medium rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-lg shadow-indigo-500/25">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-8 py-16">
                                        <div class="text-center">
                                            <div class="mx-auto w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                            </div>
                                            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada pesanan</h3>
                                            <p class="text-gray-500">Pesanan dari pelanggan akan muncul di sini.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if($orders->hasPages())
                    <div class="px-8 py-6 bg-gray-50 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-700">
                                Menampilkan <span class="font-semibold">{{ $orders->firstItem() }}</span> sampai 
                                <span class="font-semibold">{{ $orders->lastItem() }}</span> dari 
                                <span class="font-semibold">{{ $orders->total() }}</span> hasil
                            </div>
                            <div class="pagination-wrapper">
                                {{ $orders->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Custom Styles for Enhanced Animations --}}
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

        .group:hover .transform {
            animation: fadeInUp 0.3s ease-out;
        }

        .pagination-wrapper nav {
            @apply flex justify-center;
        }

        .pagination-wrapper .pagination {
            @apply flex space-x-1;
        }

        .pagination-wrapper .page-link {
            @apply px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:border-gray-400 transition-all duration-200;
        }

        .pagination-wrapper .page-item.active .page-link {
            @apply bg-gradient-to-r from-indigo-600 to-purple-600 text-white border-indigo-600;
        }

        .pagination-wrapper .page-item.disabled .page-link {
            @apply text-gray-400 cursor-not-allowed;
        }
    </style>
</x-admin-layout>