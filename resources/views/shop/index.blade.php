<x-app-layout>
    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900">Koleksi Produk Kami</h2>
            <p class="mt-4 text-base text-gray-500">Temukan Songkok Recca yang paling sesuai dengan gaya dan kebutuhan Anda.</p>

            <div class="mt-12 grid grid-cols-1 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                @forelse ($products as $product)
                    <div class="group relative">
                        <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                            {{-- Ganti 'image_path' dengan path gambar Anda, atau gunakan placeholder --}}
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700">
                                    {{-- Link ke halaman detail produk (akan kita buat nanti) --}}
                                    <a href="{{ route('shop.show', $product) }}">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{ $product->category->name }}</p>
                            </div>
                            <p class="text-sm font-medium text-gray-900">
                                Rp{{ number_format($product->price, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <p class="text-lg text-gray-500">Belum ada produk yang tersedia saat ini.</p>
                    </div>
                @endforelse
            </div>

            {{-- Link untuk Paginasi --}}
            <div class="mt-16">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>