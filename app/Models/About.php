<?php

namespace DaJiaYin\Models;

use Illuminate\Database\Eloquent\Model;


class About extends Model
{
    public static $rules_create = array(
        'content'=>'required',
        'module'=>'required',
    );
    public static $rules_update = array(
        'form_text' => 'required',
        'form_module' => 'required',
    );
    public static $rules_aboutme = array(
        'module' => 'aboutme'
    );
    public static $rules_superiority = array(
        'module' => 'superiority'
    );
    public static $rules_contact = array(
        'module' => 'contact'
    );
    protected $table = 'about';
    protected $fillable = ['content', 'module'];
    protected $dates = ['created_at', 'updated_at'];

//    public function findAboutMe(){
//        return $this->firstOrNew(About::$rules_aboutme);
//    }
}
