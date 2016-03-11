<?php

namespace App\Http\Controllers\Admina;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SiderController extends Controller
{
    //
	public function getList(){



		return view('admina.sider.index');
	}

	public function getDetail(){

		return view('admina.sider.detail');
	}

	public function setDetail(){

		return view('admina.sider.detail');
	}
}
