<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Halaman Tidak Ditemukan - Kana Tojong</title>
        <!-- Impor Font Poppins -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <!-- Load Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            'primary-yellow': '#FFD700',
                            'gold': '#B8860B',
                            'dark': '#333333',
                            'secondary': '#6B7280',
                            'background': '#F9F9F7',
                        },
                        fontFamily: {
                            sans: ['Poppins', 'sans-serif'],
                        },
                    }
                }
            }
        </script>
    </head>
    <body class="antialiased font-sans bg-background">
        <div class="min-h-screen flex flex-col items-center justify-center text-center px-4">
            <h1 class="text-9xl font-extrabold text-primary-yellow tracking-wider">404</h1>
            <h2 class="text-3xl font-bold text-dark mt-4">Halaman Tidak Ditemukan</h2>
            <p class="text-lg text-secondary mt-2 max-w-md">
                Maaf, kami tidak dapat menemukan halaman yang Anda cari. Mungkin URL-nya salah ketik atau halamannya sudah dipindahkan.
            </p>
            <div class="mt-8">
                <a href="{{ url('/') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-dark bg-primary-yellow hover:bg-gold hover:text-white transition-colors duration-300">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </body>
</html>
