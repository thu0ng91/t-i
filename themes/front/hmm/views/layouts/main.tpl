<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7">
<title id="tit">{$title}</title>
<meta name="keywords" content="{$keywords|strip_tags}"/>
<link href="{$FW_THEME_URL}/css/global.css" rel="stylesheet"/>
<script type="text/javascript" src="{$FW_THEME_URL}/js/jquery-1.4.3.min.js"></script>
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
	{hook name="onHeadTopSearchWords"}
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
{$content}
<!-- footer -->
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

<script type="text/javascript" src="{$FW_THEME_URL}/js/index.js"></script>
<script type="text/javascript" src="{$FW_THEME_URL}/js/common1.js"></script>
<script type="text/javascript" src="{$FW_THEME_URL}/js/common.js"></script>
</body>
</html>
<!-- spend time: {$TIME} -->