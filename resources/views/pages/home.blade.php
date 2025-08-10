<x-app-layout>
    <x-slot name="title">Songkok Guru Takalar Premium - Warisan Budaya Bugis | Kana Tojong</x-slot>
    <x-slot name="metaDescription">Temukan koleksi Songkok Guru Takalar dan Songkok Recca asli Bugis berkualitas premium. Kerajinan tangan tradisional dengan nilai budaya tinggi, dibuat oleh pengrajin ahli di Sulawesi Selatan.</x-slot>

    <!-- Enhanced SEO Meta Tags -->
    <x-slot name="head">
        <meta name="keywords" content="songkok takalar, songkok recca, songkok bugis, kerajinan tangan sulawesi, budaya bugis, songkok tradisional, songkok premium">
        <meta property="og:title" content="Songkok Guru Takalar Premium - Warisan Budaya Bugis | Kana Tojong">
        <meta property="og:description" content="Koleksi songkok tradisional Bugis berkualitas premium. Kerajinan tangan asli dari Takalar, Sulawesi Selatan.">
        <meta property="og:image" content="{{ asset('storage/images/Background_home.png') }}">
        <meta property="og:type" content="website">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="geo.region" content="ID-SN">
        <meta name="geo.placename" content="Takalar, Sulawesi Selatan">
        <link rel="canonical" href="{{ url()->current() }}">
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Kana Tojong",
            "description": "Produsen songkok tradisional Bugis berkualitas premium",
            "url": "{{ url('/') }}",
            "logo": "{{ asset('storage/images/Background_home.png') }}",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Takalar",
                "addressRegion": "Sulawesi Selatan",
                "addressCountry": "Indonesia"
            }
        }
        </script>
    </x-slot>

    <!-- HERO SECTION -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900/80 via-slate-800/70 to-amber-900/60 z-10"></div>
            <img src="{{ asset('storage/images/Background_home.png') }}" alt="Songkok Takalar Background" class="w-full h-full object-cover scale-110 animate-slow-zoom">
        </div>
        
        <div class="relative z-20 max-w-6xl mx-auto px-6 sm:px-8 lg:px-10 text-center">
            <div class="space-y-8 animate-fade-in-up">
                <div class="inline-flex items-center px-4 py-2 backdrop-blur-sm rounded-full border border-amber-300/30">
                    <span class="text-amber-200 text-sm font-medium tracking-wide">✨ WARISAN BUDAYA NUSANTARA</span>
                </div>
                
                <h1 class="text-4xl sm:text-5xl lg:text-7xl font-black text-white leading-tight">
                    <span class="block bg-gradient-to-r from-amber-300 via-yellow-400 to-amber-300 bg-clip-text text-transparent animate-gradient-x">
                        Warisan Budaya
                    </span>
                    <span class="block mt-2 text-white drop-shadow-2xl">
                        dalam Setiap Anyaman
                    </span>
                </h1>
                
                <p class="max-w-3xl mx-auto text-xl lg:text-2xl text-gray-200 leading-relaxed font-light">
                    Kana Tojong mempersembahkan <span class="font-semibold text-amber-300">Songkok Recca</span>, 
                    mahakarya kerajinan tangan yang melambangkan kehormatan dan tradisi Bugis yang telah diwariskan turun-temurun.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center pt-6">
                    <a href="{{ route('shop.index') }}" 
                       class="group relative inline-flex items-center justify-center px-10 py-4 bg-gradient-to-r from-amber-400 to-yellow-500 text-slate-900 font-bold text-lg rounded-full shadow-2xl hover:from-amber-300 hover:to-yellow-400 transition-all duration-300 transform hover:scale-105 hover:-translate-y-1">
                        <span class="relative z-10">Jelajahi Koleksi</span>
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                        <div class="absolute inset-0 rounded-full bg-white/20 scale-0 group-hover:scale-100 transition-transform duration-300"></div>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-20">
            <div class="flex flex-col items-center animate-bounce">
                <span class="text-white/60 text-sm mb-2 font-light">Scroll untuk melihat lebih banyak</span>
                <div class="w-6 h-10 border-2 border-white/40 rounded-full flex justify-center">
                    <div class="w-1 h-3 bg-white/60 rounded-full mt-2 animate-pulse"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- KEUNGGULAN KAMI SECTION -->
    <section x-data="{ show: false }" x-intersect.once="show = true" class="py-24 bg-gradient-to-b from-slate-50 to-white">
        <div :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-20'" class="transition-all duration-1000 ease-out max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
            
            <div class="text-center mb-20">
                <div class="inline-flex items-center px-6 py-2 bg-amber-100 rounded-full mb-6">
                    <span class="text-amber-800 text-sm font-semibold tracking-wide">MENGAPA MEMILIH KAMI</span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-slate-900 mb-4">
                    Keunggulan yang Membuat Kami
                    <span class="bg-gradient-to-r from-amber-600 to-yellow-600 bg-clip-text text-transparent">Berbeda</span>
                </h2>
                <p class="text-xl text-slate-600 max-w-2xl mx-auto leading-relaxed">
                    Tiga pilar utama yang menjadikan produk kami pilihan terbaik untuk Anda
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Keunggulan 1 -->
                <div class="group relative p-8 bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-slate-100">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-50 to-yellow-50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center h-20 w-20 rounded-2xl bg-gradient-to-br from-amber-400 to-yellow-500 text-white mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.898 20.562L16.25 22.5l-.648-1.938a3.375 3.375 0 00-2.684-2.684l-1.938-.648 1.938-.648a3.375 3.375 0 002.684-2.684l.648-1.938.648 1.938a3.375 3.375 0 002.684 2.684l1.938.648-1.938.648a3.375 3.375 0 00-2.684 2.684z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4 group-hover:text-amber-700 transition-colors">Kualitas Premium</h3>
                        <p class="text-slate-600 text-lg leading-relaxed">Dibuat dari serat pelepah lontar pilihan yang diproses secara teliti dengan standar kualitas tinggi untuk hasil terbaik dan tahan lama.</p>
                        
                        <div class="mt-6 flex items-center text-amber-600 font-medium">
                            <span class="text-sm">Pelajari lebih lanjut</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Keunggulan 2 -->
                <div class="group relative p-8 bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-slate-100">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-50 to-yellow-50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center h-20 w-20 rounded-2xl bg-gradient-to-br from-amber-400 to-yellow-500 text-white mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4 group-hover:text-amber-700 transition-colors">100% Kerajinan Tangan</h3>
                        <p class="text-slate-600 text-lg leading-relaxed">Setiap songkok adalah karya seni unik yang dianyam dengan penuh kesabaran dan keahlian oleh pengrajin berpengalaman puluhan tahun.</p>
                        
                        <div class="mt-6 flex items-center text-amber-600 font-medium">
                            <span class="text-sm">Pelajari lebih lanjut</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Keunggulan 3 -->
                <div class="group relative p-8 bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-slate-100">
                    <div class="absolute inset-0 bg-gradient-to-br from-amber-50 to-yellow-50 rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <div class="flex items-center justify-center h-20 w-20 rounded-2xl bg-gradient-to-br from-amber-400 to-yellow-500 text-white mb-6 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-slate-900 mb-4 group-hover:text-amber-700 transition-colors">Simbol Kebanggaan</h3>
                        <p class="text-slate-600 text-lg leading-relaxed">Lebih dari sekadar penutup kepala, songkok adalah identitas, prestise, dan kebanggaan budaya yang mencerminkan nilai-nilai luhur.</p>
                        
                        <div class="mt-6 flex items-center text-amber-600 font-medium">
                            <span class="text-sm">Pelajari lebih lanjut</span>
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PRODUK UNGGULAN SECTION -->
    <section x-data="{ show: false }" x-intersect.once="show = true" class="py-24 bg-white relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-50/50 via-transparent to-amber-50/30"></div>
        
        <div :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-20'" class="relative transition-all duration-1000 ease-out max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
            
            <div class="text-center mb-20">
                <div class="inline-flex items-center px-6 py-2 bg-gradient-to-r from-amber-100 to-yellow-100 rounded-full mb-6">
                    <span class="text-amber-800 text-sm font-semibold tracking-wide">KOLEKSI TERPILIH</span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-slate-900 mb-6">
                    Produk <span class="bg-gradient-to-r from-amber-600 to-yellow-600 bg-clip-text text-transparent">Unggulan</span> Kami
                </h2>
                <p class="text-xl text-slate-600 max-w-3xl mx-auto leading-relaxed">
                    Temukan koleksi songkok terbaik yang telah dipilih khusus untuk Anda, 
                    menggabungkan tradisi dengan kualitas modern
                </p>
            </div>

            <div class="mb-16">
                @if($featuredProducts->isNotEmpty())
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                        @foreach ($featuredProducts as $product)
                            <div class="transform transition-all duration-300 hover:-translate-y-2">
                                <x-product-card :product="$product" />
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-20">
                        <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-amber-100 mb-6">
                            <svg class="w-10 h-10 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold text-slate-900 mb-3">Produk Segera Hadir</h3>
                        <p class="text-lg text-slate-600 max-w-md mx-auto">
                            Koleksi produk unggulan terbaru sedang dalam tahap persiapan. 
                            Nantikan kehadiran karya-karya terbaik kami!
                        </p>
                    </div>
                @endif
            </div>

            <div class="text-center">
                <a href="{{ route('shop.index') }}" 
                   class="group inline-flex items-center justify-center px-12 py-4 border-2 border-amber-600 text-amber-600 font-semibold text-lg rounded-full hover:bg-amber-600 hover:text-white transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                    <span>Lihat Semua Produk</span>
                    <svg class="w-5 h-5 ml-3 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    
    <!-- MITRA KAMI SECTION -->
    <section x-data="{ show: false }" x-intersect.once="show = true" class="py-24 bg-gradient-to-br from-slate-900 via-slate-800 to-amber-900 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_center,rgba(255,255,255,0.1)_0%,transparent_50%)]"></div>
        
        <div :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-20'" class="relative transition-all duration-1000 ease-out max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
            
            <div class="text-center mb-20">
                <div class="inline-flex items-center px-6 py-2 bg-white/10 backdrop-blur-sm rounded-full mb-6 border border-white/20">
                    <span class="text-amber-300 text-sm font-semibold tracking-wide">JARINGAN KEMITRAAN</span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    Dipercaya oleh <span class="bg-gradient-to-r from-amber-300 to-yellow-300 bg-clip-text text-transparent">Mitra</span> Terbaik
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                    Kami bangga dapat berkolaborasi dengan berbagai pihak untuk melestarikan dan mengembangkan warisan budaya Indonesia
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="group relative">
                    <div class="aspect-w-4 aspect-h-3 rounded-2xl overflow-hidden">
                        <img src="{{ asset('storage/images/mitrakanatojeng1.jpg') }}" 
                             alt="Mitra Kana Tojong 1" 
                             class="w-full h-64 sm:h-80 object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute inset-0 bg-amber-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-white font-semibold text-lg mb-2">Kemitraan Strategis</h3>
                        <p class="text-gray-200 text-sm">Kolaborasi untuk pengembangan produk</p>
                    </div>
                </div>

                <div class="group relative">
                    <div class="aspect-w-4 aspect-h-3 rounded-2xl overflow-hidden">
                        <img src="{{ asset('storage/images/mitrakanatojeng2.jpg') }}" 
                             alt="Mitra Kana Tojong 2" 
                             class="w-full h-64 sm:h-80 object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute inset-0 bg-amber-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-white font-semibold text-lg mb-2">Program Pemberdayaan</h3>
                        <p class="text-gray-200 text-sm">Memberdayakan pengrajin lokal</p>
                    </div>
                </div>

                <div class="group relative sm:col-span-2 lg:col-span-1">
                    <div class="aspect-w-4 aspect-h-3 rounded-2xl overflow-hidden">
                        <img src="{{ asset('storage/images/mitrakanatojeng3.jpg') }}" 
                             alt="Mitra Kana Tojong 3" 
                             class="w-full h-64 sm:h-80 object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        <div class="absolute inset-0 bg-amber-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="absolute bottom-6 left-6 right-6">
                        <h3 class="text-white font-semibold text-lg mb-2">Pelestarian Budaya</h3>
                        <p class="text-gray-200 text-sm">Menjaga tradisi untuk generasi mendatang</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-16">
                <div class="inline-flex items-center px-8 py-4 bg-white/10 backdrop-blur-sm rounded-full border border-white/20">
                    <span class="text-white font-medium">Tertarik menjadi mitra? </span>
                    <a href="#" class="ml-2 text-amber-300 hover:text-amber-200 font-semibold transition-colors">
                        Hubungi Kami →
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
        @keyframes gradient-x {
            0%, 100% { background-size: 200% 200%; background-position: left center; }
            50% { background-size: 200% 200%; background-position: right center; }
        }
        
        @keyframes slow-zoom {
            0%, 100% { transform: scale(1.1); }
            50% { transform: scale(1.2); }
        }
        
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-gradient-x {
            background-size: 200% 200%;
            animation: gradient-x 3s ease infinite;
        }
        
        .animate-slow-zoom {
            animation: slow-zoom 20s ease-in-out infinite;
        }
        
        .animate-fade-in-up {
            animation: fade-in-up 1s ease-out;
        }
    </style>
</x-app-layout>