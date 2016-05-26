<?php

namespace DaJiaYin\Models;

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
    public static $rules_jmeliqing = array(
        'module' => 'jmeliqing'
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
    public static $rules_xsspehaving = array(
        'module' => 'xsspehaving'
    );
    public static $rules_xsspbulk = array(
        'module' => 'xsspbulk'
    );
    public static $rules_hnxsscp = array(
        'module' => 'hnxsscp'
    );
    public static $rules_jsgy = array(
        'module' => 'jsgy'
    );
    public static $rules_jsgyCloud = array(
        'module' => 'jsgyCloud'
    );

    protected $table = 'about';
    protected $fillable = ['content', 'module'];
    protected $dates = ['created_at', 'updated_at'];

}
