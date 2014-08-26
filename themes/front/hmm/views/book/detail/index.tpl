<link href="{$FW_THEME_URL}/css/book_other.css" rel="stylesheet" />

<!--path begin-->
<div class="wrap_in path">当前位置： <a href="{$FW_SITE_URL}">{$siteinfo->SiteName}首页 </a>&gt; <a
	href="{novel_category_link id=$book->category->id}">{$book->category->title}</a>&gt;
<a href="{novel_book_link id=$book->id pinyin=$book->pinyin}">{$book->title}</a></div>
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
<li>总点击：{$book->allclicks}</li>
<li>月点击：{$book->monthclicks}</li>
<li>总推荐：{$book->alllikenum}</li>
<li>月推荐：{$book->monthlikenum}</li>
<li>已写<font style="color:red">{$book->wordcount}</font>字</li>
</ul>
</div>
<div class="info"><span class="state">{if $book->flag == 1} 连载中 {else}
已完结 {/if}</span>
<h2>{$book->title}</h2>
<p class="book_intr"><span>作者：{$book->author}</span><span>分类：<a
	href="{novel_category_link id=$book->category->id}">{$book->category->title}</a></span><span>字数：<em>{$book->wordcount}</em></span>{hook name="onBookIndexShare"}</p>
<p class="book_con">

<p>{$book->summary|strip_tags|nl2br}</p>
</p>
<div class="op clearfix">
	<a class="a_icon readnow" href="{novel_chapter_link bookid=$book->id pinyin=$book->pinyin  id=1}" target="_blank">开始阅读</a> 
	<a class="a_icon a_btn" href="{novel_book_download_link id=$book->id pinyin=$book->pinyin}" target="_blank">TXT下载</a>
	<a class="a_icon view_all" href="javascript:;" onclick="uservote({$book->id})">推荐</a>
	<a class="a_icon view_bookcase" href="javascript:;" onclick="addbookcase({$book->id})">加入书架</a>
	<span id="added_store" class="a_icon addedshelf" style="display: none;"></span>
</div>
<div class="tip_box"><span class="arrow_out"></span> <span
	class="arrow_in"></span>
	<div style="height:25px;line-height:25px;background:#fafdfe;border-bottom:1px #ffe4cc solid;padding:2px 5px;"><span style="color:#f60">更新到：</span>
	 <a target="_blank"	href="{novel_chapter_link bookid=$book->id id=$book->lastchapterid pinyin=$book->pinyin}">　
		 {$book->lastchaptertitle} </a><span class="time">{$book->lastchaptertime|date_format:'Y-m-d H:i:s'}　</span></div>
	<div style="padding:5px;">章节预览：<a target="_blank" href="{novel_chapter_link bookid=$book->id id=$book->lastchapterid pinyin=$book->pinyin}">{$endchaptertxt|nl2br}</a></div>

</div>
</div>
</div>
<div class="book_contents">
<div class="hd clearfix">
<ul>
<li><h3><a href="javascript:;" onclick="ta(1)" style="background:#d2e6f5;" id="newchapter">最新章节</a></h3></li>
{if $commentStatus == 1}
	<li><h3><a href="javascript:;" onclick="ta(2)" style="background:#f2f2f2;" id="newcomment">评论</a></h3></li>
{/if}
</ul>
</div>

<!-- 显示章节 -->
<div class="bd" id="ted">
<div class="book_news" style="margin-top: 0px;">
{if count($chapters) > 18}
	<!-- 最近章节开始 -->
	<div class="contents_list">
	<ul class="clearfix">
		{$i = 0}
		{foreach from=$chapterla item=chapter}
			<li>
			<a target="_blank" href="{novel_chapter_link bookid=$book->id id=$chapter->id pinyin=$book->pinyin}"> 
			{if	$i++ <= 2 }
				<font color='red'>{$chapter->title}</font>
			{else}
				{$chapter->title} 
			{/if} 
			</a>
			</li>
		{/foreach}
	</ul>
	</div>
	<!-- 最近章节结束 -->
	
	<!-- 总目录开始 -->
	<p class="total"><a id="link_ck" class="sub_link" href="javascript:;" >查看全部章节</a></p>
	<div class="contents_list" id="contents_list" style="display: none">
	<ul class="clearfix">
		{foreach from=$chapters item=chapter}
		<li>
			<a target="_blank" href="{novel_chapter_link bookid=$book->id id=$chapter->id pinyin=$book->pinyin}">{$chapter->title}</a>
		</li>
		{/foreach}
	</ul>
	</div>
	<!-- 总目录结束 -->
	
	<!-- 最初章节开始 -->
	<div class="contents_list" id="contents_list1">
	<ul class="clearfix">
		{foreach from=$chapterst item=chapter}
		<li><a target="_blank"
			href="{novel_chapter_link bookid=$book->id id=$chapter->id pinyin=$book->pinyin}">
		{$chapter->title}</a></li>
		{/foreach}
	</ul>
	</div>
	<!-- 最初章节结束 -->
{else}
	<!-- 最近章节开始 -->
	<div class="contents_list">
	<ul class="clearfix">
		{$i = 0}
		{foreach from=$chapterla item=chapter}
			{if $i < 3}
				<input type="hidden" value="{$i++}" />
				<li>
					<a target="_blank" href="{novel_chapter_link bookid=$book->id id=$chapter->id pinyin=$book->pinyin}"> 
						<font color=red>{$chapter->title}</font>
					 </a>
				 </li>
			 {/if}
		{/foreach}
	</ul>
	</div>
	<!-- 最近章节开始 -->
	
	<!-- 全部章节开始 -->
	<div class="contents_list" id="contents_list">
		<ul class="clearfix">
			{foreach from=$chapters item=chapter}
			<li>
				<a target="_blank" href="{novel_chapter_link bookid=$book->id id=$chapter->id pinyin=$book->pinyin}">{$chapter->title}</a>
			</li>
			{/foreach}
		</ul>
	</div>
	<!-- 全部章节开始 -->
{/if}
</div>
</div>
<!-- 显示章节结束 -->
</div>
{if $commentStatus == 1}
<!-- 评论开始 -->
<link href="{$FW_THEME_URL}/css/comment.css?123" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{$FW_THEME_URL}/js/comment.js"></script>

