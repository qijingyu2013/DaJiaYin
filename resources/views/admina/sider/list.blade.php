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
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>模块名称</th>
                                    <th>模块关键词</th>
                                    <th>父级模块名称</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!empty($siders))
                                    @foreach ($siders as $sider)
                                        <tr>
                                            <td>{{ $sider->id }}</td>
                                            <td>{{ $sider->title }}</td>
                                            <td>{{ $sider->kword }}</td>
                                            <td>@if($sider->pid == 0)
                                                    顶级目录
                                                @else
                                                    {{ $sider->hasOneParent->title }}
                                                @endif
                                                {{--{{ if$sider->pid $sider->pid }}--}}
                                            </td>
                                            <td>
                                                @if($sider->pid==0)
                                                    {{ Html::link(url('/admina/operation/elememtSider', array('pid'=>$sider->id)), '进入' ) }} |

                                                @endif
                                                    {{ Html::link(url('/admina/operation/createElememtSider', array('id'=>$sider->id)), '添加子模块' ) }} |
                                                    {{ Html::link(url('/admina/operation/updateElememtSider', array('id'=>$sider->id)), '修改' ) }}

                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-body text-center">
                        {{ $siders->links() }}
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
