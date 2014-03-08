<link href="{$FW_THEME_URL}/css/info.css" rel="stylesheet" type="text/css">
<div class="sy_dh">
<p>
    <img src="{$FW_THEME_URL}/image/local.gif" align="absmiddle"> 当前位置：
    <a href="{$FW_SITE_URL}">首页</a> &gt;<a href="{novel_category_link id=$book->category->id}">{$book->category->title}</a>&gt; <a href="{novel_book_link id=$book->id}">{$book->title}</a></li>
</p>
</div>
<style type="text/css">
.c-book-title{
    margin: 0 auto;
    width: 960px;
    text-align: center;
    padding: 10px 0 20px 0;
}
#book_cont{
    margin: 0 auto;
    width: 960px;
}
#booktext{
    padding: 0 10px;
}
.book_middle_text_next{
    margin: 20px auto;
    text-align: center;
}
</style>
<div class="c-book-title"><h1>{$chapter->title}</h1></div>
<div id="book_cont">
<div id="booktext"><!--go-->{$chapter->content|nl2br} <!--over--></div>
<div class="book_middle_text_next"><a href="{novel_chapter_link bookid=$book->id id=$prevChapterId}" class="redbutt">(快捷键:←)上一章</a>&nbsp;&nbsp;&nbsp;<a href="{novel_book_link id=$book->id}" class="redbutt">返回章节目录(快捷键:回车)</a>&nbsp;&nbsp;&nbsp;<a href="{novel_chapter_link bookid=$book->id id=$nextChapterId}" class="redbutt">下一章(快捷键:→)</a></div>
</div>
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