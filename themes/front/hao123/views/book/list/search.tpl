{* 分类属性 *}

<div class="listcon clearfix">
    <div class="listconl">
        <div class="listconltop">
            <h5 class="current">关键字 “{$keyword|strip_tags}” 共找到{$pages->itemCount}个搜索结果</h5>
        </div>
        <div class="listconltop">
            <span class="width57">序号</span><span class="width369">小说类别/小说书名/小说章节</span><span class="width85">状态</span><span class="width84">字数</span><span class="width111">小说作者</span>
        </div>
        {*
        <div class="dirtools">
            <div class="pages">
                <a href="/index/type-qihuan/index.html">首页</a><a href="/index/type-qihuan/index.html">上一页</a><strong>1</strong><a href="/index/type-qihuan/index_2.html" title="第2页">2</a><a href="/index/type-qihuan/index_3.html" title="第3页">3</a><a href="/index/type-qihuan/index_4.html" title="第4页">4</a><a href="/index/type-qihuan/index_5.html" title="第5页">5</a><a href="/index/type-qihuan/index_6.html" title="第6页">6</a><a href="/index/type-qihuan/index_7.html" title="第7页">7</a><a href="/index/type-qihuan/index_8.html" title="第8页">8</a><a href="/index/type-qihuan/index_2.html">下一页</a><a target="_self" href="/index/type-qihuan/index_30.html">尾页</a>
            </div>
        </div>
        *}
        <ul class="clearfix">

            {foreach $list as $item}
            <li><span class="width57">{$item@iteration}</span><span class="width369 jhfd">[{$item->category->title}]<a href="{novel_book_link id=$item->id}" class="green" target="_blank">{$item->title}</a><a href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid}" class="gray" target="_blank">{$item->lastchaptertitle}</a></span><span class="width85 green">连载中</span><span class="width84">{$item->wordcount}</span><span class="width111"><a href="#" class="nichen">{$item->author}</a></span></li>
            {/foreach}
        </ul>
        <div class="dirtools">
            {if $pages->pageCount > 1}
            <div class="pages">
                {widget name="CLinkPager" pages=$pages firstPageLabel="1" lastPageLabel=$pages->pageCount header="" prevPageLabel="<<" nextPageLabel=">>"}
                {*
                <a href="/index/type-qihuan/index.html">首页</a><a href="/index/type-qihuan/index.html">上一页</a><strong>1</strong><a href="/index/type-qihuan/index_2.html" title="第2页">2</a><a href="/index/type-qihuan/index_3.html" title="第3页">3</a><a href="/index/type-qihuan/index_4.html" title="第4页">4</a><a href="/index/type-qihuan/index_5.html" title="第5页">5</a><a href="/index/type-qihuan/index_6.html" title="第6页">6</a><a href="/index/type-qihuan/index_7.html" title="第7页">7</a><a href="/index/type-qihuan/index_8.html" title="第8页">8</a><a href="/index/type-qihuan/index_2.html">下一页</a><a target="_self" href="/index/type-qihuan/index_30.html">尾页</a>
                *}
            </div>
            {/if}
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
            {novel_book_rank order=$v limit=12}
            {if $block.first}
                <div class="cimgsfont">
                    <a class="imgcss" href="{novel_book_link id=$item->id}"><img alt="{$item->title}" src="{$item->coverImageUrl}"><i class="nbicos"></i></a>
                    <h3><a href="{novel_book_link id=$item->id type='info'}">{$item->title}</a></h3>
                    作者：{$item->author}
                    <p>
                        {$item->summary|trim|truncate:15:'...'}
                    </p>
                </div>
                <ol class="clearfix olcrwrap">
            {/if}
                    <li><a href="{novel_book_link id=$item->id}">{$item->title}</a></li>
            {if $block.last}
                </ol>
            {/if}
            {/novel_book_rank}
            </div>
        {/foreach}

        </div>
        <div class="lbline708">
        </div>
        <div class="clearfix l_rboxone">
        {novel_book}
            {if $block.first}
            <ul class="clearfix ritemone">
            {/if}
            {if $block.index < 2}
                {*if $block.first*}
                <li><a href="{novel_book_link id=$item->id}"><img alt="{$item->title}" src="{$item->coverImageUrl}"></a>
                <h3><a href="{novel_book_link id=$item->id}">{$item->title}</a></h3>
                <p>
                    {$item->summary|trim|truncate:15:'...'}
                </p>
                </li>
                {*/if*}
            {/if}
            {if $block.index == 2}
            </ul>
            {/if}
            {if $block.index < 2 && $block.last}
            </ul>
            {/if}
            {if $block.index == 2 && $block.total > 2}
            <ul class="clearfix ritemtwo">
            {/if}
            {if $block.index >=2}
                <li><a href="{novel_book_link id=$item->id}">{$item->title}</a></li>
            {/if}
            
            {if $block.index > 2 && $block.last}
            </ul>
            {/if}
        {/novel_book}
        </div>
        <div class="lbline708">
        </div>
        {*
        <div class="l_rboxtwo">
            <h2 class="rtitone">其他人也喜欢</h2>
            <div class="clearfix ritemthree">
                <a href="/intro/41283" target="_blank"><img src="http://imgs.imgshao123.net/UploadFile/2013530/20130530045716411641.jpg" alt=" 番外篇之连若水">校花的贴身保镖</a><a href="/intro/13211610" target="_blank"><img src="http://imgs.imgshao123.net/UploadFile/201377/20130707180432763276.jpg" alt="第863章 雷霆之势">风流医圣</a><a href="/intro/13043" target="_blank"><img src="http://imgs.imgshao123.net/UploadFile/2013422/20130422124617491749.jpg" alt=" 第一百八十九章 尾声">穿越笑傲江湖</a><a href="/intro/37999" target="_blank"><img src="http://imgs.imgshao123.net/UploadFile/2013422/20130422144535533553.jpg" alt="完本感言（新书《逆火》已发布！）">少女契约之书</a><a href="/intro/35477" target="_blank"><img src="http://imgs.imgshao123.net/UploadFile/2013529/20130529163662306230.jpg" alt="第2688章 说客">超级兵王</a><a href="/intro/35497" target="_blank"><img src="http://imgs.imgshao123.net/UploadFile/2013422/20130422175417621762.jpg" alt="推荐玄幻最新力作《斗龙》">战皇</a>
            </div>
        </div>
        *}
        <div class="lbline708">
        </div>
    </div>
</div>
{literal}
<script>
$(function(){
    
    clicktabs(".tittwo li",".crconsbox>div","cur");

});
</script>
{/literal}