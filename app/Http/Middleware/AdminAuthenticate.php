<?php

namespace DaJiaYin\Http\Middleware;

use Closure;
use OriginalAuthManager;

//use Illuminate\Support\Facades\Redirect;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //修改一下auth的默认登录表
        //echo Auth::getFacadeApplication()->config['auth']['table'];
//        Config::set('auth.model', 'App\Models\Adminer');
//        Config::set('auth.table', 'adminer');
        //dd(Auth::getFacadeApplication()->config['auth']['table']);
        if ( Auth::admin()->check() ) {
            //已经登录
            dd('已经登录');
        } else {
            //还没有登录
            //dd('not login');
            return redirect()->guest('admin/login');
        }

        return $next($request);


////        dd(Auth::check());
//        if (Auth::check()) {
//            dd($request->ajax());
//            if ($request->ajax()) {
////                return response('Unauthorized!', 401);
//            } else {
////                return redirect()->guest('admina/login');
//            }
//        }else{
//            return redirect()->guest('admina/login');
//        }

//        if ($this->auth->guest())
//        {
//            if ($request->ajax())
//            {
//                return response('Unauthorized.', 401);
//            }
//            else
//            {
//                //这个方法会跳转到Auth控制器的getLogin方法
//                //如果没有 那么会自动跳转的视图文件夹下的auth login
//                return redirect()->guest('admina/login');
//            }
//        }
////        if (is_null(Auth::user('adminer'))) {
////            if ($request->ajax()) {
////                return response('Unauthorized.', 401);
////            } else {
////                return redirect()->guest('admina/login');
////            }
////        }
//        $d = Auth::check();
////        dd($d);
//        if(Auth::check()){
//            return Redirect::to('admina/login');
////                redirect('admina/login');
//        }

//        return $next($request);
    }
}