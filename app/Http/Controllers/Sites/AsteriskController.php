<?php

namespace DaJiaYin\Http\Controllers\Sites;

use DaJiaYin\Http\Controllers\Controller;
use DaJiaYin\Http\Requests;
use DaJiaYin\Models\Award;
use DaJiaYin\Models\Notice;
use DaJiaYin\Models\Sider;

//use DaJiaYin\Logic\Article;

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
     * 新闻公告列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDaycomments()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('daycomments');
        $notices = Notice::where("module", "=", 'daycomment')->orderBy('id', 'desc')->paginate(10);
        $type = 'asterisk';
        return view('sites.asterisk.daycommentslist', compact('breadcrumbs', 'notices', 'type'));
    }

    /**
     * 新闻公告详细页
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showDaycommentDetail($id)
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('daycomments');
        $notice = Notice::find($id);
        $type = 'asterisk';
        return view('sites.asterisk.daycommentdetail', compact('breadcrumbs', 'notice', 'type'));
    }

    /**
     * 新闻公告列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showMarketinformation()
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('marketinformation');
        $notices = Notice::where("module", "=", 'marketinformation')->orderBy('id', 'desc')->paginate(10);
        $type = 'asterisk';
        return view('sites.asterisk.marketinformationlist', compact('breadcrumbs', 'notices', 'type'));
    }

    /**
     * 新闻公告详细页
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showMarketinformationDetail($id)
    {
        $Sider = new Sider();
        $breadcrumbs = $Sider->getBreadcrumbs('marketinformation');
        $notice = Notice::find($id);
        $type = 'asterisk';
        return view('sites.asterisk.marketinformationdetail', compact('breadcrumbs', 'notice', 'type'));
    }

}
