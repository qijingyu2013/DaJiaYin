<?php

namespace App\Logic;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Adminer extends Authenticatable
{
    protected $table = 'adminer';

    protected $fillable = ['name', 'password'];//, 'email'

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules_register = array(
        'name'=>'required|alpha|min:2|unique:users',
        'email'=>'required|email|unique:users',
        'password'=>'required|alpha_num|between:6,12|confirmed',
        'password_confirmation'=>'required|alpha_num|between:6,12'
    );

    public static $rule_login = array(
        'username'=>'required|alpha|min:2',
        'password'=>'required|alpha_num|between:6,12'
    );
}