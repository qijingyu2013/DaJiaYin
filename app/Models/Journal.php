<?php

namespace DaJiaYin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Journal extends Model
{
    public static $rules_create = array(
//        'id'=>'required|numeric',
        'title' => 'required',
        'content' => 'required'
    );
    public static $rules_update = array(
        'noticeId' => 'required|numeric',
        'title' => 'required',
        'content' => 'required'
    );
    public static $attributes_comm = array(
        'title' => '公告标题',
        'content' => '公告内容',
        'module' => '模块',
        'author' => '作者',
        'cnt' => '访问量'
    );
    public static $message_comm = array(
        "required" => ":attribute 不能为空白",
        "numeric" => ":attribute 只能是数字",
        "alpha_num" => ":attribute 只能是字母和数字的组合",
        "alpha_dash" => ":attribute 只能是字母、数字、“-”、“_”的组合",
        "between" => ":attribute 长度必须在 :min 和 :max 之间"
    );
    public static $rules_about = array(
        'kword' => 'about',
        'pid' => 0
    );


    protected $table = 'notice';
    protected $fillable = ['title', 'content'];
    protected $dates = ['created_at', 'updated_at'];

    public function transferTitle()
    {
        $this->title = strip_tags($this->title);
        return Str::limit($this->title, 16, '...');
    }

    public function transferContent()
    {
        $this->content = strip_tags($this->content);
        return Str::limit($this->content, 120, '...');
    }
}
