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
                        {{ Form::open(array('url'=>'admina/register', 'class'=>'form-signup')) }}
                        <div class="content-wrap">
                            <h6 class="col-md-6 col-md-offset-3">Register</h6>
                            <ul>
                                {{--@foreach($errors->all() as $error)--}}
                                {{--<li>{{ $error }}</li>--}}
                                {{--@endforeach--}}
                            </ul>
                            {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'用户名')) }}
                            {{--{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'邮箱')) }}--}}
                            {{ Form::text('password', null,array('class'=>'form-control', 'placeholder'=>'密码')) }}
                            {{ Form::text('password_confirmation', null,array('class'=>'form-control', 'placeholder'=>'确认密码')) }}
                            {{ Form::submit('马上注册',array('class'=>'btn btn-large btn-success btn-block')) }}

                        </div>
                        {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    @if(Session::has('message'))
        <p class="alert">{{ Session::get('message') }}</p>
        {{--{{  dd($errors); }}--}}
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    @endif
    {{--{{ $content }}--}}
</div>
    {{--@if(is_null($errors)&&$errors->any())--}}
    {{--<ul class="list-group">--}}
        {{--@foreach($errors->all() as $error)--}}
            {{--<li class="list-group-item list-group-item-danger">{{ $error }}</li>--}}
        {{--@endforeach--}}
    {{--</ul>--}}
    {{--@endif--}}
@stop