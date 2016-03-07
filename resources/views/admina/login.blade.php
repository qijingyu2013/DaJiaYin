@extends('admina.base')
@section('linkCss')
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/dist/css/login.css')}}"/>
@stop
@section('bodyClass')
class="login-bg"
@stop
@section('content')
<div class="page-content container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-wrapper">
                <div class="box">
                    <form action="{{url('/admina/login')}}" method="post">
                        <div class="content-wrap">
                            <h6 class="col-md-6 col-md-offset-3">后台系统</h6>
                            <input class="form-control" name="username" type="text" placeholder="用户名">
                            <input class="form-control" name="password" type="password" placeholder="密码">
                            <div class="action">
                                <button class="btn btn-primary signup">Login</button>
                            </div>                
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    @if(Session::has('message'))
        <p class="alert">{{ Session::get('message') }}</p>
    @endif
    {{--{{ $content }}--}}
</div>
@stop