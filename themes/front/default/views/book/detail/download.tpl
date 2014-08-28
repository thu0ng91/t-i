

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{$book->title},{$book->title}TXT下载</title>
    <meta name="keywords" content="{$book->title}TXT下载,{$book->title}TXT全本下载" />
    <meta name="description" content="{$siteinfo->SiteName}为小说爱好者提供辰东大大的{$book->title}最近更新章节阅读，{$book->title}全文在线阅读，{$book->title}最新章节电子书下载（包括{$book->title}的TXT格式下载、 {$book->title}的JAR格式下载、 {$book->title}的JAD格式下载、 {$book->title}的UMD格式下载、 {$book->title}的CHM格式下载）" />
  	<link href="{$FW_THEME_URL}/css/global.css" rel="stylesheet"/>
	<link href="{$FW_THEME_URL}/css/book_other.css" rel="stylesheet" />
	<script src="{$FW_THEME_URL}/js/jquery-1.4.3.min.js"></script>
</head>
<body>
<!--header begin-->
<div class="header clearfix">
<div class="logo"><a href="/"><img src="{$FW_THEME_URL}/images/logo.png" /></a></div>
<div class="search_meta">
	<div class="search_box">
	<form id="search" name="search" action="{novel_search_link}" method="get" onSubmit="return qrsearch();">
		<div class="serachwrap">
			<span class="search_text"><input id="kw" name="keyword" type="text" value="请输入小说名..." autocomplete="off"  title="请输入小说名..." onfocus="if(this.value==this.title) this.value='';" onblur="if(this.value=='') this.value=this.title;"  onSubmit="return qrsearch();" autofocus="true" x-webkit-speech="" x-webkit-grammar="builtin:translate"></span>
			<button type="submit" class="btn_search" id="search_top">搜小说</button>
		</div>
	</form>
	</div>
</div>
<div class="aside">
	{if $Yii->user->isGuest}
	<a href="{novel_link url='/member/do/login'}">登录</a>　|　
	<a href="{novel_link url='/member/do/register'}">注册</a>
	{else}
	<span class="c_loginimg"></span><a  href="{novel_link url='/member/my/information'}">个人中心</a>
	{/if}
</div>
</div>
<!--nav_other begin-->
<div class="nav nav_other">
<ul class="clearfix">
<ul class="clearfix">
	<li ><a href="{$FW_SITE_URL}" target="_self">首页</a></li>
	{novel_menu}
	<li><a href="{$item->url}">{$item->title}</a></li>
	{/novel_menu}
	<li><a href="{novel_lastupdate_link}">最新更新</a></li>
	<li><a href="{novel_rank_link}">小说排行榜</a></li>
	<li><a href="{novel_link url='/special/detail/index' params=['id'=>1]}">专题</a></li>
	<li><a href="{novel_link url='/notice/detail/index' params=['id'=>1]}">公告</a></li>
</ul>
</div>
<!--nav_other end-->
<!--header end-->
<!--path begin-->
<div class="wrap_in path">当前位置： <a href="{$FW_SITE_URL}">{$siteinfo->SiteName}首页</a> &gt; 
	<a href="{novel_category_link id=$book->category->id}">{$book->category->title}</a> &gt;
	<a href="{novel_book_link id=$book->id}">{$book->title}</a> &gt;
	<a href="{novel_book_download_link id=$book->id}">{$book->title}TXT下载 </a>
</div>
<!--path end-->
<!--container begin-->
<div class="container clearfix">
	<div class="col_a"><!--book_intro begin-->
		<div class="mod_box book_intro" id="book_intro">
			<div class="book_info clearfix">
				<div class="cover">
					<div class="imgbox">
						<img src="{$book->coverImageUrl}" alt="{$book->title}">
					</div>
				</div>
				<div class="info">
					<span class="state">{if $book->flag == 0} 连载中 {else}已完结 {/if}</span>
					<h2>{$book->title}</h2>
					<p class="book_intr">
						<span>作者：{$book->author}</span>
						<span>分类：	<a href="{novel_category_link id=$book->category->id}">{$book->category->title}</a></span>
						<span>字数：<em>{$book->wordcount}</em></span>
					</p>
					<p class="book_con"></p>
					<div id="TxtdownTop">
				        <div style="float:left;width:100%">◎ 
				        	<a href="{$FW_SITE_URL}">{$siteinfo->SiteName}</a> - 
				            <a href="{novel_book_link id=$book->id}">{$book->title}在线阅读</a><br />
				            <a href="{novel_book_download_link type='full' id=$book->id}">{$book->title}TXT下载（右键目标另存为）</a>
				        </div>
					</div>
					<div class="op clearfix">
						<a class="a_icon readnow" href="{novel_chapter_link bookid=$book->id id=1}" target="_blank">开始阅读</a> 
						<a class="a_icon view_all" href="javascript:;" onclick="uservote({$book->id})">推荐</a>
						<a class="a_icon view_all" href="javascript:;" onclick="addbookcase({$book->id})">加入书架</a>
						<span id="added_store" class="a_icon addedshelf" style="display: none;"></span>
					</div>
				</div>
			</div>
			<div class="mod_box book_img">
				<div class="mod_hd">
					<h3 class="tit">下载推荐</h3>
				</div>
				<div class="mod_bd">
					<div class="img_list">
						<ul class="clearfix  lazyload_box">
							{novel_book limit=10 order="alllikenum desc" cid=$book->category->id}
							<li>
								<a href="{novel_book_link id=$item->id}" title="{$item->title|truncate:10:"...":true}" target="_blank">
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
		<div class="mod">
			<div class="hd">
				<h3 class="tit">{$book->category->title}排行榜</h3>
			</div>
			<div class="bd">
				<ul class="mod_con clearfix">
					{novel_book limit=10 order="allclicks desc" cid=$category->id}
					<li>{if $block.iteration <= 3} <i class="num hot">{$block.iteration}</i>
					{else} <i class="num">{$block.iteration}</i> {/if}
					<div class="tit"><a href="{novel_book_link id=$item->id}"
						target="_blank">{$item->title|truncate:10:"...":true}</a> <span
						style="float: right">{$item->createtime|date_format:"m-d"}</span></div>
					</li>
					{/novel_book}
				</ul>
			</div>
		</div>
	</div>
	
</div>
<!--container end-->
<!-- footer -->
<!-- footer -->
<script type="text/javascript" src="{$FW_THEME_URL}/js/index.js"></script>
<script type="text/javascript" src="{$FW_THEME_URL}/js/common1.js"></script>
<script type="text/javascript" src="{$FW_THEME_URL}/js/common.js"></script>
<div class="footer">
    <br />
    <a href="http://www.yunyuewang.com/">云阅简介</a> |
	<a href="http://www.yunyuewang.com/">联系我们</a> |
    <a href="http://www.yunyuewang.com/">合作伙伴</a> |
    <a href="http://www.yunyuewang.com/">广告服务</a> |
    <a href="http://www.yunyuewang.com/">招聘信息</a> |
    <a href="http://www.yunyuewang.com/">网站地图</a> |
    <a href="http://www.yunyuewang.com/">会员注册</a> |
    <a href="http://www.yunyuewang.com/">产品答疑</a>
    <br />
    Copyright © 2014 YUNYUE Corporation, All Rights Reserved <br>
    上海云阅信息技术有限公司版权所有
</div>
<!--footer end-->
<!-- spend time: {$TIME} -->
</body>
</html>