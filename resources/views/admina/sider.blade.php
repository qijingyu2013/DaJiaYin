<div class="col-md-2">
    <div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->
            @if(!is_null($rlt['siderLeft']))
            @foreach ($rlt['siderLeft'] as $sider)
                <li class="{{$sider->kword}} submenu current open">
                    <a href="index.html"><i class="glyphicon glyphicon-home"></i> 控制面板
                        <span class="caret pull-right"></span>
                    </a>
                    <ul>
                        @foreach ($sider['siderLeft'] as $sider)
                        <li class="current"><a href="status.html">网站运维</a></li>
                        <li><a href="sider.html">侧边栏管理</a></li>
                        @endforeach
                    </ul>
                </li>


            @endforeach
            @endif

            <li class="submenu current open">
                <a href="index.html"><i class="glyphicon glyphicon-home"></i> 控制面板
                    <span class="caret pull-right"></span>
                </a>
                <ul>
                    <li class="current"><a href="status.html">网站运维</a></li>
                    <li><a href="sider.html">侧边栏管理</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> 关于大家银
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="calender.html">大家银金属</a></li>
                    <li><a href="signup.html">奖项及其认证</a></li>
                    <li><a href="signup.html">大家银优势</a></li>
                    <li><a href="signup.html">大家银最新公告</a></li>
                    <li><a href="signup.html">媒体报道</a></li>
                    <li><a href="signup.html">研发团队</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> 产品中心
                    <span class="caret pull-right"></span>
                </a>
                <ul>
                    <li><a href="calender.html">金山工业云微盘</a></li>
                    <li><a href="signup.html">奖项及其认证</a></li>
                    <li><a href="signup.html">大家银优势</a></li>
                    <li><a href="signup.html">大家银最新公告</a></li>
                    <li><a href="signup.html">媒体报道</a></li>
                    <li><a href="signup.html">研发团队</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#">
                    <i class="glyphicon glyphicon-list"></i> 市场动态
                    <span class="caret pull-right"></span>
                </a>
                <!-- Sub menu -->
                <ul>
                    <li><a href="calender.html">财经日历</a></li>
                    <li><a href="calender.html">大家银日刊</a></li>
                    <li><a href="calender.html">当日点评</a></li>
                    <li><a href="calender.html">专家点评</a></li>
                    <li><a href="signup.html">市场最新资讯</a></li>
                    {{--<li><a href="signup.html">行情走势</a></li>--}}
                    {{--<li><a href="signup.html">市场咨询</a></li>--}}
                    {{--<li><a href="signup.html">视频课程</a></li>--}}
                    {{--<li><a href="signup.html">专家评论</a></li>--}}
                    {{--<li><a href="signup.html">公司活动</a></li>--}}
                    {{--<li><a href="signup.html">研发活动</a></li>--}}
                    {{--<li><a href="signup.html">荣誉奖项</a></li>--}}
                    {{--<li><a href="signup.html">合作伙伴</a></li>--}}
                </ul>
            </li>


        </ul>
    </div>
</div>

