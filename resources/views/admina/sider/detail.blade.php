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
                            <div class="panel-title">{{$siderTitle}}</div>
                        </div>
                        <div class="panel-body">
                            {{ Form::open( array( 'url'=>url('/admina/operation/postElememtSider',
                                                array('siderType'=>$siderUrl)),
                                            'class'=>'form-horizontal',
                                            'role'=>'form')) }}
                            <fieldset>
                            @if (!empty($errors) && count($errors) > 0)
                            <div class="form-group has-error text-center">
                                <span class="help-block"><i class="fa fa-warning"></i> <h2><strong>错误</strong> 你填写数据有{{ count($errors->all()) }}处错误</h2></span>

                                <div class="form-group error">
                                    <p class="text-error"><br><br></p>
                                    <dl>
                                        @foreach ($errors->all() as $error)
                                        <dd>{{ $error }}</dd>
                                        @endforeach
                                    </dl>
                                </div>
                            </div>
                            @endif

                            <div class="form-group">
                                {{ Form::label('title', '模块名称', array('class'=>'col-sm-2 control-label')) }}
                                <div class="col-sm-10">
                                    @if(empty($sider))
                                        {{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'模块名称')) }}
                                    @else
                                        {{ Form::text('title', $sider->title, array('class'=>'form-control', 'placeholder'=>'模块名称')) }}
                                        {{ Form::hidden('siderId', $sider->id)}}
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('kword', '模块关键词', array('class'=>'col-sm-2 control-label')) }}
                                <div class="col-sm-10">
                                    @if(empty($sider))
                                        {{ Form::text('kword', null, array('class'=>'form-control', 'placeholder'=>'模块关键词')) }}
                                    @else
                                        {{ Form::text('kword', $sider->kword, array('class'=>'form-control', 'placeholder'=>'模块关键词')) }}
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::label('ctrl', '图标', array('class'=>'col-sm-2 control-label')) }}
                                <div class="col-sm-10">
                                    @foreach ($siderIcon as $key=>$icon)
                                        @if(($key+1)%20)
                                            @if(!empty($sider) && $sider->ctrl == $icon)
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
                                    @if(empty($sider))
                                        {{ Form::select('pid', $siders, $pid, array('class'=>'form-control')) }}
                                    @else
                                        {{ Form::select('pid', $siders, $sider->pid, array('class'=>'form-control')) }}
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    {{ Form::submit($siderButton, array('class'=>'btn btn-primary')) }}
                                </div>
                            </div>
                            </fieldset>
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
