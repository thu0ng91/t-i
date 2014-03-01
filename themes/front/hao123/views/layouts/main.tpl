<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7">
<title>{$title}</title>
<meta name="keywords" content="{$keywords}"/>
<meta name="description" content="{$description}"/>
<link href="{$FW_THEME_URL}/css/common.css" rel="stylesheet">
{if $this->id == 'site'}
<link href="{$FW_THEME_URL}/css/index.css" rel="stylesheet">
<link href="{$FW_THEME_URL}/css/indexbox.css" rel="stylesheet">
{elseif $this->id == 'list'}
<link href="{$FW_THEME_URL}/css/list.css" rel="stylesheet">
<link href="{$FW_THEME_URL}/css/list20130604.css" rel="stylesheet">
{/if}
<base target="_blank">
</head>
<body>
<div id="page-header">

	<div id="header">
		<div class="wrap980">
			<div class="logocss"><a href="{$FW_SITE_URL}">{$siteinfo->SiteName}</a></div>
			<form id="search" name="search" action="{novel_search_link}" method="get" onSubmit="return qrsearch();"><div class="serachwrap">
				<span class="search_text"><input id="kw" name="kw" type="text" value="请输入小说名..." autocomplete="off"  title="请输入小说名..." onfocus="if(this.value==this.title) this.value='';" onblur="if(this.value=='') this.value=this.title;"  onSubmit="return qrsearch();" autofocus="true" x-webkit-speech="" x-webkit-grammar="builtin:translate"></span><input type="submit" value="" class="search_submit">
				<p>热门搜索：<a href="/intro/41222">莽荒纪</a><a href="/intro/37411">天才相师</a><a href="/intro/37604">最强弃少</a><a href="/intro/37444">求魔</a><a href="/intro/37407">绝世唐门</a></p>
			</div></form>
			<div id="favid" class="favboxs">
				<div class="favsbtn">收藏</div>
				<div class="recordwrap" id="favconid">
					<i>暂无收藏记录...</i>
				</div>
			</div>
			<div id="readid" class="readrecord">
				<div class="recordbtn">阅读记录</div>
				<div class="recordwrap" id="recorconid">
					<i>暂无阅读记录...</i>
				</div>
			</div>
		</div>
	</div>

	<div id="nav">
		<p><a href="{$FW_SITE_URL}" target="_self">首页</a>{novel_menu}|<a href="{novel_category_link id=$item->id}">{$item->title}</a>{/novel_menu}<a href="{novel_rank_link}">小说排行榜</a></p>
	</div>
	<div class="class_wraptop">
	</div>

	{$content}

	<div class="blinebgs"></div>
	<div class="footer" monkey="cool" style="border:0;" alog-alias="footer">
		<div id="ft">
			<!--footer--><p class="ft_link"><a href="http://www.hao123.com/abouthao123.htm" target="_blank">关于本站</a><b>|</b><a href="http://weibo.com/hao123gf" target="_blank">官方微博</a><b>|</b><a href="http://app.hao123.com/sms/index.html" class="mobile" target="_blank">手机版</a><b>|</b><a href="http://dl.123juzi.net/hao123JuziBrowser_1.1.3.8_h8.exe" class="browser hilight" target="_blank" title="打开hao123主页速度快一倍"><i></i>hao123桔子浏览器</a><b>|</b><a href="http://book.hao123.com/map/" target="_blank">网站地图</a></p><p class="copyright"><span class="intro">hao123.com 上网导航第一品牌</span><a class="beian" target="_blank" href="http://www.miibeian.gov.cn/">京ICP证030173号</a></p><div style="display:none;">
		</div>
	</div>
</div>
</body>
<script type="text/javascript" src="{$FW_THEME_URL}/js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="{$FW_THEME_URL}/js/jquery.boxy.js"></script>
<script type="text/javascript" src="{$FW_THEME_URL}/js/jquery.autocomplete.js"></script>
<script type="text/javascript" src="{$FW_THEME_URL}/js/common.js"></script>
<script type="text/javascript" src="{$FW_THEME_URL}/js/index.js"></script>
</html>