<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        //191 è il valore di default della lunghezza di un hash
        Schema::defaultStringLength(191);
    }
}
