<!--列表-->
<div class="main">
	<div id="centerl">
        <div class="padding">
            <div class="box" style="width:980px;">
                <div class="title">
                    <h5 class="current">{$category->title}</h5>
                </div>
                <div class="books">
                    {foreach $list as $book}
                    <div class="bk">
                    <div class="pic">
                    <a href='{novel_book_link id=$book->id}' title='{$book->title}' target="_blank">
                    <img src="{$book->coverImageUrl}" alt='{$book->title}'/></a>
                    </div>
                    <h3><a href='{novel_book_link id=$book->id}'  target='_blank' title='{$book->title}'>{$book->title}</a></h3>
                    <h4>作者：{$book->author} </h4><div class="bnew"><a href="{novel_chapter_link bookid=$book->id id=$book->lastchapterid}" target="_blank">{$book->lastchaptertitle}</a></div><div class='bnew'>
                    <span>最后更新：{$book->createtime|date_format:'Y-m-d'}</span>
                    </div>
                    <p>{$book->summary|trim|truncate:30:'...'}</p>
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
            {*<em id="pagestats">1/51</em><a href="/modules/article/index.php?class=1&page=1" class="first">1</a><a href="/modules/article/index.php?class=1&page=1" class="pgroup">&lt;&lt;</a><strong>1</strong><a href="/modules/article/index.php?class=1&page=2">2</a><a href="/modules/article/index.php?class=1&page=3">3</a><a href="/modules/article/index.php?class=1&page=4">4</a><a href="/modules/article/index.php?class=1&page=5">5</a><a href="/modules/article/index.php?class=1&page=6">6</a><a href="/modules/article/index.php?class=1&page=7">7</a><a href="/modules/article/index.php?class=1&page=8">8</a><a href="/modules/article/index.php?class=1&page=9">9</a><a href="/modules/article/index.php?class=1&page=10">10</a><a href="/modules/article/index.php?class=1&page=2" class="next">&gt;</a><a href="/modules/article/index.php?class=1&page=16" class="ngroup">&gt;&gt;</a><a href="/modules/article/index.php?class=1&page=51" class="last">51</a><kbd><input name="page" type="text" size="4" maxlength="6" onkeydown="{literal}if(event.keyCode==13){window.location='/modules/article/index.php?class=1&page='+this.value; return false;}{/literal}" /></kbd>*}
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