<x-app-layout>


    <x-slot name="title">{{ $product->name }}</x-slot>
    <x-slot name="metaDescription">{{ Str::limit($product->description, 155) }}</x-slot>



    <div class="bg-background py-12">
        {{-- Kita akan menggunakan Alpine.js untuk mengelola state pemilihan ukuran --}}
        <div x-data="{ selectedSize: null }" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-x-8 lg:items-start">
                
                <!-- Galeri Gambar (Kolom Kiri) -->
                <div class="flex flex-col gap-4">
                    <div class="w-full aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">
                        <img src="{{ $product->image_path ? asset('storage/' . $product->image_path) : 'https://placehold.co/800x800/F9F9F7/333333?text=Kana+Tojong' }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-full object-center object-cover">
                    </div>
                </div>

                <!-- Info Produk (Kolom Kanan) -->
                <div class="mt-10 px-4 sm:px-0 sm:mt-16 lg:mt-0">
                    <h1 class="text-3xl font-extrabold tracking-tight text-dark">{{ $product->name }}</h1>

                    <div class="mt-3">
                        <h2 class="sr-only">Product information</h2>
                        <p class="text-3xl text-dark">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>

                    <div class="mt-6">
                        <h3 class="sr-only">Description</h3>
                        <div class="text-base text-secondary space-y-6">
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('cart.store') }}" class="mt-6">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <!-- Bagian Pemilihan Ukuran -->
                        <div class="mt-8">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-medium text-dark">Pilih Ukuran</h3>
                            </div>

                            <fieldset class="mt-2">
                                <legend class="sr-only">Choose a size</legend>
                                <div class="grid grid-cols-3 sm:grid-cols-6 gap-3">
                                    @forelse ($product->sizes->sortBy('size_number') as $size)
                                        <label :class="{ 'ring-2 ring-gold border-gold': selectedSize == {{ $size->id }}, 'border-gray-300': selectedSize != {{ $size->id }} }"
                                               class="border rounded-md py-3 px-3 flex items-center justify-center text-sm font-medium uppercase text-dark hover:bg-gray-50 focus:outline-none cursor-pointer transition-all">
                                            <input type="radio" 
                                                   name="size_id" 
                                                   value="{{ $size->id }}" 
                                                   @click="selectedSize = {{ $size->id }}"
                                                   class="sr-only">
                                            <span>{{ $size->size_number }}</span>
                                        </label>
                                    @empty
                                        <p class="text-sm text-secondary col-span-full">Ukuran untuk produk ini belum tersedia.</p>
                                    @endforelse
                                </div>
                            </fieldset>
                        </div>

                        <div class="mt-10 flex">
                            <button type="submit"
                                    :disabled="!selectedSize"
                                    :class="{ 'bg-gold hover:bg-dark text-white': selectedSize, 'bg-gray-300 cursor-not-allowed': !selectedSize }"
                                    class="w-full border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gold">
                                Tambah ke Keranjang
                            </button>
                        </div>
                        
                        {{-- Menampilkan error validasi jika ukuran belum dipilih --}}
                        @error('size_id')
                            <p class="text-red-500 text-xs mt-2 text-center">{{ $message }}</p>
                        @enderror
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
