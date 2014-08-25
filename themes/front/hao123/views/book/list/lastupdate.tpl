{* 分类属性 *}

<div class="listcon clearfix">
    <div class="listconl">
        <div class="listconltop">
            <span class="width57">序号</span><span class="width369">小说类别/小说书名/小说章节</span><span class="width85">状态</span><span class="width84">字数</span><span class="width111">小说作者</span>
        </div>
        <ul class="clearfix">
            {foreach $list as $item}
            <li><span class="width57">{$item@iteration}</span><span class="width369 jhfd">[{$item->category->title}]<a href="{novel_book_link id=$item->id}" class="green" target="_blank">{$item->title}</a><a href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid}" class="gray" target="_blank">{$item->lastchaptertitle}</a></span><span class="width85 green">连载中</span><span class="width84">{$item->wordcount}</span><span class="width111"><a href="#" class="nichen">{$item->author}</a></span></li>
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
			{else}
                    <li><a href="{novel_book_link id=$item->id}">{$item->title}</a></li>
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
        <div class="clearfix l_rboxone">
        {novel_book}
            {if $block.first}
            <ul class="clearfix ritemone">
            {/if}
            {if $block.index < 1}
                <li><a href="{novel_book_link id=$item->id}"><img alt="{$item->title}" src="{$item->coverImageUrl}"></a>
                <h3><a href="{novel_book_link id=$item->id}">{$item->title}</a></h3>
                <p>
                    {$item->summary|trim|truncate:15:'...'}
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
                <li><a href="{novel_book_link id=$item->id}">{$item->title}</a></li>
            {/if}
            
            {if $block.index > 2 && $block.last}
            </ul>
            {/if}
        {/novel_book}
        </div>
        <div class="lbline708">
        </div>
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