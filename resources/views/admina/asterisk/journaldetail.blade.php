@extends('admina.base')

@section('linkCss')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/dist/css/login.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/dist/css/fileinput.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('datetimepicker/css/bootstrap-datetimepicker.min.css')}}"/>
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
                            {{ Form::open( array( 'url'=>url('/admina/asterisk/postJournal',array('siderType'=>$siderUrl)),
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
                                    {{ Form::label('title', '日刊标题', array('class'=>'col-sm-2 control-label')) }}
                                    <div class="col-sm-10">
                                        @if(empty($journal))
                                            {{ Form::text('title', null, array('class'=>'form-control', 'placeholder'=>'日刊标题')) }}
                                            {{ Form::hidden('journalfile', null, array('id'=>'journalfile')) }}
                                        @else
                                            {{ Form::text('title', $journal->title, array('class'=>'form-control', 'placeholder'=>'日刊标题')) }}
                                            {{ Form::hidden('noticeId', $journal->id)}}
                                            {{ Form::hidden('journalfile', $journal->icon, array('id'=>'journalfile')) }}
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{ Form::label('publishdate', '发布日期', array('class'=>'col-sm-2 control-label')) }}
                                    <div class="col-sm-10 ">
                                        <div class="input-group date form_date col-md-5" data-date=""
                                             data-date-format="yyyy-mm-dd" data-link-field="dtp_input2"
                                             data-link-format="yyyy-mm-dd">
                                            @if(empty($journal))
                                                {{ Form::text('published_at', null, array('class'=>'form-control', 'placeholder'=>'发布日期', 'readonly','size'=>"16" )) }}
                                            @else
                                                {{ Form::text('published_at', $journal->published_at, array('class'=>'form-control', 'placeholder'=>'发布日期', 'readonly','size'=>"16" )) }}
                                            @endif
                                            <span class="input-group-addon"><span
                                                        class="glyphicon glyphicon-remove"></span></span>
                                            <span class="input-group-addon"><span
                                                        class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    </div>
                                    <input type="hidden" id="dtp_input2" value=""/><br/>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('awardPic', '日刊文件', array('class'=>'col-sm-2 control-label')) }}
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input id="uploadjournalfile" name="uploadjournalfile" type="file" multiple
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

    <script src="{!! asset('/datetimepicker/js/bootstrap-datetimepicker.min.js') !!}"></script>
    <script src="{!! asset('/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js') !!}"></script>
    <script type="text/javascript">

        var serverUrl = UE.getOrigin() + '/ueditor/test'; //你的自定义上传路由
        var ue = UE.getEditor('ueditor', {
            'serverUrl': serverUrl
        }); //用辅助方法生成的话默认id是ueditor

        ue.ready(function () {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
            @if(!empty($journal))
            ue.setContent('{!! $journal->content !!}');
            @endif
            $("#form_button").click(function () {
                var html = ue.getContent();
                $("#form_text").val(html);
                $("#form_submit").submit();
            });
        });

        $("#uploadjournalfile").fileinput({
            uploadUrl: "{{ url('ueditor/test?action=uploadjournalfile&_token='. csrf_token()) }}", // server upload action
            language: "zh",
            initialPreview: [
                @if(!empty($journal))
                {{--'<div class="file-preview-frame" id="preview-1462848379198-0" data-fileindex="0" title="{{ $journal->icon }}" style="width:160px;height:160px;">'--}}
                '<object class="file-object" data="{{ asset( '/uploads/data/file/'.$journal->icon) }}" type="application/pdf" width="160px" height="160px" internalinstanceid="40">'
                + '<param name="movie" value="{{ asset( '/uploads/data/file/'.$journal->icon) }}">'
                + '<param name="controller" value="true">'
                + '<param name="allowFullScreen" value="true">'
                + '<param name="allowScriptAccess" value="always">'
                + '<param name="autoPlay" value="false">'
                + '<param name="autoStart" value="false">'
                + '<param name="quality" value="high">'
                + '<div class="file-preview-other">'
                + '<span class="file-icon-4x"><i class="glyphicon glyphicon-file"></i></span>'
                + '</div>'
                + '</object>'
                + '<div class="file-thumbnail-footer">'
                + '<div class="file-footer-caption" title="{{ $journal->icon }}">{{ $journal->icon }}</div>'

                + '</div>'
//                +'</div>'


                {{--'<div class="file-preview-frame" title="2016_05_05大家银_AG47日刊_.pdf" style="width:160px;height:160px;"></div>',--}}
                {{--'{{ Html::image( asset( '/uploads/data/pdf/'.$journal->icon), $journal->icon, array('class'=>'file-object')) }}',--}}
                @endif
            ],
//            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            uploadAsync: true,
            maxFileCount: 1
        });
        $("#uploadjournalfile").on("fileuploaded", function (event, data, previewId, index) {
            if (data == undefined) {
                alert('上传失败');
            }
            if (data.response.state == 'SUCCESS') {
                $('#journalfile').val(data.response.title);
            } else {
                alert('上传失败');
            }

        });
        $('.form_date').datetimepicker({
            language: 'zh-CN',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });
        $(".form_datetime").datetimepicker({
            format: 'yyyy-mm-dd',
            todayBtn: true,
        });
    </script>
@stop
