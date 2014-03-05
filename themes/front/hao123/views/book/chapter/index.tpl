<link href="{$FW_THEME_URL}/css/style2.css" rel="stylesheet" type="text/css">
<!--列表-->
<div class="main">
    <div id="centerl">
        <div class="padding">
            <div class="box" style="width:980px;">

                <div class="book_middle_article">
                    <div class="book_middle_title"> <span>双击开始滚动屏幕</span>当前位置： <a href="{$FW_SITE_URL}">首页</a> &gt; <a href="{novel_book_link id=$book->id}">{$book->title}</a> &gt; {$chapter->title} </div>
                    <div id="bgdiv" class="book_middle_text">
                        <dl>
                            <div class="adtext"></div>
                            <dt>{$chapter->title}</dt>
                            <div class="sdt">{*<script type="text/javascript">TplTextSelect();</script>*}
                                <div id="TextSelect">
                                    <div class="ts1">
                                        <span>选择背景颜色：</span>
                                        <a onclick="SetBgColor('#dcecf5')" href="javascript:void(0)"><img width="15" height="18" border="0" alt="" src="{$FW_THEME_URL}/images/icon01.gif"></a>
                                        <a onclick="SetBgColor('#e7f4fe')" href="javascript:void(0)"><img width="15" height="18" border="0" alt="" src="{$FW_THEME_URL}/images/icon02.gif"></a>
                                        <a onclick="SetBgColor('#edf6d0')" href="javascript:void(0)"><img width="15" height="18" border="0" alt="" src="{$FW_THEME_URL}/images/icon03.gif"></a>
                                        <a onclick="SetBgColor('#f5f1e7')" href="javascript:void(0)"><img width="15" height="18" border="0" alt="" src="{$FW_THEME_URL}/images/icon04.gif"></a>
                                        <a onclick="SetBgColor('#eae8f7')" href="javascript:void(0)"><img width="15" height="18" border="0" alt="" src="{$FW_THEME_URL}/images/icon05.gif"></a>
                                        <a onclick="SetBgColor('#fef4f0')" href="javascript:void(0)"><img width="15" height="18" border="0" alt="" src="{$FW_THEME_URL}/images/icon06.gif"></a>
                                        <a onclick="SetBgColor('#ebf4ef')" href="javascript:void(0)"><img width="15" height="18" border="0" alt="" src="{$FW_THEME_URL}/images/icon07.gif"></a>
                                        <a onclick="SetBgColor('#fafafa')" href="javascript:void(0)"><img width="15" height="18" border="0" alt="" src="{$FW_THEME_URL}/images/icon08.gif"></a>
                                    </div>
                                    <div class="ts2">
                                        <span>选择字体：</span>
                                        <a onclick="SetfontSize(17)" href="javascript:void(0)"><img width="21" height="21" border="0" alt="" src="{$FW_THEME_URL}/images/icon09.gif"></a>
                                        <a onclick="SetfontSize(12)" href="javascript:void(0)"><img width="21" height="21" border="0" alt="" src="{$FW_THEME_URL}/images/icon10.gif"></a>
                                        <a onclick="SetfontSize(10)" href="javascript:void(0)"><img width="21" height="21" border="0" alt="" src="{$FW_THEME_URL}/images/icon11.gif"></a></div>
                                    <div class="ts3">
                                        <span>滚动速度：</span>
                                        <a onclick="SetSpeed(1)" href="javascript:void(0)"><img width="21" height="21" border="0" alt="" src="{$FW_THEME_URL}/images/icon12.gif"></a>
                                        <a onclick="SetSpeed(20)" href="javascript:void(0)"><img width="21" height="21" border="0" alt="" src="{$FW_THEME_URL}/images/icon13.gif"></a>
                                        <a onclick="SetSpeed(40)" href="javascript:void(0)"><img width="21" height="21" border="0" alt="" src="{$FW_THEME_URL}/images/icon14.gif"></a></div>
                                    <div class="ts4">
                                        <a onclick="YaHei()" href="javascript:void(0)">雅黑字体</a>&nbsp;
                                        <a onclick="SetDefault()" href="javascript:void(0)">默认字体</a>&nbsp;
                                        <a onclick="SetFont()" href="javascript:void(0)">设置字体</a>&nbsp;
                                        <a href="javascript:addBookmarkAjax('31593', '7088945');">加入书签</a></div>
                                </div>
                            </div>
                            <dd>

                                <div id="booktext"><!--go-->{$chapter->content|replace:"\n":"<br />&nbsp;&nbsp;&nbsp;&nbsp;"} <!--over--></div>
                            </dd>
                        </dl>
                    </div>
                </div>

                <div class="book_middle_text_next"><a href="{novel_chapter_link bookid=$book->id id=$prevChapterId}" class="redbutt">(快捷键:←)上一章</a>&nbsp;&nbsp;&nbsp;<a href="{novel_book_link id=$book->id}" class="redbutt">返回章节目录(快捷键:回车)</a>&nbsp;&nbsp;&nbsp;<a href="{novel_chapter_link bookid=$book->id id=$nextChapterId}" class="redbutt">下一章(快捷键:→)</a></div>

            </div>
        </div>
    </div>
</div>
<!--end 列表-->
{*<script src="{$FW_THEME_URL}/js/jquery.min.js" type="text/javascript" language="javascript"></script>*}
<script src="{$FW_THEME_URL}/js/font.js" type="text/javascript" language="javascript"></script>
<script type="text/javascript" src="{$FW_THEME_URL}/js/common1.js"></script>

<script language=javascript>
    //上一页链接
    var prevpage="{novel_chapter_link bookid=$book->id id=$prevChapterId}";
    //下一页链接
    var nextpage="{novel_chapter_link bookid=$book->id id=$nextChapterId}";
    //目录页链接
    var catalog="{novel_book_link id=$book->id}";

    var bid = '{$book->id}';
    var tid = '{$chapter->id}';
    var title = '{$book->title}';
    var texttitle = '{$chapter->title}';

    {literal}

//    document.onkeydown = gotNextPage;

    function gotNextPage(event)
    {
        event = event ? event : (window.event ? window.event : null);
        if (event.keyCode==39)
        {
            //alert("Next Page!")
            location=nextpage
        }
        if (event.keyCode==37)
        {
            //alert("Prevpage Page!");
            location=prevpage;
        }
        if (event.keyCode==13)
        {
            location=catalog
        }
    }

    $(document).bind("keydown", gotNextPage);

    $(document).ready(function () {
        LoadUserPro();
        window.lastread.set(bid,tid,title,texttitle);
    });
    {/literal}
</script>