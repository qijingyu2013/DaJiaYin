<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sider extends Model
{
    protected $table = 'sider';
    protected $fillable = ['title','kword'];
    protected $dates = ['created_at'];

    public function setCreatedAtAttribute($date){
    	$this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function scopeCreated($query){
    	$query->where('created_at', '<=', Carbon::now());
    }

    public function scopeSiderspid($query){
        $query->where('pid', '=', 0);
    }

    public function getParentSiders(){
        return $this->where('pid', '=', 0);
    }

    public function hasManySiders(){
//        User::leftJoin('comments as ','users.id','=','comments.user_id');
        return $this->hasMany('App\Model\Sider', 'pid', 'id');
    }

//    public function getLeftList(){
//        return $this->where('pid', '=', 0)->molecule()->get();
//    }
}
