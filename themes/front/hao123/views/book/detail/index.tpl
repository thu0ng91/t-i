<link href="{$FW_THEME_URL}/css/directory.css" rel="stylesheet">
<link href="{$FW_THEME_URL}/css/directory20130605.css" rel="stylesheet">

<div class="crumbswrap">
    <span>当前位置：</span><a href="{$FW_SITE_URL}">首页</a>&gt;<a href="{novel_category_link id=$book->category->id}">{$book->category->title}</a><em>&gt;&nbsp;{$book->title}</em>
</div>
<div class="clearfix wrap980">
    <div class="wrap706">
        <div class="con_lwrap">
            <span class="lzzico"></span>
            <div class="con_limg">
                <img src="{$book->coverImageUrl}" alt="{$book->title}">
                <a href="#feedback" class="cwfk boxy">错误反馈</a>
                <a href="#" class="sccs">收藏此书</a>
                <!-- Baidu Button BEGIN -->
                <div id="bdshare" class="bdshare_b" style="margin-left:28px;margin-top:7px; _margin-left:14px;_margin-top:7px;;">
                    <a href="#" class="fxcs" style="padding-left:30px;">分享此书</a>
                </div>
                <script src="http://bdimg.share.baidu.com/static/js/bds_s_v2.js?cdnversion=387158" type="text/javascript" id="bdshare_js" data="type=button&amp;uid=0"></script>
                <!-- Baidu Button END -->
            </div>
            <div class="r420">
                <h1>{$book->title}</h1>
                <p class="author">
                    作者：<span class="black"><a href="#" target="_blank">{$book->author}</a></span>
                </p>
                <div class="r_cons">
                {$book->summary}
                </div>
                <div class="r_tools">
                    {*
                    <a href="/intro/132154/chaptershow.html" class="startedbtn" target="_blank">开始阅读</a><a href="/intro/132154/chapter.html" class="diralinks">目录</a><a href="/intro/132154/chapterlist.html" class="newchapter">最新章节</a>
                    *}
                </div>
                <div class="lastrecord">
                    最新章节：<strong><a href="{novel_chapter_link bookid=$book->id id=$book->lastchapterid}" target="_blank">{$book->lastchaptertitle}</a></strong>
                    <div class="jianj">
                    </div>
                </div>
            </div>
        </div>
        <div class="bline706">
        </div>
    </div>
    <div class="w262">
        <h2 class="rtitone">最近更新</h2>
        <div class="ritembox">
            {novel_book cid=[$book->cid] order="lastchaptertime desc" limit=7}
            {if $block.first}
            <div class="cimgsfont">
                <a class="imgcss" href="{novel_book_link id=$book->id}"><img alt="{$item->title}" src="{$item->coverImageUrl}"><i class="nbicos"></i></a>
                <h3><a href="/intro/37457">{$item->title}</a></h3>
                作者：{$item->author}
                <p>{$item->summary|trim|truncate:30:"..."}</p>
            </div>
            <ol class="clearfix olcrwrap bg_gray">
            {/if}
                {if !$block.first}
                <li><span>{$item.lastchaptertime|date_format:'Y-m'}</span><a href="{novel_book_link id=$item->id}">{$item->title}</a></li>
                {/if}
            {if $block.last}
            </ol>
            {/if}
            {/novel_book}
        </div>
        <div class="bline706">
        </div>
    </div>
</div>
<div class="clearfix wrap980">
    <div class="wrap706">
    {*
        <div class="dirlboxs">
            <div class="clearfix dirconthree">
                <ol id="dirsort01">
                {assign "i" 1}
                {foreach $chapters as $item}
                    <li><strong>{$i}</strong><span class="splone"><a href="{novel_chapter_link bookid=$book->id id=$item->id}">{$item->title}</a></span></li>
                    {assign "i" $i +1}
                {/foreach}
                </ol>
            </div>
        </div>
        <div class="bline706">
        </div>
        *}
    </div>
    {*
    <div class="w262">
        <div class="ritemboxtwo">
            <div class="tittwo">
                <h2>热门排行</h2>
                <ul>
                    <li class="cur">日</li>
                    <li>周</li>
                    <li>月</li>
                </ul>
            </div>
            <div id="dirconsone">
            {foreach ['day', 'month', 'week'] as $t}
                <div {if !$t@first}class="hidden"{/if}>
                {novel_book_rank order=$t cid=[$book->cid] limit=12}
                    {if $block.first}
                    <div class="cimgsfont">
                        <a class="imgcss" href="{novel_book_link id=$item->id}"><img alt="{$item->title}" src="{$item->coverImageUrl}"><i class="nbicos"></i></a>
                        <h3><a href="{novel_book_link id=$item->id}"></a></h3>
                        作者：{$item->author}
                        <p>
                            {$item->summary|trim|truncate:30:"......"}
                        </p>
                    </div>
                    <ol class="clearfix olcrwrap">
                    {/if}
                    {if !$block.first}
                        <li><span>{$item.allclicks}</span><a href="{novel_book_link id=$item->id}">{$item->title}</a></li>
                    {/if}
                    {if $block.last}
                    </ol>
                    {/if}
                {/novel_book_rank}
                </div>
            {/foreach} 
            </div>
        </div>
        <div class="bline706">
        </div>
    </div>
    *}
</div>

