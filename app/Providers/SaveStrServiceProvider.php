<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Helpers\SaveEloquentOrm;
use App\Helpers\SaveFile;

class SaveStrServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     * 
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Helpers\Contracts\SaveStr', function(){
          // return new SaveEloquentOrm();
          return new SaveFile();
        });
    }
}
