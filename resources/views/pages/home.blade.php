<x-app-layout>
    <x-slot name="title">Songkok Guru Takalar - Kana Tojong</x-slot>
    <x-slot name="metaDescription">Temukan Songkok Guru Takalar dan Songkok Recca asli Bugis berkualitas tinggi. Pusat kerajinan songkok adat dengan nilai budaya.</x-slot>

    <!-- HERO SECTION -->
    <section class="relative h-[80vh] bg-cover bg-center" style="background-image: url('{{ asset('storage/images/Background_home.png') }}');">
        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center items-center text-center text-white">
            <h1 class="text-yellow-500 text-4xl md:text-6xl font-extrabold tracking-tight leading-tight">
                Warisan Budaya dalam Setiap Anyaman
            </h1>
            <p class="mt-6 max-w-2xl text-lg text-gray-200">
                Kana Tojong mempersembahkan Songkok Recca, mahakarya kerajinan tangan yang melambangkan kehormatan dan tradisi Bugis.
            </p>
            <a href="{{ route('shop.index') }}" class="mt-8 inline-block bg-bright-yellow text-secondary font-bold py-3 px-10 rounded-full text-lg hover:bg-white transition-colors duration-300 transform hover:scale-105">
                Jelajahi Koleksi
            </a>
        </div>
    </section>

    <!-- KEUNGGULAN KAMI SECTION -->
    <section x-data="{ show: false }" x-intersect.once="show = true" class="py-20 bg-background">
        <div :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-700 ease-out max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                <!-- Keunggulan 1 -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-surface text-primary">
                        <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.898 20.562L16.25 22.5l-.648-1.938a3.375 3.375 0 00-2.684-2.684l-1.938-.648 1.938-.648a3.375 3.375 0 002.684-2.684l.648-1.938.648 1.938a3.375 3.375 0 002.684 2.684l1.938.648-1.938.648a3.375 3.375 0 00-2.684 2.684z" /></svg>
                    </div>
                    <h3 class="mt-5 text-xl font-bold text-secondary">Kualitas Premium</h3>
                    <p class="mt-2 text-light">Dibuat dari serat pelepah lontar pilihan yang diproses secara teliti untuk hasil terbaik.</p>
                </div>
                <!-- Keunggulan 2 -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-surface text-primary">
                        <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" /></svg>
                    </div>
                    <h3 class="mt-5 text-xl font-bold text-secondary">100% Kerajinan Tangan</h3>
                    <p class="mt-2 text-light">Setiap songkok adalah karya seni yang dianyam dengan penuh kesabaran oleh pengrajin ahli.</p>
                </div>
                <!-- Keunggulan 3 -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-surface text-primary">
                        <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </div>
                    <h3 class="mt-5 text-xl font-bold text-secondary">Simbol Kebanggaan</h3>
                    <p class="mt-2 text-light">Lebih dari sekadar penutup kepala, songkok adalah identitas dan kebanggaan budaya.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- PRODUK UNGGULAN SECTION -->
    <section x-data="{ show: false }" x-intersect.once="show = true" class="bg-white py-20">
        <div :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-700 ease-out max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-secondary">Produk Unggulan Kami</h2>
            </div>
            <div class="mt-12">
                @if($featuredProducts->isNotEmpty())
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        @foreach ($featuredProducts as $product)
                            <x-product-card :product="$product" />
                        @endforeach
                    </div>
                @else
                    <p class="text-center text-light">Produk unggulan akan segera hadir.</p>
                @endif
            </div>
            <div class="text-center mt-16">
                <a href="{{ route('shop.index') }}" class="bg-transparent text-primary font-semibold py-3 px-16 border-2 border-primary rounded-full hover:bg-primary hover:text-white transition-colors duration-300">
                    Lihat Semua Produk
                </a>
            </div>
        </div>
    </section>
    
    <!-- MITRA KAMI SECTION -->
    <section x-data="{ show: false }" x-intersect.once="show = true" class="py-20 bg-surface">
        <div :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-700 ease-out max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-secondary">Dipercaya oleh Mitra</h2>
                <p class="mt-2 text-light">Kami bangga dapat berkolaborasi dengan berbagai pihak untuk melestarikan budaya.</p>
            </div>
            <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                <div class="aspect-w-4 aspect-h-3">
                    <img src="{{ asset('storage/images/mitrakanatojeng1.jpg') }}" alt="Mitra Kana Tojong 1" class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
                <div class="aspect-w-4 aspect-h-3">
                    <img src="{{ asset('storage/images/mitrakanatojeng2.jpg') }}" alt="Mitra Kana Tojong 2" class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
                <div class="aspect-w-4 aspect-h-3">
                    <img src="{{ asset('storage/images/mitrakanatojeng3.jpg') }}" alt="Mitra Kana Tojong 3" class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
