<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public static $rules_create = array(
        'content' => 'required',
        'module' => 'required',
    );
    public static $rules_update = array(
        'form_text' => 'required',
        'form_module' => 'required',
    );
    public static $rules_jme = array(
        'module' => 'jme'
    );
    public static $rules_jmeliqin = array(
        'module' => 'jmeliqin'
    );
    public static $rules_jmepuer = array(
        'module' => 'jmepuer'
    );
    public static $rules_jmeyin = array(
        'module' => 'jmeyin'
    );
    public static $rules_xssp = array(
        'module' => 'xssp'
    );
    public static $rules_jsgy = array(
        'module' => 'jsgy'
    );
    protected $table = 'about';
    protected $fillable = ['content', 'module'];
    protected $dates = ['created_at', 'updated_at'];

}