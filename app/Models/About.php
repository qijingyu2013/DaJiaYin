<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class About extends Model
{
    protected $table = 'about';
    protected $fillable = ['content','module'];
    protected $dates = ['created_at', 'updated_at'];

    public static $rules_create = array(
        'content'=>'required',
        'module'=>'required',
    );

    public static $rules_update = array(
        'content'=>'required',
        'module'=>'required',
    );

    public function scopeCreated($query){
    	$query->where('created_at', '<=', Carbon::now());
    }

    public function scopeSiderspid($query){
        $query->where('pid', '=', 0);
    }

    public function getParentSiders(){
        return $this->where('pid', '=', 0);
    }

    public static function getSiderSelectList(){
        return DB::table('sider')->where("pid", "=", 0)->lists('title', 'id');
    }

    public function hasManySiders(){
        return $this->hasMany('App\Model\Sider', 'pid', 'id');
    }

}
