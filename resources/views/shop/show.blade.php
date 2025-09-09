<x-app-layout>
    <x-slot name="title">{{ $product->name }} - Kana Tojeng</x-slot>
    <x-slot name="metaDescription">{{ Str::limit($product->description, 155) }} - Shop now with free shipping and premium quality guarantee.</x-slot>
    
    @push('meta')
        <meta property="og:title" content="{{ $product->name }} - Premium Quality Products">
        <meta property="og:description" content="{{ Str::limit($product->description, 155) }}">
        <meta property="og:image" content="{{ $product->media->first() ? asset('storage/' . $product->media->first()->file_path) : asset('images/default-product.jpg') }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $product->name }}">
        <meta name="twitter:description" content="{{ Str::limit($product->description, 155) }}">
        <link rel="canonical" href="{{ url()->current() }}">
    @endpush

    <section class="bg-gradient-to-r from-yellow-50 to-yellow-100 py-6 border-b border-yellow-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center space-x-2 text-sm font-medium">
                <a href="{{ route('home') }}" 
                   class="text-gray-600 hover:text-yellow-600 transition-colors duration-300 hover:underline decoration-2 underline-offset-4">
                    Home
                </a>
                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <a href="{{ route('shop.index') }}" 
                   class="text-gray-600 hover:text-yellow-600 transition-colors duration-300 hover:underline decoration-2 underline-offset-4">
                    Shop
                </a>
                <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-yellow-600 font-semibold">{{ $product->name }}</span>
            </nav>
        </div>
    </section>

    <div class="bg-white min-h-screen">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div x-data="{ 
                    selectedSize: null, 
                    selectedColor: {{ $product->colors->isNotEmpty() ? 'null' : 'true' }},
                    selectedColorName: '',
                    quantity: 1,
                    mainMediaUrl: '{{ $product->media->first() ? asset('storage/' . $product->media->first()->file_path) : 'https://placehold.co/800x800/f3f4f6/333333?text=Produk' }}',
                    mainMediaType: '{{ $product->media->first()->media_type ?? 'image' }}',
                    isLoading: false,
                    showFullDescription: false,
                    variants: {{ Js::from($product->sizes->mapWithKeys(function ($size) {
                        return [$size->id => $size->pivot->stock];
                    })) }},
                    get currentStock() {
                        return this.selectedSize ? this.variants[this.selectedSize] : null;
                    },
                    addToCart() {
                        if (!this.selectedSize) {
                            $store.app.showToast('Silakan pilih ukuran terlebih dahulu.', 'error');
                            return;
                        }
                        if ({{ $product->colors->isNotEmpty() ? '!this.selectedColor' : 'false' }}) {
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
                                let message = this.currentStock > 0 ? data.message : 'Produk berhasil ditambahkan untuk Pre-Order.';
                                $store.app.showToast(message, 'success');
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
                 class="lg:grid lg:grid-cols-2 lg:gap-16 lg:items-start"
                 x-init="$nextTick(() => { })">
                
                <div class="flex flex-col-reverse sm:flex-row gap-6 group" 
                     x-data="{ imageLoaded: false }" 
                     @load.window="imageLoaded = true">
                    
                    <div class="flex sm:flex-col gap-3 sm:w-28">
                        @forelse ($product->media as $media)
                            <div @click="mainMediaUrl = '{{ asset('storage/' . $media->file_path) }}'; mainMediaType = '{{ $media->media_type }}'"
                                 :class="{ 
                                     'ring-4 ring-yellow-500 ring-offset-2 shadow-lg transform scale-105': mainMediaUrl === '{{ asset('storage/' . $media->file_path) }}',
                                     'hover:ring-2 hover:ring-yellow-300 hover:shadow-md': mainMediaUrl !== '{{ asset('storage/' . $media->file_path) }}'
                                 }"
                                 class="relative aspect-square rounded-xl overflow-hidden cursor-pointer transition-all duration-300 hover:transform hover:scale-105 bg-gray-100">
                                <img src="{{ $media->media_type === 'image' ? asset('storage/' . $media->file_path) : 'https://placehold.co/120x120/e0e0e0/333333?text=Video' }}" 
                                     alt="Thumbnail {{ $loop->iteration }}" 
                                     class="w-full h-20 object-cover transition-transform duration-300"
                                     loading="lazy">
                                @if ($media->media_type === 'video')
                                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center backdrop-blur-sm">
                                        <div class="bg-white bg-opacity-20 rounded-full p-2 backdrop-blur-sm">
                                            <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="aspect-square rounded-xl overflow-hidden ring-4 ring-yellow-500 ring-offset-2">
                                <img src="https://placehold.co/120x120/f3f4f6/333333?text=Produk" alt="Placeholder" class="w-full h-full object-cover">
                            </div>
                        @endforelse
                    </div>

                    <div class="w-full aspect-square rounded-2xl overflow-hidden bg-gradient-to-br from-yellow-100 to-yellow-200 shadow-2xl relative group">
                        <div class="absolute inset-0 bg-yellow-200 animate-pulse" x-show="!imageLoaded"></div>
                        
                        <template x-if="mainMediaType === 'image'">
                            <img :src="mainMediaUrl" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-96 object-cover object-center transition-transform duration-700 group-hover:scale-105"
                                 @load="imageLoaded = true">
                        </template>
                        <template x-if="mainMediaType === 'video'">
                            <video :src="mainMediaUrl" 
                                   controls 
                                   autoplay 
                                   muted 
                                   loop 
                                   class="w-full h-96 object-cover rounded-2xl">
                            </video>
                        </template>

                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300 flex items-center justify-center">
                            <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-white bg-opacity-90 rounded-full p-3 backdrop-blur-sm">
                                <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-12 sm:mt-0 space-y-8" x-data="{ animateIn: false }" x-init="setTimeout(() => animateIn = true, 200)">
                    
                    <div class="space-y-4" :class="{ 'animate-fade-in-up': animateIn }">
                        <div class="flex items-center space-x-3">
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">In Stock</span>
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">Premium Quality</span>
                        </div>
                        
                        <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight tracking-tight">
                            {{ $product->name }}
                        </h1>
                        
                        <div class="flex items-baseline space-x-4">
                            <p class="text-3xl lg:text-4xl font-bold text-yellow-600">
                                Rp{{ number_format($product->price, 0, ',', '.') }}
                            </p>
                            <span class="text-sm text-gray-500 line-through">
                                Rp{{ number_format($product->price * 1.2, 0, ',', '.') }}
                            </span>
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-bold px-2 py-1 rounded">
                                SAVE 17%
                            </span>
                        </div>
                    </div>
                    
                    <div class="prose prose-gray max-w-none" :class="{ 'animate-fade-in-up delay-100': animateIn }">
                        <p class="text-lg text-gray-700 leading-relaxed">
                            <span x-show="!showFullDescription">
                                {{ Str::limit($product->description, 150) }}
                                @if(strlen($product->description) > 150)
                                    <button @click="showFullDescription = true" 
                                            class="text-yellow-600 hover:text-yellow-800 font-semibold ml-2 underline underline-offset-2">
                                        Read more
                                    </button>
                                @endif
                            </span>
                            <span x-show="showFullDescription" x-transition>
                                {{ $product->description }}
                                @if(strlen($product->description) > 150)
                                    <button @click="showFullDescription = false" 
                                            class="text-yellow-600 hover:text-yellow-800 font-semibold ml-2 underline underline-offset-2">
                                        Show less
                                    </button>
                                @endif
                            </span>
                        </p>
                    </div>

                    <form @submit.prevent="addToCart()" x-ref="cartForm" class="space-y-8" :class="{ 'animate-fade-in-up delay-200': animateIn }">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900">Size</h3>
                                <a href="#" class="text-sm text-yellow-600 hover:text-yellow-800 underline underline-offset-2">Size Guide</a>
                            </div>
                            <fieldset>
                                <div class="flex items-center flex-wrap gap-3">
                                    @forelse ($product->sizes->sortBy('size_number') as $size)
                                        <label @click="selectedSize = {{ $size->id }}"
                                               :class="{ 
                                                   'bg-yellow-600 text-white ring-2 ring-yellow-600 transform scale-105 shadow-md': selectedSize == {{ $size->id }}, 
                                                   'bg-white text-gray-900 border-2 border-yellow-300 hover:border-yellow-400 hover:shadow-sm': selectedSize != {{ $size->id }} 
                                               }"
                                               class="min-w-[3rem] h-12 px-4 flex items-center justify-center rounded-lg cursor-pointer font-semibold transition-all duration-200 hover:transform hover:scale-105">
                                            <input type="radio" name="size_id" value="{{ $size->id }}" class="sr-only" x-model.number="selectedSize">
                                            <span>{{ $size->size_number }}</span>
                                        </label>
                                    @empty
                                        <p class="text-sm text-gray-500 italic">Ukuran belum tersedia.</p>
                                    @endforelse
                                </div>
                            </fieldset>
                        </div>
                        
                        @if($product->colors->isNotEmpty())
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900">Color</h3>
                                <p x-show="selectedColor" 
                                   x-text="selectedColorName" 
                                   class="text-sm font-medium text-yellow-600 capitalize transition-all duration-300"
                                   x-transition:enter="transition ease-out duration-200"
                                   x-transition:enter-start="opacity-0 transform scale-90"
                                   x-transition:enter-end="opacity-100 transform scale-100">
                                </p>
                            </div>
                            <fieldset>
                                <div class="flex items-center flex-wrap gap-4">
                                    @foreach ($product->colors as $color)
                                        <label @click="selectedColor = {{ $color->id }}; selectedColorName = '{{ $color->name }}'"
                                               :class="{ 'ring-4 ring-yellow-500 ring-offset-2 transform scale-110 shadow-lg': selectedColor == {{ $color->id }} }"
                                               class="relative rounded-full flex items-center justify-center cursor-pointer focus:outline-none transition-all duration-300 hover:transform hover:scale-105 hover:shadow-md">
                                            <input type="radio" name="color_id" value="{{ $color->id }}" class="sr-only" x-model.number="selectedColor">
                                            <span class="sr-only">{{ $color->name }}</span>
                                            <div class="relative">
                                                <span style="background-color: {{ $color->hex_code }}" 
                                                      class="h-10 w-10 border-2 border-white shadow-lg rounded-full block"
                                                      title="{{ $color->name }}">
                                                </span>
                                                <span class="absolute inset-0 rounded-full border border-black border-opacity-10"></span>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </fieldset>
                        </div>
                        @endif
                        
                        <div x-show="selectedSize" class="space-y-4" x-transition>
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-gray-900">Availability</h3>
                                <p x-text="currentStock > 0 ? 'Stock Available (' + currentStock + ')' : 'Out of Stock (Pre-Order)'" 
                                   :class="currentStock > 0 ? 'text-green-600' : 'text-amber-600'" 
                                   class="font-bold text-sm"></p>
                            </div>
                        </div>
                        
                        <div class="space-y-6">
                            <div class="flex items-center space-x-6">
                                <div class="flex items-center">
                                    <label class="text-sm font-medium text-gray-900 mr-4">Quantity</label>
                                    <div class="flex items-center border-2 border-yellow-300 rounded-xl overflow-hidden hover:border-yellow-400 transition-colors">
                                        <button type="button" 
                                                @click="quantity = Math.max(1, quantity - 1)" 
                                                class="px-4 py-3 text-lg font-bold text-yellow-600 hover:bg-yellow-100 hover:text-yellow-900 transition-colors">
                                            −
                                        </button>
                                        <span x-text="quantity" 
                                              class="w-16 text-center border-l-2 border-r-2 border-yellow-300 py-3 font-bold text-gray-900 bg-yellow-50">
                                        </span>
                                        <button type="button" 
                                                @click="quantity++" 
                                                class="px-4 py-3 text-lg font-bold text-yellow-600 hover:bg-yellow-100 hover:text-yellow-900 transition-colors">
                                            +
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                    :disabled="!selectedSize || ({{ $product->colors->isNotEmpty() ? '!selectedColor' : 'false' }}) || isLoading"
                                    :class="{ 
                                        'opacity-50 cursor-not-allowed': !selectedSize || ({{ $product->colors->isNotEmpty() ? '!selectedColor' : 'false' }}) || isLoading,
                                        'hover:bg-yellow-700 hover:shadow-lg transform hover:scale-[1.02]': selectedSize && ({{ $product->colors->isNotEmpty() ? 'selectedColor' : 'true' }}) && !isLoading
                                    }"
                                    class="w-full bg-gradient-to-r from-yellow-600 to-yellow-700 text-white font-bold py-4 px-8 rounded-xl transition-all duration-300 flex items-center justify-center space-x-3 shadow-lg border-0">
                                <span x-show="!isLoading" x-text="currentStock > 0 ? 'Add To Cart' : 'Pre-Order (PO)'"></span>
                                <span x-show="isLoading">
                                    <svg class="animate-spin h-5 w-5 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </button>

                            <div class="grid grid-cols-3 gap-4 pt-6 border-t border-yellow-200">
                                <div class="text-center">
                                    <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-2">
                                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <p class="text-xs font-medium text-gray-700">Quality Guarantee</p>
                                </div>
                                <div class="text-center">
                                    <div class="bg-blue-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-2">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                                        </svg>
                                    </div>
                                    <p class="text-xs font-medium text-gray-700">Free Returns</p>
                                </div>
                                <div class="text-center">
                                    <div class="bg-yellow-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-2">
                                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                    </div>
                                    <p class="text-xs font-medium text-gray-700">Fast Shipping</p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <style>
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        .delay-100 {
            animation-delay: 0.1s;
        }
        .delay-200 {
            animation-delay: 0.2s;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    @endpush
</x-app-layout>