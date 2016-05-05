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
                        <div class="panel-body">
                            @if ( Session::has("message") )
                                <div class=" successss text-center">
                                    <span class="help-block success"> <h2> {{ Session::get("message") }} </h2></span>
                                </div>
                            @endif
                            <div class="col-md-3">
                                <h4>{{ Html::link(url('/admina/asterisk/createJournal'), '创建一篇新的日刊' ) }}</h4>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>标题</th>
                                    <th>发布时间</th>
                                    {{--<th>所属模块</th>--}}
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($journals))
                                    @foreach ($journals as $journal)
                                        <tr>
                                            <td>{{ $journal->id }}</td>
                                            <td>{{ $journal->title }}</td>
                                            <td>{{ $journal->published_at }}</td>
                                            <td>
                                                {{ Html::link(url('/admina/asterisk/getJournal', array('id'=>$journal->id)), '修改' ) }}
                                                |{{ Html::link(url('/admina/asterisk/dropJournal', array('id'=>$journal->id)), '删除', array('class'=>'destoryButton') ) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-body text-center">
                        {{ $journals->links() }}
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
        $(".destoryButton").click(function () {
            if (confirm('确认要删除嘛？')) {
                location.href = this.attr('href');
            }
        });
    </script>
@stop
