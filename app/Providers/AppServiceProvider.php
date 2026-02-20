<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $tempPath = '/tmp/storage/framework';
        $viewsPath = $tempPath . '/views';

        if (!is_dir($viewsPath)) {
            mkdir($viewsPath, 0777, true);
        }

        config(['view.compiled' => $viewsPath]);
        config(['session.files' => $tempPath . '/sessions']);
    }

    public function boot(): void
    {
        //
    }
}