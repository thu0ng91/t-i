<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>{$title}</title>
	<meta name="keywords" content="{$keywords}">
	<meta name="description" content="{$description}">
	<link rel="shortcut icon" href="favicon.ico" />
	<link href="{$FW_THEME_URL}/css/theme.css" rel="stylesheet" type="text/css">
	<link href="{$FW_THEME_URL}/css/style.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
	var SiteUrl = '{$FW_SITE_URL}';
	</script>
	<script type="text/javascript" src="{$FW_THEME_URL}/js/jquery.min.js"></script>
	<script src="{$FW_THEME_URL}/js/msc_common.js" type="text/javascript"></script>
	<script src="{$FW_THEME_URL}/js/jquery.Tips.min.js" type="text/javascript"></script>
	<script src="{$FW_THEME_URL}/js/jquery.lazyload.js" type="text/javascript"></script>
	<script src="{$FW_THEME_URL}/js/jquery.jSuggest.js" type="text/javascript"></script>
	<script src="{$FW_THEME_URL}/js/lang.js" type="text/javascript"></script>
	<script src="{$FW_THEME_URL}/js/ptcms.common.js" type="text/javascript"></script>
	<script src="{$FW_THEME_URL}/js/common.js" type="text/javascript"></script>
</head>

<body>
	<div id="top">
		<div id="top_cont">
			<div id="login">
                &nbsp;&nbsp; <span id="loginPannel">当前你还没有登录，登录后可查看收藏在云端书架中的小说！<a href="{novel_link url="member/do/login"}">点击这里登陆</a></span>
			</div>
			<div id="top_menu">
				<ul>
					<li><a id="swzy" href="javascript:SetHomepage('{$FW_SITE_URL}')">设为主页</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="header">
		<div id="head_cont">
			<div id="logo">
				<a target="_self" href="{$FW_SITE_URL}"><img alt="请看小说网" src="{$FW_THEME_URL}/image/logo.png"></a>
			</div>
			<div id="hd_nav">
				
				<span id="zzyd"><a href="javascript:;">手机阅读</a></span>
				
			</div>
			<div id="seach">

				<form target="_blank" method="get" action="{novel_search_link}">
					<p>
						<input type="text" autocomplete="off" class="input" value="请输入您要搜索的内容" onclick="{literal}if(this.value=='请输入您要搜索的内容'){this.value='';this.form.searcharticle.style.color='#000000'};{/literal}" onblur="{literal}if(this.value=='') {this.value='请输入您要搜索的内容';this.form.searcharticle.style.color='#d8d8d8'}{/literal}" id="searcharticle" name="keyword">
					</p>
					<input type="submit" id="btn" value="搜索" onclick="{literal}if(searcharticle.value=='请输入您要搜索的内容'){alert('请输入您要搜索的内容！');return false;};{/literal}" name="">
					
				</form>
				<div id="rmss_name">
					热门搜索：
					
				</div>
			</div>
		</div>
		<div id="nav">
			<div id="nav_cont1">
				<ul>
					 <li {if $this->id == 'site' && $this->action->id == 'index'}class="now"{/if}><a href="{$FW_SITE_URL}" title="{$siteinfo->SiteName}">首页</a></li>
					
					 <li {if $this->id == 'list' && $this->action->id == 'lastupdate'}class="on"{/if}><a href="{novel_lastupdate_link}" >最近更新</a></li>
      				<li {if $this->id == 'list' && $this->action->id == 'rank'}class="now"{/if}><a href="{novel_rank_link}" >排行榜</a></li>
				</ul>
			</div>
			<div id="nav_cont2">
				<div id="nav_fenlei">
					<p id="nav_fenlei_menu">
						<span>分类：</span>
						{novel_menu}
						<a href="{novel_category_link id=$item->id}">{$item->title}</a>
				    	{/novel_menu}
					</p>
				</div>
			</div>
		</div>
	</div>
	
		{$content}
	
	<div id="footer">
		<p>本站为演示站点，所有小说及章节均由网友上传，转载至本站只是为了宣传本书让更多读者欣赏。</p>
		<p><span style="font-family:arial;">Copyright &copy; 2014 <a href="{$FW_SITE_PUB_URL}" target="_blank">	{$siteinfo->SiteName}</a> </span>
		</p>
	</div>
    <script>
        {literal}
        $(document).ready(function () {

            function showLoginInfo(r)
            {
                if (typeof r == 'object' && r.result)  {
                    var p = $("#loginPannel");
                    var bookcaseUrl = SiteUrl + "/member/my/bookcase";
                    p.html(r.data.username + " 你好，你可以访问 <a href='" + bookcaseUrl + "'>云端书架</a> 快速找到上次阅读过的章节");
                }
            }

//        alert("aaa");
            getLoginInfo(showLoginInfo);
        });
        {/literal}
    </script>
</body>
</html>
<!-- spend time {$TIME} -->