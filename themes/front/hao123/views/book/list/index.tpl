{* 分类属性 *}
<div class="wrapone">
    {*<h2 class="youlovetit">猜你喜欢</h2>*}
    <ul class="clearfix imgitems">
        {novel_book cid=[$category->id] where='recommendlevel<=7' order='createtime desc,allclicks desc' limit=6}
        <li><a href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid  pinyin=$item->pinyin}" class="imgcss"><img src="{$item->coverImageUrl}" alt="{$item->lastchaptertitle}"><strong>{$item->lastchaptertitle}</strong></a>
        <h3><a href="{novel_book_link id=$item->id  pinyin=$item->pinyin}">{$item->title}</a></h3>
        {$item->summary|trim|strip_tags|truncate:20:"..."}</li>
        {/novel_book}
    </ul>
</div>
<script>article_list_banner_top();</script>
<div class="listcon clearfix">
    <div class="listconl">
        <div class="listconltop">
            <span class="width57">序号</span><span class="width369">小说类别/小说书名/小说章节</span><span class="width85">状态</span><span class="width84">下载</span><span class="width111">小说作者</span>
        </div>
        <ul class="clearfix">
            {foreach from=$list item=item name=book}
            <li><span class="width57">{$smarty.foreach.book.iteration}</span><span class="width369 jhfd">[{$category->title}]<a href="{novel_book_link id=$item->id  pinyin=$item->pinyin}" class="green" target="_blank">{$item->title}</a><a href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid  pinyin=$item->pinyin}" class="gray" target="_blank">{$item->lastchaptertitle}</a></span><span class="width85 green">连载中</span><span class="width84"><a href="{novel_book_download_link id=$item->id}">TXT下载</a></span><span class="width111"><a href="#" class="nichen">{$item->author}</a></span></li>
            {/foreach}
        </ul>
        <div class="dirtools">
            {if $pages->pageCount > 1}
            <div class="pages">
                {widget name="CLinkPager" pages=$pages firstPageLabel="1" lastPageLabel=$pages->pageCount header="" prevPageLabel="<<" nextPageLabel=">>"}
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
            {novel_book_rank order=$v cid=[$category->id] limit=12}
            {if $block.first}
                <div class="cimgsfont">
                    <a class="imgcss" href="{novel_book_link id=$item->id  pinyin=$item->pinyin}"><img alt="{$item->title}" src="{$item->coverImageUrl}"><i class="nbicos"></i></a>
                    <h3><a href="{novel_book_link id=$item->id pinyin=$item->pinyin}">{$item->title}</a></h3>
                    作者：{$item->author}
                    <p>
                        {$item->summary|strip_tags|trim|truncate:15:'...'}
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
        <div class="clearfix l_rboxone">
        {novel_book cid=[$category->id]}
            {if $block.first}
            <ul class="clearfix ritemone">
            {/if}
            {if $block.index < 1}
                {*if $block.first*}
                <li><a href="{novel_book_link id=$item->id  pinyin=$item->pinyin}"><img alt="{$item->title}" src="{$item->coverImageUrl}"></a>
                <h3><a href="{novel_book_link id=$item->id  pinyin=$item->pinyin}">{$item->title}</a></h3>
                <p>
                    {$item->summary|strip_tags|trim|truncate:15:'...'}
                </p>
                </li>
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
                <li><a href="{novel_book_link id=$item->id  pinyin=$item->pinyin}">{$item->title}</a></li>
            {/if}
            
            {if $block.index > 2 && $block.last}
            </ul>
            {/if}
        {/novel_book}
        </div>
    </div>
</div>
<script>article_list_banner_middle();</script>
{literal}
<script>
$(function(){
    
    clicktabs(".tittwo li",".crconsbox>div","cur");

});
</script>
{/literal}