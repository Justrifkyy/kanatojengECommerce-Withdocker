{{-- Menggunakan Alpine.js untuk mengelola state buka/tutup menu mobile --}}
<header x-data="{ isMobileMenuOpen: false }" class="bg-background sticky top-0 z-50 shadow-sm">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <img class="h-12 w-auto" src="{{ asset('storage/images/logo.png') }}" alt="Kana Tojong Logo">
                    <span class="text-2xl font-bold text-secondary hidden sm:inline">Kana Tojong</span>
                </a>
            </div>

            <!-- Tautan Navigasi Utama (Desktop) -->
            <div class="hidden md:flex md:items-center md:space-x-8">
                <a href="{{ route('home') }}" class="font-semibold {{ request()->routeIs('home') ? 'text-primary' : 'text-light' }} hover:text-primary transition-colors duration-300">Home</a>
                <a href="{{ route('shop.index') }}" class="font-semibold {{ request()->routeIs('shop.index*') ? 'text-primary' : 'text-light' }} hover:text-primary transition-colors duration-300">Shop</a>
                <a href="{{ route('about') }}" class="font-semibold {{ request()->routeIs('about') ? 'text-primary' : 'text-light' }} hover:text-primary transition-colors duration-300">About</a>
                <a href="{{ route('contact.index') }}" class="font-semibold {{ request()->routeIs('contact.index') ? 'text-primary' : 'text-light' }} hover:text-primary transition-colors duration-300">Contact</a>
            </div>

            <!-- Ikon Navigasi Kanan (Desktop) -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <!-- Dropdown Pengguna -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-light hover:text-primary transition-colors duration-300">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <div class="px-4 py-2 text-sm text-light">{{ Auth::user()->name }}</div>
                            <x-dropdown-link :href="route('profile.edit')">Profil Saya</x-dropdown-link>
                            @if(Auth::user()->role === 'admin')
                            <x-dropdown-link :href="route('admin.dashboard')">Admin Panel</x-dropdown-link>
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="text-light hover:text-primary transition-colors duration-300" title="Login">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                    </a>
                @endauth

                <!-- Ikon Keranjang -->
                <a href="{{ route('cart.index') }}" x-data class="relative text-light hover:text-primary transition-colors duration-300" title="Keranjang">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.658-.463 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                    <template x-if="$store.app.cartCount > 0">
                        <span x-text="$store.app.cartCount" class="absolute -top-2 -right-2 inline-flex items-center justify-center h-5 w-5 text-xs font-bold text-secondary bg-bright-yellow rounded-full"></span>
                    </template>
                </a>
            </div>

            <!-- Tombol Burger (Mobile) -->
            <div class="md:hidden flex items-center">
                <button @click="isMobileMenuOpen = !isMobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-md text-light hover:text-primary hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary">
                    <span class="sr-only">Buka menu utama</span>
                    <!-- Ikon Burger -->
                    <svg x-show="!isMobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
                    <!-- Ikon Close (X) -->
                    <svg x-show="isMobileMenuOpen" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Panel Menu Mobile -->
    <div x-show="isMobileMenuOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="md:hidden absolute top-20 inset-x-0 p-2 transition transform origin-top-right"
         style="display: none;">
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
            <div class="pt-5 pb-6 px-5">
                <div class="space-y-6">
                    <a href="{{ route('home') }}" class="block text-base font-medium text-secondary hover:text-primary">Home</a>
                    <a href="{{ route('shop.index') }}" class="block text-base font-medium text-secondary hover:text-primary">Shop</a>
                    <a href="{{ route('about') }}" class="block text-base font-medium text-secondary hover:text-primary">About</a>
                    <a href="{{ route('contact.index') }}" class="block text-base font-medium text-secondary hover:text-primary">Contact</a>
                </div>
                <div class="mt-6">
                    @guest
                    <a href="{{ route('login') }}" class="w-full flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-primary hover:bg-secondary">
                        Log in
                    </a>
                    <p class="mt-6 text-center text-base font-medium text-light">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-primary hover:text-secondary">
                            Register
                        </a>
                    </p>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</header>
