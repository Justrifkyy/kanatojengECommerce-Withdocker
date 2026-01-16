<div align="center">
  <img src="https://raw.githubusercontent.com/NAMA_USER_ANDA/NAMA_REPO_ANDA/main/storage/app/public/images/logo.png" alt="Kana Tojeng Logo" width="120">
  
# 🤠 Kana Tojeng E-Commerce

**Website E-Commerce untuk penjualan Songkok Recca, warisan budaya Bugis, dengan sistem pemesanan terintegrasi WhatsApp dan panel admin yang komprehensif.**

![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php)
![Laravel](https://img.shields.io/badge/Laravel-11-FF2D20?style=for-the-badge&logo=laravel)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.x-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)
![Alpine.js](https://img.shields.io/badge/Alpine.js-3.x-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=black)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-20.10%2B-2496ED?style=for-the-badge&logo=docker)

</div>

---

## 📖 Tentang Proyek

**Kana Tojeng** (bahasa Bugis: _Peci Orang Berpangkat_) adalah sebuah platform e-commerce yang didedikasikan untuk melestarikan dan memasarkan **Songkok Recca**, peci tradisional khas suku Bugis, Sulawesi Selatan. Website ini dibangun untuk memudahkan pelanggan dalam memilih berbagai jenis, ukuran, dan warna Songkok Recca, serta melakukan pemesanan secara praktis melalui WhatsApp.

Proyek ini mencakup alur kerja e-commerce lengkap, mulai dari etalase produk yang dinamis dan interaktif, hingga panel admin yang komprehensif untuk manajemen toko secara menyeluruh. Seluruh aplikasi ini "dibungkus" (Dockerized) untuk memastikan portabilitas dan kemudahan setup.

<p align="center">
  [Gambar dari Halaman Utama Website Kana Tojeng]
</p>

---

## ✨ Fitur Utama

### 👤 Fitur Pengguna (User-Facing)

- **Desain Profesional:** Tampilan yang dirancang berdasarkan desain Figma, memberikan pengalaman pengguna yang bersih dan modern.
- **Header & Navigasi Responsif:** Header yang _sticky_ dan berubah menjadi menu "burger" di perangkat mobile.
- **Animasi Halus:** Efek animasi _entrance_ pada setiap bagian halaman untuk pengalaman visual yang premium.
- **Galeri Produk Dinamis:** Halaman "Shop" dengan fitur **filter berdasarkan kategori** dan **urutkan berdasarkan** harga atau tanggal.
- **Detail Produk Interaktif:** Halaman detail dengan galeri media (gambar & video), pilihan **ukuran** dan **warna** yang interaktif.
- **Keranjang Belanja Canggih (AJAX):**
  - Notifikasi _toast_ "Ditambahkan ke Keranjang" tanpa me-refresh halaman.
  - Kemampuan untuk **mengubah jumlah item secara live** dengan total harga yang ter-update otomatis.
- **Checkout via WhatsApp:** Proses checkout yang mengarahkan pengguna ke WhatsApp dengan pesan pesanan yang sudah terformat otomatis.
- **Sistem Autentikasi Kustom:** Halaman login, register, dan lainnya yang sudah disesuaikan dengan brand.
- **Halaman Profil & Riwayat Pesanan:** Pengguna dapat mengelola data diri dan melihat riwayat pesanan mereka.
- **Optimasi Kecepatan:**
  - **Lazy Loading** pada gambar untuk mempercepat waktu muat awal.
  - **Sistem Cache Gambar** internal untuk menyajikan gambar yang sudah dioptimalkan ukurannya.

### ⚙️ Fitur Admin (Admin Panel)

- **Dashboard Statistik:** Halaman dashboard yang menampilkan statistik penting seperti total pendapatan, pesanan baru, dan daftar pesanan terbaru.
- **Manajemen Produk Komprehensif (CRUD):**
  - Menambah, mengedit, dan menghapus produk.
  - Mengelola **galeri media** (upload banyak gambar & video) untuk setiap produk.
  - Mengatur **varian ukuran** dan **warna** yang tersedia.
  - Menandai produk sebagai **unggulan** (`is_featured`) untuk ditampilkan di halaman utama.
- **Manajemen Kategori (CRUD):** Fitur CRUD penuh untuk kategori produk.
- **Manajemen Pesanan:** Melihat daftar semua pesanan yang masuk, melihat detailnya, dan mengubah status pesanan.
- **Manajemen Pengguna:** Melihat daftar pengguna terdaftar dan menghapusnya jika perlu.
- **Pengaturan Website:** Halaman untuk mengubah konfigurasi penting seperti nomor WhatsApp tujuan.

---

## 🚀 Dibuat Dengan

Berikut adalah teknologi utama yang digunakan dalam proyek ini:

- **Backend:** Laravel 11
- **Frontend:** Tailwind CSS & Alpine.js (dengan plugin Intersect)
- **Database:** MySQL
- **Server Development:** Vite
- **Pengolahan Gambar:** Intervention Image
- **Lingkungan Development:** Docker

---

## 🛠️ Panduan Instalasi Lokal dengan Docker

Proyek ini dirancang untuk dijalankan dengan Docker, menghilangkan kerumitan setup manual.

### Kebutuhan Sistem

- Docker Desktop

### Langkah-langkah Instalasi

1.  **Clone repository ini:**

    ```sh
    git clone [https://github.com/NAMA_USER_ANDA/NAMA_REPO_ANDA.git](https://github.com/NAMA_USER_ANDA/NAMA_REPO_ANDA.git)
    cd NAMA_REPO_ANDA
    ```

2.  **Salin file environment:**

    ```sh
    cp .env.example .env
    ```

    Buka file `.env` dan pastikan semua variabel sudah sesuai, terutama `DB_PASSWORD`.

3.  **Bangun dan Jalankan Container:**
    Perintah ini akan membaca semua file konfigurasi Docker dan menghidupkan seluruh layanan (Nginx, PHP, MySQL).

    ```sh
    docker-compose up -d --build
    ```

4.  **Jalankan Perintah Setup Laravel:**
    Setelah container berjalan, jalankan perintah-perintah berikut satu per satu untuk menyelesaikan instalasi.

    ```bash
    # Generate kunci aplikasi
    docker-compose exec app php artisan key:generate

    # Jalankan migrasi database dan isi dengan data awal
    docker-compose exec app php artisan migrate:fresh --seed

    # Buat symbolic link untuk storage
    docker-compose exec app php artisan storage:link

    # Kompilasi aset frontend untuk produksi
    docker-compose exec app npm run build
    ```

5.  **Selesai!**
    Aplikasi Anda sekarang berjalan di `http://localhost:8000`.

---

## 🕹️ Cara Penggunaan

Setelah instalasi berhasil, Anda bisa login menggunakan akun default yang dibuat oleh seeder.

| Peran     | Email                  | Password         |
| :-------- | :--------------------- | :--------------- |
| **Admin** | `admin@kanatojeng.com` | `kanatojong2025` |
| **User**  | `user@gmail.com`       | `password`       |

> **Catatan:** Anda bisa mengakses Panel Admin melalui URL `/admin` setelah login sebagai Admin.

---

## 📜 Lisensi

Didistribusikan di bawah Lisensi MIT. Lihat `LICENSE` untuk informasi lebih lanjut.

---

<div align="center">
  LAST UPDATE 16/01/2026
</div>
