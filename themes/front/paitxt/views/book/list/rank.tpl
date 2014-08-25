<!--列表-->
<div class="main">
    <div id="centerl">
        <div class="padding">
            <div class="box" style="width:980px;">

                <div class="title">
                    <h5 data-box="cols-1" class="current">日点击榜</h5>
                    <h5 data-box="cols-2">周点击榜</h5>
                    <h5 data-box="cols-3">月点击榜</h5>
                    <h5 data-box="cols-4">总点击榜</h5>
                </div>
                <div id="cols-1" class="books section-cols noradius">
                <!--18-->
                <ul class="ultop">
                 {novel_book_rank type="click" order="day" limit=9}
                <div class="bk">
                    <div class="pic">
                        <a target="_blank" href="{novel_book_link id=$item->id}">
                            <img alt="{$item->title}最新章节" src="{$item->coverImageUrl}">
                        </a>
                    </div>
                    <h3><a title="{$item->title}最新章节" target="_blank" href="{novel_book_link id=$item->id}">{$item->title}</a></h3>
                    <span>作者：{$item->author}</span>
                    <div class="bnew">
                        <a target="_blank" title="{$item->lastchaptertitle}" href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid}">{$item->lastchaptertitle}</a>
                    </div>
                    <div class="bnew">
                        <span><a style="color:gray">最后更新：{$item->lastchaptertime|date_format:'Y-m-d'}</a></span>
                    </div>
                    <div style="height:70px;" class="yx_0">
                        <div><span style="height:12px; line-height:12px;margin-bottom:3px;" class="yx_1 m_b_5">共</span><span class="yx_2 m_b_5" style="height:12px; line-height:12px;margin-bottom:3px;">{$item->allclicks}人</span><span class="yx_3 m_b_5" style="height:12px; line-height:12px;margin-bottom:3px;">阅读</span></div>
                        <div style="clear:both"></div>
                    </div>
                </div>
                {/novel_book_rank}
                <div class="index_more"></div>
                </ul>
                </div>

                <div id="cols-2" class="news section-cols noradius">
                    <!--18-->
                    <ul class="ultop">
                        {novel_book_rank type="click" order="week" limit=9}
                            <div class="bk">
                                <div class="pic">
                                    <a target="_blank" href="{novel_book_link id=$item->id}">
                                        <img alt="{$item->title}最新章节" src="{$item->coverImageUrl}">
                                    </a>
                                </div>
                                <h3><a title="{$item->title}最新章节" target="_blank" href="{novel_book_link id=$item->id}">{$item->title}</a></h3>
                                <span>作者：{$item->author}</span>
                                <div class="bnew">
                                    <a target="_blank" title="{$item->lastchaptertitle}" href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid}">{$item->lastchaptertitle}</a>
                                </div>
                                <div class="bnew">
                                    <span><a style="color:gray">最后更新：{$item->lastchaptertime|date_format:'Y-m-d'}</a></span>
                                </div>
                                <div style="height:70px;" class="yx_0">
                                    <div><span style="height:12px; line-height:12px;margin-bottom:3px;" class="yx_1 m_b_5">共</span><span class="yx_2 m_b_5" style="height:12px; line-height:12px;margin-bottom:3px;">{$item->allclicks}人</span><span class="yx_3 m_b_5" style="height:12px; line-height:12px;margin-bottom:3px;">阅读</span></div>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        {/novel_book_rank}
                        <div class="index_more">{*<a href="{novel_lastupdate_link}">查看更多...</a>*}</div>
                    </ul>
                </div>

                <div id="cols-3" class="news section-cols noradius">
                    <!--18-->
                    <ul class="ultop">
                        {novel_book_rank type="click" order="month" limit=9}
                            <div class="bk">
                                <div class="pic">
                                    <a target="_blank" href="{novel_book_link id=$item->id}">
                                        <img alt="{$item->title}最新章节" src="{$item->coverImageUrl}">
                                    </a>
                                </div>
                                <h3><a title="{$item->title}最新章节" target="_blank" href="{novel_book_link id=$item->id}">{$item->title}</a></h3>
                                <span>作者：{$item->author}</span>
                                <div class="bnew">
                                    <a target="_blank" title="{$item->lastchaptertitle}" href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid}">{$item->lastchaptertitle}</a>
                                </div>
                                <div class="bnew">
                                    <span><a style="color:gray">最后更新：{$item->lastchaptertime|date_format:'Y-m-d'}</a></span>
                                </div>
                                <div style="height:70px;" class="yx_0">
                                    <div><span style="height:12px; line-height:12px;margin-bottom:3px;" class="yx_1 m_b_5">共</span><span class="yx_2 m_b_5" style="height:12px; line-height:12px;margin-bottom:3px;">{$item->allclicks}人</span><span class="yx_3 m_b_5" style="height:12px; line-height:12px;margin-bottom:3px;">阅读</span></div>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        {/novel_book_rank}
                        <div class="index_more">{*<a href="{novel_lastupdate_link}">查看更多...</a>*}</div>
                    </ul>
                </div>

                <div id="cols-4" class="news section-cols noradius">
                    <!--18-->
                    <ul class="ultop">
                        {novel_book_rank type="click" order="all" limit=9}
                            <div class="bk">
                                <div class="pic">
                                    <a target="_blank" href="{novel_book_link id=$item->id}">
                                        <img alt="{$item->title}最新章节" src="{$item->coverImageUrl}">
                                    </a>
                                </div>
                                <h3><a title="{$item->title}最新章节" target="_blank" href="{novel_book_link id=$item->id}">{$item->title}</a></h3>
                                <span>作者：{$item->author}</span>
                                <div class="bnew">
                                    <a target="_blank" title="{$item->lastchaptertitle}" href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid}">{$item->lastchaptertitle}</a>
                                </div>
                                <div class="bnew">
                                    <span><a style="color:gray">最后更新：{$item->lastchaptertime|date_format:'Y-m-d'}</a></span>
                                </div>
                                <div style="height:70px;" class="yx_0">
                                    <div><span style="height:12px; line-height:12px;margin-bottom:3px;" class="yx_1 m_b_5">共</span><span class="yx_2 m_b_5" style="height:12px; line-height:12px;margin-bottom:3px;">{$item->allclicks}人</span><span class="yx_3 m_b_5" style="height:12px; line-height:12px;margin-bottom:3px;">阅读</span></div>
                                    <div style="clear:both"></div>
                                </div>
                            </div>
                        {/novel_book_rank}
                        <div class="index_more"></div>
                    </ul>
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