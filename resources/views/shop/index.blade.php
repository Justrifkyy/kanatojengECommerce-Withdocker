<x-app-layout>
    <x-slot name="title">Koleksi Produk</x-slot>

    <!-- Header Halaman -->
    <section class="bg-surface">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-secondary tracking-tight">Shop</h1>
            <p class="mt-4 text-lg text-light max-w-2xl mx-auto">Jelajahi semua koleksi Songkok Recca, dari yang klasik hingga yang paling eksklusif.</p>
        </div>
    </section>

    <!-- Filter dan Konten Utama -->
    <div class="bg-background">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <!-- Baris Filter dan Urutkan -->
            <div class="bg-surface p-4 rounded-lg mb-8 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="flex items-center space-x-4">
                    <span class="font-semibold text-secondary">Filter:</span>
                    <div class="flex items-center space-x-2">
                        <!-- Filter Kategori -->
                        @foreach ($categories as $category)
                            <a href="{{ route('shop.index', ['category' => $category->id, 'sort' => request('sort')]) }}" 
                               class="px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ request('category') == $category->id ? 'bg-primary text-white shadow-sm' : 'bg-white text-light hover:bg-gray-100' }}">
                                {{ $category->name }}
                            </a>
                        @endforeach
                         <a href="{{ route('shop.index', ['sort' => request('sort')]) }}" 
                               class="px-4 py-2 rounded-md text-sm font-medium transition-colors duration-200 {{ !request('category') ? 'bg-primary text-white shadow-sm' : 'bg-white text-light hover:bg-gray-100' }}">
                                Semua
                            </a>
                    </div>
                </div>
                
                <!-- Form untuk Urutkan -->
                <form method="GET" action="{{ route('shop.index') }}" class="flex items-center space-x-2">
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    <label for="sort" class="text-sm font-medium text-secondary">Urutkan:</label>
                    <select name="sort" id="sort" onchange="this.form.submit()" class="text-sm rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary transition">
                        <option value="latest" @selected(request('sort') == 'latest' || !request('sort'))>Terbaru</option>
                        <option value="price_asc" @selected(request('sort') == 'price_asc')>Harga Terendah</option>
                        <option value="price_desc" @selected(request('sort') == 'price_desc')>Harga Tertinggi</option>
                    </select>
                </form>
            </div>

            <!-- Grid Produk -->
            @if($products->count() > 0)
                <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    @foreach ($products as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
            @else
                <div class="text-center py-16">
                    <p class="text-lg text-light">Tidak ada produk yang ditemukan.</p>
                </div>
            @endif

            <!-- Paginasi -->
            <div class="mt-16">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
