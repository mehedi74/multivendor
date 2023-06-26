<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\Section;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
       View::share(['countries'=>Country::all()]);
       View::share(['sections'=>Section::all()]);
    }
}
