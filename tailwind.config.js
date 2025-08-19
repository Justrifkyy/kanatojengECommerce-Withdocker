import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import aspectRatio from "@tailwindcss/aspect-ratio"; // Import plugin aspect-ratio

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                // Palet Warna Final untuk Kana Tojong
                "bright-yellow": "#FFD700", // Kuning Terang untuk semua tombol utama
                "dark-gold": "#B88E2F", // Kuning Gelap untuk BG Hero & Aksen
                primary: "#B88E2F", // Menjaga 'primary' sebagai warna aksen utama
                secondary: "#333333", // Warna teks utama (gelap)
                light: "#666666", // Warna teks sekunder (abu-abu)
                background: "#FFFFFF", // Latar belakang putih bersih
                surface: "#FFF3E3", // Warna krem/beige untuk kartu
                danger: "#E97171", // Warna untuk diskon atau error
            },
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, aspectRatio], // Pastikan plugin aspect-ratio aktif
};
