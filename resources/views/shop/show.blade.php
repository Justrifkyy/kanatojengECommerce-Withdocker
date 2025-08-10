<x-app-layout>
    <x-slot name="title">{{ $product->name }}</x-slot>
    <x-slot name="metaDescription">{{ Str::limit($product->description, 155) }}</x-slot>

    <!-- Breadcrumb -->
    <section class="bg-surface py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-sm text-light">
            <a href="{{ route('home') }}" class="hover:text-primary">Home</a>
            <span class="mx-2">></span>
            <a href="{{ route('shop.index') }}" class="hover:text-primary">Shop</a>
            <span class="mx-2">></span>
            <span class="text-secondary">{{ $product->name }}</span>
        </div>
    </section>

    <!-- Konten Utama Produk -->
    <div class="bg-background">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div x-data="{ 
                    selectedSize: null, 
                    selectedColor: null,
                    selectedColorName: '',
                    quantity: 1,
                    mainMediaUrl: '{{ $product->media->first() ? asset('storage/' . $product->media->first()->file_path) : 'https://placehold.co/800x800/f3f4f6/333333?text=Produk' }}',
                    mainMediaType: '{{ $product->media->first()->media_type ?? 'image' }}',
                    isLoading: false,
                    addToCart() {
                        if (!this.selectedSize) {
                            $store.app.showToast('Silakan pilih ukuran terlebih dahulu.', 'error');
                            return;
                        }
                        if ({{ $product->colors->isNotEmpty() ? 'true' : 'false' }} && !this.selectedColor) {
                            $store.app.showToast('Silakan pilih warna terlebih dahulu.', 'error');
                            return;
                        }
                        this.isLoading = true;
                        let formData = new FormData(this.$refs.cartForm);
                        formData.set('quantity', this.quantity);
                        
                        fetch('{{ route('cart.store') }}', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if(data.success) {
                                $store.app.showToast(data.message, 'success');
                                $store.app.updateCartCount(data.cartCount);
                            } else {
                                $store.app.showToast(data.message || 'Gagal menambahkan produk.', 'error');
                            }
                        })
                        .catch(error => {
                            $store.app.showToast('Terjadi kesalahan. Silakan coba lagi.', 'error');
                            console.error('Error:', error);
                        })
                        .finally(() => {
                            this.isLoading = false;
                        });
                    }
                }" 
                 class="lg:grid lg:grid-cols-2 lg:gap-x-12 lg:items-start">
                
                <!-- Galeri Media (Kolom Kiri) -->
                <div class="flex flex-col-reverse sm:flex-row gap-4">
                    <!-- Thumbnails -->
                    <div class="flex sm:flex-col gap-4 sm:w-24">
                        @forelse ($product->media as $media)
                            <div @click="mainMediaUrl = '{{ asset('storage/' . $media->file_path) }}'; mainMediaType = '{{ $media->media_type }}'"
                                 :class="{ 'ring-2 ring-primary ring-offset-2': mainMediaUrl === '{{ asset('storage/' . $media->file_path) }}' }"
                                 class="relative aspect-w-1 aspect-h-1 rounded-lg overflow-hidden cursor-pointer transition-all">
                                <img src="{{ $media->media_type === 'image' ? asset('storage/' . $media->file_path) : 'https://placehold.co/100x100/e0e0e0/333333?text=Video' }}" 
                                     alt="Thumbnail {{ $loop->iteration }}" class="w-full h-full object-cover">
                                @if ($media->media_type === 'video')
                                    <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                                        <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"></path></svg>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="aspect-w-1 aspect-h-1 rounded-lg overflow-hidden ring-2 ring-primary">
                                <img src="https://placehold.co/100x100/f3f4f6/333333?text=Produk" alt="Placeholder" class="w-full h-full object-cover">
                            </div>
                        @endforelse
                    </div>

                    <!-- Tampilan Media Utama -->
                    <div class="w-full aspect-w-1 aspect-h-1 rounded-lg overflow-hidden bg-gray-200 shadow-lg">
                        <template x-if="mainMediaType === 'image'">
                            <img :src="mainMediaUrl" alt="{{ $product->name }}" class="w-full h-full object-cover object-center">
                        </template>
                        <template x-if="mainMediaType === 'video'">
                            <video :src="mainMediaUrl" controls autoplay muted loop class="w-full h-full object-cover"></video>
                        </template>
                    </div>
                </div>

                <!-- Info Produk (Kolom Kanan) -->
                <div class="mt-10 sm:mt-0">
                    <h1 class="text-4xl font-bold text-secondary">{{ $product->name }}</h1>
                    <p class="text-2xl text-light mt-2">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    
                    <p class="mt-6 text-light leading-relaxed">{{ $product->description }}</p>

                    <form @submit.prevent="addToCart()" x-ref="cartForm" class="mt-8 space-y-8">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <!-- Ukuran -->
                        <div>
                            <p class="text-sm font-medium text-secondary">Size</p>
                            <fieldset class="mt-2">
                                <div class="flex items-center space-x-3">
                                    @forelse ($product->sizes->sortBy('size_number') as $size)
                                        <label @click="selectedSize = {{ $size->id }}"
                                               :class="{ 'bg-primary text-white ring-2 ring-primary': selectedSize == {{ $size->id }}, 'bg-surface text-secondary hover:bg-gray-200': selectedSize != {{ $size->id }} }"
                                               class="w-12 h-12 flex items-center justify-center rounded-md cursor-pointer font-semibold transition-all duration-200">
                                            <input type="radio" name="size_id" value="{{ $size->id }}" class="sr-only" x-model.number="selectedSize">
                                            <span>{{ $size->size_number }}</span>
                                        </label>
                                    @empty
                                        <p class="text-sm text-light">Ukuran belum tersedia.</p>
                                    @endforelse
                                </div>
                            </fieldset>
                        </div>
                        
                        <!-- Pilihan Warna -->
                        @if($product->colors->isNotEmpty())
                        <div>
                            <div class="flex items-baseline space-x-2">
                                <p class="text-sm font-medium text-secondary">Pilihan Warna:</p>
                                <p x-show="selectedColor" x-text="selectedColorName" class="text-sm font-semibold text-primary transition-opacity" x-transition></p>
                            </div>
                            <fieldset class="mt-2">
                                <div class="flex items-center flex-wrap gap-3">
                                    @foreach ($product->colors as $color)
                                        <label @click="selectedColor = {{ $color->id }}; selectedColorName = '{{ $color->name }}'"
                                               :class="{ 'ring-2 ring-primary ring-offset-1': selectedColor == {{ $color->id }} }"
                                               class="relative rounded-full flex items-center justify-center cursor-pointer p-0.5 focus:outline-none transition-all">
                                            <input type="radio" name="color_id" value="{{ $color->id }}" class="sr-only" x-model.number="selectedColor">
                                            <span class="sr-only">{{ $color->name }}</span>
                                            <span style="background-color: {{ $color->hex_code }}" class="h-8 w-8 border border-black border-opacity-10 rounded-full" title="{{ $color->name }}"></span>
                                        </label>
                                    @endforeach
                                </div>
                            </fieldset>
                        </div>
                        @endif
                        
                        <!-- Aksi (Jumlah & Tombol) -->
                        <div class="flex items-center space-x-4">
                            <!-- Penghitung Jumlah -->
                            <div class="flex items-center border border-gray-300 rounded-lg">
                                <button type="button" @click="quantity = Math.max(1, quantity - 1)" class="px-4 py-3 text-lg text-light hover:bg-gray-100 rounded-l-lg">-</button>
                                <span x-text="quantity" class="w-16 text-center border-l border-r border-gray-300 py-3 font-semibold text-secondary"></span>
                                <button type="button" @click="quantity++" class="px-4 py-3 text-lg text-light hover:bg-gray-100 rounded-r-lg">+</button>
                            </div>
                            <!-- Tombol Add to Cart -->
                            <button type="submit"
                                    :disabled="!selectedSize || ({{ $product->colors->isNotEmpty() ? '!selectedColor' : 'false' }}) || isLoading"
                                    :class="{ 'opacity-50 cursor-not-allowed': !selectedSize || ({{ $product->colors->isNotEmpty() ? '!selectedColor' : 'false' }}) || isLoading }"
                                    class="flex-1 bg-primary text-white font-semibold py-3 px-8 border-2 border-primary rounded-lg hover:bg-secondary hover:border-secondary transition-colors flex items-center justify-center">
                                <span x-show="!isLoading">Add To Cart</span>
                                <span x-show="isLoading">
                                    <svg class="animate-spin h-5 w-5 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
