<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Judul Halaman Dinamis --}}
        <title>{{ isset($title) ? $title . ' - ' : '' }}Kana Tojong</title>
        
        {{-- Meta Deskripsi Dinamis dengan Nilai Default --}}
        <meta name="description" content="{{ $metaDescription ?? 'Jual Songkok Recca Asli Bugis. Temukan berbagai jenis songkok adat berkualitas tinggi, dibuat oleh pengrajin ahli dari Bone. Warisan budaya dalam setiap anyaman.' }}">

        <!-- Impor Font Poppins dari Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Inisialisasi data awal untuk Alpine Store dari server-side --}}
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.store('app').cartCount = {{ \App\Models\CartItem::where('user_id', auth()->id())->sum('quantity') ?? 0 }};
            })
        </script>
    </head>
    <body class="font-sans antialiased bg-background">
        <div class="min-h-screen">
            
            @include('partials.header')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            @include('partials.footer')
        </div>

        {{-- Memanggil komponen Toast Notification --}}
        <x-toast />
    </body>
</html>
