<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {

            Schema::table('products', function (Blueprint $table) {
                $table->index('category_id'); // Untuk filter di halaman Shop
                $table->index('is_featured'); // Untuk produk unggulan di Homepage
            });

            Schema::table('orders', function (Blueprint $table) {
                $table->index('user_id'); // Untuk mengambil riwayat pesanan pengguna
            });

            Schema::table('cart_items', function (Blueprint $table) {
                $table->index('user_id'); // Untuk mengambil keranjang pengguna
            });

            Schema::table('product_media', function (Blueprint $table) {
                $table->index('product_id'); // Untuk mengambil galeri media produk
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            // Perintah untuk menghapus index jika migrasi di-rollback

            Schema::table('products', function (Blueprint $table) {
                $table->dropIndex(['category_id']);
                $table->dropIndex(['is_featured']);
            });

            Schema::table('orders', function (Blueprint $table) {
                $table->dropIndex(['user_id']);
            });

            Schema::table('cart_items', function (Blueprint $table) {
                $table->dropIndex(['user_id']);
            });

            Schema::table('product_media', function (Blueprint $table) {
                $table->dropIndex(['product_id']);
            });
        }
    };
