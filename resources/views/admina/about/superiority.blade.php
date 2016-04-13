@extends('admina.base')

@section('linkCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/dist/css/login.css')}}"/>
    {!! UEditor::css() !!}
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
                        <div class="panel-heading">
                            <div class="panel-title"></div>
                        </div>

                        <div class="panel-body">
                            {!! UEditor::content() !!}
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    {{ Form::open( array( 'url'=>url('/admina/about/updateSuperiority'),
                                         'class'=>'form-horizontal',
                                         'id'=>'form_submit',
                                         'role'=>'form')) }}
                                    {{ Form::hidden('form_text', null, array('id'=>'form_text')) }}
                                    {{ Form::hidden('form_module', $about->module) }}
                                    {{ Form::submit('提交修改', array('class'=>'btn btn-primary', 'id'=>'form_button')) }}
                                    {{ Form::close() }}
                                </div>
                            </div>

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
    {!! UEditor::js() !!}
    <script type="text/javascript">

        var serverUrl = UE.getOrigin() + '/ueditor/test'; //你的自定义上传路由
        var ue = UE.getEditor('ueditor', {
            'serverUrl': serverUrl
        }); //用辅助方法生成的话默认id是ueditor

        ue.ready(function () {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
            ue.setContent('{!! $about->content !!}');
            $("#form_button").click(function () {
                var html = ue.getContent();
                $("#form_text").val(html);
                $("#form_submit").submit();
            });
        });
    </script>
@stop
