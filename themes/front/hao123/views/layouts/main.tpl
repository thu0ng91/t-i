<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7">
<title>{$title}</title>
<meta name="keywords" content="{$keywords|strip_tags}"/>
<meta name="description" content="{$description|trim|strip_tags|truncate:100:"..."|replace:"\n":" "|replace:"\r":" "}"/>
<link href="{$FW_THEME_URL}/css/common.css" rel="stylesheet">
{if $this->id == 'site'}
<link href="{$FW_THEME_URL}/css/index.css" rel="stylesheet">
<link href="{$FW_THEME_URL}/css/indexbox.css" rel="stylesheet">
{elseif $this->id == 'list'}
<link href="{$FW_THEME_URL}/css/list.css" rel="stylesheet">
<link href="{$FW_THEME_URL}/css/list20130604.css" rel="stylesheet">
{/if}
{if $this->id == 'site111'}
<base target="_blank">
{/if}
<script type="text/javascript" src="{$FW_THEME_URL}/js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="{$FW_THEME_URL}/js/common1.js"></script>
<script type="text/javascript">
	var siteUrl = '{$FW_SITE_URL}';
	var siteThemeUrl = '{$FW_THEME_URL}';
</script>

</head>
<body>
<div id="page-header">

	<div id="header">
		<div class="wrap980">
			<div class="logocss"><a href="{$FW_SITE_URL}"><img style="width:200px;height:62px" src="{$FW_THEME_URL}/images/logo.png" /></a></div>
			<form id="search" name="search" action="{novel_search_link}" method="get" onSubmit="return qrsearch();">
			<div class="serachwrap">
				<span class="search_text"><input id="kw" name="keyword" type="text" value="请输入小说名..." autocomplete="off"  title="请输入小说名..." onfocus="if(this.value==this.title) this.value='';" onblur="if(this.value=='') this.value=this.title;"  onSubmit="return qrsearch();" autofocus="true" x-webkit-speech="" x-webkit-grammar="builtin:translate"></span><input type="submit" value="" class="search_submit">
				<p>热门搜索：{novel_book where="recommendlevel=1" order="createtime desc"}<a href="{novel_book_link id=$item->id}">{$item->title}</a>{/novel_book}{*<a href="/intro/41222">莽荒纪</a><a href="/intro/37411">天才相师</a><a href="/intro/37604">最强弃少</a><a href="/intro/37444">求魔</a><a href="/intro/37407">绝世唐门</a>*}</p>
			</div>
			</form>
			{*
			<div id="favid" class="favboxs">
				<div class="favsbtn">收藏</div>
				<div class="recordwrap" id="favconid">
					<i>暂无收藏记录...</i>
				</div>
			</div>
			*}

			{*
			<div id="readid" class="readrecord">
				<div class="recordbtn">阅读记录</div>
				<div class="recordwrap" id="recorconid">
					<i>暂无阅读记录...</i>
				</div>
			</div>
			*}
		</div>
	</div>

	<div id="nav">
		<p><a href="{$FW_SITE_URL}" target="_self">首页</a>{novel_menu}|<a href="{$item->url}">{$item->title}</a>{/novel_menu}|<a href="{novel_lastupdate_link}">最新更新</a>{*a href="{novel_rank_link}">小说排行榜</a>*}</p>
	</div>

	{* 阅读记录 *}
	<div class="u_tips">
	  <div class="info_login">
	    <div class="cs1">亲爱的小说迷，上次看到哪了，请查看 <script type="text/javascript">yuedu();</script><a href="{novel_link url='shortcut/download'}" style="color:red">点击添加 {$siteinfo.SiteName} 到桌面</a></div>
	    <div class="cs2">     
	    </div>
	  </div>
	  <div id="banner" style="display:none;"></div>
	  <div style="clear:both;height:0px;"></div>
	</div>

	{*
	<div class="class_wraptop">
	</div>
	*}



	{$content}

	<div class="blinebgs"></div>
	<script type="text/javascript" src="{$FW_THEME_URL}/js/common.js"></script>
	<div class="footer" monkey="cool" style="border:0;" alog-alias="footer">
		<div id="ft">
			<!--footer-->
			<p class="ft_link"><script type="text/javascript">outputBottomLink();</script></p>
	</div>
</div>
</body>
<script type="text/javascript" src="{$FW_THEME_URL}/js/jquery.boxy.js"></script>
<script type="text/javascript" src="{$FW_THEME_URL}/js/jquery.autocomplete.js"></script>
<script type="text/javascript" src="{$FW_THEME_URL}/js/index.js"></script>
</html>
<!-- spend time: {$TIME} -->