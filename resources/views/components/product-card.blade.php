@props(['product'])

<div class="group relative bg-gray-50 shadow-sm rounded-lg overflow-hidden transition-shadow duration-300 hover:shadow-xl">
    <div class="aspect-w-1 aspect-h-1 w-full bg-gray-200">
        @php
            // Ambil path gambar pertama dari media
            $imagePath = $product->media->first() ? $product->media->first()->file_path : null;
        @endphp
        
        {{-- FIX: Memanggil gambar secara langsung menggunakan asset() --}}
        <img src="{{ $imagePath ? asset('storage/' . $imagePath) : 'https://placehold.co/400x400/f3f4f6/333333?text=Produk' }}"
             alt="{{ $product->name }}"
             loading="lazy"
             decoding="async"
             class="h-full w-full object-cover object-center group-hover:scale-105 transition-transform duration-300">
        
        <!-- Overlay Aksi -->
        <div class="absolute inset-0 bg-black bg-opacity-20 flex items-end justify-center p-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <a href="{{ route('shop.show', $product) }}" class="bg-white text-primary font-semibold py-3 px-8 rounded-md hover:bg-surface transition-colors w-full text-center">
                Lihat Detail
            </a>
        </div>
    </div>
    <div class="p-4 text-center">
        <h3 class="text-lg font-semibold text-secondary">
            <a href="{{ route('shop.show', $product) }}">
                {{ $product->name }}
            </a>
        </h3>
        <p class="mt-1 text-sm text-light">{{ $product->category->name }}</p>
        <div class="mt-2 flex justify-center items-baseline space-x-2">
            <p class="text-base font-bold text-secondary">
                Rp{{ number_format($product->price, 0, ',', '.') }}
            </p>
        </div>
    </div>
</div>
