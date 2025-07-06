<div align="center">
  
# 🤠 Kana Tojong E-Commerce 

**Website E-Commerce untuk penjualan Songkok Recca, warisan budaya Bugis, dengan sistem pemesanan terintegrasi WhatsApp.**

![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php)
![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

</div>

---

## 📖 Tentang Proyek

**Kana Tojong** (bahasa Bugis: *Peci Orang Berpangkat*) adalah sebuah platform e-commerce yang didedikasikan untuk melestarikan dan memasarkan **Songkok Recca**, peci tradisional khas suku Bugis, Sulawesi Selatan. Website ini dibangun untuk memudahkan pelanggan dalam memilih berbagai jenis dan ukuran Songkok Recca, serta melakukan pemesanan secara praktis melalui WhatsApp.

Proyek ini mencakup alur kerja e-commerce lengkap, mulai dari etalase produk hingga panel admin yang komprehensif untuk manajemen toko.


## ✨ Fitur Utama

### 👤 Fitur Pengguna (User-Facing)
- **🏠 Halaman Utama & Statis:** Landing page yang menarik serta halaman informatif (Tentang Kami, Kontak).
- **🛍️ Galeri Produk:** Halaman "Shop" dengan daftar produk, dilengkapi paginasi.
- **🔍 Detail Produk:** Halaman detail untuk setiap produk, menampilkan deskripsi, material, dan pilihan ukuran.
- **🔐 Autentikasi:** Sistem registrasi dan login yang aman untuk pengguna.
- **🛒 Keranjang Belanja:** Pengguna dapat menambah, melihat, dan menghapus item dari keranjang.
- **📱 Checkout via WhatsApp:** Proses checkout yang mengarahkan pengguna ke WhatsApp dengan pesan pesanan yang sudah terformat otomatis.
- **👤 Halaman Profil:** Pengguna dapat mengelola data diri dan melihat riwayat pesanan (opsional).

### ⚙️ Fitur Admin (Admin Panel)
- **🛡️ Dashboard Aman:** Halaman dashboard yang dilindungi oleh *middleware*, hanya bisa diakses oleh admin.
- **🗂️ Manajemen Kategori:** Fitur CRUD (Create, Read, Update, Delete) penuh untuk kategori produk.
- **📦 Manajemen Produk:** Fitur CRUD lengkap untuk produk, termasuk upload gambar dan pengaturan varian ukuran.
- **🧾 Manajemen Pesanan:** Melihat daftar semua pesanan yang masuk, melihat detailnya, dan mengubah status pesanan (Baru, Diproses, Dikirim, dll.).
- **👥 Manajemen Pengguna:** Melihat daftar pengguna terdaftar dan menghapusnya jika perlu.
- **🔧 Pengaturan Website:** Halaman untuk mengubah konfigurasi penting seperti nomor WhatsApp tujuan.

---

## 🚀 Dibuat Dengan

Berikut adalah teknologi utama yang digunakan dalam proyek ini:

* **Backend:** Laravel 11
* **Frontend:** Tailwind CSS & Alpine.js (via Laravel Breeze)
* **Database:** MySQL
* **Server Development:** Vite

---

## 🛠️ Panduan Instalasi Lokal

Untuk menjalankan proyek ini di lingkungan lokal Anda, ikuti langkah-langkah berikut.

### Kebutuhan Sistem
- PHP 8.2 atau lebih tinggi
- Composer
- Node.js & NPM
- Database Server (contoh: MySQL)

### Langkah-langkah Instalasi
1.  **Clone repository ini:**
    ```sh
    git clone [https://github.com/NAMA_USER_ANDA/NAMA_REPO_ANDA.git](https://github.com/NAMA_USER_ANDA/NAMA_REPO_ANDA.git)
    cd NAMA_REPO_ANDA
    ```

2.  **Install dependensi Composer:**
    ```sh
    composer install
    ```

3.  **Install dependensi NPM:**
    ```sh
    npm install
    ```

4.  **Salin file environment:**
    ```sh
    cp .env.example .env
    ```

5.  **Generate kunci aplikasi:**
    ```sh
    php artisan key:generate
    ```

6.  **Konfigurasi file `.env`:**
    Buka file `.env` dan atur koneksi database Anda.
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=kanatojong_db
    DB_USERNAME=root
    DB_PASSWORD=
    ```
    Jangan lupa juga untuk mengatur nomor WhatsApp Admin.
    ```env
    ADMIN_WHATSAPP_NUMBER=6281234567890
    ```

7.  **Jalankan migrasi dan seeder:**
    Perintah ini akan membuat semua tabel database dan mengisinya dengan data awal (user admin, kategori, produk, dll.).
    ```sh
    php artisan migrate:fresh --seed
    ```

8.  **Buat symbolic link untuk storage:**
    Agar gambar yang di-upload bisa diakses publik.
    ```sh
    php artisan storage:link
    ```

9.  **Jalankan Vite untuk kompilasi aset:**
    Biarkan terminal ini tetap berjalan.
    ```sh
    npm run dev
    ```

10. **Jalankan server development Laravel:**
    Buka terminal baru dan jalankan perintah ini.
    ```sh
    php artisan serve
    ```
    Aplikasi Anda sekarang berjalan di `http://127.0.0.1:8000`.

---

## 🕹️ Cara Penggunaan

Setelah instalasi berhasil, Anda bisa login menggunakan akun default yang dibuat oleh seeder.

| Peran | Email | Password |
| :--- | :--- | :--- |
| **Admin** | `admin@kanatojong.com` | `password` |
| **User** | `user@gmail.com` | `password` |

> **Catatan:** Anda bisa mengakses Panel Admin melalui URL `/admin` setelah login sebagai Admin.

---

## 📜 Lisensi

Didistribusikan di bawah Lisensi MIT. Lihat `LICENSE` untuk informasi lebih lanjut.

---
<div align="center">
  Dibuat dengan ❤️ untuk melestarikan budaya.
</div>
