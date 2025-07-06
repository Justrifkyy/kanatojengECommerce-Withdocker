<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sizes', function (Blueprint $table) {
            $table->id();
            $table->string('size_number', 10)->unique();
            $table->integer('head_circumference_cm');
            // timestamps tidak dibutuhkan di sini karena ini data master
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sizes');
    }
};
