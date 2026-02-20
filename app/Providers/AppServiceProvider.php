<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Cek apakah aplikasi berjalan di Vercel (Production)
        if (config('app.env') === 'production') {
            // Tentukan folder di /tmp karena hanya ini yang bisa ditulis di Vercel
            $viewPath = '/tmp/storage/framework/views';

            // Buat foldernya jika belum ada
            if (!is_dir($viewPath)) {
                mkdir($viewPath, 0777, true);
            }

            // Set konfigurasi view laravel secara runtime
            config(['view.compiled' => $viewPath]);
        }
    }
}
