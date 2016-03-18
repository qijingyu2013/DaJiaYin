<?php

namespace App\Http\Controllers\Admina;

//use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Sider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class SiderController extends Controller
{
	public function getList(){
		$siderLeft = Sider::where( "pid", "=", 0)->with('hasManySiders')->get();
		$siders = Sider::paginate(10);
		$rlt = array('siderLeft'=>$siderLeft, 'siders'=>$siders);
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

	public function updateElememtSider($id){
		$siderLeft = Sider::where( "pid", "=", 0)->with('hasManySiders')->get();
		$siders = Sider::getSiderSelectList();
		$siderIcon = Sider::getIconTag();
		$sider = Sider::find($id);
		$siderUrl = 'update';
		$rlt = array('siderLeft'=>$siderLeft, 'siders'=>$siders, 'sider'=>$sider, 'siderTitle'=>'修改侧边栏', 'siderButton'=>'修改', 'siderIcon'=>$siderIcon, 'id'=>$id, 'siderUrl'=>$siderUrl);
		return view('admina.sider.detail', compact('rlt'));
	}

	public function getElememtDetail(){

		return view('admina.sider.detail');
	}

	public function postElememtDetail($siderType){
		if($siderType == 'create'){
			$validator = Validator::make(Input::all(), Sider::$rules_create);
			if ($validator->passes()) {
				$sider = new Sider();//实例化User对象
				$sider->title = Input::get('title');
				$sider->ctrl = Input::get('ctrl');
				$sider->pid = Input::get('pid');
				$sider->save();
				return Redirect::to('admina/sider')->with('message', '添加成功,这个栏目的编号是'.$sider->getKey().'!');
			} else {
				return Redirect::to('admina/register')->with('message', '请您正确填写下列数据')->withErrors($validator)->withInput();
			}
		}elseif($siderType == 'update') {
			$validator = Validator::make(Input::all(), Sider::$rules_update);
			if ($validator->passes()) {
				$user = new Adminer();//实例化User对象
				$user->name = Input::get('name');
				$user->email = Input::get('email');
				$user->password = Hash::make(Input::get('password'));
				$user->save();
				return Redirect::to('admina/login')->with('message', '欢迎注册，好好玩耍!');
			} else {
				return Redirect::to('admina/register')->with('message', '请您正确填写下列数据')->withErrors($validator)->withInput();
			}
		}

		dd($siderType);


		return view('admina.sider.detail');
	}

	public function store(CreateArticleRequest $request){
		Article::create($request->all());
		return redirect('admina/index');
	}
}
