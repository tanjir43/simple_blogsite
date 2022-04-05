<?php

namespace App\Providers;

use App\Models\SiteSetting;
use App\Models\Social;
use App\Models\Theme;
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
        View::composer(['front.*','backend.admin.includes.style'], function($view){
            $view->with('theme', Theme::first());
        });

        View::composer(['front.*','backend.*'], function ($view){
            $view->with('setting', SiteSetting::first());
        });

        
        View::composer(['front.*','backend.*'], function ($view){
            $view->with('social', Social::first());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