<div class="wrapone">
        <div class="dirlboxs">
            <div class="clearfix dirconthree">
                <ol id="dirsort01">
                {assign "i" 1}
                {foreach $chapters as $item}
                    <li><strong>{$i}</strong><span class="splone"><a href="{novel_chapter_link bookid=$book->id id=$item->id}">{$item->title}</a></span></li>
                    {assign "i" $i +1}
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
        {novel_book cid=[$book->cid] order='allclicks desc' limit=6}
        <li><a href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid}" class="imgcss"><img src="{$item->coverImageUrl}" alt="{$item->lastchaptertitle}"><strong>{$item->lastchaptertitle}</strong></a>
        <h3><a href="{novel_book_link id=$item->id}">{$item->title}</a></h3>
        {$item->summary|trim|truncate:20:"..."}</li>
        {/novel_book}
    </ul>
    {*
    <ul class="hottj clearfix">
        <li><a href="http://book.hao123.com/index/type-xianxia" class="mark">[仙侠]</a><a href="http://book.hao123.com/intro/41222" class="biaot">莽荒记</a></li>
        <li><a href="http://book.hao123.com/xuanhuan" class="mark">[玄幻]</a><a href="http://book.hao123.com/intro/37408" class="biaot">武动乾坤</a></li>
        <li><a href="http://book.hao123.com/index/type-xianxia" class="mark">[仙侠]</a><a href="http://book.hao123.com/intro/37424" class="biaot">凡人修仙传</a></li>
        <li><a href="http://book.hao123.com/xuanhuan" class="mark">[玄幻]</a><a href="http://book.hao123.com/intro/37420" class="biaot">光明纪元</a></li>
        <li><a href="http://book.hao123.com/xuanhuan" class="mark">[玄幻]</a><a href="http://book.hao123.com/intro/44784" class="biaot">斗罗大陆</a></li>
        <li><a href="http://book.hao123.com/wuxia" class="mark">[武侠]</a><a href="http://book.hao123.com/intro/37435" class="biaot">圣堂</a></li>
        <li><a href="http://book.hao123.com/qihuan" class="mark">[奇幻]</a><a href="http://book.hao123.com/intro/37414" class="biaot">傲世九重天</a></li>
        <li><a href="http://book.hao123.com/wuxia" class="mark">[武侠]</a><a href="http://book.hao123.com/intro/37558" class="biaot">百炼成仙</a></li>
        <li><a href="http://book.hao123.com/qihuan" class="mark">[奇幻]</a><a href="http://book.hao123.com/intro/37514" class="biaot">神座</a></li>
        <li><a href="http://book.hao123.com/dushi" class="mark">[都市]</a><a href="http://book.hao123.com/intro/37634" class="biaot">重生之我的书记人生</a></li>
        <li><a href="http://book.hao123.com/dushi" class="mark">[都市]</a><a href="http://book.hao123.com/intro/37604" class="biaot">最强弃少</a></li>
        <li><a href="http://book.hao123.com/dushi" class="mark">[都市]</a><a href="http://book.hao123.com/intro/35527" class="biaot">上位</a></li>
        <li><a href="http://book.hao123.com/dushi" class="mark">[都市]</a><a href="http://book.hao123.com/intro/37949" class="biaot">韩娱之天王</a></li>
        <li><a href="http://book.hao123.com/lishi" class="mark">[历史]</a><a href="http://book.hao123.com/intro/37410" class="biaot">醉枕江山</a></li>
        <li><a href="http://book.hao123.com/lishi" class="mark">[历史]</a><a href="http://book.hao123.com/intro/37411" class="biaot">天才相师</a></li>
        <li><a href="http://book.hao123.com/youxi" class="mark">[游戏]</a><a href="http://book.hao123.com/intro/37500" class="biaot">全职高手</a></li>
        <li><a href="http://book.hao123.com/youxi" class="mark">[游戏]</a><a href="http://book.hao123.com/intro/28434" class="biaot">网游之天谴修罗</a></li>
        <li><a href="http://book.hao123.com/wuxia" class="mark">[武侠]</a><a href="http://book.hao123.com/intro/37723" class="biaot">仙府之缘</a></li>
        <li><a href="http://book.hao123.com/yanqing" class="mark">[言情]</a><a href="http://book.hao123.com/intro/37453" class="biaot">校花的贴身高手</a></li>
        <li><a href="http://book.hao123.com/yanqing" class="mark">[言情]</a><a href="http://book.hao123.com/intro/24709" class="biaot">火爆天王</a></li>
        <li><a href="http://book.hao123.com/junshi" class="mark">[军事]</a><a href="http://book.hao123.com/intro/37685" class="biaot">巴比伦帝国</a></li>
        <li><a href="http://book.hao123.com/junshi" class="mark">[军事]</a><a href="http://book.hao123.com/intro/37606" class="biaot">明末边军一小兵</a></li>
        <li><a href="http://book.hao123.com/lishi" class="mark">[历史]</a><a href="http://book.hao123.com/intro/35527" class="biaot">剑道独尊</a></li>
        <li><a href="http://book.hao123.com/lingyi" class="mark">[灵异]</a><a href="http://book.hao123.com/intro/37522" class="biaot">盗墓笔记</a></li>
        <li><a href="http://book.hao123.com/xuanyi" class="mark">[悬疑]</a><a href="http://book.hao123.com/intro/39046" class="biaot">神武</a></li>
        <li><a href="http://book.hao123.com/kehuan" class="mark">[科幻]</a><a href="http://book.hao123.com/intro/37425" class="biaot">吞噬星空</a></li>
        <li><a href="http://book.hao123.com/index/type-xuanhuan" class="mark">[玄幻]</a><a href="http://book.hao123.com/intro/130956" class="biaot">大主宰</a></li>
        <li><a href="http://book.hao123.com/kehuan" class="mark">[科幻]</a><a href="http://book.hao123.com/intro/37471" class="biaot">最终进化</a></li>
    </ul>
    *}
</div>
<div class="blinebgs">
</div>