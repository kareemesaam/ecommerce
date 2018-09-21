<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(300);
       $MainCategories = category::where('parent_id','0')->get();
       $MenuCategories = category::where('parent_id','>','0')->get();
       View::share('MainCategories',$MainCategories);
       View::share('MenuCategories',$MenuCategories);

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
