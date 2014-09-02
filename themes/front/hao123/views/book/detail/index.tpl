<link href="{$FW_THEME_URL}/css/directory.css" rel="stylesheet">
<link href="{$FW_THEME_URL}/css/directory20130605.css" rel="stylesheet">
<style type="text/css">
{literal}
    .bdshare_b{float:left;margin:10px 10px;border:2px solid #FFF;background-color:#1B68B0;width:150px;height:40px;text-align: center;font-size:20px;line-height:40px;}
    .bdshare_b:hover{background-color:#81AF19}
    div.bdshare_b a{color:#FFF;text-decoration:none}
    div.bdshare_b a:hover{color:#FFF;text-decoration:none}
{/literal}
</style>

<div class="crumbswrap">
    <span>当前位置：</span><a href="{$FW_SITE_URL}">首页</a>&gt;<a href="{novel_category_link id=$book->category->id}">{$book->category->title}</a><em>&gt;&nbsp;{$book->title}</em>
</div>
<div class="clearfix wrap980">
    <div class="wrap706">
        <div class="con_lwrap">
            <span class="lzzico"></span>
            <div class="con_limg">
                <img src="{$book->coverImageUrl}" alt="{$book->title}">
            </div>
            <div class="r420">
                <h1>{$book->title}</h1>
                <p class="author">
                    作者：<span class="black"><a href="#" target="_blank">{$book->author}</a></span>
                </p>
                <div class="r_cons">
                {$book->summary|trim|strip_tags}
                </div>
                <div class="r_tools">
                </div>
                <div class="lastrecord">
                    最新章节：<strong><a href="{novel_chapter_link bookid=$book->id id=$book->lastchapterid pinyin=$book->pinyin}" target="_blank">{$book->lastchaptertitle}</a></strong>
                    <div class="jianj">
                    </div>
                </div>
                <div>
                    <div class="bdshare_b" style="margin-left:0px">
                        <a href="{novel_book_download_link id=$book->id}" class="">TXT下载</a>
                    </div>
                    <!-- Baidu Button BEGIN -->
                    <div id="bdshare" class="bdshare_b" style="color:#FFF;font-size:20px;text-align:center !important">
                        <a href="#">分享此书</a>
                    </div>
                    <script src="http://bdimg.share.baidu.com/static/js/bds_s_v2.js?cdnversion=387158" type="text/javascript" id="bdshare_js" data="type=button&amp;uid=0"></script>
                    <!-- Baidu Button END -->                
                </div>
            </div>
        </div>
        <div class="bline706">
        </div>
    </div>
    
<div class="w262">
        <div class="crtitbox">
            <div class="tittwo">
                <h2>热门排行</h2>
                <ul>
                    <li class="cur">日</li>
                    <li>周</li>
                    <li>月</li>
                </ul>
            </div>
        </div>
        <div class="crconsbox">
       {foreach ["day", "week", "month"] as $v} 
            <div{if !$v@first} class="hidden"{/if}>
            {novel_book_rank order=$v cid=[$book->category->id] limit=5}
            {if $block.first}
                <div class="cimgsfont">
                    <a class="imgcss" href="{novel_book_link id=$item->id  pinyin=$item->pinyin}"><img alt="{$item->title}" src="{$item->coverImageUrl}"><i class="nbicos"></i></a>
                    <h3><a href="{novel_book_link id=$item->id  pinyin=$item->pinyin}">{$item->title}</a></h3>
                    作者：{$item->author}
                    <p>
                        {$item->summary|trim|strip_tags|truncate:15:'...'}
                    </p>
                </div>
                <ol class="clearfix olcrwrap">
            {else}
                    <li><a href="{novel_book_link id=$item->id pinyin=$item->pinyin}">{$item->title}</a></li>
			{/if}
            {if $block.last}
                </ol>
            {/if}
            {/novel_book_rank}
            </div>
        {/foreach}

        </div>
        <div class="lbline708">
        </div>    
</div>
</div>
{assign "newestChapters" array_reverse(array_slice($chapters, -7, -1, true))}

<div class="wrapone">
        <h2 style="font-size:14px">最新更新章节</h2>
        <div class="dirlboxs">
            <div class="clearfix dirconthree">
                <ol id="dirsort01">

                {foreach $newestChapters as $item}
                    <li><strong></strong><span class="splone"><a href="{novel_chapter_link bookid=$book->id id=$item->id  pinyin=$book->pinyin}">{$item->title}</a></span></li>

                {/foreach}
                </ol>
            </div>
        </div>
        <div class="bline706">
        </div>
</div>

<div class="crumbswrap">
    <span>推荐阅读：</span>
        {novel_book cid=[$book->category->id] where='recommendlevel <=6' order='createtime desc,allclicks desc' limit=14}
        <a href="{novel_book_link id=$item->id pinyin=$item->pinyin}">{$item->title}</a>
        {/novel_book}    
</div>

<div class="wrapone">
        <h2 style="font-size:14px">全部章节</h2>
        <div class="dirlboxs">
            <div class="clearfix dirconthree">
                <ol id="dirsort01">

                {foreach $chapters as $item}
                    <li><strong></strong><span class="splone"><a href="{novel_chapter_link bookid=$book->id id=$item->id pinyin=$book->pinyin} ">{$item->title}</a></span></li>

                {/foreach}
                </ol>
            </div>
        </div>
        <div class="bline706">
        </div>
</div>

<div class="wrapone">
    <h2 class="youlovetit">猜你喜欢</h2>
    <ul class="clearfix imgitems">
        {novel_book cid=[$book->cid] where='recommendlevel<=5' order='createtime desc,allclicks desc' limit=6}
        <li><a href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid pinyin=$item->pinyin}" class="imgcss"><img src="{$item->coverImageUrl}" alt="{$item->lastchaptertitle}"><strong>{$item->lastchaptertitle}</strong></a>
        <h3><a href="{novel_book_link id=$item->id pinyin=$item->pinyin}">{$item->title}</a></h3>
        {$item->summary|trim|strip_tags|strip_tags|truncate:20:"..."}</li>
        {/novel_book}
    </ul>
</div>
<div class="blinebgs">
</div>