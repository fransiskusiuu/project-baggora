<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\barangBekas;

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
    public function boot()
    {
        $tb_barangbekas = barangBekas::all();
        view()->share(compact('tb_barangbekas'));
    }

}
