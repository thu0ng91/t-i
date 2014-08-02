<link href="{$FW_THEME_URL}/css/book_other.css" rel="stylesheet" />

<!--path begin-->
<div class="wrap_in path">当前位置： <a href="{$FW_SITE_URL}">云阅首页 </a>&gt; <a
	href="{novel_category_link id=$book->category->id}">{$book->category->title}</a>&gt;
<a href="{novel_book_link id=$book->id}">{$book->title}</a></div>
<!--path end-->
<!--container begin-->
<div class="container clearfix">

<div class="col_a"><!--book_intro begin-->
<div class="mod_box book_intro" id="book_intro">

<div class="book_info clearfix">
<div class="cover">
<div class="imgbox"><img src="{$book->coverImageUrl}"
	alt="{$book->title}"></div>
<ul class="op_list">
</ul>
</div>
<div class="info"><span class="state">{if $book->flag == 1} 连载中 {else}
已完结 {/if}</span>
<h2>{$book->title}</h2>
<p class="book_intr"><span>作者：{$book->author}</span><span>分类：<a
	href="{novel_category_link id=$book->category->id}">{$book->category->title}</a></span><span>字数：<em>{$book->wordcount}</em></span></p>
<p class="book_con">
<p>{$book->summary}</p>
</p>
<div class="op clearfix"><a class="a_icon readnow"
	href="/book/{$book->id}/1.html" target="_blank">开始阅读</a> <a
	class="a_icon a_btn" href="{novel_book_download_link id=$book->id}" target="_blank">TXT下载</a>
	<a class="a_icon view_all" href="#" target="_blank">评论</a>
	<a class="a_icon view_all" href="#" target="_blank">推荐</a>
	<a class="a_icon view_all" href="#" target="_blank">加入书架</a>
<span id="added_store" class="a_icon addedshelf" style="display: none;"></span>
</div>
<div class="tip_box"><span class="arrow_out"></span> <span
	class="arrow_in"></span>
<ul class="tip_con clearfix">
	<li><span>更新到：</span> <a target="_blank"
		href="{novel_chapter_link bookid=$book->id id=$book->lastchapterid}"
		> 第{$book->lastchapterid}章 {$book->lastchaptertitle}</a>
	<span class="time">{$item->updatetime|date_format:'Y-m-d H:i:s'}</span>
	</li>
</ul>
</div>
</div>
</div>
<div class="book_contents">
<div class="hd">
<h3>《{$book->title}》最新章节</h3>
</div>
<div class="bd">
<div class="book_news" style="margin-top: 0px;">

<div class="contents_list">
<ul class="clearfix">
	{foreach $chapterla as $chapter}
	<li><a target="_blank"
		href="{novel_chapter_link bookid=$book->id id=$chapter->id}"> {if
	((count($chapterla)) - ($chapter->id)) >= 2 } 第{$chapter->id}章
	{$chapter->title} {else} <font color=red>第{$chapter->id}章
	{$chapter->title}</font> {/if} </a></li>
	{/foreach}
</ul>
</div>

<!-- 总目录 -->
<p class="total"><a id="link_ck" class="sub_link" href="javascript:;" >查看全部章节</a></p>
<div class="contents_list1" id="contents_list" style="display: none">
<ul class="clearfix">
	{foreach $chapters as $chapter}
	<li><a target="_blank"
		href="{novel_chapter_link bookid=$book->id id=$chapter->id}">第{$chapter->id}章
	{$chapter->title}</a></li>
	{/foreach}
</ul>
</div>
<!-- 总目录 -->

<div class="contents_list" id="contents_list1">
<ul class="clearfix">
	{foreach $chapterst as $chapter}
	<li><a target="_blank"
		href="{novel_chapter_link bookid=$book->id id=$chapter->id}">第{$chapter->id}章
	{$chapter->title}</a></li>
	{/foreach}
</ul>
</div>

</div>
</div>
</div>
<!--book_intro end--> <!--book_img beigin-->
<div class="mod_box book_img">
<div class="mod_hd">
<h3 class="tit">看过<em>《{$book->title}》</em>的人还看过</h3>
</div>
<div class="mod_bd">
	<div class="img_list">
		<ul class="clearfix  lazyload_box">
			{novel_book limit=10 order="alllikenum desc" cid=$book->category->id}
			<li>
			<a href="{novel_book_link id=$item->id}" title="{$item->title|truncate:16:"...":true}" target="_blank">
			<img src="{$item->coverImageUrl}" alt="{$item->title|truncate:16:"...":true}"	title="{$item->title|truncate:16:"...":true}" />
			<span>{$item->title|truncate:16:"...":true}</span>
			</a>
			</li>
			{/novel_book}
		</ul>
	</div>
</div>
</div>
<!--book_img end--></div>
</div>
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
<div class="bd">
<!-- 周排行榜 -->
{novel_block id=6}

<!-- 月排行榜 -->
{novel_block id=7}
</div>
</div>
<!--mod_a end--> <!--mod begin-->
<div class="mod">
<div class="hd">
<h3 class="tit">{$book->category->title}排行榜</h3>
</div>
<div class="bd">
<ul class="mod_con clearfix">
	{novel_book limit=10 order="allclicks desc" cid=[$category->id]}
	<li>{if $block.iteration <= 3} <i class="num hot">{$block.iteration}</i>
	{else} <i class="num">{$block.iteration}</i> {/if}
	<div class="tit"><a href="{novel_book_link id=$item->id}"
		target="_blank">{$item->title|truncate:16:"...":true}</a> <span
		style="float: right">{$item->createtime|date_format:"m-d"}</span></div>
	</li>
	{/novel_book}
</ul>
</div>
</div>
<!--mod end--> <!--act_box begin-->
</div>
</div>
<!--container end-->
