<?php

namespace DaJiaYin\Models;

use Illuminate\Database\Eloquent\Model;


class Upload extends Model
{
    public static $rules_create = array(
        'content' => 'required',
        'module' => 'required',
    );
    public static $rules_update = array(
        'content' => 'required',
        'module' => 'required',
    );
    protected $table = 'Upload';
    protected $fillable = ['content', 'module'];
    protected $dates = ['created_at', 'updated_at'];
//Model::create(array('route' => 'ueditor/test', 'user_id' => null, 'media_type' => 'image', 'media_name' => '201603301459345495130274.jpeg'))

}
