<x-app-layout>
    {{-- SEO Slots untuk Halaman Home --}}
    <x-slot name="title">Songkok Guru Takalar - Kana Tojong</x-slot>
    <x-slot name="metaDescription">Temukan Songkok Guru Takalar dan Songkok Recca asli Bugis berkualitas tinggi. Pusat kerajinan songkok adat dengan nilai budaya.</x-slot>

    <!-- =================================================================
    HERO SECTION
    ================================================================== -->
    <section class="relative h-[70vh] bg-cover bg-center" style="background-image: url('{{ asset('storage/images/Background home.jpg') }}');">
        {{-- Overlay gelap untuk meningkatkan kontras teks --}}
        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
        
        {{-- Konten di dalam Hero Section --}}
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center justify-end">
            {{-- Kotak teks dengan latar belakang agar tidak tenggelam --}}
            <div class="bg- bg-opacity-90 p-8 md:p-10 max-w-md shadow-lg rounded-sm">
                <p class="font-semibold text-secondary tracking-widest">New Arrival</p>
                <h1 class="text-4xl md:text-5xl font-bold text-primary leading-tight mt-2">Discover Our New Collection</h1>
                <p class="mt-4 text-secondary">
                    Jelajahi koleksi terbaru kami yang memadukan tradisi dan gaya modern, dibuat dengan material terbaik oleh para ahli.
                </p>
                <a href="{{ route('shop.index') }}" class="inline-block bg-primary text-white font-bold py-3 px-12 mt-6 hover:bg-secondary transition-colors duration-300">
                    BUY NOW
                </a>
            </div>
        </div>
    </section>

    <!-- =================================================================
    MITRA KAMI SECTION
    ================================================================== -->
    <section class="py-16 bg-background">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-secondary">Mitra Kami</h2>
            <p class="mt-2 text-light">Tim Pengabdian Dosen Fikom UMI</p>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="aspect-w-4 aspect-h-3">
                    <img src="{{ asset('storage/images/gambarmitra1.jpg') }}" alt="Mitra Kana Tojong 1" class="w-full h-full object-cover rounded-md">
                </div>
                <div class="aspect-w-4 aspect-h-3">
                    <img src="{{ asset('storage/images/gambarmitra2.jpg') }}" alt="Mitra Kana Tojong 2" class="w-full h-full object-cover rounded-md">
                </div>
                <div class="aspect-w-4 aspect-h-3">
                    <img src="{{ asset('storage/images/gambarmitra3.jpg') }}" alt="Mitra Kana Tojong 3" class="w-full h-full object-cover rounded-md">
                </div>
            </div>
        </div>
    </section>

    <!-- =================================================================
    PRODUK UNGGULAN SECTION
    ================================================================== -->
    <section class="bg-white py-16">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-secondary">Produk Unggulan Kami</h2>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">
            @if($featuredProducts->isNotEmpty())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    {{-- Loop akan menampilkan produk yang ditandai sebagai 'unggulan' --}}
                    {{-- Pastikan setiap produk unggulan memiliki gambar yang di-upload --}}
                    @foreach ($featuredProducts as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
            @else
                <p class="text-center text-light">Produk unggulan akan segera hadir.</p>
            @endif
            <div class="text-center mt-12">
                <a href="{{ route('shop.index') }}" class="bg-transparent text-primary font-semibold py-3 px-16 border border-primary hover:bg-primary hover:text-white transition-colors duration-300">
                    Show More
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
