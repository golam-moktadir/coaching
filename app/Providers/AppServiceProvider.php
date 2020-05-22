<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use View;
use Auth;
use App\HeaderFooter;
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
        view::composer('admin.includes.header',function($view){
            $user = Auth::user();
            $header = HeaderFooter::first();
            $view->with(['user'=>$user,'header'=>$header]);
        });
        view::composer('admin.includes.footer',function($view){
            $footer = HeaderFooter::first();
            $view->with('footer',$footer);
        });
    }
}
