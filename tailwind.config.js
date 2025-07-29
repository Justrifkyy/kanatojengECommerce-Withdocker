import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            // Menambahkan palet warna kustom kita
            colors: {
                "primary-yellow": "#FFD700", // Kuning biasa yang cerah (mirip emas muda)
                gold: "#B8860B", // Kuning emas yang lebih gelap dan elegan
                dark: "#333333", // Abu-abu sangat gelap untuk teks utama
                secondary: "#6B7280", // Abu-abu untuk teks sekunder
                background: "#F9F9F7", // Warna off-white/krem untuk latar belakang
            },
            // Mengatur Poppins sebagai font default
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
