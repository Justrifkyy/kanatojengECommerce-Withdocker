<x-admin-layout>
    <x-slot name="header">
        Manajemen Kategori
    </x-slot>

    <div class="p-6 bg-white border-b border-gray-200">
        <div class="flex justify-end mb-4">
            <a href="{{ route('admin.categories.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Tambah Kategori</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th scope="col" class="relative px-6 py-3"><span class="sr-only">Aksi</span></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($categories as $category)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $category->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline-block ml-4" onsubmit="return confirm('Anda yakin ingin menghapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">Belum ada kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
</x-admin-layout><x-admin-layout>
    {{-- SEO Optimization --}}
    <x-slot name="title">Manajemen Kategori - Dashboard Admin</x-slot>
    <x-slot name="description">Kelola kategori produk dengan mudah. Tambah, edit, dan hapus kategori untuk mengorganisir produk Anda dengan lebih baik.</x-slot>
    <x-slot name="keywords">manajemen kategori, admin dashboard, kategori produk, Laravel</x-slot>

    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <div class="flex items-center justify-center w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H5m14 14H5"></path>
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                    Manajemen Kategori
                </h1>
                <p class="text-sm text-gray-500 mt-1">Kelola dan atur kategori produk Anda</p>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            {{-- Header Section --}}
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 p-6 mb-8 transform hover:scale-[1.01] transition-all duration-300">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div class="flex-1">
                        <div class="flex items-center space-x-3 mb-2">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            <span class="text-sm font-medium text-gray-600">{{ $categories->total() ?? 0 }} Kategori Tersedia</span>
                        </div>
                        <p class="text-gray-500 text-sm leading-relaxed">
                            Organisir produk Anda dengan kategori yang tepat untuk memudahkan pelanggan menemukan apa yang mereka cari.
                        </p>
                    </div>
                    <div class="flex-shrink-0">
                        <a href="{{ route('admin.categories.create') }}" 
                           class="group relative inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-700 text-white font-semibold rounded-xl hover:from-indigo-700 hover:via-purple-700 hover:to-indigo-800 transform hover:scale-105 hover:-translate-y-0.5 transition-all duration-300 shadow-lg hover:shadow-xl">
                            <svg class="w-5 h-5 mr-2 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Kategori
                            <div class="absolute inset-0 bg-white/20 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Main Content --}}
            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl border border-white/20 overflow-hidden">
                {{-- Table Header --}}
                <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-6 py-4 border-b border-gray-200/50">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                            Daftar Kategori
                        </h3>
                        <div class="text-sm text-gray-500">
                            Halaman {{ $categories->currentPage() ?? 1 }} dari {{ $categories->lastPage() ?? 1 }}
                        </div>
                    </div>
                </div>

                {{-- Responsive Table Container --}}
                <div class="overflow-hidden">
                    <div class="overflow-x-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100">
                        <table class="min-w-full divide-y divide-gray-200/50">
                            <thead class="bg-gradient-to-r from-gray-50 to-slate-50">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-left">
                                        <div class="flex items-center space-x-2">
                                            <span class="text-xs font-bold text-gray-600 uppercase tracking-wider">Nama Kategori</span>
                                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7l10-10m0 0l10 10m-10-10v20"></path>
                                            </svg>
                                        </div>
                                    </th>
                                    <th scope="col" class="relative px-6 py-4">
                                        <span class="sr-only">Aksi</span>
                                        <div class="text-xs font-bold text-gray-600 uppercase tracking-wider text-center">Aksi</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100/50">
                                @forelse ($categories as $index => $category)
                                    <tr class="group hover:bg-gradient-to-r hover:from-blue-50/50 hover:to-indigo-50/50 transition-all duration-300 transform hover:scale-[1.01]">
                                        <td class="px-6 py-5">
                                            <div class="flex items-center space-x-4">
                                                <div class="flex-shrink-0">
                                                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full flex items-center justify-center group-hover:from-indigo-200 group-hover:to-purple-200 transition-all duration-300">
                                                        <span class="text-indigo-600 font-bold text-sm">{{ strtoupper(substr($category->name, 0, 1)) }}</span>
                                                    </div>
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <div class="flex items-center space-x-2">
                                                        <p class="text-sm font-semibold text-gray-900 group-hover:text-indigo-700 transition-colors duration-300">
                                                            {{ $category->name }}
                                                        </p>
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                            Aktif
                                                        </span>
                                                    </div>
                                                    <p class="text-xs text-gray-500 mt-1">ID: {{ $category->id }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5">
                                            <div class="flex items-center justify-end space-x-3">
                                                <a href="{{ route('admin.categories.edit', $category) }}" 
                                                   class="group/edit relative inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white text-sm font-medium rounded-lg hover:from-blue-600 hover:to-indigo-700 transform hover:scale-105 hover:-translate-y-0.5 transition-all duration-300 shadow-md hover:shadow-lg">
                                                    <svg class="w-4 h-4 mr-1.5 group-hover/edit:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                    </svg>
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.categories.destroy', $category) }}" 
                                                      method="POST" 
                                                      class="inline-block" 
                                                      onsubmit="return confirm('⚠️ Anda yakin ingin menghapus kategori ini?\n\nTindakan ini tidak dapat dibatalkan.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="group/delete relative inline-flex items-center px-4 py-2 bg-gradient-to-r from-red-500 to-pink-600 text-white text-sm font-medium rounded-lg hover:from-red-600 hover:to-pink-700 transform hover:scale-105 hover:-translate-y-0.5 transition-all duration-300 shadow-md hover:shadow-lg">
                                                        <svg class="w-4 h-4 mr-1.5 group-hover/delete:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                        </svg>
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="px-6 py-16 text-center">
                                            <div class="flex flex-col items-center justify-center">
                                                <div class="w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mb-4">
                                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                                    </svg>
                                                </div>
                                                <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum ada kategori</h3>
                                                <p class="text-sm text-gray-500 mb-6 max-w-sm">Mulai dengan menambahkan kategori pertama Anda untuk mengorganisir produk dengan lebih baik.</p>
                                                <a href="{{ route('admin.categories.create') }}" 
                                                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-lg hover:from-indigo-700 hover:to-purple-700 transform hover:scale-105 hover:-translate-y-0.5 transition-all duration-300 shadow-lg hover:shadow-xl">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                    </svg>
                                                    Tambah Kategori Pertama
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Pagination --}}
                @if($categories->hasPages())
                    <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-6 py-4 border-t border-gray-200/50">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2 text-sm text-gray-600">
                                <span>Menampilkan</span>
                                <span class="font-semibold text-indigo-600">{{ $categories->firstItem() ?? 0 }}</span>
                                <span>sampai</span>
                                <span class="font-semibold text-indigo-600">{{ $categories->lastItem() ?? 0 }}</span>
                                <span>dari</span>
                                <span class="font-semibold text-indigo-600">{{ $categories->total() ?? 0 }}</span>
                                <span>hasil</span>
                            </div>
                            <div class="flex-1 flex justify-end">
                                <div class="pagination-wrapper transform hover:scale-105 transition-transform duration-300">
                                    {{ $categories->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Footer Stats --}}
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-white/20 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <dt class="text-sm font-medium text-gray-500">Total Kategori</dt>
                            <dd class="text-2xl font-bold text-gray-900">{{ $categories->total() ?? 0 }}</dd>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-white/20 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <dt class="text-sm font-medium text-gray-500">Halaman Aktif</dt>
                            <dd class="text-2xl font-bold text-gray-900">{{ $categories->currentPage() ?? 1 }}</dd>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-white/20 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H5m14 14H5"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <dt class="text-sm font-medium text-gray-500">Per Halaman</dt>
                            <dd class="text-2xl font-bold text-gray-900">{{ $categories->perPage() ?? 10 }}</dd>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Custom Styles for Enhanced UX --}}
    <style>
        .scrollbar-thin {
            scrollbar-width: thin;
        }
        .scrollbar-thumb-gray-300::-webkit-scrollbar-thumb {
            background-color: #d1d5db;
            border-radius: 0.375rem;
        }
        .scrollbar-track-gray-100::-webkit-scrollbar-track {
            background-color: #f3f4f6;
        }
        .pagination-wrapper .relative {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 0.75rem;
            padding: 0.5rem;
        }
        .pagination-wrapper a, .pagination-wrapper span {
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }
        .pagination-wrapper a:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        tbody tr {
            animation: fadeInUp 0.6s ease forwards;
        }
        tbody tr:nth-child(even) {
            animation-delay: 0.1s;
        }
        tbody tr:nth-child(odd) {
            animation-delay: 0.2s;
        }
    </style>
</x-admin-layout>