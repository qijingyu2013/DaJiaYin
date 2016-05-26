@extends('sites.base')
@section('link')
    @include('sites.base.link')
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
                    {{--<p class="text-center"></p>--}}
                    {{--<p class="lead"></p>--}}

                    <div class="col-md-10">
                        <div class="row">
                            <div class="content-box-large  comm-top box-bottom">
                                <div class="panel-heading">
                                    <div class="panel-title text-center"><h3>{!! $award->title !!}</h3></div>
                                </div>
                                <div class="panel-body lead ">
                                    {!! $award->content !!}
                                </div>
                                <div class="text-center">
                                    <a class="btn btn-primary" href="{{ URL::previous() }}">
                                        <i class="fa fa-save"></i>返回
                                    </a>
                                </div>
                            </div>
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
            //on resize, move search and top nav position according to window width
//            var resizing = false;
//            moveNavigation();
//            $(window).on('resize', function(){
//                if( !resizing ) {
//                    (!window.requestAnimationFrame) ? setTimeout(moveNavigation, 300) : window.requestAnimationFrame(moveNavigation);
//                    resizing = true;
//                }
//            });
//
//            //on window scrolling - fix sidebar nav
//            var scrolling = true;
//            checkScrollbarPosition();
//            $(window).on('scroll', function(){
//                if( !scrolling ) {
//                    (!window.requestAnimationFrame) ? setTimeout(checkScrollbarPosition, 300) : window.requestAnimationFrame(checkScrollbarPosition);
//                    scrolling = true;
//                }
//            });

            //mobile only - open sidebar when user clicks the hamburger menu
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