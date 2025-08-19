<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Manajemen Produk</h1>
                <p class="mt-1 text-sm text-gray-600">Kelola dan pantau semua produk Anda dengan mudah</p>
            </div>
            <div class="hidden md:flex items-center space-x-2 text-sm text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                </svg>
                <span>{{ $products->total() ?? 0 }} Total Produk</span>
            </div>
        </div>
    </x-slot>

    <!-- SEO Meta Tags Enhancement -->
    @push('head')
        <meta name="description" content="Halaman manajemen produk untuk mengelola inventori dan katalog produk dengan interface yang user-friendly dan responsif.">
        <meta name="keywords" content="manajemen produk, inventori, katalog, admin dashboard, e-commerce">
        <meta name="robots" content="noindex, nofollow">
        <title>Manajemen Produk - Admin Dashboard</title>
    @endpush

    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-white to-gray-100">
        <!-- Header Action Section -->
        <div class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex items-center space-x-4">
                        <div class="hidden sm:block w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900">Daftar Produk</h2>
                            <p class="text-sm text-gray-600 hidden sm:block">Kelola produk Anda dengan mudah</p>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <!-- Search Bar (Optional Enhancement) -->
                        <div class="hidden md:flex relative">
                            <input type="text" placeholder="Cari produk..." 
                                   class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-200">
                            <svg class="absolute left-3 top-2.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        
                        <!-- Add Product Button -->
                        <a href="{{ route('admin.products.create') }}" 
                           class="group relative inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-indigo-600 to-indigo-700 text-white text-sm font-medium rounded-lg hover:from-indigo-700 hover:to-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transform hover:scale-105 transition-all duration-200 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2 group-hover:rotate-90 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Tambah Produk
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Products Table Card -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">
                <!-- Table Header -->
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Daftar Produk</h3>
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <div class="flex items-center space-x-1">
                                <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                                <span>Live Data</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span>Gambar</span>
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                        </svg>
                                        <span>Nama Produk</span>
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                        </svg>
                                        <span>Kategori</span>
                                    </div>
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                        </svg>
                                        <span>Harga</span>
                                    </div>
                                </th>
                                <th class="relative px-6 py-4">
                                    <span class="sr-only">Aksi</span>
                                    <div class="flex items-center justify-center">
                                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                        </svg>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($products as $product)
                                <tr class="hover:bg-gray-50 transition-colors duration-150 group">
                                    <!-- Product Image -->
                                    <td class="px-6 py-6 whitespace-nowrap">
                                        @php
                                            $thumbnail = $product->media->first();
                                        @endphp
                                        <div class="relative">
                                            <div class="w-20 h-20 rounded-xl overflow-hidden bg-gray-100 ring-2 ring-gray-200 group-hover:ring-indigo-300 transition-all duration-200">
                                                <img src="{{ $thumbnail ? asset('storage/' . $thumbnail->file_path) : 'https://placehold.co/150x150/e0e0e0/333?text=No+Image' }}" 
                                                     alt="{{ $product->name }}" 
                                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                                     loading="lazy">
                                            </div>
                                            @if(!$thumbnail)
                                                <div class="absolute inset-0 flex items-center justify-center">
                                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                    </svg>
                                                </div>
                                            @endif
                                        </div>
                                    </td>
                                    
                                    <!-- Product Name -->
                                    <td class="px-6 py-6 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors duration-150">
                                                    {{ $product->name }}
                                                </div>
                                                <div class="text-xs text-gray-500 mt-1">
                                                    ID: #{{ $product->id }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <!-- Category -->
                                    <td class="px-6 py-6 whitespace-nowrap">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 ring-1 ring-blue-200">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                            </svg>
                                            {{ $product->category->name }}
                                        </span>
                                    </td>
                                    
                                    <!-- Price -->
                                    <td class="px-6 py-6 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm font-bold text-green-600">
                                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                                </div>
                                                <div class="text-xs text-gray-500">
                                                    Harga satuan
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                    <!-- Actions -->
                                    <td class="px-6 py-6 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center justify-end space-x-3">
                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.products.edit', $product) }}" 
                                               class="inline-flex items-center px-3 py-2 text-sm font-medium text-indigo-600 bg-indigo-50 border border-indigo-200 rounded-lg hover:bg-indigo-100 hover:border-indigo-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-150 group">
                                                <svg class="w-4 h-4 mr-1 group-hover:rotate-12 transition-transform duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                                Edit
                                            </a>
                                            
                                            <!-- Delete Button -->
                                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline-block" onsubmit="return confirm('Anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-red-600 bg-red-50 border border-red-200 rounded-lg hover:bg-red-100 hover:border-red-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-150 group">
                                                    <svg class="w-4 h-4 mr-1 group-hover:scale-110 transition-transform duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <!-- Empty State -->
                                <tr>
                                    <td colspan="5" class="px-6 py-16 whitespace-nowrap text-center">
                                        <div class="flex flex-col items-center justify-center space-y-4">
                                            <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center">
                                                <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-semibold text-gray-900">Belum ada produk</h3>
                                                <p class="text-sm text-gray-600 mt-1">Mulai dengan menambahkan produk pertama Anda</p>
                                            </div>
                                            <a href="{{ route('admin.products.create') }}" 
                                               class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-all duration-150">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                </svg>
                                                Tambah Produk Pertama
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            @if($products->hasPages())
                <div class="mt-8 bg-white rounded-xl shadow-sm border border-gray-200 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2h4a1 1 0 110 2h-1v10a2 2 0 01-2 2H6a2 2 0 01-2-2V6H3a1 1 0 110-2h4z"/>
                            </svg>
                            <span>Menampilkan {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} produk</span>
                        </div>
                        <div class="pagination-wrapper">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Custom Styles -->
    @push('styles')
    <style>
        .pagination-wrapper .pagination {
            @apply flex items-center space-x-1;
        }
        .pagination-wrapper .page-link {
            @apply px-3 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition-all duration-150;
        }
        .pagination-wrapper .page-item.active .page-link {
            @apply bg-indigo-600 text-white border-indigo-600;
        }
        .pagination-wrapper .page-item.disabled .page-link {
            @apply text-gray-400 cursor-not-allowed;
        }
    </style>
    @endpush
</x-admin-layout>