<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class About extends Model
{
    public static $rules_create = array(
        'content'=>'required',
        'module'=>'required',
    );
    public static $rules_update = array(
        'content'=>'required',
        'module'=>'required',
    );
    protected $table = 'about';
    protected $fillable = ['content', 'module'];
    protected $dates = ['created_at', 'updated_at'];


}
