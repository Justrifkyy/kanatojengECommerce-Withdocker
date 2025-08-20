<x-app-layout>
    <x-slot name="title">Koleksi Produk Songkok Guru Premium | Shop</x-slot>
    
    <!-- SEO Meta Tags -->
    <x-slot name="head">
        <meta name="description" content="Jelajahi koleksi lengkap Songkok Guru premium dengan kualitas terbaik. Dari yang klasik hingga eksklusif, temukan songkok pilihan Anda.">
        <meta name="keywords" content="songkok Guru, songkok premium, songkok tradisional, songkok klasik, songkok eksklusif, topi tradisional">
        <meta property="og:title" content="Koleksi Produk Songkok Guru Premium">
        <meta property="og:description" content="Jelajahi semua koleksi Songkok Guru, dari yang klasik hingga yang paling eksklusif dengan kualitas premium.">
        <meta property="og:type" content="website">
        <link rel="canonical" href="{{ route('shop.index') }}">
    </x-slot>

    <!-- Hero Header Section -->
     <section class="relative min-h-64 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900/80 via-slate-800/70 to-amber-900/60 z-10"></div>
            <img src="{{ asset('storage/images/Background_home.png') }}" alt="Songkok Takalar Background" class="w-full h-full object-cover scale-110 animate-slow-zoom">
        </div>
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.05"%3E%3Cpath d="m36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-20"></div>
        
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:px-6 lg:px-8">
            <div class="text-center space-y-6 animate-fade-in-up">
                <div class="inline-flex items-center px-4 py-2 rounded-full bg-primary/10 border border-primary/20 backdrop-blur-sm">
                    <span class="text-primary text-sm font-medium">Premium Collection</span>
                </div>
                
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black tracking-tight text-white leading-tight">
                    <span class="block text-amber-400 drop-shadow-2xl">Songkok</span>
                    <span class="block bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">Guru</span>
                </h1>
                
                <p class="mt-6 text-xl text-slate-300 max-w-3xl mx-auto leading-relaxed">
                    Jelajahi semua koleksi Songkok Guru, dari yang klasik hingga yang paling eksklusif. 
                    Kualitas premium dengan sentuhan tradisional yang autentik.
                </p>
                
                <div class="flex items-center justify-center space-x-6 pt-4">
                    <div class="flex items-center space-x-2 text-slate-400">
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm font-medium">Kualitas Premium</span>
                    </div>
                    <div class="flex items-center space-x-2 text-slate-400">
                        <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="text-sm font-medium">Desain Autentik</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Decorative gradient -->
        <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-primary/50 to-transparent"></div>
    </section>

    <!-- Main Content -->
    <div class="bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            
            <!-- Filter Section -->
            <div class="bg-white rounded-2xl shadow-lg shadow-slate-200/50 p-6 mb-12 backdrop-blur-sm border border-slate-200/50 animate-slide-up">
                <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
                    
                    <!-- Category Filters -->
                    <div class="flex-1">
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="w-2 h-2 bg-primary rounded-full"></div>
                            <h3 class="font-bold text-slate-800 text-lg">Filter Kategori</h3>
                        </div>
                        
                        <div class="flex flex-wrap items-center gap-3">
                            <!-- All Categories Button -->
                            <a href="{{ route('shop.index', ['sort' => request('sort')]) }}" 
                               class="group relative px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105 {{ !request('category') ? 'bg-gradient-to-r from-primary to-accent text-white shadow-lg shadow-primary/30' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 hover:text-slate-800' }}">
                                <span class="relative z-10">Semua Kategori</span>
                                @if(!request('category'))
                                    <div class="absolute inset-0 bg-gradient-to-r from-primary to-accent rounded-xl blur opacity-40 group-hover:opacity-60 transition-opacity"></div>
                                @endif
                            </a>
                            
                            <!-- Category Buttons -->
                            @foreach ($categories as $category)
                                <a href="{{ route('shop.index', ['category' => $category->id, 'sort' => request('sort')]) }}" 
                                   class="group relative px-6 py-3 rounded-xl text-sm font-semibold transition-all duration-300 transform hover:scale-105 {{ request('category') == $category->id ? 'bg-gradient-to-r from-primary to-accent text-white shadow-lg shadow-primary/30' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 hover:text-slate-800' }}">
                                    <span class="relative z-10">{{ $category->name }}</span>
                                    @if(request('category') == $category->id)
                                        <div class="absolute inset-0 bg-gradient-to-r from-primary to-accent rounded-xl blur opacity-40 group-hover:opacity-60 transition-opacity"></div>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Sort Section -->
                    <div class="flex-shrink-0">
                        <form method="GET" action="{{ route('shop.index') }}" class="space-y-3">
                            <input type="hidden" name="category" value="{{ request('category') }}">
                            
                            <div class="flex items-center space-x-3">
                                <div class="w-2 h-2 bg-accent rounded-full"></div>
                                <label for="sort" class="text-lg font-bold text-slate-800">Urutkan</label>
                            </div>
                            
                            <div class="relative">
                                <select name="sort" id="sort" onchange="this.form.submit()" 
                                        class="appearance-none bg-white border-2 border-slate-200 rounded-xl px-4 py-3 pr-10 text-sm font-medium text-slate-700 hover:border-primary focus:border-primary focus:ring-4 focus:ring-primary/10 transition-all duration-200 cursor-pointer">
                                    <option value="latest" @selected(request('sort') == 'latest' || !request('sort'))>✨ Produk Terbaru</option>
                                    <option value="price_asc" @selected(request('sort') == 'price_asc')>💰 Harga Terendah</option>
                                    <option value="price_desc" @selected(request('sort') == 'price_desc')>💎 Harga Tertinggi</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
            @if($products->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-16">
                    @foreach ($products as $index => $product)
                        <div class="animate-fade-in-up" style="animation-delay: {{ $index * 0.1 }}s">
                            <x-product-card :product="$product" />
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-24 animate-fade-in">
                    <div class="mx-auto w-24 h-24 bg-gradient-to-br from-slate-200 to-slate-300 rounded-full flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-slate-800 mb-3">Tidak Ada Produk</h3>
                    <p class="text-slate-500 text-lg max-w-md mx-auto leading-relaxed">
                        Maaf, tidak ada produk yang ditemukan untuk kategori atau filter yang dipilih.
                    </p>
                    <div class="mt-8">
                        <a href="{{ route('shop.index') }}" 
                           class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-primary to-accent text-white font-semibold rounded-xl shadow-lg shadow-primary/30 hover:shadow-xl hover:shadow-primary/40 transform hover:scale-105 transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Lihat Semua Produk
                        </a>
                    </div>
                </div>
            @endif

            <!-- =================================================================
            BAGIAN PAGINASI (YANG DIPERBAIKI)
            ================================================================== -->
            @if($products->hasPages()) {{-- Hanya tampilkan jika ada lebih dari 1 halaman --}}
                <div class="mt-16 flex justify-center animate-fade-in-up">
                    <div class="bg-white rounded-2xl shadow-lg shadow-slate-200/50 p-2 border border-slate-200/50">
                        {{ $products->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Custom Animations -->
    <style>
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slide-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards;
        }
        
        .animate-slide-up {
            animation: slide-up 0.6s ease-out;
        }
        
        .animate-fade-in {
            animation: fade-in 0.6s ease-out;
        }
        
        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, var(--primary-color), var(--accent-color));
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, var(--accent-color), var(--primary-color));
        }
    </style>
</x-app-layout>
