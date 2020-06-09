<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
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
        View::composer(['cart.*'], function ($view) {
            if (auth()->user()) {
                $userCarts = auth()->user()->userCarts->where('wishlist', null);
                $userCartCount = count($userCarts);
                $view->with('userCartCount', $userCartCount);
            } else {
                $view->with('userCartCount', 0);
            }
        });
    }
}
