<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7">
<title>{$title}</title>
<meta name="keywords" content="{$keywords|strip_tags}"/>
<meta name="description" content="{$description|trim|strip_tags|truncate:100:"..."|replace:"\n":" "|replace:"\r":" "}"/>
<link href="{$FW_THEME_URL}/css/book_main.css" rel="stylesheet">
{if $this->id == 'site'}

{elseif $this->id == 'list'}

{/if}
{if $this->id == 'site111'}
<base target="_blank">
{/if}
<script type="text/javascript" src="{$FW_THEME_URL}/js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="{$FW_THEME_URL}/js/common.js"></script>
<script type="text/javascript" src="{$FW_THEME_URL}/js/xs.js"></script>
<script type="text/javascript">
	var siteUrl = '{$FW_SITE_URL}';
	var siteThemeUrl = '{$FW_THEME_URL}';
</script>
</head>
<body>
	<!-- header 开始 -->
	<div class="header">
		<label for="uname">账号:</label>
		<input class="login" type="text" value=""  id="uname" />
		&nbsp;
		<label for="upwd">密码:</label>
		<input  class="login" type="text" value="" id="upwd" />
		&nbsp;
		<label for="ucode">验证码:</label>
		<input type="text" value=" 点此显示" id="ucode" />
		&nbsp;
		<input type="button" value="登录" />
		&nbsp;
		<input type="checkbox" value="记住登录" id="jm"/>
		<label for="jm">记住密码</label>
		&nbsp;
		<input type="button" value="忘记密码" />
		&nbsp;
		<a href="javascript:void(0)" onclick="SetHome(this,window.location)">设为首页</a>
		<a href="javascript:void(0)" onclick="shoucang(document.title,window.location)">加入收藏</a>
		<br />
		<img class="log" src="{$FW_THEME_URL}/images/logo.png" />
		<img class="AD" src="{$FW_THEME_URL}/images/head1.jpg" />
	</div>
	<!-- header 结束 -->

	<!-- navigation 开始 -->
	<div class="navigation">
		<div class="navigat">
			<div class="nav">
				<ul>
					<li class="nav_now"><a href="{$FW_SITE_URL}" target="_self">首页</a></li>
					<li class="nav_default"><a href="书库.html"><span>书库</span></a></li>
					<li class="nav_default"><a href="{novel_rank_link}">排行榜</a></li>
					<li class="nav_default">全本</li>
					<li class="nav_default">个人中心</li>
					<li class="nav_default">作者专区</li>
					<li class="nav_default">论坛</li>
				</ul>
			</div>
		</div>
		<img class="navigat_i"src="{$FW_THEME_URL}/images/AD1.jpg" />
	</div>
	<!-- navigation 结束 -->



	{$content}

<!-- footer -->
<div class="footer">
    <br>
    <a href="#">云阅简介</a> |
	<a href="#">联系我们</a> |
    <a href="#">合作伙伴</a> |
    <a href="#">广告服务</a> |
    <a href="#">招聘信息</a> |
    <a href="#">网站地图</a> |
    <a href="#">会员注册</a> |
    <a href="#">产品答疑</a>
    <br>
    Copyright &copy; 1996 - 2014 YUN Corporation, All Rights Reserved <br>
    上海云阅信息技术有限公司<a target="_blank" href="#>版权所有</a>
</div>
<!-- end footer -->

</body>
</html>
<!-- spend time: {$TIME} -->