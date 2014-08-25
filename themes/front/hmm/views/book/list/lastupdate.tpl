<link href="{$FW_THEME_URL}/css/global.css" rel="stylesheet" />
<link href="{$FW_THEME_URL}/css/book_other.css" rel="stylesheet" />
<!--container begin-->
<div class="container clearfix">
<div class="col_a"><!--rec_book begin-->

<!--rec_book end--> <!--cata_book begin-->
<div class="mod_box cata_book">
<div class="mod_hd clearfix">
<h3 class="tit">最近更新</h3>
</div>
<div class="mod_bd">
<div class="book_list lazyload_box">
	<ul class="clearfix">
	{foreach from=$list item=item}
		<li>
		<div class="imgbox">
			<a href="{novel_book_link id=$item->id pinyin=$item->pinyin}" target="_blank"> 
			<img width="90" height="118" src="{$item->coverImageUrl}"	alt="{$item->title}" title="{$item->title}" />
			 <span class="txt_bg">
			{if $item->flag == 1}连载中 {else}已完结 {$item->wordcount}万{/if}
			</span>
			</a>
		</div>
		<dl class="info">
			<dt>
				<a class="sub_link" href="{novel_book_link id=$item->id pinyin=$item->pinyin}" target="_blank">{$item->title|truncate:10:"...":true}</a>
			</dt>
			<dd>作者：<span>	{$item->author}</span></dd>
			<dd>更新到：
				<span>
					<a class="more" href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid}" target='_blank'>
						 {$item->lastchaptertitle}</a>
				</span>
			
				</dd>
			<dd class="desc">{$item->summary|strip_tags|truncate:62:"...":true}&nbsp;
			<a class="more" href="{novel_book_link id=$item->id pinyin=$item->pinyin}" title="{$item->title}" target="_blank">详细&gt;&gt;</a>
			</dd>
		</dl>
		</li>
		{/foreach}
	</ul>
	

</div>
        <div class="dirtools">
            {if $pages->pageCount > 1}
            <div class="page">
                {widget name="CLinkPager" pages=$pages firstPageLabel="1" lastPageLabel=$pages->pageCount header="" prevPageLabel="上一页" nextPageLabel="下一页"}
            </div>
            {/if}
        </div>

</div>
</div>
<!--cata_book end--></div>
<div class="col_b"><!--mod_a begin-->
<div class="mod mod_a">
<div class="hd">
<div class="tab_hd">
<ul class="mod_tab clearfix">
	<li class="cur" id="week-rank-bind"><span>周排行榜</span></li>
	<li id="month-rank-bind"><span>月排行榜</span></li>
</ul>
</div>
</div>
<div class="bd">{novel_block id=6} {novel_block id=7}</div>
</div>
<!--mod_a end--> <!--mod begin-->
{novel_block id=13}

<div class="mod">
<div class="hd">
<h3 class="tit">{$category->title}最新入库</h3>
</div>
<div class="bd">
<ul class="mod_con clearfix">
{novel_book  limit=10 order="createtime desc" cid=$category->id}<li>
		{if $block.iteration <= 3}
		<i class="num hot">{$block.iteration}</i>
		{else}
		<i class="num">{$block.iteration}</i>
		{/if}
		<div class="tit">
		<a href="{novel_book_link id=$item->id pinyin=$item->pinyin}" target="_blank">{$item->title|truncate:10:"...":true}</a>
		<span style="float:right">{$item->createtime|date_format:"m-d"}</span>
		</div>
	</li>
{/novel_book}
</ul>
</div>
</div>

<div class="mod">
<div class="hd">
<h3 class="tit">{$category->title}最新更新</h3>
</div>
<div class="bd">
<ul class="mod_con clearfix">
{novel_book  limit=10 order="lastchaptertime desc" cid=$category->id}
	<li>
		{if $block.iteration <= 3}
		<i class="num hot">{$block.iteration}</i>
		{else}
		<i class="num">{$block.iteration}</i>
		{/if}
		<div class="tit">
			<a href="{novel_book_link id=$item->id pinyin=$item->pinyin}" target="_blank">{$item->title|truncate:10:"...":true}</a>
			<span style="float:right">{$item->lastchaptertime|date_format:"m-d"}</span>
		</div>
	</li>
{/novel_book}
</ul>
</div>
</div>
<!--mod end--> <!--ad_box begin-->

<!--ad_box end--></div>
</div>
<!--container end-->
<!--footer beigin-->
<script	type="text/javascript" src="{$FW_THEME_URL}/js/jquery-1.4.3.min.js"></script>
<script	type="text/javascript" src="{$FW_THEME_URL}/js/common.js"></script>
<script	src="{$FW_THEME_URL}/js/jquery.cookie.js"></script>
<script	src="{$FW_THEME_URL}/js/ua.js"></script>