{{-- SEO Meta Tags untuk Header --}}
@push('meta')
<meta name="description" content="Kana Tojeng - Platform e-commerce terpercaya dengan koleksi produk berkualitas. Belanja mudah, aman, dan terpercaya.">
<meta name="keywords" content="kana tojeng, e-commerce, belanja online, produk berkualitas">
<meta name="author" content="Kana Tojeng">
<meta property="og:site_name" content="Kana Tojeng">
<meta property="og:type" content="website">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ url()->current() }}">
@endpush

{{-- Modern Header dengan Alpine.js untuk menu mobile --}}
<header x-data="{ isMobileMenuOpen: false }" 
        class="bg-white/95 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100 transition-all duration-300 hover:shadow-lg">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo Section dengan animasi hover -->
            <div class="flex-shrink-0 group">
                <a href="{{ route('home') }}" 
                   class="flex items-center space-x-3 transition-transform duration-300 group-hover:scale-105"
                   aria-label="Kana Tojeng - Beranda">
                    <div class="relative">
                        <img class="h-12 w-auto transition-all duration-300 drop-shadow-sm group-hover:drop-shadow-md" 
                             src="{{ asset('storage/images/logo.png') }}" 
                             alt="Kana Tojeng Logo"
                             loading="eager">
                        <div class="absolute inset-0 bg-gradient-to-r from-yellow-500/10 to-yellow-500/10 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <span class="text-2xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent hidden sm:inline transition-all duration-300 group-hover:from-yellow-600 group-hover:to-yellow-600">
                        Kana Tojeng
                    </span>
                </a>
            </div>

            <!-- Navigation Links Desktop dengan improved hover effects -->
            <div class="hidden md:flex md:items-center md:space-x-1">
                <a href="{{ route('home') }}" 
                   class="relative px-4 py-2 font-semibold text-sm {{ request()->routeIs('home') ? 'text-yellow-600' : 'text-gray-700' }} hover:text-yellow-600 transition-all duration-300 group"
                   aria-label="Beranda">
                    <span class="relative z-10">Home</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-50 to-yellow-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 scale-95 group-hover:scale-100"></div>
                    @if(request()->routeIs('home'))
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-6 h-0.5 bg-gradient-to-r from-yellow-600 to-yellow-600 rounded-full"></div>
                    @endif
                </a>
                
                <a href="{{ route('shop.index') }}" 
                   class="relative px-4 py-2 font-semibold text-sm {{ request()->routeIs('shop.index*') ? 'text-yellow-600' : 'text-gray-700' }} hover:text-yellow-600 transition-all duration-300 group"
                   aria-label="Toko Online">
                    <span class="relative z-10">Shop</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-50 to-yellow-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 scale-95 group-hover:scale-100"></div>
                    @if(request()->routeIs('shop.index*'))
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-6 h-0.5 bg-gradient-to-r from-yellow-600 to-yellow-600 rounded-full"></div>
                    @endif
                </a>
                
                <a href="{{ route('about') }}" 
                   class="relative px-4 py-2 font-semibold text-sm {{ request()->routeIs('about') ? 'text-yellow-600' : 'text-gray-700' }} hover:text-yellow-600 transition-all duration-300 group"
                   aria-label="Tentang Kami">
                    <span class="relative z-10">About</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-50 to-yellow-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 scale-95 group-hover:scale-100"></div>
                    @if(request()->routeIs('about'))
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-6 h-0.5 bg-gradient-to-r from-yellow-600 to-yellow-600 rounded-full"></div>
                    @endif
                </a>
                
                <a href="{{ route('contact.index') }}" 
                   class="relative px-4 py-2 font-semibold text-sm {{ request()->routeIs('contact.index') ? 'text-yellow-600' : 'text-gray-700' }} hover:text-yellow-600 transition-all duration-300 group"
                   aria-label="Hubungi Kami">
                    <span class="relative z-10">Contact</span>
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-50 to-yellow-50 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 scale-95 group-hover:scale-100"></div>
                    @if(request()->routeIs('contact.index'))
                        <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-6 h-0.5 bg-gradient-to-r from-yellow-600 to-yellow-600 rounded-full"></div>
                    @endif
                </a>
            </div>

            <!-- Right Icons Desktop dengan modern styling -->
            <div class="hidden md:flex items-center space-x-3">
                @auth
                    <!-- User Dropdown dengan improved styling -->
                    <x-dropdown align="right" width="56">
                        <x-slot name="trigger">
                            <button class="group relative p-2 rounded-xl bg-gradient-to-r from-gray-50 to-gray-100 text-gray-600 hover:from-yellow-50 hover:to-yellow-50 hover:text-yellow-600 transition-all duration-300 hover:scale-105 hover:shadow-lg"
                                    aria-label="Menu Pengguna">
                                <svg class="h-6 w-6 transition-transform duration-300 group-hover:scale-110" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/20 to-yellow-400/20 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 blur-sm"></div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <div class="px-4 py-3 text-sm font-medium text-gray-700 bg-gradient-to-r from-yellow-50 to-yellow-50">
                                {{ Auth::user()->name }}
                            </div>
                            <x-dropdown-link :href="route('profile.edit')" class="hover:bg-gradient-to-r hover:from-yellow-50 hover:to-yellow-50">
                                Profil Saya
                            </x-dropdown-link>
                            @if(Auth::user()->role === 'admin')
                            <x-dropdown-link :href="route('admin.dashboard')" class="hover:bg-gradient-to-r hover:from-yellow-50 hover:to-yellow-50">
                                Admin Panel
                            </x-dropdown-link>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="hover:bg-gradient-to-r hover:from-red-50 hover:to-pink-50 hover:text-red-600">
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" 
                       class="group relative p-2 rounded-xl bg-gradient-to-r from-gray-50 to-gray-100 text-gray-600 hover:from-yellow-50 hover:to-yellow-50 hover:text-yellow-600 transition-all duration-300 hover:scale-105 hover:shadow-lg" 
                       title="Masuk ke Akun"
                       aria-label="Login">
                        <svg class="h-6 w-6 transition-transform duration-300 group-hover:scale-110" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/20 to-yellow-400/20 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 blur-sm"></div>
                    </a>
                @endauth

                <!-- Cart Icon dengan badge modern -->
                <a href="{{ route('cart.index') }}" 
                   x-data 
                   class="group relative p-2 rounded-xl bg-gradient-to-r from-gray-50 to-gray-100 text-gray-600 hover:from-yellow-50 hover:to-yellow-50 hover:text-yellow-600 transition-all duration-300 hover:scale-105 hover:shadow-lg" 
                   title="Keranjang Belanja"
                   aria-label="Keranjang">
                    <svg class="h-6 w-6 transition-transform duration-300 group-hover:scale-110" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.658-.463 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                    <template x-if="$store.app.cartCount > 0">
                        <span x-text="$store.app.cartCount" 
                              class="absolute -top-1 -right-1 inline-flex items-center justify-center h-5 w-5 text-xs font-bold text-white bg-gradient-to-r from-red-500 to-pink-500 rounded-full shadow-lg ring-2 ring-white animate-pulse">
                        </span>
                    </template>
                    <div class="absolute inset-0 bg-gradient-to-r from-yellow-400/20 to-yellow-400/20 rounded-xl opacity-0 group-hover:opacity-100 transition-opacity duration-300 blur-sm"></div>
                </a>
            </div>

            <!-- Mobile Menu Button dengan improved animation -->
            <div class="md:hidden flex items-center">
                <button @click="isMobileMenuOpen = !isMobileMenuOpen" 
                        class="group relative inline-flex items-center justify-center p-2 rounded-xl text-gray-600 hover:text-yellow-600 hover:bg-gradient-to-r hover:from-yellow-50 hover:to-yellow-50 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-yellow-500 transition-all duration-300 hover:scale-105"
                        aria-label="Menu Navigasi Mobile">
                    <span class="sr-only">Buka menu utama</span>
                    <!-- Hamburger Icon -->
                    <svg x-show="!isMobileMenuOpen" 
                         class="block h-6 w-6 transition-transform duration-300 group-hover:scale-110" 
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Close Icon -->
                    <svg x-show="isMobileMenuOpen" 
                         class="block h-6 w-6 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-90" 
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Panel dengan modern design -->
    <div x-show="isMobileMenuOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95 -translate-y-2"
         x-transition:enter-end="opacity-100 scale-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 scale-100 translate-y-0"
         x-transition:leave-end="opacity-0 scale-95 -translate-y-2"
         class="md:hidden absolute top-20 inset-x-0 mx-4 transition transform origin-top"
         style="display: none;">
        <div class="rounded-2xl shadow-xl ring-1 ring-black/5 bg-white/95 backdrop-blur-md border border-gray-100 overflow-hidden">
            <div class="p-6">
                <!-- Mobile Navigation Links -->
                <div class="space-y-3">
                    <a href="{{ route('home') }}" 
                       class="group flex items-center px-4 py-3 text-base font-semibold {{ request()->routeIs('home') ? 'text-yellow-600 bg-gradient-to-r from-yellow-50 to-yellow-50' : 'text-gray-700 hover:text-yellow-600 hover:bg-gradient-to-r hover:from-yellow-50 hover:to-yellow-50' }} rounded-xl transition-all duration-300"
                       @click="isMobileMenuOpen = false">
                        <span class="flex-1">Home</span>
                        @if(request()->routeIs('home'))
                            <div class="w-2 h-2 bg-gradient-to-r from-yellow-600 to-yellow-600 rounded-full"></div>
                        @endif
                    </a>
                    
                    <a href="{{ route('shop.index') }}" 
                       class="group flex items-center px-4 py-3 text-base font-semibold {{ request()->routeIs('shop.index*') ? 'text-yellow-600 bg-gradient-to-r from-yellow-50 to-yellow-50' : 'text-gray-700 hover:text-yellow-600 hover:bg-gradient-to-r hover:from-yellow-50 hover:to-yellow-50' }} rounded-xl transition-all duration-300"
                       @click="isMobileMenuOpen = false">
                        <span class="flex-1">Shop</span>
                        @if(request()->routeIs('shop.index*'))
                            <div class="w-2 h-2 bg-gradient-to-r from-yellow-600 to-yellow-600 rounded-full"></div>
                        @endif
                    </a>
                    
                    <a href="{{ route('about') }}" 
                       class="group flex items-center px-4 py-3 text-base font-semibold {{ request()->routeIs('about') ? 'text-yellow-600 bg-gradient-to-r from-yellow-50 to-yellow-50' : 'text-gray-700 hover:text-yellow-600 hover:bg-gradient-to-r hover:from-yellow-50 hover:to-yellow-50' }} rounded-xl transition-all duration-300"
                       @click="isMobileMenuOpen = false">
                        <span class="flex-1">About</span>
                        @if(request()->routeIs('about'))
                            <div class="w-2 h-2 bg-gradient-to-r from-yellow-600 to-yellow-600 rounded-full"></div>
                        @endif
                    </a>
                    
                    <a href="{{ route('contact.index') }}" 
                       class="group flex items-center px-4 py-3 text-base font-semibold {{ request()->routeIs('contact.index') ? 'text-yellow-600 bg-gradient-to-r from-yellow-50 to-yellow-50' : 'text-gray-700 hover:text-yellow-600 hover:bg-gradient-to-r hover:from-yellow-50 hover:to-yellow-50' }} rounded-xl transition-all duration-300"
                       @click="isMobileMenuOpen = false">
                        <span class="flex-1">Contact</span>
                        @if(request()->routeIs('contact.index'))
                            <div class="w-2 h-2 bg-gradient-to-r from-yellow-600 to-yellow-600 rounded-full"></div>
                        @endif
                    </a>
                </div>
                
                <!-- Mobile Auth Section -->
                @guest
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <div class="space-y-4">
                        <a href="{{ route('login') }}" 
                           class="w-full flex items-center justify-center px-6 py-3 border border-transparent rounded-xl text-base font-semibold text-white bg-gradient-to-r from-yellow-600 to-yellow-600 hover:from-yellow-700 hover:to-yellow-700 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105"
                           @click="isMobileMenuOpen = false">
                            Masuk ke Akun
                        </a>
                        
                        <p class="text-center text-sm font-medium text-gray-600">
                            Belum punya akun?
                            <a href="{{ route('register') }}" 
                               class="text-yellow-600 hover:text-yellow-600 font-semibold transition-colors duration-300"
                               @click="isMobileMenuOpen = false">
                                Daftar Sekarang
                            </a>
                        </p>
                    </div>
                </div>
                @else
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="h-10 w-10 bg-gradient-to-r from-yellow-500 to-yellow-500 rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold text-sm">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500">Pengguna Terdaftar</p>
                        </div>
                    </div>
                    
                    <div class="space-y-2">
                        <a href="{{ route('profile.edit') }}" 
                           class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:text-yellow-600 hover:bg-yellow-50 rounded-lg transition-all duration-200"
                           @click="isMobileMenuOpen = false">
                            Profil Saya
                        </a>
                        
                        @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" 
                           class="flex items-center px-4 py-2 text-sm font-medium text-gray-700 hover:text-yellow-600 hover:bg-yellow-50 rounded-lg transition-all duration-200"
                           @click="isMobileMenuOpen = false">
                            Admin Panel
                        </a>
                        @endif
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" 
                                    class="w-full flex items-center px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg transition-all duration-200">
                                Keluar
                            </button>
                        </form>
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </div>
</header>

{{-- Tambahan CSS untuk animasi smooth scroll --}}
@push('styles')
<style>
    html {
        scroll-behavior: smooth;
    }
    
    /* Custom scrollbar untuk webkit browsers */
    ::-webkit-scrollbar {
        width: 6px;
    }
    
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, #ffc831, #ebc000);
        border-radius: 3px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(180deg, #ffc831, #ebc000);
    }
</style>
@endpush