{{-- Modern Footer dengan SEO Optimized --}}
<footer class="relative bg-gradient-to-br from-slate-50 via-gray-50 to-slate-100 border-t border-slate-200/50 overflow-hidden">
    {{-- Background Decorative Elements --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-gradient-to-br from-primary/5 to-secondary/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-32 -left-32 w-64 h-64 bg-gradient-to-tr from-secondary/5 to-primary/5 rounded-full blur-2xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto py-16 px-6 sm:px-8 lg:px-12">
        {{-- Main Footer Content --}}
        <div class="grid grid-cols-1 md:grid-cols-12 gap-12 lg:gap-16">
            {{-- Kolom Kiri: Info Perusahaan --}}
            <div class="md:col-span-5 lg:col-span-4 space-y-6 group">
                <div class="transform transition-all duration-500 group-hover:scale-105">
                    <h2 class="text-3xl lg:text-4xl font-bold bg-gradient-to-r from-amber-400 via-amber-400 to-amber-400 bg-clip-text text-transparent mb-4">
                        Kana Tojeng
                    </h2>
                    <div class="w-16 h-1 bg-gradient-to-r from-amber-400 to-amber-400 rounded-full transform origin-left transition-transform duration-700 group-hover:scale-x-150"></div>
                </div>
                
                <div class="space-y-4">
                    <p class="text-slate-600 leading-relaxed max-w-sm text-base font-medium">
                        Universitas Muslim Indonesia, Makassar, Sulawesi Selatan.
                    </p>
                    
                    {{-- Contact Info untuk SEO --}}
                    <div class="space-y-2 text-sm text-slate-500">
                        <p class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>Makassar, Sulawesi Selatan</span>
                        </p>
                    </div>
                </div>
            </div>

            {{-- Kolom Tengah: Tautan --}}
            <div class="md:col-span-4 lg:col-span-4">
                <div class="grid grid-cols-2 gap-8 lg:gap-12">
                    <div class="space-y-6">
                        <h3 class="text-lg font-bold text-slate-800 relative">
                            Tautan
                            <div class="absolute -bottom-2 left-0 w-8 h-0.5 bg-gradient-to-r from-primary to-secondary rounded-full"></div>
                        </h3>
                        <nav class="space-y-4" role="navigation" aria-label="Footer navigation">
                            <a href="{{ route('home') }}" 
                               class="block text-slate-600 font-medium hover:text-primary transition-all duration-300 transform hover:translate-x-2 hover:font-semibold group">
                                <span class="relative">
                                    Home
                                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                                </span>
                            </a>
                            <a href="{{ route('shop.index') }}" 
                               class="block text-slate-600 font-medium hover:text-primary transition-all duration-300 transform hover:translate-x-2 hover:font-semibold group">
                                <span class="relative">
                                    Shop
                                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                                </span>
                            </a>
                            <a href="{{ route('about') }}" 
                               class="block text-slate-600 font-medium hover:text-primary transition-all duration-300 transform hover:translate-x-2 hover:font-semibold group">
                                <span class="relative">
                                    About
                                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                                </span>
                            </a>
                            <a href="{{ route('contact.index') }}" 
                               class="block text-slate-600 font-medium hover:text-primary transition-all duration-300 transform hover:translate-x-2 hover:font-semibold group">
                                <span class="relative">
                                    Contact
                                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                                </span>
                            </a>
                        </nav>
                    </div>
                    
                    <div class="space-y-6">
                        <h3 class="text-lg font-bold text-slate-800 relative">
                            Bantuan
                            <div class="absolute -bottom-2 left-0 w-8 h-0.5 bg-gradient-to-r from-primary to-secondary rounded-full"></div>
                        </h3>
                        <nav class="space-y-4" role="navigation" aria-label="Help navigation">
                            <a href="#" 
                               class="block text-slate-600 font-medium hover:text-primary transition-all duration-300 transform hover:translate-x-2 hover:font-semibold group">
                                <span class="relative">
                                    Kebijakan Privasi
                                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary transition-all duration-300 group-hover:w-full"></span>
                                </span>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>

            {{-- Kolom Kanan: Newsletter --}}
            <div class="md:col-span-3 lg:col-span-4 space-y-6">
                <div class="space-y-4">
                    <h3 class="text-lg font-bold text-slate-800 relative">
                        Newsletter
                        <div class="absolute -bottom-2 left-0 w-8 h-0.5 bg-gradient-to-r from-primary to-secondary rounded-full"></div>
                    </h3>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Dapatkan update terbaru dan penawaran eksklusif langsung di email Anda.
                    </p>
                </div>
                
                <form class="space-y-4 group" role="form" aria-label="Newsletter subscription">
                    <div class="relative">
                        <input type="email" 
                               name="email"
                               placeholder="Masukkan Email Anda" 
                               required
                               aria-label="Email address for newsletter"
                               class="w-full px-4 py-3 bg-white/70 backdrop-blur-sm border-2 border-slate-200 rounded-xl focus:border-primary focus:ring-4 focus:ring-primary/10 focus:outline-none transition-all duration-300 text-slate-700 placeholder-slate-400 shadow-sm hover:shadow-md group-hover:border-slate-300">
                        <div class="absolute inset-0 bg-gradient-to-r from-primary/5 to-secondary/5 rounded-xl opacity-0 transition-opacity duration-300 group-hover:opacity-100 pointer-events-none"></div>
                    </div>
                    
                    <button type="submit" 
                            class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-amber-400 to-amber-400 text-white font-bold rounded-xl shadow-lg hover:shadow-xl transform transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-4 focus:ring-primary/30 active:scale-95 group">
                        <span class="flex items-center justify-center space-x-2">
                            <span>SUBSCRIBE</span>
                            <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:translate-x-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </button>
                </form>
            </div>
        </div>

        {{-- Copyright Section --}}
        <div class="mt-16 pt-8 border-t border-slate-200/70">
            <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                <p class="text-slate-500 text-sm font-medium">
                    © 2025 <span class="text-secondary font-bold">Kana Tojeng</span>. All rights reserved
                </p>
                
                {{-- Social Media Icons (Optional) --}}
                <div class="flex items-center space-x-4">
                    <span class="text-xs text-slate-400 font-medium">Follow us:</span>
                    <div class="flex space-x-3">
                        {{-- Placeholder for social media icons --}}
                        <div class="w-8 h-8 bg-gradient-to-br from-slate-200 to-slate-300 rounded-full flex items-center justify-center hover:from-primary hover:to-secondary transition-all duration-300 cursor-pointer transform hover:scale-110">
                            <svg class="w-4 h-4 text-slate-500 hover:text-white transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div class="w-8 h-8 bg-gradient-to-br from-slate-200 to-slate-300 rounded-full flex items-center justify-center hover:from-primary hover:to-secondary transition-all duration-300 cursor-pointer transform hover:scale-110">
                            <svg class="w-4 h-4 text-slate-500 hover:text-white transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

{{-- Schema.org Structured Data for SEO --}}
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Kana Tojeng",
    "url": "{{ url('/') }}",
    "address": {
        "@type": "PostalAddress",
        "addressLocality": "Makassar",
        "addressRegion": "Sulawesi Selatan",
        "addressCountry": "ID"
    },
    "contactPoint": {
        "@type": "ContactPoint",
        "contactType": "customer service",
        "areaServed": "ID"
    },
    "sameAs": [
        "{{ route('home') }}",
        "{{ route('shop.index') }}",
        "{{ route('about') }}",
        "{{ route('contact.index') }}"
    ]
}
</script>