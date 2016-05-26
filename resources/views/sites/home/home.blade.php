@extends('sites.base')
@section('link')
    @include('sites.base.link')
@stop
@section('header')
    @include('sites.base.header')
@stop
@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-md-8">
                <div class="row text-center hidden-xs">
                    <div class="col-xs-1">
                        <div class="title-tag"></div>
                    </div>
                    <div class="col-xs-2"><h3>财经日刊</h3></div>
                    <div class="col-xs-8">
                        <div class="title-magazine"></div>
                    </div>
                    <div class="col-xs-1">
                        <div class="title-more"></div>
                    </div>
                </div>
                @foreach($marketinformations as $marketinformation)
                    <div class="row">
                        <div class="col-md-4">
                            <p class="text-left">
                                {{ $marketinformation->published_at }}
                            </p>
                        </div>
                        <div class="col-md-2">
                            <p class="text-center">
                                国内
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-left">
                                {{ $marketinformation->title }}
                            </p>
                        </div>
                    </div>
                @endforeach
                <div class="row text-center hidden-xs">
                    <div class="col-xs-1">
                        <div class="title-tag"></div>
                    </div>
                    <div class="col-xs-2"><h3>实时行情</h3></div>
                    <div class="col-xs-8">
                        <div class="title-magazine"></div>
                    </div>
                    <div class="col-xs-1">
                        <div class="title-more"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="trendchart" id="trendchart" style="height: 320px;width: 100%;"></div>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="row text-center hidden-xs">
                            <div class="col-xs-1">
                                <div class="title-tag"></div>
                            </div>
                            <div class="col-xs-6"><h3><span>市场资讯</span> <span>投资百科</span></h3></div>
                            {{--<div class="col-xs-7"><div class="title-magazine"></div></div>--}}
                            {{--<div class="col-xs-1"><div class="title-more"></div> </div>--}}
                        </div>
                    </div>
                    <div class="col-xs-4">

                    </div>
                </div>

                @foreach($marketinformations as $marketinformation)
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-left">
                            <li class="list-style-block">{{ $marketinformation->title }}</li>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p class="text-left">
                                {{ $marketinformation->published_at }}
                            </p>
                        </div>
                    </div>
                @endforeach
                <div class="row text-center hidden-xs">
                    <div class="col-xs-1">
                        <div class="title-tag"></div>
                    </div>
                    <div class="col-xs-4"><h3><span>专家评论</span> <span>实战分析</span></h3></div>
                    {{--<div class="col-xs-7"><div class="title-magazine"></div></div>--}}
                    {{--<div class="col-xs-1"><div class="title-more"></div> </div>--}}
                </div>

                <div class="row">
                    <div class="mid-banner"></div>
                </div>

            </div>
            <div class="col-md-1">
                <div class="title-server"></div>
            </div>
            <div class="col-md-3">
                <div class="row " style="text-align: center;">
                    <h3><strong style="color: red">客服热线电话</strong></h3>

                    <h3><strong style="color: red">400-855-0808</strong></h3>
                </div>
                <div class="row" style="text-align: center;">
                    <br>
                    <a class="btn btn-warning btn-lg" role="button" style="width: 120px;"><h4>在线客服</h4></a><br>
                    <br>
                    <a class="btn btn-warning btn-lg" role="button" style="width: 120px;"><h4>QQ客服</h4></a><br>
                    <br>
                    周一至周五 09:00-21:00 ，节假日休息
                    <br>
                    <br><br>
                </div>
                <div class="row " style="text-align: center;">
                    <img src="{{ asset('/assets/dist/img/直播室.png') }}"><br><br>
                    <img src="{{ asset('/assets/dist/img/直播室.png') }}"><br><br>
                    <img src="{{ asset('/assets/dist/img/直播室.png') }}"><br><br>
                    <img src="{{ asset('/assets/dist/img/直播室.png') }}"><br><br>
                </div>
                <div class="row">
                    <div class="col" style="text-align: center;">
                        <h3>公司活动-新闻</h3>
                        </br>
                    </div>
                    <div class="col">

                        <div class="row">
                            <div class="col-md-12">
                                <ul>
                                    @foreach($actives as $active)
                                        <li class="list-style-block">{{ $active->title }}</li>
                                    @endforeach
                                </ul>
                                {{--<p class="text-left">--}}
                                {{----}}
                                {{--</p>--}}
                            </div>
                            {{--<div class="col-md-4">--}}
                            {{--<p class="text-left">--}}
                            {{--{{ $active->published_at }}--}}
                            {{--</p>--}}
                            {{--</div>--}}
                        </div>

                    </div>
                </div>
                {{--<p class="text-center">--}}
                {{--<em>Git</em>是一个分布式的版本控制系统，最初由<strong>Linus Torvalds</strong>编写，用作Linux内核代码的管理。在推出后，Git在其它项目中也取得了很大成功，尤其是在Ruby社区中。--}}
                {{--</p>--}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">


            </div>
            <div class="col-md-8">
                <div id="carousel" class="poster-main">
                    {{--<div class="poster-btn poster-prev-btn" onclick="galleryspin('-')"></div>--}}
                    <figure id="spinner">
                        @foreach($teams as $team)
                            <figure>
                                <img src="{{ asset('/uploads/data/image/'.$team->icon) }}" alt="">
                                <figcaption>{{ $team->title }}</figcaption>
                            </figure>
                        @endforeach
                    </figure>
                    {{--<div class="poster-btn poster-prev-btn" onclick="galleryspin('-')"></div>--}}
                </div>
                <span style=float:left class=ss-icon onclick="galleryspin('-')">&lt;</span>
                <span style=float:right class=ss-icon onclick="galleryspin('')">&gt;</span>


            </div>
        </div>
        <div class="row">
            <div class="col-xs-1">
                <div class="title-tag"></div>
            </div>
            <div class="col-xs-4"><h3>合作伙伴</h3></div>
        </div>
        <div class="row" style="height: 80px;">
            <img src="{{ asset('/assets/dist/img/合作伙伴.png') }}">
            <img src="{{ asset('/assets/dist/img/合作伙伴.png') }}">
            <img src="{{ asset('/assets/dist/img/合作伙伴.png') }}">
            <img src="{{ asset('/assets/dist/img/合作伙伴.png') }}">
            <img src="{{ asset('/assets/dist/img/合作伙伴.png') }}">
            <img src="{{ asset('/assets/dist/img/合作伙伴.png') }}">
            <img src="{{ asset('/assets/dist/img/合作伙伴.png') }}">
            <img src="{{ asset('/assets/dist/img/合作伙伴.png') }}">
        </div>
    </div>
@stop
@section('footer')
    @include('sites.base.footer')
@stop
@section('script')
    @include('sites.base.script')
    {!! Html::script( asset('/assets/dist/js/echarts.js') ) !!}
    {!! Html::script( asset('/assets/dist/js/prefixfree.min.js') ) !!}
    <script>
        var spinner = document.querySelector('#spinner');
        var angle = 0;
        var numpics = $('figure#spinner figure').length;
        degInt = 360 / numpics;
        var start = 0;
        var current = 1;
        $(function () {
            function getDateTime(tdate) {
                var year = tdate.getFullYear();
                var month = tdate.getMonth() + 1;
                var date = tdate.getDate();
                var hour = tdate.getHours();
                var minute = tdate.getMinutes();
                var second = tdate.getSeconds();
                return year + "-" + month + "-" + date + " " + hour + ":" + minute + ":" + second;
            }

            var myChart = echarts.init(document.getElementById("trendchart"));
            var now = new Date();
            var option = {
                title: {
                    text: '大圆银100千克',
//                    subtext: '纯属虚构'
                }
                ,
                tooltip: {
                    trigger: 'axis'
                },
//                legend: {
//                    data:['成交']
//                },
                toolbox: {
                    show: false,
                    feature: {
                        mark: {show: false},
                        dataView: {show: true, readOnly: false},
                        magicType: {show: false, type: ['line']},
                        restore: {show: false},
                        saveAsImage: {show: false}
                    }
                },
                calculable: true,
                xAxis: [
                    {
                        type: 'category',
                        boundaryGap: false,
//                        data: function() {
//                            var list = [];
//                            foreach(){
//
//                            }
//                        }
                        data: ['06:00', '12:00', '18:00', '24:00', '05:30']
//                                function(){
//                            var list = [];
//                        }
                    }
                ],
                yAxis: [
                    {
                        scale: true,
                        type: 'value',
                        splitNumber: 5,
                        boundaryGap: [0.1, 0.1]
                    }
                ],
                series: [
                    {
                        name: '成交',
                        type: 'line',
                        smooth: true,
                        itemStyle: {normal: {areaStyle: {type: 'default'}}},
                        symbol: 'none',
                        data: [3586, 3566, 3596, 3606]
//                                [['06:05',3586], ['06:15',3566], ['06:25',3596], ['06:35',3606]]
                    }
                ]
            };
            myChart.setOption(option);

            // 动态数据接口 addData
            setInterval(function () {
                $.ajax({
                    url: '{{ url('/activeData') }}',
                    type: "get",
                    dataType: 'json',
                    async: false,
                    success: function (data) {
                        if (typeof (data) != "undefined") {
                            $.each(data, function (i, item) {
                                if (item.name == 'JSAG3') {
                                    //                                                    alert(item.price);
                                    var x = item.time,
                                            y = item.price;

                                    axisData = (new Date()).toLocaleTimeString().replace(/^\D*/, '');

//                                    myChart.addData([
//                                        [
//                                            0,        // 系列索引
//                                            item.price, // 新增数据
//                                            false,    // 新增数据是否从队列头部插入
//                                            true,    // 是否增加队列长度，false则自定删除原有数据，队头插入删队尾，队尾插入删队头
//                                            item.time //hh+':'+mm   // 坐标轴标签
//                                        ]
//                                    ]);

//                                series.addPoint([x, y], true, true);
                                }
                            });
                        }
                    }
                });
            }, 1000 * 60);

            $('figure#spinner figure').each(function () {
                $(this).css('-webkit-transform', 'rotateY(-' + start + 'deg)');
                $(this).css('transform', 'rotateY(-' + start + 'deg)');
                start = start + degInt;
            });

        });


        function setCurrent(current) {
            $('figure#spinner figure:nth-child(' + current + ')').addClass('current');
        }
        function galleryspin(sign) {
            $('figure#spinner figure').removeClass('current focus caption');
            if (!sign) {
                angle = angle + degInt;
                current = current + 1;
                if (current > numpics) {
                    current = 1;
                }
            } else {
                angle = angle - degInt;
                current = current - 1;
                if (current == 0) {
                    current = numpics;
                }
            }
            spinner.setAttribute('style', '-webkit-transform: rotateY(' + angle + 'deg); -moz-transform: rotateY(' + angle + 'deg); transform: rotateY(' + angle + 'deg)');
            setCurrent(current);
        }
        $('figure#spinner figure').click(function () {
            if ($(this).hasClass('current')) {
                $(this).toggleClass('focus');
            }
        });
        setCurrent(1);
        //        $(document).keydown(function (e) {
        //            switch (e.which) {
        //                case 37:
        //                    galleryspin('-');
        //                    break;
        //                case 39:
        //                    galleryspin('');
        //                    break;
        //                case 90:
        //                    $('figure#spinner figure.current').toggleClass('focus');
        //                    break;
        //                case 67:
        //                    $('figure#spinner figure.current').toggleClass('caption');
        //                    break;
        //                default:
        //                    return;
        //            }
        //            e.preventDefault();
        //        });

    </script>
@stop