<?php

namespace DaJiaYin\Logic;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title','content','published_at'];
    protected $dates = ['published_at'];

    public function setPublicedAtAttribute($date){
    	$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function scopePublished($query){
    	$query->where('published_at', '<=', Carbon::now());
    }
}
