<?php

namespace App\Providers;

// use App\Models\Category;
use Illuminate\Support\Facades\Schema;
// use Illuminate\Support\Facades\View;
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

        Schema::defaultStringLength(191);
        // view()->composer(
        //     'layouts.app',
        //     function ($view) {
        //         $view->with('categ', Category::all());
        //     }
        // );
    }
}
