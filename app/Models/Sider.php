<?php

namespace DaJiaYin\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Sider extends Model
{
    public static $rules_create = array(
//        'id'=>'required|numeric',
        'title'=>'required',
        'kword'=>'required|alpha_num',
        'pid'=>'required|numeric',
//        'created_at'=>'required|numeric',
        'ctrl'=>'required|alpha_dash'
    );
    public static $rules_update = array(
        'siderId'=>'required|numeric',
        'title'=>'required',
        'kword'=>'required|alpha_num',
        'pid'=>'required|numeric',
//        'created_at'=>'required|numeric',
        'ctrl'=>'required|alpha_dash'
    );
    public static $attributes_comm=array(
        'siderId'=>'模块编号',
        'title'=>'模块名称',
        'kword'=>'模块关键词',
        'pid'=>'模块的父级编号',
//        'created_at'=>'required|numeric',
        'ctrl'=>'图标'
    );
    public static $message_comm = array(
        "required"      => ":attribute 不能为空白",
        "numeric"       => ":attribute 只能是数字",
        "alpha_num"     => ":attribute 只能是字母和数字的组合",
        "alpha_dash"    => ":attribute 只能是字母、数字、“-”、“_”的组合",
        "between"       => ":attribute 长度必须在 :min 和 :max 之间"
    );
    public static $rules_about = array(
        'kword' => 'about',
        'pid' => 0
    );


    protected $table = 'sider';
    protected $fillable = ['title', 'kword'];
    protected $dates = ['created_at', 'updated_at'];

    public static function getSiderSelectList()
    {
        $cls = new Sider();
        $rlt = $cls->getParentSiders()->get();
        $rlt = $cls->MakeSonSiders($rlt);
        $rlt = $cls->makeSiderSelectList($rlt);
        return $rlt;
    }

    public function getParentSiders(){
        return $this->where('pid', '=', 0);
    }

    public function MakeSonSiders($rlt)
    {
        foreach ($rlt as $key => $row) {
            $tmp = $this->getSonSiders($row->id)->get();//
            if (count($tmp) > 0) {
                $tmp = $this->MakeSonSiders($tmp);
            }
            $rlt[$key]->hasManySiders = $tmp;
        }
        return $rlt;
    }

    public function getSonSiders($pid){
        return $this->where('pid', '=', $pid);
    }

    public function makeSiderSelectList($rlt)
    {
        $newRlt = array('顶级模块');
        $this->tmpLevel = '';
        $level = '';
        foreach ($rlt as $row) {
            $newRlt[$row->id] = $row->title;
            $newRlt = $this->findSonSider($newRlt, $row, $level);
            $this->tmpLevel = '';

        }
        return $newRlt;
    }

    /**
     * findSonSider
     * @param $newRlt
     * @param $row
     * @param $level
     * @return array
     */
    public function findSonSider($newRlt, $row, $level){
            if(count($row->hasManySiders)>0){
                foreach($row->hasManySiders as $row2) {
                    $newRlt[$row2->id] = '--'.$level.$row2->title;
                    $newRlt = $this->findSonSider($newRlt, $row2, '--'.$level);
                }
            }

        return $newRlt;
    }

