<link href="{$FW_THEME_URL}/css/style2.css" rel="stylesheet" type="text/css">
<!--列表-->
<div class="main">
    <div id="centerl">
        <div class="padding">
            <div class="box" style="width:980px;">
                <div class="book_news" style="margin-top:0px;">

                    <div class="book_news_title title">
                        <ul>
                            <li>当前位置：<a href="{$FW_SITE_URL}">首页</a> &gt;<a href="{Yii::app()->createUrl('member/my/bookcase')}">我的书架</a></li>
                        </ul>
                    </div>

                    <div class="book_news_style">
                        {*<div class="book_news_style_img1"><img src="{$book->coverImageUrl}" width="130" height="150" /><br /><br /><a href="{novel_book_download_link id=$book->id}" target="_blank">{$book->title}TXT下载</a></div>*}
                        {*<div class="book_news_style_form1">*}

                            <table width="100%" class="bookcase">
                                <tr>
                                    <td width="20%"><b>小说</b></td>
                                    <td width="35%"><b>最新章节</b></td>
                                    <td width="30%"><b>上次阅读章节</b></td>
                                    <td width="25%"><b>上次阅读时间</b></td>
                                </tr>

                                {foreach $list as $item}
                                    <tr>
                                    <td><a href="{novel_book_link id=$item->bookid}">{$item->title}</a></td>
                                    <td><a href="{novel_chapter_link bookid=$item->bookid id=$item->lastchapterid}">{$item->lastchaptertitle}</a></td>
                                    <td><a href="{novel_chapter_link bookid=$item->bookid id=$item->readchapterid}">{$item->readchaptertitle}</a></td>
                                    <td>{$item->updatetime|date_format:'Y-m-d H:i'}</td>
                                    </tr>
                                {foreachelse}
                                    <tr>
                                        <td colspan="4">还没有小说在书架中，赶快去添加吧！</td>
                                    </tr>
                                {/foreach}
                            </table>
                        {*</div>*}
                        {*<div class="clear"></div>*}
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!--end 列表-->
{*<script>*}
    {*{literal}*}
    {*window.lastread.set()*}
    {*{/literal}*}
{*</script>*}