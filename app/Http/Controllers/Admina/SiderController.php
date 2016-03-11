<?php

namespace App\Http\Controllers\Admina;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Sider;

class SiderController extends Controller
{
	public function getList(){
		$Sider = new Sider();
		$siderLeft = $Sider->getLeftList();
dd($siderLeft);
		$siders = Sider::paginate(10);
		$rlt = array(compact('siders'), compact('siderLeft'));
		return view('admina.sider.index', compact('rlt'));
	}

	public function getDetail(){

		return view('admina.sider.detail');
	}

	public function setDetail(){

		return view('admina.sider.detail');
	}
}
