<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Notice extends Model
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

    public static function getSiderSelectList()
    {
        $cls = new Notice();
        $rlt = $cls->getParentSiders()->get();
        $rlt = $cls->MakeSonSiders($rlt);
        $rlt = $cls->makeSiderSelectList($rlt);
        return $rlt;
    }

    public function getParentSiders()
    {
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

    public function getSonSiders($pid)
    {
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
    public function findSonSider($newRlt, $row, $level)
    {
        if (count($row->hasManySiders) > 0) {
            foreach ($row->hasManySiders as $row2) {
                $newRlt[$row2->id] = '--' . $level . $row2->title;
                $newRlt = $this->findSonSider($newRlt, $row2, '--' . $level);
            }
        }

        return $newRlt;
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
        return $this->hasMany('App\Models\Notice', 'pid', 'id');
    }

    public function hasOneParent()
    {
        return $this->hasOne('App\Models\Notice', 'id', 'pid');
    }

//    public function getLeftList(){
//        return $this->where('pid', '=', 0)->molecule()->get();
//    }
}
