<?php

namespace DaJiaYin\Http\Controllers\Admina;

use DaJiaYin\Http\Controllers\Controller;
use DaJiaYin\Http\Requests;
use Validator;

class EntryController extends Controller
{
    //
    public function index(){

    }

    public function login(){
    	return view('admina.login');
    }

    public function  auth(){
    	
	$validator = Validator::make(
	    // [
	    //     'username' => 'Dayle',
	    //     'password' => 'lamepassword',
	    //     'email' => 'email@example.com'
	    // ],
	    [
	        'username' => 'required',
	        'password' => 'required|min:8'
	    ]
	);
	// var_dump($validator);
	exit;
    	return redirect('admina/index')->with('message', '发布发布！');
    }
}
