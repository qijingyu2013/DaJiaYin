<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\About;
use App\Models\Sider;

//use App\Logic\Article;

class AboutController extends Controller
{
    /**
     * 关于大家银
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAboutMe()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('aboutMe');
        $about = About::where('module', '=', 'aboutme')->first();
        return view('sites.about.aboutme', compact('breadcrumbs', 'about'));
    }

    /**
     * 大家银优势
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showSuperiority()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('superiority');
        $about = About::where('module', '=', 'superiority')->first();
        return view('sites.about.superiority', compact('breadcrumbs', 'about'));
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
