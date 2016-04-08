<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Sider;

//use App\Logic\Article;

class AboutController extends Controller
{
    //index
    public function showAboutMe()
    {
//    	$articles =  Article::all();
        $Sider = new Sider();
        $siderObj = $Sider->firstOrNew(Sider::$rules_about);
        $siderSonObj = $Sider->getSonSiders($siderObj->id)->get();
        return view('sites.about.aboutme', compact('siderSonObj'));
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
