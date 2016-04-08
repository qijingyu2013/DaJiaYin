<!DOCTYPE html>
<html lang="zh-hans">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="edge"/>
    @yield('link')
    @yield('title')
</head>
<body>
@yield('header')
@yield('content')
@yield('footer')
@yield('script')
</body>
</html>