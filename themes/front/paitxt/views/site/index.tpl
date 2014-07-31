<!--列表-->
<div class="main">
    <div id="centerl">
        <div class="padding">
            <div class="box" style="width:980px;">

                <div class="title">
                    <h5 data-box="cols-1" class="current">正在更新</h5>
                    <h5 data-box="cols-2">最新收录</h5>
                    <h5 data-box="cols-3">阅读排行</h5>
                    {*<h5 data-box="cols-4">推荐排行</h5>*}
                    {*<h5 data-box="cols-5">收藏排行</h5>*}
                </div>
                <div id="cols-1" class="books section-cols noradius">
                <!--18-->
                <ul class="ultop">
                {novel_book order="lastchaptertime desc" limit=9}
                <div class="bk">
                    <div class="pic">
                        <a target="_blank" href="{novel_book_link id=$item->id}">
                            <img alt="{$item->title}最新章节" src="{$item->coverImageUrl}">
                        </a>
                    </div>
                    <h3><a title="{$item->title}最新章节" target="_blank" href="{novel_book_link id=$item->id}">{$item->title|truncate:9:"...":true}</a></h3>
                    <span>作者：{$item->author}T</span>
                    <div class="bnew">
                        <a target="_blank" title="{$item->lastchaptertitle}" href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid}">{$item->lastchaptertitle}</a>
                    </div>
                    <div class="bnew">
                        <span><a style="color:gray">最后更新：{$item->lastchaptertime|date_format:'Y-m-d'}</a></span>
                    </div>
                    <div style="height:70px;" class="yx_0">
                        <div><span style="height:12px; line-height:12px;margin-bottom:3px;" class="yx_1 m_b_5">共</span><span class="yx_2 m_b_5" style="height:12px; line-height:12px;margin-bottom:3px;">{$item->allclicks}人</span><span class="yx_3 m_b_5" style="height:12px; line-height:12px;margin-bottom:3px;">阅读</span></div>
                        <div style="clear:both"></div>
                        {*<div><span style="height:12px; line-height:12px;margin-bottom:3px;" class="yx_1">共</span><span style="height:12px; line-height:12px;margin-bottom:3px;" class="yx_2 m_b_5">164人</span><span style="height:12px; line-height:12px;margin-bottom:3px;" class="yx_3">推荐</span></div>*}
                        {*<div style="clear:both"></div>*}
                        {*<div><span style="height:12px; line-height:12px;" class="yx_1">共</span><span style="height:12px; line-height:12px;" class="yx_2">27人</span><span style="height:12px; line-height:12px;" class="yx_3">收藏</span></div>*}
                    </div>
                </div>
                {/novel_book}
                <div class="index_more"><a href="{novel_lastupdate_link}">查看更多...</a></div>
                </ul>
                </div>

                <div id="cols-2" class="news section-cols noradius">
                    <!--18-->
                    <ul class="ultop">
                        {novel_book order="createtime desc" limit=9}
                            <div class="bk">
                                <div class="pic">
                                    <a target="_blank" href="{novel_book_link id=$item->id}">
                                        <img alt="{$item->title}最新章节" src="{$item->coverImageUrl}">
                                    </a>
                                </div>
                                <h3><a title="{$item->title}最新章节" target="_blank" href="{novel_book_link id=$item->id}">{$item->title|truncate:9:"...":true}</a></h3>
                                <span>作者：{$item->author}T</span>
                                <div class="bnew">
                                    <a target="_blank" title="{$item->lastchaptertitle}" href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid}">{$item->lastchaptertitle}</a>
                                </div>
                                <div class="bnew">
                                    <span><a style="color:gray">最后更新：{$item->lastchaptertime|date_format:'Y-m-d'}</a></span>
                                </div>
                                <div style="height:70px;" class="yx_0">
                                    <div><span style="height:12px; line-height:12px;margin-bottom:3px;" class="yx_1 m_b_5">共</span><span class="yx_2 m_b_5" style="height:12px; line-height:12px;margin-bottom:3px;">{$item->allclicks}人</span><span class="yx_3 m_b_5" style="height:12px; line-height:12px;margin-bottom:3px;">阅读</span></div>
                                    <div style="clear:both"></div>
                                    {*<div><span style="height:12px; line-height:12px;margin-bottom:3px;" class="yx_1">共</span><span style="height:12px; line-height:12px;margin-bottom:3px;" class="yx_2 m_b_5">164人</span><span style="height:12px; line-height:12px;margin-bottom:3px;" class="yx_3">推荐</span></div>*}
                                    {*<div style="clear:both"></div>*}
                                    {*<div><span style="height:12px; line-height:12px;" class="yx_1">共</span><span style="height:12px; line-height:12px;" class="yx_2">27人</span><span style="height:12px; line-height:12px;" class="yx_3">收藏</span></div>*}
                                </div>
                            </div>
                        {/novel_book}
                        <div class="index_more"><a href="{novel_lastupdate_link}">查看更多...</a></div>
                    </ul>
                </div>

                <div id="cols-3" class="news section-cols noradius">
                    <!--18-->
                    <ul class="ultop">
                        {novel_book order="allclicks desc" limit=9}
                            <div class="bk">
                                <div class="pic">
                                    <a target="_blank" href="{novel_book_link id=$item->id}">
                                        <img alt="{$item->title}最新章节" src="{$item->coverImageUrl}">
                                    </a>
                                </div>
                                <h3><a title="{$item->title}最新章节" target="_blank" href="{novel_book_link id=$item->id}">{$item->title|truncate:9:"...":true}</a></h3>
                                <span>作者：{$item->author}T</span>
                                <div class="bnew">
                                    <a target="_blank" title="{$item->lastchaptertitle}" href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid}">{$item->lastchaptertitle}</a>
                                </div>
                                <div class="bnew">
                                    <span><a style="color:gray">最后更新：{$item->lastchaptertime|date_format:'Y-m-d'}</a></span>
                                </div>
                                <div style="height:70px;" class="yx_0">
                                    <div><span style="height:12px; line-height:12px;margin-bottom:3px;" class="yx_1 m_b_5">共</span><span class="yx_2 m_b_5" style="height:12px; line-height:12px;margin-bottom:3px;">{$item->allclicks}人</span><span class="yx_3 m_b_5" style="height:12px; line-height:12px;margin-bottom:3px;">阅读</span></div>
                                    <div style="clear:both"></div>
                                    {*<div><span style="height:12px; line-height:12px;margin-bottom:3px;" class="yx_1">共</span><span style="height:12px; line-height:12px;margin-bottom:3px;" class="yx_2 m_b_5">164人</span><span style="height:12px; line-height:12px;margin-bottom:3px;" class="yx_3">推荐</span></div>*}
                                    {*<div style="clear:both"></div>*}
                                    {*<div><span style="height:12px; line-height:12px;" class="yx_1">共</span><span style="height:12px; line-height:12px;" class="yx_2">27人</span><span style="height:12px; line-height:12px;" class="yx_3">收藏</span></div>*}
                                </div>
                            </div>
                        {/novel_book}
                        <div class="index_more"><a href="{novel_lastupdate_link}">查看更多...</a></div>
                    </ul>
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
{*novel_block id=1*}