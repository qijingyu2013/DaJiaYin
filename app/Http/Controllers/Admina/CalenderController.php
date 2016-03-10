<?php

namespace App\Http\Controllers\Admina;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CalenderController extends Controller
{
    //
	public function getList(){


		return view('admina.calender.index');
	}
}
