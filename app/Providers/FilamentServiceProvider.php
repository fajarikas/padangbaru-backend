<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Filament::serving(function () {
        //     Filament::registerRenderHook(
        //         'head.start',
        //         fn() => '<meta name="csrf-token" value="' . csrf_token() . '">'
        //     );
        // });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
