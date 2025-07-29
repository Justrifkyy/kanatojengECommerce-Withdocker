<x-app-layout>

    <x-slot name="title">Koleksi Produk</x-slot>



    <div class="bg-background">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <!-- Header Halaman -->
            <div class="text-center pb-12">
                <h1 class="text-4xl font-extrabold text-dark tracking-tight">Koleksi Produk Kami</h1>
                <p class="mt-4 text-lg text-secondary max-w-2xl mx-auto">Jelajahi semua koleksi Songkok Recca, dari yang klasik hingga yang paling eksklusif untuk melengkapi gaya Anda.</p>
            </div>

            <!-- Konten Utama dengan Grid -->
            <div class="lg:grid lg:grid-cols-4 lg:gap-x-8">
                <!-- Sidebar Filter (Kolom Kiri) -->
                <aside class="hidden lg:block p-4 rounded-lg">
                    <h3 class="sr-only">Filters</h3>

                    <div class="space-y-10">
                        <!-- Bagian Filter Kategori -->
                        <div>
                            <h4 class="text-lg font-bold text-dark border-b border-gray-200 pb-2 mb-4">Kategori</h4>
                            <ul class="space-y-2">
                                <!-- Link untuk "Semua Kategori" -->
                                <li>
                                    <a href="{{ route('shop.index', ['sort' => request('sort')]) }}" 
                                       class="block px-3 py-2 rounded-md text-base transition-colors duration-200 {{ !request('category') ? 'bg-primary-yellow text-dark font-semibold shadow-sm' : 'text-secondary hover:bg-gray-100' }}">
                                        Semua Kategori
                                    </a>
                                </li>
                                <!-- Loop untuk setiap kategori dari database -->
                                @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('shop.index', ['category' => $category->id, 'sort' => request('sort')]) }}" 
                                       class="block px-3 py-2 rounded-md text-base transition-colors duration-200 {{ request('category') == $category->id ? 'bg-primary-yellow text-dark font-semibold shadow-sm' : 'text-secondary hover:bg-gray-100' }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </aside>

                <!-- Daftar Produk (Kolom Kanan) -->
                <main class="lg:col-span-3">
                    <!-- Header (Jumlah & Urutkan) -->
                    <div class="flex items-center justify-between border-b border-gray-200 pb-4 mb-6">
                        <p class="text-sm text-secondary">
                            Menampilkan {{ $products->firstItem() }}-{{ $products->lastItem() }} dari {{ $products->total() }} hasil
                        </p>
                        
                        <!-- Form untuk Dropdown Urutkan -->
                        <form method="GET" action="{{ route('shop.index') }}">
                            <input type="hidden" name="category" value="{{ request('category') }}">
                            <select name="sort" onchange="this.form.submit()" class="text-sm rounded-md border-gray-300 shadow-sm focus:ring-primary-yellow focus:border-primary-yellow transition">
                                <option value="latest" @selected(request('sort') == 'latest' || !request('sort'))>Urutkan: Terbaru</option>
                                <option value="price_asc" @selected(request('sort') == 'price_asc')>Urutkan: Harga Terendah</option>
                                <option value="price_desc" @selected(request('sort') == 'price_desc')>Urutkan: Harga Tertinggi</option>
                            </select>
                        </form>
                    </div>

                    <!-- Grid untuk Kartu Produk -->
                    @if($products->count() > 0)
                        <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                            @foreach ($products as $product)
                                <x-product-card :product="$product" />
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-16">
                            <p class="text-lg text-secondary">Tidak ada produk yang ditemukan.</p>
                        </div>
                    @endif

                    <!-- Navigasi Halaman (Paginasi) -->
                    <div class="mt-12">
                        {{ $products->links() }}
                    </div>
                </main>
            </div>
        </div>
    </div>
</x-app-layout>