<div id="msgBox" class="radius clearfix">
<div id="comment" class="comment_view">
	<h3><!-- a href="" target="_blank">更多书评»</a>-->《{$book->title}》最新评论</h3>
	<div id="insertcomment"></div>
	{foreach from=$commends item=commend}
	<div class="comment_content" id="comment">
		<div class="c_block"></div>
		<div class="comment_user"><img src="{Member::getUserAvatarByUid($commend->uid)}" onerror="this.src='{$FW_THEME_URL}/images/avatar.bmp'"><br>{$commend->username}</div>
		<div class="comment_message" id="message">{$commend->content}<div class="reply">{$commend->dateline|date_format:'m月d日 H:i'}</div></div>
	</div>
	{/foreach}
	
	<form>
         <div>
         	<textarea style="float:left;" id="conBox" class="f-text radius" oninput="changeNum(event)" onpropertychange="changeNum(event)" ></textarea>
         	<p style="float:right;width: 210px;padding-left: 10px;">请大家认真评书，禁止灌水，刷分等，发现后扣除所发书评的所有积分。</p>
         </div>
         <div class="tr">
            <p>
               <span><i class="countTxt">还能输入</i><strong class="maxNum">140</strong><i>个字</i></span>
                <input id="sendBtn" type="button" value="" title="快捷键 Ctrl+Enter"  />
                <input id="userName" type="hidden" value="{$username}" />
                <input id="bookid" type="hidden" value="{$book->id}" />
                <img src="{if false == $avatar}{$FW_THEME_URL}/images/avatar.bmp{else}{$avatar}{/if}" style="display:none;" id="user_avatar" />
            </p>
        </div>
    </form>
</div>
</div>
{/if}
<!-- 评论结束 -->
<div class="mod_box book_img">
<div class="mod_hd">
<h3 class="tit">看过<em>《{$book->title}》</em>的人还看过</h3>
</div>
<div class="mod_bd">
	<div class="img_list">
		<ul class="clearfix  lazyload_box">
			{novel_book limit=10 order="alllikenum desc" cid=$book->category->id}
			<li>
			<a href="{novel_book_link id=$item->id pinyin=$item->pinyin}" title="{$item->title|truncate:10:"...":true}" target="_blank">
			<img src="{$item->coverImageUrl}" alt="{$item->title|truncate:10:"...":true}"	title="{$item->title|truncate:10:"...":true}" />
			<span>{$item->title|truncate:10:"...":true}</span>
			</a>
			</li>
			{/novel_book}
		</ul>
	</div>
</div>
</div>
</div>
</div>
<div class="col_b">
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

<div class="mod">
<div class="hd">
<h3 class="tit">{$book->category->title}排行榜</h3>
</div>
<div class="bd">
<ul class="mod_con clearfix">
	{novel_book limit=10 order="allclicks desc" cid=$category->id}
	<li>{if $block.iteration <= 3} <i class="num hot">{$block.iteration}</i>
	{else} <i class="num">{$block.iteration}</i> {/if}
	<div class="tit"><a href="{novel_book_link id=$item->id pinyin=$item->pinyin}"
		target="_blank">{$item->title|truncate:10:"...":true}</a> <span
		style="float: right">{$item->createtime|date_format:"m-d"}</span></div>
	</li>
	{/novel_book}
</ul>
</div>
</div>
</div>
</div>
<script type="text/javascript" src="{$FW_THEME_URL}/js/main.js"></script>