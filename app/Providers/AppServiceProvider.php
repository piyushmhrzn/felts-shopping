<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Partner;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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

        //Website Settings
        $setting = Setting::firstOrFail();
        View::share('setting',$setting);

        //Partners
        $partners = Partner::where('status',1)->get();
        View::share('partners',$partners);

        //compose all the views....
        view()->composer('*', function ($view) 
        {
            if(Auth::check()) {
                $userFirstCartItems = Cart::where('user_id', Auth::user()->id)->first();

                if($userFirstCartItems != null){
                    $userCartItems = Cart::where('user_id', Auth::user()->id)->get();
                    $setting = Setting::firstOrFail();

                    $totalItems = 0;
                    $totalPrice = 0;
                    foreach($userCartItems as $key=>$cartItem){
                        $totalItems = $key+1;
                        $totalPrice += $cartItem->price;
                    }
                    $totalWithShipping = $totalPrice + $setting->shippingCharge;

                    $view->with('totalItems',$totalItems)
                         ->with('totalWithShipping',$totalWithShipping)
                         ->with('totalPrice',number_format(round($totalPrice)))
                         ->with('userCartItems',$userCartItems);
                }else{
                    $userCartItems = null;
                    $view->with('userCartItems',$userCartItems);
                }
            }
        }); 
    }
}