    public static function getIconTag()
    {
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

    public function getBreadcrumbs($kword)
    {
        $breadcrumbsArr = array();
        $siderObj = $this::where('kword', '=', $kword)->first();
        $siderObj->mintarget = true;
        $breadcrumbsArr[] = $siderObj;
        $siderPreObj = $this::where('id', '=', $siderObj->pid)->first();;

        if (is_null($siderPreObj)) {
            return $breadcrumbsArr;
        }
        array_unshift($breadcrumbsArr, $siderPreObj);
//        $siderPreObj->sonObj = $siderObj;
        $siderPrePreObj = $this->where(array('id' => $siderPreObj->pid))->first();
        if (is_null($siderPrePreObj)) {
            return $breadcrumbsArr;
        }
//        $siderPrePreObj->sonObj = $siderPreObj;
//        $breadcrumbsArr[] = $siderPrePreObj;
        array_unshift($breadcrumbsArr, $siderPrePreObj);
        $siderPrePrepreObj = $this::where('id', '=', $siderPrePreObj->pid)->first();

        if (is_null($siderPrePrepreObj)) {
            return $breadcrumbsArr;
        }
//        $siderPrePrepreObj->sonObj = $siderPrePreObj;
        array_unshift($breadcrumbsArr, $siderPrePrepreObj);
        return $breadcrumbsArr;
    }

    public function scopeCreated($query)
    {
        $query->where('created_at', '<=', Carbon::now());
    }


//    public static function getSiderSelectList(){
//        return DB::table('sider')->where("pid", "=", 0)->lists('title', 'id');
//    }

    public function scopeSiderspid($query)
    {
        $query->where('pid', '=', 0);
    }

    public function hasManySiders()
    {
        return $this->hasMany('DaJiaYin\Models\Sider', 'pid', 'id')->where('hide', '=', 0);
    }

    public function hasOneParent()
    {
        return $this->hasOne('DaJiaYin\Models\Sider', 'id', 'pid');
    }

    public function my_json_decode($str)
    {
//        if (preg_match('/"w":/', $str)) {
//            $str = preg_replace('/"(w+)":/is', '$1:', $str);    //给key加双引号
//        }
        $str = preg_replace('/"(w+)"(s*:s*)/is', '$1$2', $str);   //去掉key的双引号
        return $str;
    }

    public function arrayToJsonData($siderList)
    {
        $arrAll = $this->makeJsonData($siderList);
        $jsonData = json_encode($arrAll);
        return $jsonData;
    }

    public function makeJsonData($siderList, $ctrl = '')
    {
        $arrAll = array();

        foreach ($siderList as $sider) {
            $num = count($sider->hasManySiders);
            $obj = new \stdClass();
            $obj->text = $sider->title;
            if ($sider->pid == 0) {
                $obj->href = "#";
                $this->tmpLevel = $sider->kword;
            } else {
                if ($sider->kword == 'jme') {
                    $obj->href = '#';
                } else {
                    $obj->href = url('/admina/' . $ctrl . '/' . $sider->kword);
                }
            }
            $obj->tags = array($num);
            if ($num > 0) {
                $obj->nodes = $this->makeJsonData($sider->hasManySiders, $this->tmpLevel);
            } else {
                $obj->nodes = array();
            }

            $arrAll[] = $obj;
        }
        return $arrAll;
    }

    /*
     *
     *         foreach( $siderList as $sider ){
            $rlt .= "{";
            $rlt .= "text:'".$sider->title."',";
            $rlt .= "href:'".url('/admina/'.$sider->kword)."',";
            $rlt .= "tags:'".count($siderList)."',";
            $rlt .= "nodes:[]";
//            [
//            {"text":"\u63a7\u5236\u9762\u677f",
//                "href":"http:\/\/www.djy.dev\/admina\/operation",
//                "tags":8,
//                "nodes":[]},

//            $obj->text = $sider->title;
//            $obj->href = ;
//            $obj->tags = count($siderList);
//            $obj->nodes = array();
//            $arrAll[] = $obj;
            $rlt .= "},";
        }
        $rlt .= "]";
     *
     */


//    function my_json_decode($str) {
//    if (preg_match('//"/w/":/', $str)) {
//        $str = preg_replace('//"(/w+)/":/is', '$1:', $str);    //给key加双引号        //
//    }
//        $str = preg_replace('/"(/w+)"(/s*:/s*)/is', '$1$2', $str);   //去掉key的双引号        return $str;
    //    }    $str = '{"test":[{"testName":"哈哈","Url":"http://www.test.com"}]}';    $str = my_json_decode($str);    echo "$str";

//    public function getLeftList(){
//        return $this->where('pid', '=', 0)->molecule()->get();
//    }
}
