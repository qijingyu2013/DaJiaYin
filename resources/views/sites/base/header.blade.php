<nav class="navbar navbar-custom">
    <div class="container ">
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

    <div class="container linelogo">
        <div class="row ">
            <div class="col-md-2 col-md-push-2 center-vertical">
                <img src="/assets/dist/img/logo.png" class="img-responsive center-block "/>
            </div>
            <div class="col-md-8">
            </div>
            <div class="col-md-2">{{----}}
                <img src="/assets/dist/img/telephone.png" class="img-responsive center-block"/>
            </div>
        </div>
    </div>

    <div class="container linear">
        <div id="navbar-collapse-1" class="navbar-collapse collapse">
            <ul class="nav navbar-nav col-md-8 col-md-push-2">
                @if(!is_null($siderLeft))
                    @foreach ($siderLeft as $sider)
                        <li class="dropdown">
                            {{ Html::link('/'.$sider->kword.'/'.$sider->kword,
                                $sider->title,
                                array('data-toggle'=>"dropdown",
                                    'class'=>"dropdown-toggle linear-dropdown-toggle")) }}
                            @if(!is_null($sider->hasManySiders) && count($sider->hasManySiders)>0)
                                <ul role="menu" class="dropdown-menu">
                                    @foreach ($sider->hasManySiders as $sider_son)
                                        <li>{{ Html::link('/admina/'.$sider->kword.'/'.$sider_son->kword, $sider_son->title, array('tabindex'=>"-1")) }}</li>
                                    @endforeach
                                </ul>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

    <div class="container linenotic">

    </div>


</nav>

<div class="container linebreadcrumb">
    <div class="col-md-3 col-md-push-3">
        <ol class="breadcrumb breadcrumb_white">
            <li><a href="#">Home</a></li>
            <li><a href="#">2013</a></li>
            <li class="active">十一月</li>
        </ol>
    </div>
</div>