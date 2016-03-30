<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //index
    public function index(){
    	return view('sites.welcome');
    }

    public function about(){
    	$name = 'text';
    	return view('sites.about')->with('name', $name);
    }
}
