<?php

namespace DaJiaYin\Providers;

use DaJiaYin\Models\Sider;
use Illuminate\Support\ServiceProvider;

/**
 * Class AdminaServiceProvider
 * @package DaJiaYin\Providers
 */
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
        $sider = new Sider();
        $siderLeft = $sider->where("pid", "=", 0)->where("hide", "=", 0)->with('hasManySiders')->get();
        $siderJson = $sider->arrayToJsonData($siderLeft);
        view()->share('siderJson', $siderJson);
        view()->share('siderLeft', $siderLeft);
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
