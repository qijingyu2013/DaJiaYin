<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
{!! Html::script('//cdn.bootcss.com/jquery/1.11.3/jquery.min.js') !!}
{!! Html::script('/assets/dist/js/jquery.menu-aim.js') !!}
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
{!! Html::script('/assets/dist/js/bootstrap.min.js') !!}
{!! Html::script('/assets/dist/js/lib/sea.js') !!}
{!! Html::script('/assets/dist/js/mod/common/base.cfg.js') !!}
<script>
    jQuery(document).ready(function () {
        $(".click_my_self").click(function () {
            location.href = $(this).attr('href');
        });
    });
</script>
