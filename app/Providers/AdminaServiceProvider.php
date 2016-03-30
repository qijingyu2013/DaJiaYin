<?php

namespace App\Providers;

//use App\Models\Sider;

use Illuminate\Support\ServiceProvider;

class AdminaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //侧边栏
//        $siderLeft = Sider::where( "pid", "=", 0)->with('hasManySiders')->get();
//        view()->share('siderLeft',$siderLeft);
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
