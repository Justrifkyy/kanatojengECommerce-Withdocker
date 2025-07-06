<x-admin-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-700">Total Produk</h3>
            <p class="text-3xl font-bold mt-2">{{ $totalProducts }}</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-lg font-semibold text-gray-700">Total Pengguna</h3>
            <p class="text-3xl font-bold mt-2">{{ $totalUsers }}</p>
        </div>
        {{-- Tambahkan kartu statistik lainnya di sini --}}
    </div>
</x-admin-layout>