<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=7">
<title>{$title}</title>
<script type="text/javascript" src="{$FW_THEME_URL}/js/jquery-1.4.3.min.js"></script>
<meta name="keywords" content="{$keywords|strip_tags}"/>
<meta name="description" content="{$description}" />
<link href="{$FW_THEME_URL}/css/global.css" rel="stylesheet"/>
</head>
<script>

 

$(function(){
    $("#username").change(function(){
		var username = $(this).val();
		$.ajax({
			type:"POST",
			datatype:'json',
			data:"username="+username,
			success: function(josn){
				if(josn == 0){
					 $("#utext").text("恭喜你可以注册");
					return true;
				 }else{
					$("#utext").text("用户名已存在不可注册");
					return false;
				 }
			}
		});
	});
});

	/* function indexsub() {
		var uname = document.getElementById('username');
		var email = document.getElementById('email');
		var pwd = document.getElementById('pwd');
		var repwd = document.getElementById('repwd');
		var pattern = /^([\.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;  
		if(uname.value == "") {
			alert("用户名不能为空");
			uname.focus();
			return false;
		}else if(email.value == ""){
			alert("邮箱不能为空");
			email.focus();
			return false;
		}else if(pwd.value == ""){
			alert("密码不能为空");
			pwd.focus();
			return false;
		}else if(repwd.value == ""){
			alert("确认密码不能为空");
			repwd.focus();
			return false;
		}else if(pwd.value != repwd.value) {
			alert("2次密码不一致");
			pwd.focus();
			return false;
		}
		return true;
	}  */
</script>
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
<div id="content"><link rel="stylesheet" rev="stylesheet" href="{$FW_THEME_URL}/css/login.css" type="text/css" media="all" />
<div class="box_mid fix">
  <div class="regist fix">
    <h4>会员注册</h4>
    <div class="box_form">
    <form action="{novel_link url='member/do/register'}" method="POST" onsubmit="return indexsub( );">
	<fieldset>
    <div class="form-item">
        <div class="field-name">用户名：</div>
        <div class="field-input">
          <input type="text" name="RegisterForm[username]" id="username" value="" /><span id="utext"> </span>
        </div>
    </div>
    <div class="form-item">
        <div class="field-name">邮箱：</div>
        <div class="field-input">
         <input type="text" name="RegisterForm[email]" id="email" />
        </div>
    </div>
    <div class="form-item">
        <div class="field-name">密码：</div>
        <div class="field-input">
          <input type="password" name="RegisterForm[password]" id="pwd" />
        </div>
    </div>
    <div class="form-item">
        <div class="field-name">确认密码：</div>
        <div class="field-input">
          <input type="password" name="RegisterForm[repassword]" id="repwd" />
        </div>
    </div>
</fieldset>
    <input type="submit" value=" 注册 " class="btn-sn">
</form>

    </div>
  </div>
  <div class="remark">   
    <div class="t">已有{$siteinfo->SiteName}帐号？ <a href="{novel_link url='member/do/login'}" class="dl">登 录</a></div>
    <dl>
     <dt>注册成为会员，您将拥有：</dt>
     <dd>&middot;可将喜爱的书籍放入书架</dd>
     <dd>&middot;投推荐票给喜欢的小说,支持作者创作</dd>
     <dd>&middot;升级为VIP,章节订阅最优惠</dd>
     <dd>&middot;购买会员,最好的上架作品随便看</dd>
    </dl>

  </div>
</div><!--box_mid end-->
<!--rec_book end-->
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