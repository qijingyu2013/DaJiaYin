@extends('admina.base')

@section('linkCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/dist/css/login.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/dist/css/fileinput.min.css')}}"/>
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
                            {{ Form::open( array( 'url'=>url('/admina/about/postTeam',array('siderType'=>$siderUrl)),
                                            'class'=>'form-horizontal',
                                            'role'=>'form')) }}
                            <fieldset>
                                @if (!empty($errors) && count($errors) > 0)
                                    <div class="form-group has-error text-center">
                                        <span class="help-block"><i class="fa fa-warning"></i> <h2><strong>错误</strong>
                                                你填写数据有{{ count($errors->all()) }}处错误</h2></span>

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
                                    {{ Form::label('title', '成员名称', array('class'=>'col-sm-2 control-label')) }}
                                    <div class="col-sm-10">
                                        @if(empty($award))
                                            {{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'成员名称')) }}
                                            {{ Form::hidden('awardimage', null, array('id'=>'awardimage')) }}
                                        @else
                                            {{ Form::text('title', $award->title, array('class'=>'form-control', 'placeholder'=>'成员名称')) }}
                                            {{ Form::hidden('noticeId', $award->id)}}
                                            {{ Form::hidden('awardimage', $award->icon, array('id'=>'awardimage')) }}
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('awardPic', '成员图片', array('class'=>'col-sm-2 control-label')) }}
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input id="uploadawardimage" name="uploadawardimage" type="file" multiple
                                               class="file-loading">
                                        {{--{{ Form::label('kword', '公告关键词', array('class'=>'col-sm-2 control-label')) }}--}}
                                        {{--<div class="col-sm-10">--}}
                                        {{--@if(empty($sider))--}}
                                        {{--{{ Form::text('kword', null, array('class'=>'form-control', 'placeholder'=>'公告关键词，以逗号分隔（可选填）')) }}--}}
                                        {{--@else--}}
                                        {{--{{ Form::text('kword', $sider->kword, array('class'=>'form-control', 'placeholder'=>'公告关键词，以逗号分隔（可选填）')) }}--}}
                                        {{--@endif--}}

                                        {{--</div>--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        {!! UEditor::content() !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">

                                        {{ Form::hidden('content', null, array('id'=>'form_text')) }}
                                        {{ Form::submit($siderButton, array('class'=>'btn btn-primary', 'id'=>'form_button')) }}
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
    {!! UEditor::js() !!}
    <script src="{!! asset('/admin-assets/dist/js/fileinput.min.js') !!}"></script>
    <script src="{!! asset('/admin-assets/dist/js/fileinput_locale_zh.js') !!}"></script>
    <script type="text/javascript">

        var serverUrl = UE.getOrigin() + '/ueditor/test'; //你的自定义上传路由
        var ue = UE.getEditor('ueditor', {
            'serverUrl': serverUrl
        }); //用辅助方法生成的话默认id是ueditor

        ue.ready(function () {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
            @if(!empty($award))
            ue.setContent('{!! $award->content !!}');
            @endif
            $("#form_button").click(function () {
                var html = ue.getContent();
                $("#form_text").val(html);
                $("#form_submit").submit();
            });
        });

        $("#uploadawardimage").fileinput({
            uploadUrl: "{{ url('ueditor/test?action=uploadawardimage&_token='. csrf_token()) }}", // server upload action
            language: "zh",
            initialPreview: [
                @if(!empty($award))
                '{{ Html::image( asset( '/uploads/data/image/'.$award->icon), $award->icon, array('class'=>'file-preview-image')) }}',
                @endif
            ],
            uploadAsync: true,
            maxFileCount: 1
        });
        $("#uploadawardimage").on("fileuploaded", function (event, data, previewId, index) {
            if (data == undefined) {
                alert('上传失败');
            }
            if (data.response.state == 'SUCCESS') {
                $('#awardimage').val(data.response.title);
            } else {
                alert('上传失败');
            }

        });
    </script>
@stop
