<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use View;
use Sentinel;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $time = Carbon::now()->toFormattedDateString();
        View::share('time', $time);

        View::composer('*', function($view){
            $view->with('getuser', Sentinel::getUser());
        });
    }
}
