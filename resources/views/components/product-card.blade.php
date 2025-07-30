@props(['product'])

{{-- Menambahkan shadow-md dan rounded-lg untuk tampilan yang lebih baik --}}
<div class="group relative bg-gray-50 shadow-md rounded-lg overflow-hidden transition-shadow duration-300 hover:shadow-xl">
    {{-- Container ini memastikan gambar memiliki rasio aspek 1:1 --}}
    <div class="aspect-w-1 aspect-h-1 w-full bg-gray-200">
        {{-- Class object-cover akan memotong (crop) gambar agar pas tanpa merusak rasio --}}
        <img src="{{ $product->image_path ? asset('storage/' . $product->image_path) : 'https://placehold.co/400x400/f3f4f6/333333?text=Produk' }}"
             alt="{{ $product->name }}"
             class="h-full w-full object-cover object-center group-hover:opacity-75 transition-opacity duration-300">
        
        <!-- Overlay yang muncul saat hover -->
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <div class="text-center">
                {{-- Tombol ini sekarang menggunakan warna kuning terang dan sudut membulat --}}
                <a href="{{ route('shop.show', $product) }}" class="bg-bright-yellow text-secondary font-semibold py-3 px-8 rounded-md hover:bg-dark-gold hover:text-white transition-colors">Lihat Produk</a>
            </div>
        </div>
    </div>
    <div class="p-4">
        <h3 class="text-lg font-semibold text-secondary">
            <a href="{{ route('shop.show', $product) }}">
                {{ $product->name }}
            </a>
        </h3>
        <p class="mt-1 text-sm text-light">{{ $product->category->name }}</p>
        <p class="mt-2 text-base font-bold text-secondary">
            Rp{{ number_format($product->price, 0, ',', '.') }}
        </p>
    </div>
</div>
