<?php

namespace DaJiaYin\Http\Controllers\Sites;

use DaJiaYin\Http\Controllers\Controller;
use DaJiaYin\Http\Requests;
use DaJiaYin\Models\About;
use DaJiaYin\Models\Award;
use DaJiaYin\Models\Notice;
use DaJiaYin\Models\Sider;

//use DaJiaYin\Logic\Article;

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
        $type = 'about';
        return view('sites.about.aboutme', compact('breadcrumbs', 'about', 'type'));
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
        return view('sites.about.medialist', compact('breadcrumbs', 'notices', 'type'));
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
        return view('sites.about.mediadetail', compact('breadcrumbs', 'notice', 'type'));
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
        return view('sites.about.teamlist', compact('breadcrumbs', 'notices', 'type'));
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
        return view('sites.about.teamdetail', compact('breadcrumbs', 'notice', 'type'));
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
        return view('sites.about.contact', compact('breadcrumbs', 'about', 'type'));
    }

    /**
     * 公司活动列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showActive()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('active');
        $notices = Notice::where("module", "=", 'active')->orderBy('id', 'desc')->paginate(3);
        $type = 'about';
        return view('sites.about.activelist', compact('breadcrumbs', 'notices', 'type'));
    }

    /**
     * 公司活动详细页
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showActiveDetail($id)
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('active');
        $notice = Notice::find($id);
        $type = 'about';
        return view('sites.about.activedetail', compact('breadcrumbs', 'notice', 'type'));
    }

}
