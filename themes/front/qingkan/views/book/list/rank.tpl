<link href="{$FW_THEME_URL}/css/top.css" rel="stylesheet" type="text/css">
<div class="phb_contain">
	<div class="phb_left phb_kuang">
		<div class="phb_bt02">榜单</div>
		
		<ul id="box"><li><a title="总点击榜" href="{novel_rank_link}#click_mod">小说点击榜</a></li></ul>
		<div class="line"></div>
		<ul id="box"><li><a title="月点击榜" href="{novel_rank_link}#vote_mod">小说推荐榜</a></li></ul>
		<div class="line"></div>
		<ul id="box"><li><a title="总点击榜" href="{novel_rank_link}#favor_mod">小说收藏榜</a></li></ul>
		<div class="line"></div>
		<ul id="box"><li><a title="月点击榜" href="{novel_rank_link}#word_mod">小说字数榜</a></li></ul>
		<div class="line"></div>
		<ul id="box"><li><a title="总点击榜" href="{novel_rank_link}#update_mod">最近更新</a></li></ul>
		<div class="line"></div>
		<ul id="box"><li><a title="月点击榜" href="{novel_rank_link}#create_mod">最新入库</a></li></ul>
		<div class="line"></div>
	</div>
	<div class="phb_right">
		<div class="phb_bt01 "><a href="javascript:;" onclick="AddFavorite(window.location.href,document.title)"><img src="{$FW_THEME_URL}/image/favorites.gif" align="absmiddle" border="0"></a></div>
		<div class="phb_tr3">
			<div class="mod" id="click_mod">
				<div class="phb_bt03">
					<div class="mod_l"><img src="{$FW_THEME_URL}/image/ph04.gif" align="absmiddle"> 小说点击榜</div>
					<div class="mod_r">
						<ul id="visitlist">
							<li class="hover"><a href="javascript:tab('visitlist','topvisit',1)">周</a></li>
							<li><a href="javascript:tab('visitlist','topvisit',2)">月</a></li>
							<li><a href="javascript:tab('visitlist','topvisit',3)">总</a></li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				<div class="phb_main">
					<div id="topvisit">
						<ul>
							{novel_book_rank type="click" order="week" limit=10}
							<li class="a3">
								<span><a href="{novel_book_link id=$item->id}" target="_blank" title="{$item->title}">{$item->title}</a></span>
								<cite>{$item->weekclicks}</cite>
							</li>
							{/novel_book_rank}

						</ul>
						<ul style="display:none;">
							{novel_book_rank type="click" order="month" limit=10}
							<li class="a3">
								<span><a href="{novel_book_link id=$item->id}" target="_blank" title="{$item->title}">{$item->title}</a></span>
								<cite>{$item->monthclicks}</cite>
							</li>
							{/novel_book_rank}
						</ul>
						<ul  style="display:none;">
							{novel_book_rank type="click" order="all" limit=10}
							<li class="a3">
								<span><a href="{novel_book_link id=$item->id}" target="_blank" title="{$item->title}">{$item->title}</a></span>
								<cite>{$item->allclicks}</cite>
							</li>
							{/novel_book_rank}
						</ul>
					</div>
				</div>
			</div>
			<div class="mod" id="vote_mod">
				<div class="phb_bt03">
					<div class="mod_l"><img src="{$FW_THEME_URL}/image/ph04.gif" align="absmiddle"> 小说推荐榜</div>
					<div class="mod_r">
						<ul id="votelist">
							<li class="hover"><a href="javascript:tab('votelist','topvote',1)">周</a></li>
							<li><a href="javascript:tab('votelist','topvote',2)">月</a></li>
							<li><a href="javascript:tab('votelist','topvote',3)">总</a></li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				<div class="phb_main">
					<div id="topvote">
						
						<ul>
							{novel_book order="weeklikenum desc" limit=10}
							<li class="a3">
								<span><a href="{novel_book_link id=$item->id}" target="_blank" title="{$item->title}">{$item->title}</a></span>
								<cite>{$item->weeklikenum}</cite>
							</li>
							{/novel_book}
						</ul>
						<ul style="display:none;">
							{novel_book order="monthlikenum desc" limit=10}
							<li class="a3">
								<span><a href="{novel_book_link id=$item->id}" target="_blank" title="{$item->title}">{$item->title}</a></span>
								<cite>{$item->monthlikenum}</cite>
							</li>
							{/novel_book}
						</ul>
						<ul  style="display:none;">
							{novel_book order="alllikenum desc" limit=10}
							<li class="a3">
								<span><a href="{novel_book_link id=$item->id}" target="_blank" title="{$item->title}">{$item->title}</a></span>
								<cite>{$item->alllikenum}</cite>
							</li>
							{/novel_book}
						</ul>							

					</div>
				</div>
			</div>
			<div class="mod" id="favor_mod">
				<div class="phb_bt03">
					<div class="mod_l"><img src="{$FW_THEME_URL}/image/ph04.gif" align="absmiddle"> 小说收藏榜</div>
					<div class="mod_r"></div>
					<div class="clear"></div>
				</div>
				<div class="phb_main">
					<ul>
						{novel_book  order="favoritenum desc" limit=10}
						<li class="a3">
							<span><a href="{novel_book_link id=$item->id}" target="_blank" title="{$item->title}">{$item->title}</a></span>
							<cite>{$item->favoritenum}</cite>
						</li>
						{/novel_book}
					</ul>
				</div>
			</div>
			<div class="mod" id="word_mod">
				<div class="phb_bt03">
					<div class="mod_l"><img src="{$FW_THEME_URL}/image/ph04.gif" align="absmiddle"> 小说字数榜</div>
					<div class="mod_r"></div>
					<div class="clear"></div>
				</div>
				<div class="phb_main">
					<ul>
						{novel_book  order="wordcount desc" limit=10}
						<li class="a3">
							<span><a href="{novel_book_link id=$item->id}" target="_blank" title="{$item->title}">{$item->title}</a></span>
							<cite>{$item->wordcount}</cite>
						</li>
						{/novel_book}
					</ul>
				</div>
			</div>

			<div class="mod" id="create_mod">
				<div class="phb_bt03">
					<div class="mod_l"><img src="{$FW_THEME_URL}/image/ph04.gif" align="absmiddle"> 最近更新</div>
					<div class="mod_r"></div>
					<div class="clear"></div>
				</div>
				<div class="phb_main">
					<ul>
						{novel_book  order="updatetime desc" limit=10}
						<li class="a3">
							<span><a href="{novel_book_link id=$item->id}" target="_blank" title="{$item->title}">{$item->title}</a></span>
							<cite>{$item->updatetime|date_format:'Y-m-d'}</cite>
						</li>
						{/novel_book}
					</ul>
				</div>
			</div>
			<div class="mod" id="create_mod">
				<div class="phb_bt03">
					<div class="mod_l"><img src="{$FW_THEME_URL}/image/ph04.gif" align="absmiddle"> 最新入库</div>
					<div class="mod_r"></div>
					<div class="clear"></div>
				</div>
				<div class="phb_main">
					<ul>
						{novel_book  order="createtime desc" limit=10}
						<li class="a3">
							<span><a href="{novel_book_link id=$item->id}" target="_blank" title="{$item->title}">{$item->title}</a></span>
							<cite>{$item->createtime|date_format:'Y-m-d'}</cite>
						</li>
						{/novel_book}
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</div>