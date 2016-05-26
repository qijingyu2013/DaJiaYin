<?php

namespace DaJiaYin\Http\Controllers\Admina;

use DaJiaYin\Http\Controllers\Controller;
use DaJiaYin\Http\Requests;
use DaJiaYin\Models\About;
use DaJiaYin\Models\Notice;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

/**模块->关于大家银
 * Class AboutController
 * @package DaJiaYin\Http\Controllers\Admina
 */
class MarketController extends Controller
{
    /**
     * 大家银日刊
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getJournalList()
    {
        $notices = Notice::where("module", "=", 'notice')->orderBy('id', 'desc')->paginate(10);
        return view('admina.about.noticelist', compact('notices'));
    }

    public function getJournal($id)
    {
        $siderTitle = '修改日刊';
        $siderButton = '修改';
        $siderUrl = 'update';
        $notice = Notice::find($id);
        return view('admina.about.noticedetail', compact('notice', 'siderUrl', 'siderTitle', 'siderButton'));
    }

    public function createJournal()
    {
        $siderTitle = '新增日刊';
        $siderButton = '添加';
        $siderUrl = 'create';
        return view('admina.about.noticedetail', compact('siderUrl', 'siderTitle', 'siderButton'));
    }

    public function postJournal($siderType)
    {
        if ($siderType == 'create') {
            $validator = Validator::make(Input::all(), Notice::$rules_create, Notice::$message_comm, Notice::$attributes_comm);
            if ($validator->passes()) {
                $notice = new Notice();//实例化Sider对象
                $notice->title = Input::get('title');
                $notice->content = Input::get('content');
                $notice->module = 'notice';
                $notice->author = 'admin';
                $notice->save();
                return Redirect::to('admina/about/notice')->with('message', '添加成功,这篇日刊的编号是' . $notice->getKey() . '!');
            } else {
                return Redirect::back()->withErrors($validator)->withInput();
            }
        } elseif ($siderType == 'update') {
            $validator = Validator::make(Input::all(), Notice::$rules_update);
            if ($validator->passes()) {
                $notice = Notice::find(Input::get('noticeId'));
                $notice->title = Input::get('title');
                $notice->content = Input::get('content');
                $notice->save();
                return Redirect::to('admina/about/notice')->with('message', '修改成功,这篇日刊的编号是' . $notice->getKey() . '!');
            } else {
                return Redirect::to('admina/about/getNotice/' . Input::get('noticeId'))->with('message', '请您正确填写下列数据')->withErrors($validator);//->withInput()
            }
        }
        return view('admina.sider.detail');
    }

    public function dropJournal($id)
    {
        $rlt = Notice::destroy($id);
        return Redirect::to('admina/about/notice')->with('message', '删除成功,这篇日刊的编号是' . $rlt . '!');
    }

    /**
     * 奖项列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getAwardList()
    {
        $awards = Notice::where("module", "=", 'award')->orderBy('id', 'desc')->paginate(10);
        return view('admina.about.awardlist', compact('awards'));
    }

    public function getAward($id)
    {
        $siderTitle = '修改公告';
        $siderButton = '修改';
        $siderUrl = 'update';
        $award = Notice::find($id);
        return view('admina.about.awarddetail', compact('award', 'siderUrl', 'siderTitle', 'siderButton'));
    }

    public function createAward()
    {
        $siderTitle = '新增奖项';
        $siderButton = '添加';
        $siderUrl = 'create';
        return view('admina.about.awarddetail', compact('siderUrl', 'siderTitle', 'siderButton'));
    }

    public function postAward($siderType)
    {
        if ($siderType == 'create') {
            $validator = Validator::make(Input::all(), Notice::$rules_create, Notice::$message_comm, Notice::$attributes_comm);
            if ($validator->passes()) {
                $notice = new Notice();//实例化Sider对象
                $notice->title = Input::get('title');
                $notice->content = Input::get('content');
                $notice->icon = Input::get('awardimage');
                $notice->author = 'admin';
                $notice->module = 'award';
                $notice->save();
                return Redirect::to('admina/about/award')->with('message', '添加成功,这篇奖项的编号是' . $notice->getKey() . '!');
            } else {
                return Redirect::back()->withErrors($validator)->withInput();
            }
        } elseif ($siderType == 'update') {
            $validator = Validator::make(Input::all(), Notice::$rules_update);
            if ($validator->passes()) {
                $notice = Notice::find(Input::get('noticeId'));
                $notice->title = Input::get('title');
                $notice->content = Input::get('content');
                $notice->icon = Input::get('awardimage');
                $notice->save();
                return Redirect::to('admina/about/award')->with('message', '修改成功,这篇奖项的编号是' . $notice->getKey() . '!');
            } else {
                return Redirect::to('admina/about/getAward/' . Input::get('awardId'))->with('message', '请您正确填写下列数据')->withErrors($validator);//->withInput()
            }
        }
        return view('admina.sider.detail');
    }

    public function dropAward($id)
    {
        $rlt = Notice::destroy($id);
        return Redirect::to('admina/about/award')->with('message', '删除成功,这篇奖项的编号是' . $rlt . '!');
    }

    /**
     * 媒体报道列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMediaList()
    {
        $notices = Notice::where("module", "=", 'media')->orderBy('id', 'desc')->paginate(10);
        return view('admina.about.medialist', compact('notices'));
    }

    public function getMedia($id)
    {
        $siderTitle = '修改报道';
        $siderButton = '修改';
        $siderUrl = 'update';
        $notice = Notice::find($id);
        return view('admina.about.mediadetail', compact('notice', 'siderUrl', 'siderTitle', 'siderButton'));
    }

    public function createMedia()
    {
        $siderTitle = '新增报道';
        $siderButton = '添加';
        $siderUrl = 'create';
        return view('admina.about.mediadetail', compact('siderUrl', 'siderTitle', 'siderButton'));
    }

    public function postMedia($siderType)
    {
        if ($siderType == 'create') {
            $validator = Validator::make(Input::all(), Notice::$rules_create, Notice::$message_comm, Notice::$attributes_comm);
            if ($validator->passes()) {
                $notice = new Notice();//实例化Sider对象
                $notice->title = Input::get('title');
                $notice->content = Input::get('content');
                $notice->module = 'media';
                $notice->author = 'admin';
                $notice->save();
                return Redirect::to('admina/about/media')->with('message', '添加成功,这篇报道的编号是' . $notice->getKey() . '!');
            } else {
                return Redirect::back()->withErrors($validator)->withInput();
            }
        } elseif ($siderType == 'update') {
            $validator = Validator::make(Input::all(), Notice::$rules_update);
            if ($validator->passes()) {
                $notice = Notice::find(Input::get('noticeId'));
                $notice->title = Input::get('title');
                $notice->content = Input::get('content');
                $notice->save();
                return Redirect::to('admina/about/media')->with('message', '修改成功,这篇报道的编号是' . $notice->getKey() . '!');
            } else {
                return Redirect::to('admina/about/getMedia/' . Input::get('mediaId'))->with('message', '请您正确填写下列数据')->withErrors($validator);//->withInput()
            }
        }
        return view('admina.sider.detail');
    }

    public function dropMedia($id)
    {
        $rlt = Notice::destroy($id);
        return Redirect::to('admina/about/media')->with('message', '删除成功,这篇报道的编号是' . $rlt . '!');
    }

    /**
     * 研发团队列表
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTeamList()
    {
        $awards = Notice::where("module", "=", 'team')->orderBy('id', 'desc')->paginate(10);
        return view('admina.about.teamlist', compact('awards'));
    }

    public function getTeam($id)
    {
        $siderTitle = '修改成员';
        $siderButton = '修改';
        $siderUrl = 'update';
        $award = Notice::find($id);
        return view('admina.about.teamdetail', compact('award', 'siderUrl', 'siderTitle', 'siderButton'));
    }

    public function createTeam()
    {
        $siderTitle = '新增成员';
        $siderButton = '添加';
        $siderUrl = 'create';
        return view('admina.about.teamdetail', compact('siderUrl', 'siderTitle', 'siderButton'));
    }

    public function postTeam($siderType)
    {
        if ($siderType == 'create') {
            $validator = Validator::make(Input::all(), Notice::$rules_create, Notice::$message_comm, Notice::$attributes_comm);
            if ($validator->passes()) {
                $notice = new Notice();//实例化Sider对象
                $notice->title = Input::get('title');
                $notice->content = Input::get('content');
                $notice->icon = Input::get('awardimage');
                $notice->author = 'admin';
                $notice->module = 'team';
                $notice->save();
                return Redirect::to('admina/about/team')->with('message', '添加成功,新增成员的编号是' . $notice->getKey() . '!');
            } else {
                return Redirect::back()->withErrors($validator)->withInput();
            }
        } elseif ($siderType == 'update') {
            $validator = Validator::make(Input::all(), Notice::$rules_update);
            if ($validator->passes()) {
                $notice = Notice::find(Input::get('noticeId'));
                $notice->title = Input::get('title');
                $notice->content = Input::get('content');
                $notice->icon = Input::get('awardimage');
                $notice->save();
                return Redirect::to('admina/about/team')->with('message', '修改成功,修改成员的编号是' . $notice->getKey() . '!');
            } else {
                return Redirect::to('admina/about/getTeam/' . Input::get('awardId'))->with('message', '请您正确填写下列数据')->withErrors($validator);//->withInput()
            }
        }
        return view('admina.sider.detail');
    }

    public function dropTeam($id)
    {
        $rlt = Notice::destroy($id);
        return Redirect::to('admina/about/team')->with('message', '删除成功,成员的编号是' . $rlt . '!');
    }

    /**大家银贵金属
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getContact()
    {
        $about = About::firstOrCreate(About::$rules_contact);
        return view('admina.about.contact', compact('about'));
    }

    /**
     * 修改功能
     * @return Redirect
     */
    public function postContact()
    {
        $validator = Validator::make(Input::all(), About::$rules_update);
        if ($validator->passes()) {
            $about = About::firstOrNew(About::$rules_contact);
            $about->content = Input::get('form_text');
            $about->module = Input::get('form_module');
            $about->save();
            return Redirect::to('admina/about/contact')->with('message', '修改成功!');
        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }
    }

