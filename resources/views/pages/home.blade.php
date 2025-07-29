    <x-app-layout>

        <x-slot name="title">Songkok Guru Takalar</x-slot>
        <x-slot name="metaDescription">Temukan Songkok Guru Takalar dan Songkok Recca asli Bugis berkualitas tinggi. Pusat kerajinan songkok adat dengan nilai budaya.</x-slot>


        {{-- Hero Section --}}
        <div class="bg-white">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-base font-semibold text-gold tracking-wide uppercase">Warisan Budaya Bugis</h2>
                    <p class="mt-1 text-4xl font-extrabold text-dark sm:text-5xl sm:tracking-tight lg:text-6xl">Songkok Recca Asli</p>
                    <p class="max-w-xl mt-5 mx-auto text-xl text-secondary">Mahakarya anyaman tangan dari serat pelepah lontar, simbol kehormatan dan tradisi.</p>
                    <div class="mt-8 flex justify-center">
                        <div class="inline-flex rounded-md shadow">
                            <a href="{{ route('shop.index') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-dark bg-primary-yellow hover:bg-gold hover:text-white transition-colors duration-300">
                                Lihat Semua Koleksi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Featured Products Section --}}
        <div class="py-12 bg-background">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                     <h3 class="text-3xl font-bold text-dark">Produk Unggulan Kami</h3>
                     <p class="text-secondary">Pilihan terbaik yang paling diminati oleh pelanggan kami.</p>
                </div>
                
                @if($featuredProducts->isNotEmpty())
                <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                    @foreach ($featuredProducts as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
                @else
                <p class="text-center text-secondary">Produk unggulan akan segera hadir.</p>
                @endif
            </div>
        </div>
    </x-app-layout>
    