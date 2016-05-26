<?php

namespace DaJiaYin\Providers;

use DaJiaYin\Models\Sider;
use Illuminate\Support\ServiceProvider;

/**
 * Class SitesServiceProvider
 * @package DaJiaYin\Providers
 */
class SitesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //侧边栏
        $siderLeft = Sider::where("pid", "=", 0)->where("hide", "=", 0)->with('hasManySiders')->get();
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
