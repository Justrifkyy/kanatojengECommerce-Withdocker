    @props(['product'])

    <div class="group relative">
        <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
            {{-- Placeholder untuk gambar produk --}}
            <img src="{{ $product->image_path ? asset('storage/' . $product->image_path) : 'https://placehold.co/600x600/F9F9F7/333333?text=Kana+Tojong' }}" 
                 alt="{{ $product->name }}" 
                 class="w-full h-full object-center object-cover lg:w-full lg:h-full">
        </div>
        <div class="mt-4 flex justify-between">
            <div>
                <h3 class="text-sm text-dark">
                    <a href="{{ route('shop.show', $product) }}">
                        <span aria-hidden="true" class="absolute inset-0"></span>
                        {{ $product->name }}
                    </a>
                </h3>
                <p class="mt-1 text-sm text-secondary">{{ $product->category->name }}</p>
            </div>
            <p class="text-sm font-medium text-dark">
                Rp{{ number_format($product->price, 0, ',', '.') }}
            </p>
        </div>
    </div>
    