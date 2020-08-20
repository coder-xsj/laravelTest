<?php

namespace App\Providers;

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
        // 定义共享变量
        view()->share('siteName', 'Laravel学院');
        view()->share('siteUrl', 'https://xueyuanjun.com');
    }
}
