<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        # unlock script di bawah ini jika akan diupload
        \URL::forceScheme('https');
        config(['app.locale' => 'id']);
        date_default_timezone_set('Asia/Jakarta');
    }
}
