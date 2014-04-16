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

                            <table width="100%">
                                <th>
                                    <td>小说</td>
                                    <td>最新章节</td>
                                    <td>上次阅读章节</td>
                                    <td>上次阅读时间</td>
                                </th>

                                {foreach $list as $item}
                                    <tr>
                                    <td>{$item.title}</td>
                                    <td>{$item.lastchaptertitle}</td>
                                    <td>{$item.readchaptertitle}</td>
                                    <td>{$item.readchaptertime|date_format:'Y-m-d H:i:s'}</td>
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