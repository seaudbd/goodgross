<?php

namespace App\Providers;


use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view)
        {
            if (Session::get('cart_items')){
                $cartCounter = count(Session::get('cart_items'));
            } else {
                $cartCounter = null;
            }
            $view->with([
                'cartCounter' => $cartCounter
            ]);
        });
    }
}
