<x-app-layout>
    <x-slot name="title">Hubungi Kami</x-slot>
    <x-slot name="metaDescription">Hubungi Kana Tojong untuk pertanyaan, pemesanan khusus, atau kolaborasi. Kami siap membantu Anda.</x-slot>

    <!-- Header Halaman -->
    <section class="bg-surface">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold text-secondary tracking-tight">Contact</h1>
            <p class="mt-4 text-lg text-light max-w-2xl mx-auto">Kami senang mendengar dari Anda. Hubungi kami kapan saja.</p>
        </div>
    </section>

    <!-- Konten Utama Kontak -->
    <div class="bg-background">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-secondary">Get In Touch With Us</h2>
                <p class="mt-3 text-light max-w-2xl mx-auto">
                    Untuk Informasi Lebih Lanjut Tentang Produk & Layanan Kami. Silakan Hubungi Kami Melalui Email. Staf Kami Selalu Siap Membantu Anda.
                </p>
            </div>

            <div class="lg:grid lg:grid-cols-12 lg:gap-16">
                <!-- Kolom Kiri: Informasi Kontak -->
                <div class="lg:col-span-4 space-y-8">
                    <!-- Alamat -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-secondary">Alamat</h3>
                            <p class="mt-1 text-light">Jl. Perintis Kemerdekaan KM. 9, Makassar, Sulawesi Selatan, Indonesia</p>
                        </div>
                    </div>
                    <!-- Telepon -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-secondary">Telepon</h3>
                            <p class="mt-1 text-light">Mobile: (+62) 812-3456-7890</p>
                            <p class="mt-1 text-light">Hotline: (+62) 898-7654-3210</p>
                        </div>
                    </div>
                    <!-- Jam Kerja -->
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-secondary">Jam Kerja</h3>
                            <p class="mt-1 text-light">Senin - Jumat: 09:00 - 17:00</p>
                            <p class="mt-1 text-light">Sabtu & Minggu: 09:00 - 13:00</p>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Formulir -->
                <div class="lg:col-span-8 mt-12 lg:mt-0">
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6" x-data="{ isLoading: false }" @submit="isLoading = true">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-secondary">Nama Anda</label>
                            <input type="text" name="name" id="name" required class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="Masukkan nama lengkap Anda">
                            @error('name') <p class="text-danger text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-secondary">Alamat Email</label>
                            <input id="email" name="email" type="email" required class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="contoh@email.com">
                            @error('email') <p class="text-danger text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-secondary">Subjek</label>
                            <input type="text" name="subject" id="subject" required class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="Subjek pesan Anda">
                            @error('subject') <p class="text-danger text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-secondary">Pesan</label>
                            <textarea id="message" name="message" rows="4" required class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-lg focus:ring-primary focus:border-primary" placeholder="Tuliskan pesan Anda di sini..."></textarea>
                            @error('message') <p class="text-danger text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <button type="submit" 
                                    :disabled="isLoading"
                                    :class="{ 'opacity-75 cursor-wait': isLoading }"
                                    class="bg-primary text-white font-semibold py-3 px-8 rounded-lg hover:bg-secondary transition-colors duration-300 flex items-center">
                                <span x-show="!isLoading">Submit</span>
                                <span x-show="isLoading" class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Mengirim...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
