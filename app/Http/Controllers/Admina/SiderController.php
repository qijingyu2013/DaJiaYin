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
//		dd($siderLeft);
		$rlt = array('siderLeft'=>$siderLeft, 'siders'=>$siders);
//		dd(compact('rlt'));
		return view('admina.sider.index', compact('rlt'));
	}

	public function getDetail(){

		return view('admina.sider.detail');
	}

	public function setDetail(){

		return view('admina.sider.detail');
	}
}
