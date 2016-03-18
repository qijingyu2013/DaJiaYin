<?php

namespace App\Http\Controllers\Admina;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Sider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;


class SiderController extends Controller
{
	public function getList(){
		$siderLeft = Sider::where( "pid", "=", 0)->with('hasManySiders')->get();
		$siders = Sider::paginate(10);
		//glyphicon glyphicon-align-justify
		$rlt = array('siderLeft'=>$siderLeft, 'siders'=>$siders);
//		dd(compact('rlt'));
		return view('admina.sider.index', compact('rlt'));
	}

	public function getElememtList($id){
		$siderLeft = Sider::where( "pid", "=", 0)->with('hasManySiders')->get();
		$siders = Sider::where("pid", "=", $id)->paginate(10);
		$rlt = array('siderLeft'=>$siderLeft, 'siders'=>$siders);
		return view('admina.sider.index', compact('rlt'));
	}

	public function createElememtSider($pid){
		$siderLeft = Sider::where( "pid", "=", 0)->with('hasManySiders')->get();
		$siders = Sider::getSiderSelectList();
		$siderIcon = Sider::getIconTag();
		$siderUrl = 'create';
		$rlt = array('siderLeft'=>$siderLeft, 'siders'=>$siders, 'siderTitle'=>'新增侧边栏', 'siderButton'=>'添加', 'siderIcon'=>$siderIcon, 'pid'=>$pid, 'siderUrl'=>$siderUrl);
		return view('admina.sider.detail', compact('rlt'));
	}

	public function editElememtSider($id){
		$siderLeft = Sider::where( "pid", "=", 0)->with('hasManySiders')->get();
		$siders = Sider::getSiderSelectList();
		$siderIcon = Sider::getIconTag();
		$sider = Sider::find($id);
		$siderUrl = 'edit';
		$rlt = array('siderLeft'=>$siderLeft, 'siders'=>$siders, 'sider'=>$sider, 'siderTitle'=>'修改侧边栏', 'siderButton'=>'修改', 'siderIcon'=>$siderIcon, 'id'=>$id, 'siderUrl'=>$siderUrl);
		return view('admina.sider.detail', compact('rlt'));
	}

	public function getElememtDetail(){

		return view('admina.sider.detail');
	}

	public function postElememtDetail($siderType){
		dd($siderType);


		return view('admina.sider.detail');
	}
}
