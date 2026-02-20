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
        // Cek apakah berjalan di Vercel
        if (config('app.env') === 'production') {
            // Tentukan folder temporary yang diizinkan Vercel
            $tempPath = '/tmp/storage/framework';
            $viewsPath = $tempPath . '/views';

            // Buat struktur folder jika belum ada
            if (!is_dir($viewsPath)) {
                mkdir($viewsPath, 0777, true);
            }

            // Paksa Laravel menggunakan folder /tmp untuk compile view
            config(['view.compiled' => $viewsPath]);

            // Tambahan: Pastikan folder sessions juga aman (opsional tapi disarankan)
            config(['session.files' => $tempPath . '/sessions']);
        }
    }
}
