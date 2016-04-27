<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="{!! asset('/assets/dist/js/lib/sea.js') !!}"></script>
<script src="{!! asset('/assets/dist/js/mod/common/base.cfg.js') !!}"></script>
<script src="{!! asset('/admin-assets/dist/js/bootstrap-treeview.js') !!}"></script>
<script>
    $(function () {
        var defaultData = {!! $siderJson !!};
        $('#treeview').treeview({
            color: "#428bca",
            expandIcon: "glyphicon glyphicon-stop",
            collapseIcon: "glyphicon glyphicon-unchecked",
            nodeIcon: "glyphicon glyphicon-user",
            showTags: true,
            enableLinks: true,
            data: defaultData
        });
    });
</script>
