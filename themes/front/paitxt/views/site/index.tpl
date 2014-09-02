<!--列表-->
<div class="main">
    <div id="centerl">
        <div class="padding">
            <div class="box" style="width:980px;">
                <div class="title">
                    <h5 data-box="cols-1" class="current">正在更新</h5>
                    <h5 data-box="cols-2">最新收录</h5>
                    <h5 data-box="cols-3">阅读排行</h5>
                </div>
                <div id="cols-1" class="books section-cols noradius">
					<!--18-->
					{novel_block id=19}
                </div>
                <div id="cols-2" class="news section-cols noradius">
					<!--18-->
					{novel_block id=20}
                </div>
                <div id="cols-3" class="news section-cols noradius">
					{novel_block id=21}
                    <!--18-->
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
{literal}
    $(".box h5").click(function(){

        $(this).siblings().removeClass('current').end().addClass('current');

        $(".section-cols").hide();

        var id = $(this).data('box');

        var div = document.getElementById(id);

        $(div).show()

    })
{/literal}
</script>
{novel_block id=1}