<!--列表-->
<div class="main">
	<div id="centerl">
        <div class="padding">
            <div class="box" style="width:980px;">
                <div class="title">
                    <h5 class="current">最近更新</h5>
                </div>
                <div class="books">
                    {foreach from=$list item=book}
                    <div class="bk">
                    <div class="pic">
                    <a href='{novel_book_link id=$book->id pinyin=$book->pinyin}' title='{$book->title}' target="_blank">
                    <img src="{$book->coverImageUrl}" alt='{$book->title}'/></a>
                    </div>
                    <h3><a href='{novel_book_link id=$book->id pinyin=$book->pinyin}'  target='_blank' title='{$book->title}'>{$book->title}</a></h3>
                    <h4>作者：{$book->author} </h4><div class="bnew"><a href="{novel_chapter_link bookid=$book->id id=$book->lastchapterid pinyin=$book->pinyin}" target="_blank">{$book->lastchaptertitle}</a></div><div class='bnew'>
                    <span>最后更新：{$book->lastchaptertime|date_format:'Y-m-d'}</span>
                    </div>
                    <p>{$book->summary|trim|strip_tags|truncate:30:'...'}</p>
                    </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
</div>
<!--end 列表-->

{if $pages->pageCount > 1}
<div class="boxt"></div>
<div style="margin:0 auto;width:1020px;">
    <div class="pages boxm">
        <div class="pagelink" id="pagelink">
            {widget name="CLinkPager" pages=$pages firstPageLabel="1" lastPageLabel=$pages->pageCount header="" prevPageLabel="<<" nextPageLabel=">>"}
        </div>
    </div>
</div>
<div class="boxb"></div>
{/if}

<div class="boxm" style="width:1020px; margin:0 auto;">
<div style="width:960px; margin:0 auto;">

</div>
</div>