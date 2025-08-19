<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-yellow-600 leading-tight">
            {{ __('Selamat Datang!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-yellow-50 dark:bg-yellow-200 shadow-lg sm:rounded-lg overflow-hidden">
                <div class="p-8 flex flex-col items-center text-center">

                    <!-- Icon / Ilustrasi -->
                    <img src="{{ asset('storage/images/logo.png') }}"
                         alt="Welcome Icon"
                         class="w-32 h-32 mb-6">

                    <!-- Teks Sambutan -->
                    <h1 class="text-3xl font-bold text-yellow-600 dark:text-yellow-600 mb-3">
                        Hai {{ Auth::user()->name }}! 🎉
                    </h1>
                    <p class="text-lg text-black dark:text-black mb-6">
                        Kamu berhasil login. Ayo mulai jelajahi toko dan temukan produk favoritmu.
                    </p>

                    <!-- Tombol ke Home -->
                    <a href="{{ route('home') }}"
                       class="px-6 py-3 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-400 transition-all">
                        ⬅️ Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
