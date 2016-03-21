@extends('admina.base')

@section('linkCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/dist/css/login.css')}}"/>
@stop

@section('bodyClass')
    class="login-bg"
@stop

@section('header')
    @include('admina.header')
@stop

@section('content')
    <div class="page-content">
        <div class="row">
            @include('admina.sider')
            <div class="col-md-10">
                <div class="row">
                    <div class="content-box-large">
                        <div class="panel-header">
                            <div class="panel-title">{{$rlt['siderTitle']}}</div>
                        </div>
                        <div class="panel-body">
                            {{ Form::open( array( 'url'=>url('/admina/postElememtSider',
                                                array('siderType'=>$rlt['siderUrl'])),
                                            'class'=>'form-horizontal',
                                            'role'=>'form')) }}
                            <div class="form-group">
                                {{ Form::label('title', '模块名称', array('class'=>'col-sm-2 control-label')) }}
                                <div class="col-sm-10">
                                    @if(is_null($rlt['sider']))
                                        {{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'模块名称')) }}
                                    @else
                                        {{ Form::text('title', $rlt['sider']->title, array('class'=>'form-control', 'placeholder'=>'模块名称')) }}
                                        {{ Form::hidden('siderId', $rlt['sider']->id)}}
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('kword', '模块关键词', array('class'=>'col-sm-2 control-label')) }}
                                <div class="col-sm-10">
                                    @if(is_null($rlt['sider']))
                                        {{ Form::text('kword', null, array('class'=>'form-control', 'placeholder'=>'模块关键词')) }}
                                    @else
                                        {{ Form::text('kword', $rlt['sider']->kword, array('class'=>'form-control', 'placeholder'=>'模块关键词')) }}
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('ctrl', '图标', array('class'=>'col-sm-2 control-label')) }}
                                <div class="col-sm-10">
                                    @foreach ($rlt['siderIcon'] as $key=>$icon)
                                        @if(($key+1)%20)
                                            @if(!is_null($rlt['sider']) && $rlt['sider']->ctrl == $icon)
                                                {{ Form::radio('ctrl', $icon, true) }}
                                            @else
                                                {{ Form::radio('ctrl', $icon) }}
                                            @endif
                                                {{ Html::tag('span', '', array('class'=>'glyphicon glyphicon-'.$icon)) }}
                                        @else
                                            {{ Form::radio('ctrl', $icon) }} {{ Html::tag('span', '', array('class'=>'glyphicon glyphicon-'.$icon)) }}
                                            {{ Html::tag('br','') }}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('kword', '上级模块', array('class'=>'col-sm-2 control-label')) }}
                                <div class="col-sm-10">
                                    @if(is_null($rlt['sider']))
                                        {{ Form::select('pid', $rlt['siders'], $rlt['pid'], array('class'=>'form-control')) }}
                                    @else
                                        {{ Form::select('pid', $rlt['siders'], $rlt['sider']->pid, array('class'=>'form-control')) }}
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    {{ Form::submit($rlt['siderButton'], array('class'=>'btn btn-primary')) }}
                                    {{--button('ctrl', null, array('class'=>'form-control', 'placeholder'=>'图标')) }}--}}
                                    {{--button($value = null, $options = [])--}}
                                    {{--<button type="submit" class="btn btn-primary">Sign in</button>--}}
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    @include('admina.footer')
@stop

@section('script')
    @include('admina.script')
@stop
