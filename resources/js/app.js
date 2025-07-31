import "./bootstrap";

import Alpine from "alpinejs";
import intersect from "@alpinejs/intersect";

// Membuat "store" global untuk notifikasi dan keranjang
Alpine.store("app", {
    // Properti untuk toast notification
    toastVisible: false,
    toastMessage: "",
    toastType: "success",

    // Properti untuk jumlah item di keranjang (akan diisi dari Blade)
    cartCount: 0,

    // Fungsi untuk menampilkan toast
    showToast(message, type = "success") {
        this.toastMessage = message;
        this.toastType = type;
        this.toastVisible = true;
        setTimeout(() => {
            this.toastVisible = false;
        }, 3000);
    }, // <-- Koma yang hilang ditambahkan di sini

    // Fungsi untuk memperbarui jumlah keranjang
    updateCartCount(count) {
        this.cartCount = count;
    },
}); // <-- Tidak ada koma di akhir

Alpine.plugin(intersect);
window.Alpine = Alpine;
Alpine.start();
