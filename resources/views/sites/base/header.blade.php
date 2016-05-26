<header>
<nav class="navbar navbar-custom">
    <div class="container ">
        <div class="navbar-header">
            {{--{{ Html::link(url('#'), '立即开户！', array('class'=>'navbar-brand')) }}--}}
        </div>
        <div id="scamp-navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right">
                <ul class="nav navbar-nav navbar-right ">
                    <li>
                        <i class="fa fa-edit"></i>{{ Html::link(url('/home'), '网站首页' ) }}
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
                <li class="dropdown">{{ Html::link(url(''), '首页', array('data-toggle'=>"dropdown",
                                        'class'=>"dropdown-toggle linear-dropdown-toggle click_my_self")) }}</li>
                @if(!is_null($siderLeft))
                    @foreach ($siderLeft as $sider)
                        @if($sider->kword != 'operation')
                            <li class="dropdown">
                                {{ Html::link('/'.$sider->kword.'/'.$sider->kword,
                                    $sider->title,
                                    array('data-toggle'=>"dropdown",
                                        'class'=>"dropdown-toggle linear-dropdown-toggle")) }}
                                @if(!is_null($sider->hasManySiders) && count($sider->hasManySiders)>0)
                                    <ul role="menu" class="dropdown-menu dropdown-menu-custom">
                                        @foreach ($sider->hasManySiders as $sider_son)
                                            <li>{{ Html::link('/'.$sider->kword.'/'.$sider_son->kword, $sider_son->title, array('tabindex'=>"-1")) }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    @if(empty($breadcrumbs))
        <div id="djyCarousel" class="carousel slide">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators">
                <li data-target="#djyCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#djyCarousel" data-slide-to="1"></li>
                <li data-target="#djyCarousel" data-slide-to="2"></li>
            </ol>
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">
                <div class="item active">
                    {{--                    {{ Html::image(asset('/uploads/data/image/'.$notice->icon), $notice->icon, array( 'class'=>"img-rounded img-responsive center-block", 'height'=>'222px', 'width'=>'222px')) }}--}}
                    {{ Html::image(asset('/uploads/data/image/201503201642484248.jpg'), 'First slide', array( 'class'=>"col-md-12 carousel-no-pad")) }}
                </div>
                <div class="item">
                    {{ Html::image(asset('/uploads/data/image/201508201018391839.png'), 'Second slide', array( 'class'=>"col-md-12 carousel-no-pad")) }}
                </div>
                <div class="item">
                    {{ Html::image(asset('/uploads/data/image/201605031534203420.jpg'), 'Third slide', array( 'class'=>"col-md-12 carousel-no-pad")) }}
                </div>
            </div>
            <!-- 轮播（Carousel）导航 -->
            <a class="carousel-control left" href="#djyCarousel"
               data-slide="prev"></a>
            <a class="carousel-control right" href="#djyCarousel"
               data-slide="next"></a>
        </div>
    @endif
    <div class="container linenotic">

    </div>


</nav>
@if(!empty($breadcrumbs))
<div class="container linebreadcrumb">
    <div class="col-md-3 col-md-push-3">
        <ol class="breadcrumb breadcrumb_white">
            <li>{{ Html::link('', '首页') }}</li>

            @foreach($breadcrumbs as $sider)
                @if($sider->mintarget)
                    <li>{!! $sider->title !!}</li>
                @else
                    <li>{{ Html::link('/'.$type.'/'.$sider->kword, $sider->title) }}</li>
                @endif
            @endforeach
        </ol>
    </div>
</div>
@endif
</header>