<footer class="bg-white mt-12">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <div class="xl:grid xl:grid-cols-3 xl:gap-8">
            <div class="space-y-8 xl:col-span-1">
                <h2 class="text-2xl font-bold">Kana Tojong</h2>
                <p class="text-gray-500 text-base">
                    Warisan budaya Songkok Recca asli dari tanah Bugis. Dibuat dengan tangan oleh para pengrajin ahli.
                </p>
            </div>
            <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Tautan</h3>
                        <ul class="mt-4 space-y-4">
                            <li><a href="{{ route('home') }}" class="text-base text-gray-500 hover:text-gray-900">Home</a></li>
                            <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Shop</a></li>
                            <li><a href="{{ route('about') }}" class="text-base text-gray-500 hover:text-gray-900">About</a></li>
                            <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Contact</a></li>
                        </ul>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Bantuan</h3>
                        <ul class="mt-4 space-y-4">
                            <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Info Pengiriman</a></li>
                            <li><a href="#" class="text-base text-gray-500 hover:text-gray-900">Kebijakan Privasi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="md:grid md:grid-cols-1 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Langganan Buletin</h3>
                        <p class="text-gray-500 mt-4">Dapatkan info produk terbaru dan promosi langsung ke email Anda.</p>
                        <form class="mt-4 sm:flex sm:max-w-md">
                            <label for="email-address" class="sr-only">Email address</label>
                            <input type="email" name="email-address" id="email-address" autocomplete="email" required class="appearance-none min-w-0 w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-4 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Masukkan email Anda">
                            <div class="mt-3 rounded-md sm:mt-0 sm:ml-3 sm:shrink-0">
                                <button type="submit" class="w-full bg-indigo-600 flex items-center justify-center border border-transparent rounded-md py-2 px-4 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Langganan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-200 pt-8 md:flex md:items-center md:justify-between">
            <p class="mt-8 text-base text-gray-400 md:mt-0 md:order-1">
                &copy; {{ date('Y') }} Kana Tojong. All rights reserved.
            </p>
        </div>
    </div>
</footer>