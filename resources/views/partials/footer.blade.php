<footer class="border-t border-gray-200">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-8">
            <!-- Kolom Kiri: Info Perusahaan -->
            <div class="md:col-span-4">
                <h2 class="text-2xl font-bold text-secondary">Kana Tojong</h2>
                <p class="mt-4 text-light text-sm max-w-xs">
                    Universitas Muslim Indonesia, Makassar, Sulawesi Selatan.
                </p>
            </div>

            <!-- Kolom Tengah: Tautan -->
            <div class="md:col-span-4 grid grid-cols-2 gap-8">
                <div>
                    <h3 class="font-medium text-light">Tautan</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="{{ route('home') }}" class="text-secondary font-medium hover:text-primary">Home</a></li>
                        <li><a href="{{ route('shop.index') }}" class="text-secondary font-medium hover:text-primary">Shop</a></li>
                        <li><a href="{{ route('about') }}" class="text-secondary font-medium hover:text-primary">About</a></li>
                        <li><a href="{{ route('contact.index') }}" class="text-secondary font-medium hover:text-primary">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-medium text-light">Bantuan</h3>
                    <ul class="mt-4 space-y-2">
                        <li><a href="#" class="text-secondary font-medium hover:text-primary">Kebijakan Privasi</a></li>
                    </ul>
                </div>
            </div>

            <!-- Kolom Kanan: Newsletter -->
            <div class="md:col-span-4">
                <h3 class="font-medium text-light">Newsletter</h3>
                <form class="mt-4 flex space-x-2">
                    <input type="email" placeholder="Masukkan Email Anda" class="w-full border-b-2 border-gray-300 focus:border-primary focus:ring-0 p-0">
                    <button type="submit" class="font-medium text-secondary border-b-2 border-secondary hover:text-primary hover:border-primary">SUBSCRIBE</button>
                </form>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-200 pt-8">
            <p class="text-secondary text-sm">2025 Fikom UMI. All rights reserved</p>
        </div>
    </div>
</footer>
