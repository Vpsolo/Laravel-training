<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::directive('myDir', function($var) {
            return '<li>New - '.$var.'</li>';
        });

        // DB::listen(function($query){
        //     dump($query->sql);
        //     dump($query->bindings);
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
