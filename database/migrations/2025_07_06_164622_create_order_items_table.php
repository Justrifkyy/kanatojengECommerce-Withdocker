<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('product_name'); // Salin data agar riwayat tidak berubah
            $table->string('size_info');    // Salin data agar riwayat tidak berubah
            $table->integer('quantity');
            $table->decimal('price', 12, 2); // Harga satuan saat checkout
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
