<link href="{$FW_THEME_URL}/css/style2.css" rel="stylesheet" type="text/css">
<!--列表-->
<div class="main">
    <div id="centerl">
        <div class="padding">
            <div class="box" style="width:980px;">
                <div class="book_news" style="margin-top:0px;">

                    <div class="book_news_title title">
                        <ul>
                            <li>当前位置：<a href="{$FW_SITE_URL}">首页</a> &gt;<a href="{$FW_SITE_URL}">{$book->category->title}</a>&gt; <a href="http://www.paitxt.com/30/30298/">{$book->title}</a></li>
                        </ul>
                    </div>


                    <div class="book_news_style">
                        <div class="book_news_style_img1"><img src="{$book->coverImageUrl}" width="130" height="150" /><br /><br /><a href="http://www.paitxt.com/30298.html" target="_blank">{$book->title}TXT下载</a></div>
                        <div class="book_news_style_form1">
                            <div class="book_news_style_text2">
                                <h1>{$book->title}</h1>
                                <h2>作者：{$book->author}</h2>
                                <h2><a href="/modules/article/addbookcase.php?bid=30298" target="_blank">加入书架</a></h2>
                                <h2><a href="/modules/article/uservote.php?id=30298" target="_blank">推荐本书</a></h2>
                                <h3>{$book->title}最新章节：<a href="7654875.html">{$book->lastchaptertitle}</a><br><br><span id="adin_top"></span></h3>
                            </div>
                            <div class="book_article_title">小说介绍：</div>
                            <div class="msgarea"><p>{$book->summary}</p></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="book_article_texttable">
                        {foreach $chapters as $chapter}
                            {if $chapter@index % 3 == 0 || $chapter@first}
                        <div class="book_article_listtext">
                            <dl id="chapterlist">
                            {/if}
                                <dd><a href="6607060.html">{$chapter->title}</a></dd>
                                {*<dd><a href="6607061.html">第二章 断臂的骑士</a></dd>*}
                                {*<dd><a href="6607062.html">第三章 虎形拳</a></dd>*}
                            {if $chapter@iteration % 3 == 0  || $chapter@last}
                            </dl>
                            <div class="clear"></div>
                        </div>
                            {/if}
                        {/foreach}
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end 列表-->