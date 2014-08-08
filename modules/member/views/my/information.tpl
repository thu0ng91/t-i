<link href="{$FW_THEME_URL}/css/user.css" rel="stylesheet" />
<div id="btod">
<div id="user">
	<div id="userinfo_left">
		<span id="title">个人中心</span>
		<div id="user_cur">
			<a href="/member/my/information.html" id="user_fcur">用户资料</a>
			<a href="/member/my/photoupload.html" class="user_f">设置头像</a>
			<a href="/member/my/pwdupdate.html" class="user_f">修改密码</a>
			<a href="/member/my/bookcase.html" class="user_f">我的书架</a>
			<a href="/member/do/logout" class="user_f">退出登录</a>
		</div>
	</div>
	<div id="userinfo_right">
		<div id="user_title">用户资料</div>
		<div id="user_colo">
			<form action="" method="POST">
			<div id="user_tconter">
				<div class="user_ceet">昵称：</div><div class="user_seec"><input type="text" name="realname" value="{$realname}" size="30" maxlength="30" /></div>
				<div class="user_imt">头像：</div><div class="user_imts"><img src="{$avatar}" /></div>
				<div class="user_ceet">邮箱：</div><div class="user_seec"><input tyep="text" value="{$email}" name="email" size="60" maxlength="60" /></div>
				<div class="user_ceet">QQ：</div><div class="user_seec"><input tyep="text" value="{$qq}" name="qq" size="60" maxlength="60" /></div>
				<div class="user_ceet">手机号码：</div><div class="user_seec"><input tyep="text" value="{$telephone}" name="telephone" size="60" maxlength="60" /></div>
				<div class="user_ceet">目前所在地：</div><div class="user_seec"><input type="text" value="{$address}" name="address" size="30" maxlength="30" /></div>
				<div id="subd">
					<input id="sub" type="submit" value="确认提交" />
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
</div>