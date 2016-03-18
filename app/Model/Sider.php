<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class Sider extends Model
{
    protected $table = 'sider';
    protected $fillable = ['title','kword'];
    protected $dates = ['created_at', 'updated_at'];

    public static $rules_create = array(
//        'id'=>'required|numeric',
        'title'=>'required',
        'kword'=>'required|alpha_num',
        'pid'=>'required|numeric',
//        'created_at'=>'required|numeric',
        'ctrl'=>'required|alpha_num'
    );

    public static $rules_update = array(
        'id'=>'required|numeric',
        'title'=>'required',
        'kword'=>'required|alpha_num',
        'pid'=>'required|numeric',
//        'created_at'=>'required|numeric',
        'ctrl'=>'required|alpha_num'
    );
//    public function setCreatedAtAttribute($date){
//    	$this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d', $date);
//    }

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


    public static function getIconTag(){
        return array('adjust',
            'align-center',
            'align-justify',
            'align-left',
            'align-right',
            'arrow-down',
            'arrow-left',
            'arrow-right',
            'arrow-up',
            'asterisk',
            'backward',
            'ban-circle',
            'barcode',
            'bell',
            'bold',
            'book',
            'bookmark',
            'briefcase',
            'bullhorn',
            'calendar',
            'camera',
            'certificate',
            'check',
            'chevron-down',
            'chevron-left',
            'chevron-right',
            'chevron-up',
            'circle-arrow-down',
            'circle-arrow-left',
            'circle-arrow-right',
            'circle-arrow-up',
            'cloud',
            'cloud-download',
            'cloud-upload',
            'cog',
            'collapse-down',
            'collapse-up',
            'comment',
            'compressed',
            'copyright-mark',
            'credit-card',
            'cutlery',
            'dashboard',
            'download',
            'download-alt',
            'earphone',
            'edit',
            'eject',
            'envelope',
            'euro',
            'exclamation-sign',
            'expand',
            'export',
            'eye-close',
            'eye-open',
            'facetime-video',
            'fast-backward',
            'fast-forward',
            'file',
            'film',
            'filter',
            'fire',
            'flag',
            'flash',
            'floppy-disk',
            'floppy-open',
            'floppy-remove',
            'floppy-save',
            'floppy-saved',
            'folder-close',
            'folder-open',
            'font',
            'forward',
            'fullscreen',
            'gbp',
            'gift',
            'glass',
            'globe',
            'hand-down',
            'hand-left',
            'hand-right',
            'hand-up',
            'hd-video',
            'hdd',
            'header',
            'headphones',
            'heart',
            'heart-empty',
            'home',
            'import',
            'inbox',
            'indent-left',
            'indent-right',
            'info-sign',
            'italic',
            'leaf',
            'link',
            'list',
            'list-alt',
            'lock',
            'log-in',
            'log-out',
            'magnet',
            'map-marker',
            'minus',
            'minus-sign',
            'move',
            'music',
            'new-window',
            'off',
            'ok',
            'ok-circle',
            'ok-sign',
            'open',
            'paperclip',
            'pause',
            'pencil',
            'phone',
            'phone-alt',
            'picture',
            'plane',
            'play',
            'play-circle',
            'plus',
            'plus-sign',
            'print',
            'pushpin',
            'qrcode',
            'question-sign',
            'random',
            'record',
            'refresh',
            'registration-mark',
            'remove',
            'remove-circle',
            'remove-sign',
            'repeat',
            'resize-full',
            'resize-horizontal',
            'resize-small',
            'resize-vertical',
            'retweet',
            'road',
            'save',
            'saved',
            'screenshot',
            'sd-video',
            'search',
            'send',
            'share',
            'share-alt',
            'shopping-cart',
            'signal',
            'sort',
            'sort-by-alphabet',
            'sort-by-alphabet-alt',
            'sort-by-attributes',
            'sort-by-attributes-alt',
            'sort-by-order',
            'sort-by-order-alt',
            'sound-5-1',
            'sound-6-1',
            'sound-7-1',
            'sound-dolby',
            'sound-stereo',
            'star',
            'star-empty',
            'stats',
            'step-backward',
            'step-forward',
            'stop',
            'subtitles',
            'tag',
            'tags',
            'tasks',
            'text-height',
            'text-width',
            'th',
            'th-large',
            'th-list',
            'thumbs-down',
            'thumbs-up',
            'time',
            'tint',
            'tower',
            'transfer',
            'trash',
            'tree-conifer',
            'tree-deciduous',
            'unchecked',
            'upload',
            'usd',
            'user',
            'volume-down',
            'volume-off',
            'volume-up',
            'warning-sign',
            'wrench',
            'zoom-in',
            'zoom-out'
        );
    }

//    public function getLeftList(){
//        return $this->where('pid', '=', 0)->molecule()->get();
//    }
}
