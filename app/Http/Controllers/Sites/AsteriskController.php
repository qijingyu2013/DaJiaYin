<?php

namespace App\Http\Controllers\Sites;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\About;
use App\Models\Award;
use App\Models\Notice;
use App\Models\Sider;

//use App\Logic\Article;

class AsteriskController extends Controller
{
    /**
     * 大家银日刊
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showJournal()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('journal');
        $journals = Notice::where('module', '=', 'journal')->get();
        $type = 'asterisk';
        return view('sites.asterisk.journallist', compact('breadcrumbs', 'journals', 'type'));
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
        $type = 'about';
        return view('sites.about.aboutme', compact('breadcrumbs', 'about', 'type'));
    }

    /**
     * 新闻公告列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showNotice()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('notice');
        $notices = Notice::where("module", "=", 'notice')->orderBy('id', 'desc')->paginate(10);
        $type = 'about';
        return view('sites.about.noticelist', compact('breadcrumbs', 'notices', 'type'));
    }

    /**
     * 新闻公告详细页
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showNoticeDetail($id)
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('notice');
        $notice = Notice::find($id);
        $type = 'about';
        return view('sites.about.noticedetail', compact('breadcrumbs', 'notice', 'type'));
    }

    /**
     * 奖项列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAward()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('award');
        $awards = Notice::where("module", "=", 'award')->orderBy('id', 'desc')->paginate(8);
        $type = 'about';
        return view('sites.about.awardlist', compact('breadcrumbs', 'awards', 'type'));
    }

    /**
     * 奖项详细页
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAwardDetail($id)
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('award');
        $award = Notice::find($id);
        $type = 'about';
        return view('sites.about.awarddetail', compact('breadcrumbs', 'award', 'type'));
    }

    /**
     * 媒体报道列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showMedia()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('media');
        $notices = Notice::where("module", "=", 'media')->orderBy('id', 'desc')->paginate(10);
        $type = 'about';
        return view('sites.about.medialist', compact('breadcrumbs', 'notices'));
    }

    /**
     * 媒体报道详细页
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showMediaDetail($id)
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('media');
        $notice = Notice::find($id);
        $type = 'about';
        return view('sites.about.mediadetail', compact('breadcrumbs', 'notice'));
    }

    /**
     * 媒体报道列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTeam()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('team');
        $notices = Notice::where("module", "=", 'team')->orderBy('id', 'desc')->paginate(3);
        $type = 'about';
        return view('sites.about.teamlist', compact('breadcrumbs', 'notices', 'notice'));
    }

    /**
     * 媒体报道详细页
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTeamDetail($id)
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('team');
        $notice = Notice::find($id);
        $type = 'about';
        return view('sites.about.teamdetail', compact('breadcrumbs', 'notice', 'notice'));
    }

    /**
     * 联系我们
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showContact()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('contact');
        $about = About::where('module', '=', 'contact')->first();
        $type = 'about';
        return view('sites.about.contact', compact('breadcrumbs', 'about', 'notice'));
    }
}
