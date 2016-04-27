<!DOCTYPE html>
<html lang="zh-hans">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="edge" />
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        @yield('linkCss')

        {{--<link href="{{ asset('admin-assets/dist/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />--}}
        <title>后台系统登录界面</title>
    </head>
    <body @yield('bodyClass') >
        @yield('header')
        @yield('content')
        @yield('footer')
        @yield('script')
    </body>
</html>
