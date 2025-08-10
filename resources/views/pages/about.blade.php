<x-app-layout>
    <x-slot name="title">Tentang Kami - Kana Tojong | Songkok Recca Berkualitas Tinggi</x-slot>
    <x-slot name="metaDescription">Temukan kisah inspiratif di balik Kana Tojong. Pelajari dedikasi kami dalam melestarikan warisan budaya Songkok Recca dan memberdayakan para pengrajin ahli dari Bone, Sulawesi Selatan. Setiap produk adalah mahakarya yang diciptakan dengan penuh makna.</x-slot>

    <!-- Schema.org Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Kana Tojong",
        "description": "Pelestar warisan budaya Songkok Recca dan pemberdaya pengrajin Bugis",
        "url": "{{ url()->current() }}",
        "foundingLocation": "Bone, Sulawesi Selatan",
        "specialty": "Songkok Recca handmade berkualitas tinggi",
        "mission": "Melestarikan mahakarya budaya dan memberdayakan komunitas pengrajin"
    }
    </script>

    <!-- HERO SECTION -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background with parallax effect -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
            <div class="absolute inset-0 bg-cover bg-center bg-fixed opacity-30 mix-blend-overlay" 
                 style="background-image: url('{{ asset('storage/images/bgabout.jpg') }}');"></div>
            <!-- Animated overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-amber-500/10 via-transparent to-amber-500/10 animate-pulse"></div>
        </div>
        
        <!-- Content -->
        <div class="relative z-10 max-w-6xl mx-auto px-6 sm:px-8 lg:px-12 text-center">
            <div class="space-y-8 animate-fade-in-up">
                <div class="inline-block">
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-amber-500/20 text-amber-300 border border-amber-500/30 backdrop-blur-sm">
                        ✨ Warisan Budaya Nusantara
                    </span>
                </div>
                
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black tracking-tight text-white leading-tight">
                    <span class="block text-amber-400 drop-shadow-2xl">Kisah di Balik</span>
                    <span class="block bg-gradient-to-r from-white to-gray-300 bg-clip-text text-transparent">Setiap Anyaman</span>
                </h1>
                
                <p class="max-w-3xl mx-auto text-xl md:text-2xl text-gray-300 font-light leading-relaxed">
                    Lebih dari sekadar produk, kami adalah 
                    <span class="text-amber-400 font-semibold">penjaga warisan</span> 
                    yang menghubungkan masa lalu dengan masa depan.
                </p>
                
                <!-- Scroll indicator -->

                </div>
            </div>
        </div>
    </section>

    <!-- MISI KAMI SECTION -->
    <section x-data="{ show: false }" x-intersect.once="show = true" class="py-24 lg:py-32 bg-gradient-to-b from-white to-gray-50 relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute top-0 left-0 w-72 h-72 bg-amber-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-0 right-0 w-72 h-72 bg-blue-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        
        <div :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'" 
             class="transition-all duration-1000 ease-out delay-200 relative z-10 max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            
            <div class="lg:grid lg:grid-cols-2 lg:gap-20 xl:gap-24 lg:items-center">
                <!-- Image Section -->
                <div class="relative group">
                    <div class="aspect-w-4 aspect-h-3 relative overflow-hidden rounded-3xl shadow-2xl">
                        <img src="{{ asset('storage/images/mitrakanatojeng1.jpg') }}" 
                             alt="Pengrajin ahli Songkok Recca Kana Tojong sedang menganyam dengan penuh dedikasi" 
                             class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-out">
                        <!-- Gradient overlay -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>
                    </div>
                    <!-- Floating badge -->
                    <div class="absolute -bottom-6 -right-6 bg-white p-6 rounded-2xl shadow-xl border border-gray-100">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-amber-600">25+</div>
                            <div class="text-sm text-gray-600 font-medium">Tahun Pengalaman</div>
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="mt-16 lg:mt-0 space-y-8">
                    <div class="space-y-4">
                        <div class="inline-block">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-amber-100 text-amber-800 border border-amber-200">
                                Misi Kami
                            </span>
                        </div>
                        
                        <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                            <span class="block">Melestarikan</span>
                            <span class="block text-amber-600">Mahakarya,</span>
                            <span class="block">Memberdayakan</span>
                            <span class="block text-amber-600">Komunitas</span>
                        </h2>
                    </div>
                    
                    <div class="space-y-6 text-lg text-gray-700 leading-relaxed">
                        <p class="first-letter:text-5xl first-letter:font-bold first-letter:text-amber-600 first-letter:float-left first-letter:mr-2 first-letter:mt-1">
                            Kana Tojong lahir dari sebuah mimpi sederhana: untuk membawa keagungan 
                            <strong class="text-amber-700 font-semibold">Songkok Recca</strong> ke panggung dunia, 
                            sekaligus menyejahterakan para pengrajin yang mendedikasikan hidupnya untuk seni ini.
                        </p>
                        
                        <p>
                            Kami bukan hanya penjual; kami adalah <em class="text-amber-700 font-medium">jembatan antara Anda</em> 
                            dan para maestro di desa-desa pengrajin di Bone, Sulawesi Selatan.
                        </p>
                        
                        <div class="bg-amber-50 border-l-4 border-amber-400 p-6 rounded-r-xl">
                            <p class="text-amber-800 font-medium italic">
                                "Setiap pembelian Anda adalah dukungan langsung bagi para ibu dan bapak pengrajin, 
                                memastikan api tradisi ini terus menyala untuk generasi yang akan datang."
                            </p>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="grid grid-cols-2 gap-8 pt-8 border-t border-gray-200">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-amber-600">500+</div>
                            <div class="text-sm text-gray-600 font-medium">Pengrajin Bermitra</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-amber-600">10K+</div>
                            <div class="text-sm text-gray-600 font-medium">Produk Terjual</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- PROSES PEMBUATAN SECTION -->
    <section x-data="{ show: false }" x-intersect.once="show = true" class="py-24 lg:py-32 bg-gradient-to-b from-gray-50 to-white relative">
        <div :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'" 
             class="transition-all duration-1000 ease-out delay-300 max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
            
            <!-- Header -->
            <div class="text-center mb-20">
                <div class="inline-block mb-6">
                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800 border border-blue-200">
                        🎨 Proses Pembuatan
                    </span>
                </div>
                
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Dari <span class="text-amber-600">Lontar</span> Menjadi <span class="text-amber-600">Mahkota</span>
                </h2>
                
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Sebuah Songkok Recca bukanlah produk masal. Ia adalah hasil dari proses yang memakan waktu, 
                    membutuhkan <strong class="text-gray-800">ketelitian, kesabaran, dan doa.</strong>
                </p>
            </div>

            <!-- Process Steps -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 lg:gap-16">
                <!-- Langkah 1 -->
                <div class="group relative">
                    <div class="flex flex-col items-center text-center space-y-6">
                        <!-- Icon Circle -->
                        <div class="relative">
                            <div class="flex items-center justify-center h-24 w-24 rounded-full bg-gradient-to-br from-amber-400 to-amber-600 text-white shadow-2xl group-hover:shadow-amber-300/50 transition-all duration-300 transform group-hover:scale-110">
                                <span class="text-3xl font-black">1</span>
                            </div>
                            <!-- Connecting line (hidden on mobile) -->
                            <div class="hidden lg:block absolute top-12 left-full w-16 h-0.5 bg-gradient-to-r from-amber-400 to-gray-300"></div>
                        </div>
                        
                        <div class="space-y-4">
                            <h3 class="text-2xl font-bold text-gray-900 group-hover:text-amber-600 transition-colors duration-300">
                                Seleksi Serat Terbaik
                            </h3>
                            <p class="text-gray-600 leading-relaxed">
                                Hanya pelepah daun lontar termuda yang dipilih, dikeringkan di bawah sinar matahari, 
                                lalu dipukul hingga menjadi serat halus yang siap dianyam.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Langkah 2 -->
                <div class="group relative">
                    <div class="flex flex-col items-center text-center space-y-6">
                        <!-- Icon Circle -->
                        <div class="relative">
                            <div class="flex items-center justify-center h-24 w-24 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 text-white shadow-2xl group-hover:shadow-blue-300/50 transition-all duration-300 transform group-hover:scale-110">
                                <span class="text-3xl font-black">2</span>
                            </div>
                            <!-- Connecting line -->
                            <div class="hidden lg:block absolute top-12 left-full w-16 h-0.5 bg-gradient-to-r from-blue-500 to-gray-300"></div>
                        </div>
                        
                        <div class="space-y-4">
                            <h3 class="text-2xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-300">
                                Anyaman Penuh Perasaan
                            </h3>
                            <p class="text-gray-600 leading-relaxed">
                                Dengan jari-jemari terampil, serat-serat tersebut dianyam menjadi pola yang rapat dan presisi. 
                                Proses ini bisa memakan waktu berhari-hari untuk satu songkok.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Langkah 3 -->
                <div class="group relative">
                    <div class="flex flex-col items-center text-center space-y-6">
                        <!-- Icon Circle -->
                        <div class="relative">
                            <div class="flex items-center justify-center h-24 w-24 rounded-full bg-gradient-to-br from-green-500 to-green-700 text-white shadow-2xl group-hover:shadow-green-300/50 transition-all duration-300 transform group-hover:scale-110">
                                <span class="text-3xl font-black">3</span>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <h3 class="text-2xl font-bold text-gray-900 group-hover:text-green-600 transition-colors duration-300">
                                Finishing Penuh Makna
                            </h3>
                            <p class="text-gray-600 leading-relaxed">
                                Tahap akhir adalah penambahan hiasan, seperti benang emas pada jenis Pamiring, 
                                yang melambangkan status dan kehormatan bagi pemakainya.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quality Guarantee -->
            <div class="mt-20 text-center">
                <div class="inline-flex items-center space-x-2 bg-gradient-to-r from-amber-100 to-yellow-100 px-6 py-3 rounded-full border border-amber-200">
                    <span class="text-2xl">🏆</span>
                    <span class="text-amber-800 font-semibold">Jaminan Kualitas Premium & Garansi Seumur Hidup</span>
                </div>
            </div>
        </div>
    </section>

    <!-- CALL TO ACTION SECTION -->
    <section x-data="{ show: false }" x-intersect.once="show = true" class="relative py-24 lg:py-32 overflow-hidden">
        <!-- Background with gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_20%,rgba(251,191,36,0.1),transparent_50%),radial-gradient(circle_at_70%_80%,rgba(59,130,246,0.1),transparent_50%)]"></div>
        </div>
        
        <div :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-16'" 
             class="transition-all duration-1000 ease-out delay-400 relative z-10 max-w-4xl mx-auto px-6 sm:px-8 lg:px-12 text-center">
            
            <div class="space-y-8">
                <div class="space-y-6">
                    <h2 class="text-4xl lg:text-5xl font-bold text-white leading-tight">
                        Miliki Sepotong <br>
                        <span class="bg-gradient-to-r from-amber-400 to-yellow-500 bg-clip-text text-transparent">
                            Warisan Budaya
                        </span>
                    </h2>
                    
                    <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                        Setiap Songkok Recca adalah investasi dalam 
                        <span class="text-amber-400 font-semibold">seni, budaya, dan komunitas.</span> 
                        Temukan songkok yang akan menceritakan kisah Anda.
                    </p>
                </div>

                <!-- CTA Button -->
                <div class="pt-8">
                    <a href="{{ route('shop.index') }}" 
                       class="group inline-flex items-center px-12 py-4 text-lg font-bold text-slate-900 bg-gradient-to-r from-amber-400 to-yellow-500 rounded-full shadow-2xl hover:shadow-amber-500/25 transform hover:scale-105 transition-all duration-300 ease-out">
                        <span>Jelajahi Koleksi Kami</span>
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>

                <!-- Social Proof -->
                <div class="pt-12 border-t border-gray-700">
                    <p class="text-gray-400 text-sm mb-4">Dipercaya oleh ribuan pelanggan di seluruh Indonesia</p>
                    <div class="flex justify-center items-center space-x-8 opacity-60">
                        <div class="flex items-center space-x-1">
                            <span class="text-yellow-400">★★★★★</span>
                            <span class="text-gray-300 text-sm ml-2">4.9/5 Rating</span>
                        </div>
                        <div class="text-gray-300 text-sm">1000+ Review</div>
                        <div class="text-gray-300 text-sm">Pengiriman Gratis</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional CSS for animations -->
    <style>
        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
        
        .animate-fade-in-up {
            animation: fade-in-up 1s ease-out;
        }
        
        .animate-blob {
            animation: blob 7s infinite;
        }
        
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
</x-app-layout>