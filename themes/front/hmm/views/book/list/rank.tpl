
<div style="width:100%;margin-top:-21px;"></div>
<script src="{$FW_THEME_URL}/js/ua.js"></script>
<link href="{$FW_THEME_URL}/css/book_other.css" rel="stylesheet" />
<!--container begin-->
<div class="container row_box clearfix">
<div class="row_aside">
<div class="hd">排行榜</div>
<ul class="clearfix">
<!--	{novel_menu}-->
<!--	<li><a {if $smarty.get.id == $item->id}class="cur"{/if} href="{novel_rank_link}?id={$item->id}">{$item->title}</a></li>-->
<!--	{/novel_menu}-->
	<li><a {if $smarty.get.id == 'allclicks'}class="cur"{/if}{if !$smarty.get.id} class="cur"{/if} href="top.html">总点击</a></li>
	<li><a {if $smarty.get.id == 'monthclicks'}class="cur"{/if} href="{novel_rank_link}?id=monthclicks">月点击</a></li>
	<li><a {if $smarty.get.id == 'weekclicks'}class="cur"{/if} href="{novel_rank_link}?id=weekclicks">周点击</a></li>
	<li><a {if $smarty.get.id == 'dayclicks'}class="cur"{/if} href="{novel_rank_link}?id=dayclicks">日点击</a></li>
	<li><a {if $smarty.get.id == 'alllikenum'}class="cur"{/if} href="{novel_rank_link}?id=alllikenum">总推荐</a></li>
	<li><a {if $smarty.get.id == 'monthlikenum'}class="cur"{/if} href="{novel_rank_link}?id=monthlikenum">月推荐</a></li>
	<li><a {if $smarty.get.id == 'weeklikenum'}class="cur"{/if} href="{novel_rank_link}?id=weeklikenum">周推荐</a></li>
	<li><a {if $smarty.get.id == 'daylikenum'}class="cur"{/if} href="{novel_rank_link}?id=daylikenum">日推荐</a></li>		
	<li><a {if $smarty.get.id == 'wordcount'}class="cur"{/if} href="{novel_rank_link}?id=wordcount">总字数</a></li>
	<li><a {if $smarty.get.id == 'favoritenum'}class="cur"{/if} href="{novel_rank_link}?id=favoritenum">总收藏</a></li>
	<li><a {if $smarty.get.id == 'createtime'}class="cur"{/if} href="{novel_rank_link}?id=createtime">最新入库</a></li>
	
	
</ul>
</div>
<div class="row_content" style="padding-top: 5px;">
<div class="bd">
<div class="tab_content">
<table class="data_render">
	<colgroup>
		<col class="order">
		<col class="book_name">
		<col class="status">
		<col class="num">
		<col class="author">
		<col class="uptime">
	</colgroup>
	<thead>
		<tr>
			<th>序号</th>
			<th class="cell_left">小说书名<i>/</i>小说章节</th>
			<th>状态</th>
			<th>字数</th>
			<th>作者</th>
			<th>更新时间</th>
		</tr>
	</thead>
	<tbody>
		{if $smarty.get.id}
		{if $smarty.get.id == 'allclicks'} {assign var=condition value='allclicks desc'} {/if}
		{if $smarty.get.id == 'monthclicks'} {assign var=condition value='monthclicks desc'} {/if}
		{if $smarty.get.id == 'weekclicks'} {assign var=condition value='weekclicks desc'} {/if}
		{if $smarty.get.id == 'daylikenum'} {assign var=condition value='daylikenum desc'} {/if}
		{if $smarty.get.id == 'alllikenum'} {assign var=condition value='alllikenum desc'} {/if}
		{if $smarty.get.id == 'monthlikenum'} {assign var=condition value='monthlikenum desc'} {/if}
		{if $smarty.get.id == 'weeklikenum'} {assign var=condition value='weeklikenum desc'} {/if}
		{if $smarty.get.id == 'daylikenum'} {assign var=condition value='daylikenum desc'} {/if}
		{if $smarty.get.id == 'wordcount'} {assign var=condition value='wordcount desc'} {/if}
		{if $smarty.get.id == 'favoritenum'} {assign var=condition value='favoritenum desc'} {/if}
		{novel_book  limit=30 order=$condition}
		<tr>
			<td class="font11">{$block.iteration}</td>
			<td class="cell_left">
				<div class="fix_txt"><a class="sub_link" href="{novel_book_link id=$item->id}"
					target="_blank" title="{$item->title|truncate:16:'...':true}">《{$item->title|truncate:16:"...":true}》</a>
					<a class="other_link"
					href="{novel_chapter_link bookid=$book->id id=$book->lastchapterid}" title="{$book->lastchaptertitle}" target="_blank">{$item->lastchaptertitle}</a>
				</div>
			</td>
			<td><font color="#3876b2">{if $item->flag == 0} 连载中 {else} 已完结 {/if}</font></td>
			<td>{$item->wordcount}</td>
			<td>{$item->author}</td>
			<td>{$item->createtime|date_format:"m-d"}</td>
		</tr>
		{/novel_book}
		{else}
		{novel_book limit=30 order="allclicks desc" }
		<tr>
			<td class="font11">{$block.iteration}</td>
			<td class="cell_left">
			<div class="fix_txt"><a class="sub_link" href="{novel_book_link id=$item->id}"
				target="_blank" title="{$item->title|truncate:16:"...":true}">《{$item->title|truncate:16:"...":true}》</a>
				<a class="other_link"
				href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid}" title="{$item->lastchaptertitle}" target="_blank">{$item->lastchaptertitle}</a>
				 
				</div>
			</td>
			<td><font color="#3876b2">{if $item->flag == 0} 连载中 {else} 已完结 {/if}</font></td>
			<td>{$item->wordcount}</td>
			<td>{$item->author}</td>
			<td>{$item->createtime|date_format:"m-d"}</td>
		</tr>
		{/novel_book}
		{/if}
	</tbody>
	</tbody>
</table>
</div>
</div>
</div>
</div>
<!--container end-->

<script	type="text/javascript" src="{$FW_THEME_URL}/js/jquery.lazyload.js"></script>
<script	type="text/javascript" src="{$FW_THEME_URL}/js/common.js"></script>