    /**
     * @param $pid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getElememtList($pid)
    {
        $aboutLeft = About::where("pid", "=", 0)->with('hasManyAbouts')->get();
        $abouts = About::where("pid", "=", $pid)->paginate(10);
        $rlt = array('aboutLeft' => $aboutLeft, 'abouts' => $abouts);
        return view('admina.about.list', compact('rlt'));
    }

    public function createElememtAbout($pid)
    {
        $aboutLeft = About::where("pid", "=", 0)->with('hasManyAbouts')->get();
        $abouts = About::getAboutSelectList();
        $aboutIcon = About::getIconTag();
        $aboutUrl = 'create';
        $rlt = array('aboutLeft' => $aboutLeft, 'abouts' => $abouts, 'aboutTitle' => '新增侧边栏', 'aboutButton' => '添加', 'aboutIcon' => $aboutIcon, 'pid' => $pid, 'aboutUrl' => $aboutUrl);
        return view('admina.about.detail', compact('rlt'));
    }

    public function updateElememtAbout($id)
    {
        $aboutLeft = About::where("pid", "=", 0)->with('hasManyAbouts')->get();
        $abouts = About::getAboutSelectList();
        $aboutIcon = About::getIconTag();
        $about = About::find($id);
        $aboutUrl = 'update';
        $rlt = array('aboutLeft' => $aboutLeft, 'abouts' => $abouts, 'about' => $about, 'aboutTitle' => '修改侧边栏', 'aboutButton' => '修改', 'aboutIcon' => $aboutIcon, 'id' => $id, 'aboutUrl' => $aboutUrl);
        return view('admina.about.detail', compact('rlt'));
    }

    public function getElememtDetail()
    {

        return view('admina.about.detail');
    }

    public function postElememtDetail($aboutType)
    {
        if ($aboutType == 'create') {
            $validator = Validator::make(Input::all(), About::$rules_create);
            if ($validator->passes()) {
                $about = new About();//实例化About对象
                $about->title = Input::get('title');
                $about->ctrl = Input::get('ctrl');
                $about->kword = Input::get('kword');
                $about->pid = Input::get('pid');
                $about->save();
                return Redirect::to('admina/about')->with('message', '添加成功,这个栏目的编号是' . $about->getKey() . '!');
            } else {
                return Redirect::to('admina/createElememtAbout/' . Input::get('pid'))->with('message', '请您正确填写下列数据')->withErrors($validator)->withInput();
            }
        } elseif ($aboutType == 'update') {
            $validator = Validator::make(Input::all(), About::$rules_update);
            if ($validator->passes()) {
                $about = About::find(Input::get('aboutId'));
                $about->title = Input::get('title');
                $about->ctrl = Input::get('ctrl');
                $about->kword = Input::get('kword');
                $about->pid = Input::get('pid');
                $about->save();
                return Redirect::to('admina/about')->with('message', '修改成功,这个栏目的编号是' . $about->getKey() . '!');
            } else {
                return Redirect::to('admina/updateElememtAbout/' . Input::get('aboutId'))->with('message', '请您正确填写下列数据')->withErrors($validator)->withInput();
            }
        }
        return view('admina.about.detail');
    }

    public function store(CreateArticleRequest $request)
    {
        Article::create($request->all());
        return redirect('admina/index');
    }
}
