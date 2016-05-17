@extends('sites.base')
@section('link')
    @include('sites.base.link')
    {!! Html::style('assets/dist/css/timeline.css') !!}
@stop
@section('header')
    @include('sites.base.header')
@stop
@section('content')
    <div class="container modal-content">
        <main class="cd-main-content">
            <div class="row">
                @include('sites.base.sider')
                <div class="col-md-7 content-box-custom">
                    <div class="row">
                        <div class="list-group col-md-11 col-md-push-1 list-group-no-shadow">
                            <div class="list-group"></div>
                            <div id="timeline">
                                @if(!empty($journals))
                                    @foreach ($journals as $journal)
                                        <div class="timeline-item">
                                            <div class="timeline-icon"> {!! Html::image('assets/dist/img/book.svg') !!} </div>
                                            <div class="timeline-content right">
                                                <h2>{{ $journal->published_at }}</h2>

                                                <p> {{ $journal->title }} </p>
                                                {{ Html::link(asset( '/uploads/data/file/'.$journal->icon), '下载', array('class'=>'btn', 'target'=>'_blank')) }}
                                                {{--<a href="#" class="btn">下载</a>--}}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            {{--@if(!empty($journals))--}}
                            {{--@foreach ($journals as $journal)--}}
                            {{--<div class="list-group list-group-no-shadow">--}}
                            {{--<a href="{{ url('about/notice', array('id'=> $journal->id)) }}"--}}
                            {{--class="list-group-item list-group-item-no-border">--}}
                            {{--<div class="row">--}}
                            {{--<h4 class="list-group-item-heading"><span--}}
                            {{--class="pull-left">{{ $journal->title }}</span><span--}}
                            {{--class="pull-right">{{ $journal->created_at }}</span></h4>--}}
                            {{--</div>--}}
                            {{--<div class="row">--}}
                            {{--<p class="list-group-item-text">{{ $journal->transferContent() }}</p>--}}
                            {{--</div>--}}
                            {{--</a>--}}
                            {{--</div>--}}
                            {{--@endforeach--}}
                            {{--@endif--}}
                        </div>
                        <div class="panel-body text-center">
                            {{--{{ $journals->links() }}--}}
                        </div>
                    </div>
                </div>
                @include('sites.base.right')
            </div>
        </main>
    </div>
@stop
@section('footer')
    @include('sites.base.footer')
@stop
@section('script')
    @include('sites.base.script')
    <script>
        jQuery(document).ready(function () {
            $(document).on('click', '.yamm .dropdown-menu', function (e) {
                e.stopPropagation()
            })
            //cache DOM elements
            var mainContent = $('.cd-main-content'),
                    header = $('.cd-main-header'),
                    sidebar = $('.cd-side-nav'),
                    sidebarTrigger = $('.cd-nav-trigger'),
                    topNavigation = $('.cd-top-nav'),
                    searchForm = $('.cd-search'),
                    accountInfo = $('.account'),
                    modalContent = $('.modal-content');
            sidebar.css('height', modalContent.css('height'));
            sidebarTrigger.on('click', function (event) {
                event.preventDefault();
                $([sidebar, sidebarTrigger]).toggleClass('nav-is-visible');
            });

            //click on item and show submenu
            $('.has-children > a').on('click', function (event) {
                var mq = checkMQ(),
                        selectedItem = $(this);
                if (mq == 'mobile' || mq == 'tablet') {
                    event.preventDefault();
                    if (selectedItem.parent('li').hasClass('selected')) {
                        selectedItem.parent('li').removeClass('selected');
                    } else {
                        sidebar.find('.has-children.selected').removeClass('selected');
                        accountInfo.removeClass('selected');
                        selectedItem.parent('li').addClass('selected');
                    }
                }
            });

            //click on account and show submenu - desktop version only
            accountInfo.children('a').on('click', function (event) {
                var mq = checkMQ(),
                        selectedItem = $(this);
                if (mq == 'desktop') {
                    event.preventDefault();
                    accountInfo.toggleClass('selected');
                    sidebar.find('.has-children.selected').removeClass('selected');
                }
            });

            $(document).on('click', function (event) {
                if (!$(event.target).is('.has-children a')) {
                    sidebar.find('.has-children.selected').removeClass('selected');
                    accountInfo.removeClass('selected');
                }
            });

            //on desktop - differentiate between a user trying to hover over a dropdown item vs trying to navigate into a submenu's contents
            sidebar.children('ul').menuAim({
                activate: function (row) {
                    $(row).addClass('hover');
                },
                deactivate: function (row) {
                    $(row).removeClass('hover');
                },
                exitMenu: function () {
                    sidebar.find('.hover').removeClass('hover');
                    return true;
                },
                submenuSelector: ".has-children",
            });

            function checkMQ() {
                //check if mobile or desktop device
                return window.getComputedStyle(document.querySelector('.cd-main-content'), '::before').getPropertyValue('content').replace(/'/g, "").replace(/"/g, "");
            }

            function moveNavigation() {
                var mq = checkMQ();

                if (mq == 'mobile' && topNavigation.parents('.cd-side-nav').length == 0) {
                    detachElements();
                    topNavigation.appendTo(sidebar);
                    searchForm.removeClass('is-hidden').prependTo(sidebar);
                } else if (( mq == 'tablet' || mq == 'desktop') && topNavigation.parents('.cd-side-nav').length > 0) {
                    detachElements();
                    searchForm.insertAfter(header.find('.cd-logo'));
                    topNavigation.appendTo(header.find('.cd-nav'));
                }
                checkSelected(mq);
                resizing = false;
            }

            function detachElements() {
                topNavigation.detach();
                searchForm.detach();
            }

            function checkSelected(mq) {
                //on desktop, remove selected class from items selected on mobile/tablet version
                if (mq == 'desktop') $('.has-children.selected').removeClass('selected');
            }

            function checkScrollbarPosition() {
                var mq = checkMQ();

                if (mq != 'mobile') {
                    var sidebarHeight = sidebar.outerHeight(),
                            windowHeight = $(window).height(),
                            mainContentHeight = mainContent.outerHeight(),
                            scrollTop = $(window).scrollTop();

                    ( ( scrollTop + windowHeight > sidebarHeight ) && ( mainContentHeight - sidebarHeight != 0 ) ) ? sidebar.addClass('is-fixed').css('bottom', 0) : sidebar.removeClass('is-fixed').attr('style', '');
                }
                scrolling = false;
            }
        });
    </script>

@stop