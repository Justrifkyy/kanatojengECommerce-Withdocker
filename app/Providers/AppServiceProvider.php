<?php

namespace App\Providers;

// Pastikan tidak ada spasi atau baris kosong sebelum baris 'namespace' di atas.

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; // Import View Facade
use App\View\Composers\CartComposer; // Import CartComposer kita

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Daftarkan View Composer kita
        // Setiap kali view 'partials.header' di-render, method 'compose' dari CartComposer akan dijalankan.
        View::composer('partials.header', CartComposer::class);
    }
}
