<link href="{$FW_THEME_URL}/css/style2.css" rel="stylesheet" type="text/css">
<!--列表-->
<div class="main">
    <div id="centerl">
        <div class="padding">
            <div class="box" style="width:980px;">
                <div class="book_news" style="margin-top:0px;">

                    <div class="book_news_title title">
                        <ul>
                            <li>当前位置：<a href="{$FW_SITE_URL}">首页</a> &gt;<a href="{novel_category_link id=$book->category->id}">{$book->category->title}</a>&gt; <a href="{novel_book_link id=$book->id}">{$book->title}</a></li>
                        </ul>
                    </div>

                    <div class="book_news_style">
                        <div class="book_news_style_img1"><img src="{$book->coverImageUrl}" width="130" height="150" /><br />{*<br /><a href="http://www.paitxt.com/30298.html" target="_blank">{$book->title}TXT下载</a>*}</div>
                        <div class="book_news_style_form1">
                            <div class="book_news_style_text2">
                                <h1>{$book->title}</h1>
                                <h2>作者：{$book->author}</h2>
                                <h2>{*<a href="/modules/article/addbookcase.php?bid=30298" target="_blank">加入书架</a>*}</h2>
                                <h2>{*<a href="/modules/article/uservote.php?id=30298" target="_blank">推荐本书</a>*}</h2>
                                <h3>{$book->title}最新章节：<a href="{novel_chapter_link bookid=$book->id id=$book->lastchapterid}">{$book->lastchaptertitle}</a><br><br><span id="adin_top"></span></h3>
                            </div>
                            <div class="book_article_title">小说介绍：</div>
                            <div class="msgarea"><p>{$book->summary}</p></div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="book_article_texttable">
                        {$i=0}
                        {$tagIsClosed = false}
                        {foreach $chapters as $chapter}
                            {if $chapter->chaptertype == 0}
                                {if $i % 3 == 0 }
                                    {$tagIsClosed = false}
                                    <div class="book_article_listtext">
                                    <dl id="chapterlist">
                                {/if}

                                <dd><a href="{novel_chapter_link bookid=$book->id id=$chapter->id}">{$chapter->title}</a></dd>
                            {*<dd><a href="6607061.html">第二章 断臂的骑士</a></dd>*}
                            {*<dd><a href="6607062.html">第三章 虎形拳</a></dd>*}
                                {if (($i +1) % 3 == 0 && $i > 0)  || $chapter@last}
                                    </dl>
                                    <div class="clear"></div>
                                    </div>
                                    {$tagIsClosed = true}
                                {/if}
                                {$i=$i+1}
                            {else}
                                {if !$tagIsClosed}
                                    </dl>
                                    <div class="clear"></div>
                                </div>
                                {$i = 0}
                                {$tagIsClosed = true}
                                {/if}
                                <div class="book_article_listtext">
                                    {*<dl id="chapterlist">*}
                                        <dl style="text-align: center;font-weight: bold">{$chapter->title}</dl>
                                     {*</dl>*}
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