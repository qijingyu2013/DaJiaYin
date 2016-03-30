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
                        <div class="panel-heading">
                            <div class="panel-title"> </div>
                        </div>

                        <div class="panel-body">
                            {{--{{ Form::open( array( 'url'=>url('/admina/about/updateAboutMe'),--}}
                            {{--'class'=>'form-horizontal',--}}
                            {{--'role'=>'form')) }}--}}

                            {!! UEditor::css() !!}
                            {!! UEditor::content() !!}
                            {!! UEditor::js() !!}
                            {{--<textarea id="ckeditor_full"></textarea>--}}
                            {{--<div class="form-group">--}}
                            {{--<div class="col-sm-offset-2 col-sm-10">--}}
                            {{ Form::submit('提交修改', array('class'=>'btn btn-primary', 'id'=>'form_submit')) }}
                            {{--button('ctrl', null, array('class'=>'form-control', 'placeholder'=>'图标')) }}--}}
                            {{--button($value = null, $options = [])--}}
                            {{--<button type="submit" class="btn btn-primary">Sign in</button>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--</fieldset>--}}
                            {{--{{ Form::close() }}--}}
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
    <script type="text/javascript">

        var serverUrl=UE.getOrigin()+'/ueditor/test'; //你的自定义上传路由
        var ue = UE.getEditor('ueditor',{
            'serverUrl':serverUrl
        }); //用辅助方法生成的话默认id是ueditor

        /* 自定义路由 */


        //        var ue = UE.getEditor('ueditor',{'serverUrl':serverUrl}); //如果不使用默认路由，就需要在初始化就设定这个值


        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
            //获取html内容，返回: <p>hello</p>
            $("#form_submit").click(function(){
                var html = ue.getContent();
                alert(html);
            });

            //获取纯文本内容，返回: hello
            var txt = ue.getContentTxt();
        });

    </script>
@stop
