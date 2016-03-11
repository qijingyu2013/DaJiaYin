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

    public function getLeftList(){
        return $this->hasMany('App\Model\Sider', 'pid', 'id');//where('pid', '=', 0)->

//        Sider::where('pid', '=', 0)->paginate(15);

    }

}
