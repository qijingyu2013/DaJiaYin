<?php

namespace DaJiaYin\Http\Controllers\Auth;


use DaJiaYin\Http\Controllers\Controller;
use DaJiaYin\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
        $this->beforeFilter('csrf', array('on'=>'post'));
//        $this->beforeFilter('auth', array('only'=>array('getDashboard')));
    }

    public function getAdminLogin()
    {
        return view('admina.login');
    }

    public function getAdminRegister()
    {
        return view('admina.register');
    }

    public function postAdminLogin()
    {
        if (Auth::attempt(array('name'=>Input::get('username'), 'password'=>Input::get('password')))) {
            return Redirect::to('admina/index')->with('message', '欢迎登录');
        } else {
            return Redirect::to('admina/login')->with('message', '用户名或密码错误')->withInput();
        }
        return ;
    }

    public function postAdminRegister()
    {
        $validator = Validator::make(Input::all(), User::$rules);
        if ($validator->passes()) {
            $user = new User;//实例化User对象
            $user->username = Input::get('username');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $rlt = $user->save();
            dd($rlt);
//            return Redirect::to('admina/login')->with('message', '欢迎注册，好好玩耍!');
        } else {
            dd(false);
//            return Redirect::to('admina/register')->with('message', '请您正确填写下列数据')->withErrors($validator)->withInput();
        }

//        $tmp = Auth::attempt(array('name'=>Input::get('username'), 'password'=>Input::get('password')));
//        if ($tmp) {
//            return Redirect::to('admina/index')->with('message', '欢迎登录');
//        } else {
//            return Redirect::to('admina/login')->with('message', '用户名或密码错误')->withInput();
//        }
//        return ;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
