<style>
    .linear {
        width: 100%;
        height: 150px;
        FILTER: progid: DXImageTransform . Microsoft . Gradient(gradientType = 0, startColorStr = #c81f26, endColorStr = #b41e21); /*IE 6 7 8*/
        background: -ms-linear-gradient(top, #c81f26, #b41e21); /* IE 10 */
        background: -moz-linear-gradient(top, #c81f26, #b41e21); /*火狐*/
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#c81f26), to(#b41e21)); /*谷歌*/
        background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#c81f26), to(#b41e21)); /* Safari 4-5, Chrome 1-9*/
        background: -webkit-linear-gradient(top, #c81f26, #b41e21); /*Safari5.1 Chrome 10+*/
        background: -o-linear-gradient(top, #c81f26, #b41e21); /*Opera 11.10+*/
    }
</style>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            {{ Html::link(url('#'), '立即开户！', array('class'=>'navbar-brand')) }}
        </div>
        <div id="scamp-navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
                <ul class="nav navbar-nav navbar-right ">
                    <li>
                        <i class="fa fa-edit"></i>{{ Html::link(url('/about/aboutMe'), '网站首页' ) }}
                    </li>
                    <li>
                        <i class="fa fa-users"></i>{{ Html::link(url('/about/aboutMe'), '加入收藏' ) }}
                    </li>
                    <li>
                        <i class="fa fa-eye"></i>{{ Html::link(url('/about/aboutMe'), '留言板' ) }}
                    </li>
                    <li>
                        <i class="fa fa-envelope"></i>{{ Html::link(url('/about/aboutMe'), '分享' ) }}
                    </li>
                </ul>
            </ul>
        </div>
    </div>
    <div class="container linear">

    </div>

</nav>


{{--<div class="header">--}}
{{--<div class="container">--}}
{{--<div class="col-lg-5 col-md-5">--}}
{{--<!-- Logo -->--}}
{{--<div class="header_text_left">--}}
{{--<h4><a href="index.html">立即开户！</a></h4>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-lg-7 col-md-7">--}}
{{--<div class="row">--}}
{{--<div class="col-lg-12 header_text_right">--}}
{{--<h4>--}}
{{--<a href="index.html">网站首页</a>--}}
{{--<a href="index.html">加入收藏</a>--}}
{{--<a href="index.html">留言板</a>--}}
{{--<a href="index.html">分享</a>--}}
{{--</h4>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="row">--}}

{{--</div>--}}
{{--</div>--}}
{{--</div>--}}