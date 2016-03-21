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
		return view('admina.sider.list', compact('rlt'));
	}

	public function getElememtList($pid){
		$siderLeft = Sider::where( "pid", "=", 0)->with('hasManySiders')->get();
		$siders = Sider::where("pid", "=", $pid)->paginate(10);
		$rlt = array('siderLeft'=>$siderLeft, 'siders'=>$siders);
		return view('admina.sider.list', compact('rlt'));
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

		/*
		 * {{ Form::text('title', function(){
                                        if( is_null($rlt['sider']) ){
                                            return null;
                                        }else{
                                            return $rlt['sider']->title;
                                        }
                                    }
                                    , array('class'=>'form-control', 'placeholder'=>'模块名称')) }}
		 */

		return view('admina.sider.detail', compact('rlt'));
	}

	public function getElememtDetail(){

		return view('admina.sider.detail');
	}

	public function postElememtDetail($siderType){
		if($siderType == 'create'){
			$validator = Validator::make(Input::all(), Sider::$rules_create);
			if ($validator->passes()) {
				$sider = new Sider();//实例化Sider对象
				$sider->title = Input::get('title');
				$sider->ctrl = Input::get('ctrl');
				$sider->kword = Input::get('kword');
				$sider->pid = Input::get('pid');
				$sider->save();
				return Redirect::to('admina/sider')->with('message', '添加成功,这个栏目的编号是'.$sider->getKey().'!');
			} else {
				return Redirect::to('admina/createElememtSider/'.Input::get('pid'))->with('message', '请您正确填写下列数据')->withErrors($validator)->withInput();
			}
		}elseif($siderType == 'update') {
			$validator = Validator::make(Input::all(), Sider::$rules_update);
			if ($validator->passes()) {
				$sider = Sider::find(Input::get('siderId'));
				$sider->title = Input::get('title');
				$sider->ctrl = Input::get('ctrl');
				$sider->kword = Input::get('kword');
				$sider->pid = Input::get('pid');
				$sider->save();
				return Redirect::to('admina/sider')->with('message', '修改成功,这个栏目的编号是'.$sider->getKey().'!');
			} else {
				return Redirect::to('admina/updateElememtSider/'.Input::get('siderId'))->with('message', '请您正确填写下列数据')->withErrors($validator)->withInput();
			}
		}
		return view('admina.sider.detail');
	}

	public function store(CreateArticleRequest $request){
		Article::create($request->all());
		return redirect('admina/index');
	}
}
