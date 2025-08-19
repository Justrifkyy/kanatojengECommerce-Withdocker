{{-- SEO Meta Tags --}}
@push('meta')
<meta name="description" content="Kelola produk dengan mudah - tambah, edit, dan atur galeri media produk Anda dengan interface yang modern dan user-friendly">
<meta name="keywords" content="produk, manajemen produk, ecommerce, admin panel">
<meta name="robots" content="noindex, nofollow">
<meta property="og:title" content="{{ isset($product) ? 'Edit Produk: ' . $product->name : 'Tambah Produk Baru' }}">
<meta property="og:description" content="Interface modern untuk mengelola produk dengan mudah dan efisien">
<meta property="og:type" content="website">
@endpush

{{-- Custom CSS untuk animasi dan transisi smooth --}}
@push('styles')
<style>
    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    @keyframes shimmer {
        0% { background-position: -200px 0; }
        100% { background-position: calc(200px + 100%) 0; }
    }
    
    .animate-slide-in-up {
        animation: slideInUp 0.6s ease-out;
    }
    
    .animate-fade-in {
        animation: fadeIn 0.8s ease-out;
    }
    
    .shimmer {
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        background-size: 200px 100%;
        animation: shimmer 1.5s infinite;
    }
    
    .glass-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .gradient-border {
        background: linear-gradient(45deg, #667eea 0%, #764ba2 100%);
        padding: 1px;
        border-radius: 12px;
    }
    
    .gradient-border > div {
        background: white;
        border-radius: 11px;
    }
    
    .custom-file-input::-webkit-file-upload-button {
        visibility: hidden;
    }
    
    .custom-file-input::before {
        content: 'Pilih File';
        display: inline-block;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 8px 16px;
        outline: none;
        white-space: nowrap;
        cursor: pointer;
        font-weight: 500;
        font-size: 14px;
        margin-right: 12px;
        transition: all 0.3s ease;
    }
    
    .custom-file-input:hover::before {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }
</style>
@endpush

{{-- Container utama dengan gradient background --}}
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        {{-- Header Section --}}
        <div class="text-center mb-12 animate-fade-in">
            <h1 class="text-4xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent mb-4">
                {{ isset($product) ? 'Edit Produk' : 'Tambah Produk Baru' }}
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Kelola informasi produk Anda dengan mudah menggunakan form yang telah dioptimasi untuk pengalaman terbaik
            </p>
        </div>

        {{-- Error Messages dengan animasi --}}
        @if ($errors->any())
            <div class="mb-8 animate-slide-in-up">
                <div class="bg-red-50 border-l-4 border-red-400 p-6 rounded-r-xl shadow-lg">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-lg font-semibold text-red-800">Oops! Terjadi kesalahan</h3>
                            <p class="text-red-700 mt-1">Silakan periksa kembali input Anda:</p>
                            <ul class="list-disc list-inside mt-3 text-red-700 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li class="text-sm">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        {{-- Main Content Grid --}}
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
            {{-- =================================================================
            KOLOM KIRI (Informasi Utama)
            ================================================================== --}}
            <div class="xl:col-span-2 space-y-8">
                {{-- Kartu Informasi Dasar --}}
                <div class="gradient-border animate-slide-in-up" style="animation-delay: 0.1s;">
                    <div class="p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">Informasi Dasar</h3>
                        </div>
                        
                        <div class="space-y-6">
                            <div class="group">
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2 transition-colors group-focus-within:text-indigo-600">
                                    Nama Produk
                                </label>
                                <input id="name" type="text" name="name" value="{{ old('name', $product->name ?? '') }}" required 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 hover:border-gray-400 placeholder-gray-400"
                                       placeholder="Masukkan nama produk yang menarik">
                            </div>

                            <div class="group">
                                <label for="category_id" class="block text-sm font-semibold text-gray-700 mb-2 transition-colors group-focus-within:text-indigo-600">
                                    Kategori
                                </label>
                                <select name="category_id" id="category_id" 
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 hover:border-gray-400 bg-white">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id ?? '') == $category->id)>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="group">
                                <label for="price" class="block text-sm font-semibold text-gray-700 mb-2 transition-colors group-focus-within:text-indigo-600">
                                    Harga
                                </label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500 font-semibold">Rp</span>
                                    <input id="price" type="number" name="price" value="{{ old('price', $product->price ?? '') }}" required 
                                           class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 hover:border-gray-400"
                                           placeholder="0">
                                </div>
                            </div>

                            <div class="group">
                                <label for="description" class="block text-sm font-semibold text-gray-700 mb-2 transition-colors group-focus-within:text-indigo-600">
                                    Deskripsi
                                </label>
                                <textarea id="description" name="description" rows="6" 
                                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300 hover:border-gray-400 resize-none"
                                          placeholder="Ceritakan tentang produk Anda dengan detail yang menarik...">{{ old('description', $product->description ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kartu Galeri Media --}}
                <div class="gradient-border animate-slide-in-up" style="animation-delay: 0.2s;">
                    <div class="p-8">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-800">Galeri Media</h3>
                        </div>
                        
                        <div class="space-y-6">
                            <div class="group">
                                <label for="media_files" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Tambah Media Baru
                                </label>
                                <div class="relative">
                                    <input id="media_files" type="file" name="media_files[]" multiple 
                                           class="custom-file-input w-full text-sm text-gray-600 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-gradient-to-r file:from-indigo-50 file:to-purple-50 file:text-indigo-700 hover:file:from-indigo-100 hover:file:to-purple-100 transition-all duration-300">
                                </div>
                                <p class="text-sm text-gray-500 mt-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Pilih beberapa file sekaligus (JPG, PNG, MP4, dll). Maksimal 20MB per file.
                                </p>
                            </div>
                            
                            @if (isset($product) && $product->media->isNotEmpty())
                                <div class="mt-8">
                                    <h4 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                                        <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                        Media Saat Ini
                                    </h4>
                                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                                        @foreach ($product->media as $media)
                                            <div class="relative group media-item transform transition-all duration-300 hover:scale-105">
                                                <div class="aspect-square rounded-xl overflow-hidden shadow-lg">
                                                    @if ($media->media_type === 'image')
                                                        <img src="{{ asset('storage/' . $media->file_path) }}" 
                                                             class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                                                             alt="Product Image">
                                                    @else
                                                        <div class="w-full h-full bg-gradient-to-br from-gray-800 to-gray-900 flex items-center justify-center">
                                                            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"></path>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>
                                                <button type="button" 
                                                        @click="deleteMedia({{ $media->id }}, $event)"
                                                        class="absolute -top-2 -right-2 w-8 h-8 bg-red-500 hover:bg-red-600 text-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 transform hover:scale-110 shadow-lg">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- =================================================================
            KOLOM KANAN (Atribut & Aksi)
            ================================================================== --}}
            <div class="xl:col-span-1 space-y-8">
                {{-- Kartu Status Produk --}}
                <div class="gradient-border animate-slide-in-up" style="animation-delay: 0.3s;">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-8 h-8 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800">Status Produk</h3>
                        </div>
                        
                        <div class="bg-gradient-to-r from-indigo-50 to-purple-50 p-4 rounded-xl">
                            <div class="flex items-start">
                                <div class="flex items-center h-5 mt-1">
                                    <input id="is_featured" name="is_featured" type="checkbox" 
                                           @checked(old('is_featured', $product->is_featured ?? false))
                                           class="w-5 h-5 text-indigo-600 border-2 border-gray-300 rounded-lg focus:ring-indigo-500 focus:ring-2 transition-all duration-300">
                                </div>
                                <div class="ml-3">
                                    <label for="is_featured" class="font-semibold text-gray-800 text-sm cursor-pointer">
                                        Jadikan Produk Unggulan
                                    </label>
                                    <p class="text-gray-600 text-sm mt-1">
                                        Produk ini akan tampil prominently di halaman utama dan mendapat prioritas lebih tinggi.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kartu Detail & Varian --}}
                <div class="gradient-border animate-slide-in-up" style="animation-delay: 0.4s;">
                    <div class="p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-8 h-8 bg-gradient-to-r from-orange-500 to-red-600 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800">Detail & Varian</h3>
                        </div>
                        
                        <div class="space-y-6">
                            <div class="group">
                                <label for="material" class="block text-sm font-semibold text-gray-700 mb-2">Nama Produk</label>
                                <input id="material" type="text" name="material" value="{{ old('material', $product->material ?? '') }}" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300"
                                       placeholder="Contoh: Songkok Guru">
                            </div>

                            <div class="group">
                                <label for="finishing" class="block text-sm font-semibold text-gray-700 mb-2">Bahan Produk</label>
                                <input id="finishing" type="text" name="finishing" value="{{ old('finishing', $product->finishing ?? '') }}" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-300"
                                       placeholder="Contoh: Songkok Guru Tembaga">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-3">Ukuran yang Tersedia</label>
                                <div class="grid grid-cols-3 gap-3">
                                    @foreach ($sizes as $size)
                                        <label class="relative">
                                            <input type="checkbox" name="sizes[]" value="{{ $size->id }}" 
                                                   class="sr-only peer"
                                                   @if(isset($productSizeIds) && in_array($size->id, $productSizeIds)) checked @endif
                                                   @if(is_array(old('sizes')) && in_array($size->id, old('sizes'))) checked @endif>
                                            <div class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg text-center font-semibold text-sm cursor-pointer transition-all duration-300 peer-checked:border-indigo-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 hover:border-gray-400">
                                                {{ $size->size_number }}
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-3">Pilihan Warna</label>
                                <div class="grid grid-cols-2 gap-3">
                                    @foreach ($colors as $color)
                                        <label class="relative">
                                            <input type="checkbox" name="colors[]" value="{{ $color->id }}" 
                                                   class="sr-only peer"
                                                   @if(isset($productColorIds) && in_array($color->id, $productColorIds)) checked @endif
                                                   @if(is_array(old('colors')) && in_array($color->id, old('colors'))) checked @endif>
                                            <div class="w-full px-3 py-2 border-2 border-gray-300 rounded-lg text-center font-medium text-sm cursor-pointer transition-all duration-300 peer-checked:border-indigo-500 peer-checked:bg-indigo-50 peer-checked:text-indigo-700 hover:border-gray-400">
                                                {{ $color->name }}
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Kartu Aksi --}}
                <div class="gradient-border animate-slide-in-up" style="animation-delay: 0.5s;">
                    <div class="p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-cyan-600 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800">Aksi</h3>
                        </div>
                        
                        <div class="space-y-4">
                            <button type="submit" 
                                    class="w-full px-6 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl hover:from-indigo-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                {{ isset($product) ? 'Perbarui Produk' : 'Simpan Produk' }}
                            </button>
                            
                            <a href="{{ route('admin.products.index') }}" 
                               class="w-full px-6 py-4 border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:border-gray-400 hover:bg-gray-50 transition-all duration-300 flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Kembali ke Daftar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript untuk interaksi tambahan --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animasi smooth untuk form elements
    const inputs = document.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.closest('.group')?.classList.add('scale-[1.02]');
        });
        
        input.addEventListener('blur', function() {
            this.closest('.group')?.classList.remove('scale-[1.02]');
        });
    });
    
    // Preview file upload
    const fileInput = document.getElementById('media_files');
    if (fileInput) {
        fileInput.addEventListener('change', function(e) {
            const files = e.target.files;
            if (files.length > 0) {
                // Tambahkan feedback visual
                const parent = this.closest('.group');
                parent.querySelector('p').innerHTML = `
                    <svg class="w-4 h-4 mr-1 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    ${files.length} file(s) dipilih dan siap untuk diupload.
                `;
                parent.querySelector('p').classList.add('text-green-600');
            }
        });
    }
});
</script>
@endpush