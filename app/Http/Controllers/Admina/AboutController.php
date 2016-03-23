<?php

namespace App\Http\Controllers\Admina;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\About;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;


class AboutController extends Controller
{
	public function getList(){
		$aboutLeft = About::where( "pid", "=", 0)->with('hasManyAbouts')->get();
		$abouts = About::paginate(10);
		$rlt = array('aboutLeft'=>$aboutLeft, 'abouts'=>$abouts);
		return view('admina.about.list', compact('rlt'));
	}

	public function getElememtList($pid){
		$aboutLeft = About::where( "pid", "=", 0)->with('hasManyAbouts')->get();
		$abouts = About::where("pid", "=", $pid)->paginate(10);
		$rlt = array('aboutLeft'=>$aboutLeft, 'abouts'=>$abouts);
		return view('admina.about.list', compact('rlt'));
	}

	public function createElememtAbout($pid){
		$aboutLeft = About::where( "pid", "=", 0)->with('hasManyAbouts')->get();
		$abouts = About::getAboutSelectList();
		$aboutIcon = About::getIconTag();
		$aboutUrl = 'create';
		$rlt = array('aboutLeft'=>$aboutLeft, 'abouts'=>$abouts, 'aboutTitle'=>'新增侧边栏', 'aboutButton'=>'添加', 'aboutIcon'=>$aboutIcon, 'pid'=>$pid, 'aboutUrl'=>$aboutUrl);
		return view('admina.about.detail', compact('rlt'));
	}

	public function updateElememtAbout($id){
		$aboutLeft = About::where( "pid", "=", 0)->with('hasManyAbouts')->get();
		$abouts = About::getAboutSelectList();
		$aboutIcon = About::getIconTag();
		$about = About::find($id);
		$aboutUrl = 'update';
		$rlt = array('aboutLeft'=>$aboutLeft, 'abouts'=>$abouts, 'about'=>$about, 'aboutTitle'=>'修改侧边栏', 'aboutButton'=>'修改', 'aboutIcon'=>$aboutIcon, 'id'=>$id, 'aboutUrl'=>$aboutUrl);
		return view('admina.about.detail', compact('rlt'));
	}

	public function getElememtDetail(){

		return view('admina.about.detail');
	}

	public function postElememtDetail($aboutType){
		if($aboutType == 'create'){
			$validator = Validator::make(Input::all(), About::$rules_create);
			if ($validator->passes()) {
				$about = new About();//实例化About对象
				$about->title = Input::get('title');
				$about->ctrl = Input::get('ctrl');
				$about->kword = Input::get('kword');
				$about->pid = Input::get('pid');
				$about->save();
				return Redirect::to('admina/about')->with('message', '添加成功,这个栏目的编号是'.$about->getKey().'!');
			} else {
				return Redirect::to('admina/createElememtAbout/'.Input::get('pid'))->with('message', '请您正确填写下列数据')->withErrors($validator)->withInput();
			}
		}elseif($aboutType == 'update') {
			$validator = Validator::make(Input::all(), About::$rules_update);
			if ($validator->passes()) {
				$about = About::find(Input::get('aboutId'));
				$about->title = Input::get('title');
				$about->ctrl = Input::get('ctrl');
				$about->kword = Input::get('kword');
				$about->pid = Input::get('pid');
				$about->save();
				return Redirect::to('admina/about')->with('message', '修改成功,这个栏目的编号是'.$about->getKey().'!');
			} else {
				return Redirect::to('admina/updateElememtAbout/'.Input::get('aboutId'))->with('message', '请您正确填写下列数据')->withErrors($validator)->withInput();
			}
		}
		return view('admina.about.detail');
	}

	public function store(CreateArticleRequest $request){
		Article::create($request->all());
		return redirect('admina/index');
	}
}
