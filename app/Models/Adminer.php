<?php

namespace DaJiaYin\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Adminer extends Authenticatable
{
    public static $rules_register = array(
        'name' => 'required|alpha|min:2|unique:users',
//        'email'=>'required|email|unique:users',
        'password' => 'required|alpha_num|between:6,12|confirmed',
        'password_confirmation' => 'required|alpha_num|between:6,12'
    );
    public static $rule_login = array(
        'name' => 'required|alpha|min:2',
        'password' => 'required|alpha_num|between:6,12'
    );//, 'email'
    protected $table = 'adminer';
    protected $fillable = ['name', 'password'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}