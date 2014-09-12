
<div style="width:100%;margin-top:-21px;"></div>
<script src="{$FW_THEME_URL}/js/ua.js"></script>
<link href="{$FW_THEME_URL}/css/book_other.css" rel="stylesheet" />
<!--container begin-->
<div class="container row_box clearfix">
<div class="row_aside">
<div class="hd">排行榜</div>
<ul class="clearfix">
<!--	{novel_menu}-->
<!--	<li><a {if $smarty.get.sort == $item->id}class="cur"{/if} href="{novel_rank_link}?id={$item->id}">{$item->title}</a></li>-->
<!--	{/novel_menu}-->
	<li><a {if $smarty.get.sort == 'allclicks'}class="cur"{/if}{if !$smarty.get.sort} class="cur"{/if} href="{novel_rank_link}">总点击</a></li>
	<li><a {if $smarty.get.sort == 'monthclicks'}class="cur"{/if} href="{novel_rank_link}?sort=monthclicks">月点击</a></li>
	<li><a {if $smarty.get.sort == 'weekclicks'}class="cur"{/if} href="{novel_rank_link}?sort=weekclicks">周点击</a></li>
	<li><a {if $smarty.get.sort == 'dayclicks'}class="cur"{/if} href="{novel_rank_link}?sort=dayclicks">日点击</a></li>
	<li><a {if $smarty.get.sort == 'alllikenum'}class="cur"{/if} href="{novel_rank_link}?sort=alllikenum">总推荐</a></li>
	<li><a {if $smarty.get.sort == 'monthlikenum'}class="cur"{/if} href="{novel_rank_link}?sort=monthlikenum">月推荐</a></li>
	<li><a {if $smarty.get.sort == 'weeklikenum'}class="cur"{/if} href="{novel_rank_link}?sort=weeklikenum">周推荐</a></li>
	<li><a {if $smarty.get.sort == 'daylikenum'}class="cur"{/if} href="{novel_rank_link}?sort=daylikenum">日推荐</a></li>
	<li><a {if $smarty.get.sort == 'wordcount'}class="cur"{/if} href="{novel_rank_link}?sort=wordcount">总字数</a></li>
	<li><a {if $smarty.get.sort == 'favoritenum'}class="cur"{/if} href="{novel_rank_link}?sort=favoritenum">总收藏</a></li>
	<li><a {if $smarty.get.sort == 'createtime'}class="cur"{/if} href="{novel_rank_link}?sort=createtime">最新入库</a></li>
	
	
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
		{if $smarty.get.sort}
		{if $smarty.get.sort == 'allclicks'} {assign var=condition value='allclicks desc'} {/if}
		{if $smarty.get.sort == 'monthclicks'} {assign var=condition value='monthclicks desc'} {/if}
		{if $smarty.get.sort == 'weekclicks'} {assign var=condition value='weekclicks desc'} {/if}
		{if $smarty.get.sort == 'daylikenum'} {assign var=condition value='daylikenum desc'} {/if}
		{if $smarty.get.sort == 'alllikenum'} {assign var=condition value='alllikenum desc'} {/if}
		{if $smarty.get.sort == 'monthlikenum'} {assign var=condition value='monthlikenum desc'} {/if}
		{if $smarty.get.sort == 'weeklikenum'} {assign var=condition value='weeklikenum desc'} {/if}
		{if $smarty.get.sort == 'daylikenum'} {assign var=condition value='daylikenum desc'} {/if}
		{if $smarty.get.sort == 'wordcount'} {assign var=condition value='wordcount desc'} {/if}
		{if $smarty.get.sort == 'favoritenum'} {assign var=condition value='favoritenum desc'} {/if}
		{novel_book  limit=$showNums order=$condition}
		<tr>
			<td class="font11">{$block.iteration}</td>
			<td class="cell_left">
				<div class="fix_txt"><a class="sub_link" href="{novel_book_link id=$item->id pinyin=$item->pinyin}"
					target="_blank" title="{$item->title|truncate:10:'...':true}">《{$item->title|truncate:10:"...":true}》</a>
					<a class="other_link"
					href="{novel_chapter_link bookid=$item->id pinyin=$item->pinyin id=$item->lastchapterid}" title="{$item->lastchaptertitle}" target="_blank">{$item->lastchaptertitle}</a>
				</div>
			</td>
			<td><font color="#3876b2">{if $item->flag == Yii::app()->controller->module['front']['flagstatus']} 连载中 {else} 已完结 {/if}</font></td>
			<td>{$item->wordcount}</td>
			<td>{$item->author}</td>
			<td>{$item->createtime|date_format:"m-d"}</td>
		</tr>
		{/novel_book}
		{else}
		{novel_book limit=$showNums order="allclicks desc" }
		<tr>
			<td class="font11">{$block.iteration}</td>
			<td class="cell_left">
			<div class="fix_txt"><a class="sub_link" href="{novel_book_link id=$item->id pinyin=$item->pinyin}"
				target="_blank" title="{$item->title|truncate:10:"...":true}">《{$item->title|truncate:10:"...":true}》</a>
				<a class="other_link"
				href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid pinyin=$item->pinyin}" title="{$item->lastchaptertitle}" target="_blank">{$item->lastchaptertitle}</a>
				 
				</div>
			</td>
			<td><font color="#3876b2">{if $item->flag == Yii::app()->controller->module['front']['flagstatus']} 连载中 {else} 已完结 {/if}</font></td>
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
