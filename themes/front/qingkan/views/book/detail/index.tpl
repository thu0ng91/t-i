<link href="{$FW_THEME_URL}/css/info.css" rel="stylesheet" type="text/css">
<div class="sy_dh">
    <p>
        <img src="{$FW_THEME_URL}/image/local.gif" align="absmiddle"> 当前位置：
        <a href="{$FW_SITE_URL}">首页</a> &gt;<a href="{novel_category_link id=$book->category->id}">{$book->category->title}</a>&gt; <a href="{novel_book_link id=$book->id}">{$book->title}</a></li>
    </p>
    <span class="bookbtn01">
        <a href="javascript:;" onclick="AddFavorite(window.location.href,document.title)">
            <img src="{$FW_THEME_URL}/image/favorite.gif">
        </a>
    </span>
</div>
<div class="sy_contain">
    <div class="sy_left">
        <div class="sy_kuang01">
            <div id="layer1">
                {if $book->flag}
                <img src="{$FW_THEME_URL}/image/ico_wj.gif">
                {else}
                 <img src="{$FW_THEME_URL}/image/ico_lz.gif">
                {/if}
            </div>
            <div class="sy_bt01">
                <ul>
                    <li class="a2"><h1 class="h1title">{$book->title}</h1><span class="tauthor">作者：{$book->author}</span></li>
                    <li class="a3">作品类别：<a target="_blank" href="{novel_category_link id=$book->category->id}">{$book->category->title}</a>&#12288;总字数：{$book->wordcount}&#12288;更新时间：{$book->updatetime|date_format:'Y-m-d H:i:s'}</li>
                </ul>
            </div>
            <div class="sy_nr02">
                <div class="sy_nr02_left"><a href="{novel_chapter_link bookid=$book->id id=$book->lastchapterid}"><img border="0" src="{$book->coverImageUrl}"></a></div>
                <div class="sy_nr02_right">
                    <span id="articledescandeit">
                        <ul>
                            <li id="zp_jj" class="a1">
                                <span class="sp_01">【作品简介】</span>
                                <span class="clear"></span>
                            </li>
                            <li id="articledesc" class="a2">{$book->summary|trim|strip_tags|truncate:200:"...":true}</li>
                        </ul>
                    </span>
                    <div class="sy_anniu" id="keyword">
                        <span class="sy_zstb">最新章节</span><a href="{novel_chapter_link bookid=$book->id id=$book->lastchapterid}">{$book->lastchaptertitle}</a> {$book->updatetime|date_format:'Y-m-d H:i:s'}
                    </div>
                    <div id="bookbutton" class="sy_anniu">
                        <a target="_blank" title="下载 {$book->title} TXT电子书" class="bookbtn04" id="btn_down" href="{novel_book_download_link id=$book->id}">下载本书</a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="tj_listbox" style="margin-top:4px;padding:10px 20px;">
        <style type="text/css">
        .chapter-i{
            float: left;
            width: 50%;
            height: 24px;
            line-height: 24px;
        }
        </style>
        {foreach $chapters as $chapter}
            <div class="chapter-i"><a href="{novel_chapter_link bookid=$book->id id=$chapter->id}">{$chapter->title}</a></div>
        {/foreach}
        <div class="clear"></div>
        </div>
    </div>
    <div class="sy_right">

    </div>
    <div class="clear"></div>
</div>