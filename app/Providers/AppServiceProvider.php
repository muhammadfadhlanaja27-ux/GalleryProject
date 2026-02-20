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
        if (config('app.env') === 'production') {
            // Buat path folder temporary
            $viewPath = '/tmp/storage/framework/views';

            // Cek jika folder belum ada, maka buat secara otomatis
            if (!is_dir($viewPath)) {
                mkdir($viewPath, 0777, true);
            }

            // Paksa Laravel menggunakan folder ini untuk menyimpan hasil compile blade/react
            config(['view.compiled' => $viewPath]);
        }
    }
}
