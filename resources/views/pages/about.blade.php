<x-app-layout>
    <x-slot name="title">Tentang Kami</x-slot>
    <x-slot name="metaDescription">Kisah di balik Kana Tojong. Pelajari misi kami dalam melestarikan warisan budaya Songkok Recca dan memberdayakan para pengrajin ahli dari tanah Bugis.</x-slot>

    <!-- HERO SECTION -->
    <section class="relative h-[50vh] bg-cover bg-center" style="background-image: url('{{ asset('storage/images/bgabout.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center items-center text-center text-white">
            <h1 class="text-yellow-500 text-4xl md:text-5xl font-extrabold tracking-tight">Kisah di Balik Setiap Anyaman</h1>
            <p class="mt-4 max-w-2xl text-lg text-gray-200">
                Lebih dari sekadar produk, kami adalah penjaga warisan.
            </p>
        </div>
    </section>

    <!-- MISI KAMI SECTION -->
    <section x-data="{ show: false }" x-intersect.once="show = true" class="py-20 bg-background">
        <div :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-700 ease-out max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16 lg:items-center">
                <div class="aspect-w-4 aspect-h-3">
                    <img src="{{ asset('storage/images/mitrakanatojeng1.jpg') }}" alt="Pengrajin Kana Tojong" class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
                <div class="mt-12 lg:mt-0">
                    <h2 class="text-3xl font-bold text-secondary tracking-tight">Melestarikan Mahakarya, Memberdayakan Komunitas</h2>
                    <p class="mt-4 text-light text-lg">
                        Kana Tojong lahir dari sebuah mimpi sederhana: untuk membawa keagungan <strong> Songkok Recca </strong> ke panggung dunia, sekaligus menyejahterakan para pengrajin yang mendedikasikan hidupnya untuk seni ini. Kami bukan hanya penjual; kami adalah jembatan antara Anda dan para maestro di desa-desa pengrajin di Bone, Sulawesi Selatan.
                    </p>
                    <p class="mt-4 text-light">
                        Setiap pembelian Anda adalah dukungan langsung bagi para ibu dan bapak pengrajin, memastikan api tradisi ini terus menyala untuk generasi yang akan datang.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- PROSES PEMBUATAN SECTION -->
    <section x-data="{ show: false }" x-intersect.once="show = true" class="py-20 bg-surface">
        <div :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-700 ease-out max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-secondary">Dari Lontar Menjadi Mahkota</h2>
                <p class="mt-3 text-light max-w-2xl mx-auto">
                    Sebuah Songkok Recca bukanlah produk masal. Ia adalah hasil dari proses yang memakan waktu, membutuhkan ketelitian, kesabaran, dan doa.
                </p>
            </div>
            <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
                <!-- Langkah 1 -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center h-20 w-20 rounded-full bg-white shadow-md text-primary border-2 border-primary">
                        <span class="text-3xl font-bold">1</span>
                    </div>
                    <h3 class="mt-5 text-xl font-bold text-secondary">Seleksi Serat Terbaik</h3>
                    <p class="mt-2 text-light">Hanya pelepah daun lontar termuda yang dipilih, dikeringkan di bawah sinar matahari, lalu dipukul hingga menjadi serat halus yang siap dianyam.</p>
                </div>
                <!-- Langkah 2 -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center h-20 w-20 rounded-full bg-white shadow-md text-primary border-2 border-primary">
                        <span class="text-3xl font-bold">2</span>
                    </div>
                    <h3 class="mt-5 text-xl font-bold text-secondary">Anyaman Penuh Perasaan</h3>
                    <p class="mt-2 text-light">Dengan jari-jemari terampil, serat-serat tersebut dianyam menjadi pola yang rapat dan presisi. Proses ini bisa memakan waktu berhari-hari untuk satu songkok.</p>
                </div>
                <!-- Langkah 3 -->
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center h-20 w-20 rounded-full bg-white shadow-md text-primary border-2 border-primary">
                        <span class="text-3xl font-bold">3</span>
                    </div>
                    <h3 class="mt-5 text-xl font-bold text-secondary">Finishing Penuh Makna</h3>
                    <p class="mt-2 text-light">Tahap akhir adalah penambahan hiasan, seperti benang emas pada jenis Pamiring, yang melambangkan status dan kehormatan bagi pemakainya.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CALL TO ACTION SECTION -->
    <section x-data="{ show: false }" x-intersect.once="show = true" class="bg-white">
        <div :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'" class="transition-all duration-700 ease-out max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-secondary">Miliki Sepotong Warisan Budaya</h2>
            <p class="mt-4 max-w-2xl mx-auto text-light">
                Setiap Songkok Recca adalah investasi dalam seni, budaya, dan komunitas. Temukan songkok yang akan menceritakan kisah Anda.
            </p>
            <a href="{{ route('shop.index') }}" class="mt-8 inline-block bg-primary text-white font-bold py-3 px-12 rounded-lg text-lg hover:bg-secondary transition-colors duration-300 transform hover:scale-105">
                Jelajahi Koleksi Kami
            </a>
        </div>
    </section>
</x-app-layout>
