<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7">
<title>{$title}</title>
<meta name="keywords" content="{$keywords|strip_tags}"/>
<meta name="description" content="{$description}" />
<link href="{$FW_THEME_URL}/css/global.css" rel="stylesheet"/>
<!--<script src="{$FW_THEME_URL}/js/main.js"></script>-->
</head>
<script>
	function indexsub() {
		var uname = document.getElementById('username');
		var pwd = document.getElementById('pwd');
		if(uname.value == "") {
			alert("用户名不能为空");
			uname.focus();
			return false;
		}else if(pwd.value == ""){
			alert("密码不能为空");
			pwd.focus();
			return false;
		}
		return true;
	}
</script>
<body>
<!--header begin-->
<div class="header clearfix">
<div class="logo"><a href="/"><img src="{$FW_THEME_URL}/images/logo.png" /></a></div>
<div class="search_meta">
	<div class="search_box">
	<form id="search" name="search" action="{novel_search_link}" method="get" onSubmit="return qrsearch();">
		<div class="serachwrap">
			<span class="search_text"><input id="kw" name="keyword" type="text" value="请输入小说名..." autocomplete="off"  title="请输入小说名..." onfocus="if(this.value==this.title) this.value='';" onblur="if(this.value=='') this.value=this.title;" autofocus="true"  x-webkit-grammar="builtin:translate"></span>
			<button type="submit" class="btn_search" id="search_top">搜小说</button>
		</div>
	</form>
	</div>
</div>
<div class="aside clearfix">
	{if $Yii->user->isGuest}
	<span ></span><a class="c_login" href="{novel_link url='/member/do/login'}">登录</a>　|　
	<a class="c_register" href="{novel_link url='/member/do/register'}">注册</a>
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
<link href="{$FW_THEME_URL}/css/style.css" type="text/css" rel="stylesheet" />
<div class="box_mid fix">
  <div class="login">
 <h3>会员登录</h3>
<form action="{novel_link url='member/do/login'}" method="POST" onsubmit="return indexsub( );">
<fieldset>
    <div class="form-item">
        <div class="field-name">用户名：</div>
        <div class="field-input">
          <input type="text" id="username" name="LoginForm[username]" value="" />
        </div>
    </div>
    <div class="form-item">
        <div class="field-name">密码：</div>
        <div class="field-input">
          <input type="password" id="pwd" name="LoginForm[password]" />
        </div>
    </div>

</fieldset>
    <input type="hidden" name="go_url" value="{$go_url}" />
<button id="btn-submit" class="btn-submit2" type="submit">登录</button>
</form>

  </div>
  <div class="lother">
   <h3>会员注册</h3>
   还没有{$siteinfo->SiteName}账号？
   <a href="{novel_link url='member/do/register'}"  title="立即注册" class="reg">立即注册</a>
<!--   你也可以用站外账号登录:-->
<!--    <p class="o_login"><a href="javascript:;" id="qqlogin" title="腾讯QQ" class="qq"></a>-<a href="javascript:alert('敬请期待...')"  title="新浪微博" class="sina"></a></p>-->
 </div>
</div>



<!--container end-->
<!--footer beigin-->
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
<!-- spend time: {$TIME} -->
</body>
</html>