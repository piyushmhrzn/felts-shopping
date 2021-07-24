<?php

namespace App\Providers;

use App\Models\Partner;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

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
        Paginator::useBootstrap();

        $setting = Setting::firstOrFail();
        View::share('setting',$setting);

        $partners = Partner::where('status',1)->get();
        View::share('partners',$partners);
    }
}
