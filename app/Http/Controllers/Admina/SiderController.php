<?php

namespace DaJiaYin\Http\Controllers\Admina;

use DaJiaYin\Http\Controllers\Controller;
use DaJiaYin\Http\Requests;
use DaJiaYin\Models\Sider;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

//侧边栏 & 模块
class SiderController extends Controller
{
	public function __construct()
	{
//		$this->beforeFilter('csrf', array('on'=>'post'));
//		$this->beforeFilter('auth', array('only'=>array('getDashboard')));

	}

//	protected $layout = "admina.base";

	public function getList(){
		$siders = Sider::with('hasOneParent')->paginate(16);
		return view('admina.sider.list', compact( 'siders'));
	}

	public function getElememtList($pid){
//		$siderLeft = Sider::where( "pid", "=", 0)->with('hasManySiders')->get();
		$siders = Sider::where("pid", "=", $pid)->paginate(10);
//		$rlt = array('siderLeft'=>$siderLeft, 'siders'=>$siders);
		return view('admina.sider.list', compact( 'siders'));
	}

	public function getRegister() {

	}

	public function createElememtSider($pid){
		$siders = Sider::getSiderSelectList();
		$siderIcon = Sider::getIconTag();
		$siderUrl = 'create';
		$siderTitle='新增侧边栏';
		$siderButton='添加';

//		var_dump( Session::get('name_error') );
//		session(['errorss'=>'errors test']);
//		Session::put('name_error', 'Johnson');

//		var_dump( Session::get('name_error') );

//		$this->layout->content = View::make('admina.sider.detail')->with('siderIcon', $siderIcon)->with('siderTitle', $siderTitle)->with('siderUrl',$siderUrl)->with('siderButton', $siderButton)->with('pid', $pid);
//			'siders', 'siderTitle', 'siderButton', 'siderIcon', 'pid', 'siderUrl'));

		return view('admina.sider.detail', compact( 'siders', 'siderTitle', 'siderButton', 'siderIcon', 'pid', 'siderUrl'));
	}

	public function updateElememtSider($id){
		$siders = Sider::getSiderSelectList();
		$siderIcon = Sider::getIconTag();
		$sider = Sider::find($id);
		$siderUrl = 'update';
		$siderTitle='修改侧边栏';
		$siderButton='修改';
		return view('admina.sider.detail', compact( 'siders', 'sider', 'siderTitle', 'siderButton', 'siderIcon', 'id', 'siderUrl'));
	}

	public function getElememtDetail(){

		return view('admina.sider.detail');
	}

	public function postElememtDetail($siderType){
		if($siderType == 'create'){
			$validator = Validator::make(Input::all(), Sider::$rules_create, Sider::$message_comm, Sider::$attributes_comm);
			if ($validator->passes()) {
				$sider = new Sider();//实例化Sider对象
				$sider->title = Input::get('title');
				$sider->ctrl = Input::get('ctrl');
				$sider->kword = Input::get('kword');
				$sider->pid = Input::get('pid');
				$sider->save();
				return Redirect::to('admina/operation/sider')->with('message', '添加成功,这个栏目的编号是'.$sider->getKey().'!');
			} else {
				return Redirect::back()->withErrors($validator)->withInput();
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
				return Redirect::to('admina/operation/sider')->with('message', '修改成功,这个栏目的编号是'.$sider->getKey().'!');
			} else {
				return Redirect::to('admina/operation/updateElememtSider/'.Input::get('siderId'))->with('message', '请您正确填写下列数据')->withErrors($validator);//->withInput()
			}
		}
		return view('admina.sider.detail');
	}

	public function store(CreateArticleRequest $request){
		Article::create($request->all());
		return redirect('admina/index');
	}
}
