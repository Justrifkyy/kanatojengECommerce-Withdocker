@props(['product'])

<div class="group relative bg-gray-50">
    <div class="aspect-w-1 aspect-h-1 w-full overflow-hidden bg-gray-200">
        <img src="{{ $product->image_path ? asset('storage/' . $product->image_path) : 'https://placehold.co/400x400/f3f4f6/333333?text=Produk' }}"
             alt="{{ $product->name }}"
             class="h-full w-full object-cover object-center group-hover:opacity-75 transition-opacity">
        
        <!-- Overlay yang muncul saat hover -->
        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
            <div class="text-center">
                <a href="{{ route('shop.show', $product) }}" class="bg-white text-primary font-semibold py-3 px-8 hover:bg-surface transition-colors">Lihat Produk</a>
                <div class="mt-4 flex justify-center space-x-4 text-white font-medium">
                    <a href="#" class="hover:text-primary">Share</a>
                    <a href="#" class="hover:text-primary">Compare</a>
                    <a href="#" class="hover:text-primary">Like</a>
                </div>
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
