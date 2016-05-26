<?php

namespace DaJiaYin\Http\Controllers\Admina;

use DaJiaYin\Http\Controllers\Controller;
use DaJiaYin\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
	public function index(){
		$b = Auth::user('admin');
		dd($b);
		$a = Auth::check();
		dd($a);
		return view('admina.index');
	}
}
