<?php

namespace DaJiaYin\Http\Controllers\Admina;

use DaJiaYin\Http\Controllers\Controller;
use DaJiaYin\Http\Requests;

class CalenderController extends Controller
{
    //
	public function getList(){


		return view('admina.calender.index');
	}
}
