<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;
use App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer(['layouts.front'], 'App\Http\ViewComposers\SocialMediaComposer');
        \View::composer(['layouts.front'], 'App\Http\ViewComposers\FooterComposer');
        \View::composer(['layouts.front'], 'App\Http\ViewComposers\MenuComposer');
        \View::composer(['layouts.front'], 'App\Http\ViewComposers\EmailReceiptComposer');

        if (in_array(Request::segment(1), config('app.alt_langs'))) {
            App::setLocale(Request::segment(1));
            config([ 'app.locale_prefix' => Request::segment(1) ]);
        }
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
