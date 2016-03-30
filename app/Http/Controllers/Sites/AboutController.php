<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use App\Http\Requests;

//use App\Logic\Article;

class AboutController extends Controller
{
    //index
    public function showAboutMe()
    {
//    	$articles =  Article::all();
        return view('sites.about.aboutme');
    }

    //show
    public function show($id)
    {
        $articles = Article::find($id);
        return view('sites.articles.show', compact('articles'));
    }

    public function  create()
    {

    }

    public function store(CreateArticleRequest $request)
    {
        Article::create($request->all());
        return redirect('admina/index');
    }
}
