<x-app-layout>
    <x-slot name="title">Hubungi Kami - Kana Tojong</x-slot>
    <x-slot name="metaDescription">Hubungi Kana Tojong untuk pertanyaan, pemesanan khusus, atau kolaborasi. Tim customer service kami siap membantu Anda 24/7. Lokasi di Takalar, Sulawesi Selatan.</x-slot>

    <!-- Hero Section dengan Gradient Background -->
    
    <section class="relative min-h-72 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <div class="absolute inset-0 bg-gradient-to-br from-slate-900/80 via-slate-800/70 to-amber-900 z-10"></div>
            <img src="{{ asset('storage/images/Background_home.png') }}" alt="Songkok Takalar Background" class="w-full h-full object-cover scale-110 animate-slow-zoom">
        </div>

        <!-- Decorative Elements -->
        <div class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,white,rgba(255,255,255,0.6))] -z-10"></div>
        <div class="absolute top-0 right-0 -translate-y-12 translate-x-12 opacity-20">
            <div class="w-96 h-96 rounded-full bg-gradient-to-br from-yellow-400 to-yellow-200 blur-3xl"></div>
        </div>
        <div class="absolute bottom-0 left-0 translate-y-12 -translate-x-12 opacity-20">
            <div class="w-80 h-80 rounded-full bg-gradient-to-br from-yellow-400 to-pink-400 blur-3xl"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto py-24 px-4 sm:px-6 lg:px-8 text-center">
            <div class="animate-fade-in-up">
                <h1 class="text-5xl md:text-6xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-800 via-yellow-400 to-yellow-700 tracking-tight leading-tight">
                    Contact Us
                </h1>
                <p class="mt-6 text-xl text-white max-w-3xl mx-auto leading-relaxed">
                    Kami senang mendengar dari Anda. Hubungi kami kapan saja untuk konsultasi atau pertanyaan seputar layanan kami.
                </p>
                <!-- Trust Indicators -->
                <div class="mt-8 flex items-center justify-center space-x-6 text-sm text-gray-500">
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Response 24 Jam</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                        </svg>
                        <span>Email Support</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Lokasi Terpercaya</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <div class="bg-white relative">
        <div class="max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-fade-in-up">
                <span class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-yellow-100 to-yellow-100 text-yellow-800 text-sm font-semibold tracking-wide uppercase mb-4">
                    Mari Terhubung
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-yellow-600 mb-6">
                    Get In Touch With Us
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Untuk Informasi Lebih Lanjut Tentang Produk & Layanan Kami. Silakan Hubungi Kami Melalui Email. Staf Kami Selalu Siap Membantu Anda.
                </p>
            </div>

            <div class="lg:grid lg:grid-cols-12 lg:gap-20">
                <!-- Left Column: Contact Information -->
                <div class="lg:col-span-4 space-y-8 animate-fade-in-left">
                    <!-- Contact Cards -->
                    <div class="space-y-6">
                        <!-- Address Card -->
                        <div class="group bg-gradient-to-br from-yellow-50 to-yellow-50 p-8 rounded-2xl border border-yellow-100 hover:shadow-xl hover:scale-105 transition-all duration-300">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 p-3 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl shadow-lg group-hover:shadow-yellow-200 transition-shadow duration-300">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Alamat</h3>
                                    <p class="text-gray-600 leading-relaxed">Desa Bontokassi, Kecamatan Galesong Selatan, Kabupaten Takalar, Sulawesi Selatan</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Phone Card -->
                        <div class="group bg-gradient-to-br from-yellow-50 to-yellow-50 p-8 rounded-2xl border border-yellow-100 hover:shadow-xl hover:scale-105 transition-all duration-300">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 p-3 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl shadow-lg group-hover:shadow-yellow-200 transition-shadow duration-300">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Telepon</h3>
                                    <a href="tel:+6285146478100" class="text-gray-600 hover:text-yellow-600 transition-colors duration-200 font-medium">
                                        Mobile: (+62) 851-4647-8100
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Working Hours Card -->
                        <div class="group bg-gradient-to-br from-yellow-50 to-yellow-50 p-8 rounded-2xl border border-yellow-100 hover:shadow-xl hover:scale-105 transition-all duration-300">
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 p-3 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl shadow-lg group-hover:shadow-yellow-200 transition-shadow duration-300">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-gray-900 mb-2">Jam Kerja</h3>
                                    <div class="space-y-1 text-gray-600">
                                        <p class="flex items-center justify-between">
                                            <span>Senin - Jumat:</span>
                                            <span class="font-medium">09:00 - 20:00</span>
                                        </p>
                                        <p class="flex items-center justify-between">
                                            <span>Sabtu & Minggu:</span>
                                            <span class="font-medium">09:00 - 18:00</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Contact Form -->
                <div class="lg:col-span-8 mt-12 lg:mt-0 animate-fade-in-right">
                    <div class="bg-white p-8 lg:p-12 rounded-3xl shadow-2xl border border-gray-100">
                        <div class="mb-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Kirim Pesan</h3>
                            <p class="text-gray-600">Isi formulir di bawah ini dan kami akan segera menghubungi Anda kembali.</p>
                        </div>
                        
                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6" x-data="{ isLoading: false }" @submit="isLoading = true">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="group">
                                    <label for="name" class="block text-sm font-semibold text-gray-900 mb-2 group-focus-within:text-blue-600 transition-colors duration-200">
                                        Nama Anda
                                    </label>
                                    <input type="text" name="name" id="name" required 
                                           class="w-full px-4 py-4 text-gray-900 bg-gray-50 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200 placeholder:text-gray-400" 
                                           placeholder="Masukkan nama lengkap Anda">
                                    @error('name') <p class="text-red-500 text-sm mt-2 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</p> @enderror
                                </div>
                                
                                <div class="group">
                                    <label for="email" class="block text-sm font-semibold text-gray-900 mb-2 group-focus-within:text-blue-600 transition-colors duration-200">
                                        Alamat Email
                                    </label>
                                    <input id="email" name="email" type="email" required 
                                           class="w-full px-4 py-4 text-gray-900 bg-gray-50 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200 placeholder:text-gray-400" 
                                           placeholder="contoh@email.com">
                                    @error('email') <p class="text-red-500 text-sm mt-2 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</p> @enderror
                                </div>
                            </div>
                            
                            <div class="group">
                                <label for="subject" class="block text-sm font-semibold text-gray-900 mb-2 group-focus-within:text-blue-600 transition-colors duration-200">
                                    Subjek
                                </label>
                                <input type="text" name="subject" id="subject" required 
                                       class="w-full px-4 py-4 text-gray-900 bg-gray-50 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200 placeholder:text-gray-400" 
                                       placeholder="Subjek pesan Anda">
                                @error('subject') <p class="text-red-500 text-sm mt-2 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</p> @enderror
                            </div>
                            
                            <div class="group">
                                <label for="message" class="block text-sm font-semibold text-gray-900 mb-2 group-focus-within:text-blue-600 transition-colors duration-200">
                                    Pesan
                                </label>
                                <textarea id="message" name="message" rows="5" required 
                                          class="w-full px-4 py-4 text-gray-900 bg-gray-50 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-100 focus:border-yellow-500 transition-all duration-200 placeholder:text-gray-400 resize-none" 
                                          placeholder="Tuliskan pesan Anda di sini..."></textarea>
                                @error('message') <p class="text-red-500 text-sm mt-2 flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>{{ $message }}</p> @enderror
                            </div>
                            
                            <div class="pt-4">
                                <button type="submit" 
                                        :disabled="isLoading"
                                        :class="{ 'opacity-50 cursor-wait scale-95': isLoading }"
                                        class="group relative w-full md:w-auto bg-gradient-to-r from-yellow-600 to-yellow-600 hover:from-yellow-700 hover:to-yellow-700 text-white font-bold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 flex items-center justify-center min-w-[200px]">
                                    <span x-show="!isLoading" class="flex items-center">
                                        <svg class="w-5 h-5 mr-2 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                        </svg>
                                        Kirim Pesan
                                    </span>
                                    <span x-show="isLoading" class="flex items-center">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Mengirim...
                                    </span>
                                    <!-- Button shine effect -->
                                    <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-transparent via-white to-transparent opacity-0 group-hover:opacity-20 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-all duration-1000"></div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom CSS for Animations -->
    <style>
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
        
        @keyframes fade-in-left {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fade-in-right {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.6s ease-out;
        }
        
        .animate-fade-in-left {
            animation: fade-in-left 0.8s ease-out 0.2s both;
        }
        
        .animate-fade-in-right {
            animation: fade-in-right 0.8s ease-out 0.4s both;
        }

        .bg-grid-slate-100 {
            background-image: radial-gradient(circle, rgba(100, 116, 139, 0.1) 1px, transparent 1px);
            background-size: 24px 24px;
        }
    </style>
</x-app-layout>