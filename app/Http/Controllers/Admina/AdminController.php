<?php

namespace DaJiaYin\Http\Controllers\Admina;

use DaJiaYin\Http\Controllers\Controller;
use DaJiaYin\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
	public function index(){
		dd(111);
		$b = Auth::user('adminer');
		echo(Auth::check());
		if (Auth::check()) {
			return view('admina.index');
		} else {
			return Redirect::to('admina/login');
//			return view('admina.login');
		}

	}
}
