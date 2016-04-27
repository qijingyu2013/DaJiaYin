<?php

namespace App\Providers;

use App\Models\Sider;
use Illuminate\Support\ServiceProvider;

/**
 * Class AdminaServiceProvider
 * @package App\Providers
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
        $siderLeft = $sider->where("pid", "=", 0)->with('hasManySiders')->get();
        $siderJson = $sider->arrayToJsonData($siderLeft);
        view()->share('siderJson', $siderJson);
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
