<link href="{$FW_THEME_URL}/css/style2.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{$FW_THEME_URL}/js/font.js"></script>
<!--列表-->
<div class="main">
    <div id="centerl">
        <div class="padding">
            <div class="box" style="width:980px;">
                <div style="text-align:left;font-size:14px">
                    <span>热门推荐：</span>
                    {novel_book cid=[$book->category->id] where='recommendlevel<=4' order='createtime desc,allclicks desc' limit=16}
                    <a href="{novel_book_link id=$item->id pinyin=$book->pinyin}">{$item->title}</a>
                    {/novel_book}  
                </div>
                <div class="book_middle_article">
                    <div class="book_middle_title"> <span>双击开始滚动屏幕</span>当前位置： <a href="{$FW_SITE_URL}">首页</a> &gt; <a href="{novel_book_link id=$book->id pinyin=$book->pinyin}">{$book->title}</a> &gt; {$chapter->title} </div>



                    <div id="bgdiv" class="book_middle_text">
                        <dl>
                            <dt>{$chapter->title}</dt>
                            <div class="sdt"><script type="text/javascript">TplTextSelect();</script>
                            </div>
                            <dd>
                                <div id="booktext"><!--go-->{$chapter->content|replace:"\n":"<br />&nbsp;&nbsp;&nbsp;&nbsp;"} <!--over--></div>
                            </dd>
                        </dl>
                    </div>
                </div>

                <center><script>style_feetone();</script></center>
                <div class="book_middle_text_next"><a href="{novel_chapter_link bookid=$book->id id=$prevChapterId pinyin=$book->pinyin}" class="redbutt">(快捷键:←)上一章</a>&nbsp;&nbsp;&nbsp;<a href="{novel_book_link id=$book->id pinyin=$book->pinyin}" class="redbutt">返回章节目录(快捷键:回车)</a>&nbsp;&nbsp;&nbsp;<a href="{novel_chapter_link bookid=$book->id id=$nextChapterId pinyin=$book->pinyin}" class="redbutt">下一章(快捷键:→)</a></div>

                <center><script>style_feettwo();</script></center>
                <div style="text-align:left;font-size:14px">
                    <span>新书推荐：</span>
                    {novel_book cid=[$book->category->id] where='recommendlevel<=3' order='createtime desc,allclicks desc' limit=16}
                    <a href="{novel_book_link id=$item->id pinyin=$item->pinyin}">{$item->title}</a>
                    {/novel_book}  
                </div>

            </div>
        </div>
    </div>
</div>
<!--end 列表-->
<script type="text/javascript" src="{$FW_THEME_URL}/js/common1.js"></script>

<script language=javascript>
    //上一页链接
    var prevpage="{novel_chapter_link bookid=$book->id id=$prevChapterId pinyin=$book->pinyin}";
    //下一页链接
    var nextpage="{novel_chapter_link bookid=$book->id id=$nextChapterId pinyin=$book->pinyin}";
    //目录页链接
    var catalog="{novel_book_link id=$book->id pinyin=$book->pinyin}";

    var bid = '{$book->id}';
    var tid = '{$chapter->id}';
    var title = '{$book->title}';
    var texttitle = '{$chapter->title}';

    

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
 
</script>