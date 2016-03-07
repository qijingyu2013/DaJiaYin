<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Logic\Article;

class ArticlesController extends Controller
{
    //index
    public function index(){
    	$articles =  Article::all();
    	return view('sites.articles.index', compact('articles'));
    }

    //show
    public function show($id){
    	$articles =  Article::find($id);
    	return view('sites.articles.show', compact('articles'));
    }

      public function  create(){
      	
      }

      public function store(CreateArticleRequest $request){
          Article::create($request->all());
          return redirect('admina/index');
      }
}
