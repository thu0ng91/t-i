<link href="{$FW_THEME_URL}/css/user.css" rel="stylesheet" />
<div id="btod">
<div id="user">
	<div id="userinfo_left">
		<span id="title">个人中心</span>
		<div id="user_cur">
			<a href="/member/my/information.html" class="user_f">用户资料</a>
			<a href="/member/my/photoupload.html" class="user_f">设置头像</a>
			<a href="/member/my/pwdupdate.html" id="user_fcur">修改密码</a>
			<a href="/member/my/bookcase.html" class="user_f">我的书架</a>
			<a href="/member/do/logout" class="user_f">退出登录</a>
		</div>
	</div>
	<div id="userinfo_right">
		<div id="user_title">修改密码</div>
		<div id="user_colo">
			<form action="" method="POST">
			<div id="user_tconter">
				<div class="user_ceet">当前密码：</div><div class="user_seec"><input type="password" name="opwd" size="32" maxlength="32" /></div>
				<div class="user_ceet">新密码：</div><div class="user_seec"><input type="password" name="npwd" size="32" maxlength="32" /></div>
				<div class="user_ceet">再次输入新密码：</div><div class="user_seec"><input type="password" name="rpwd" size="32" maxlength="32" /></div>
				<div id="subd">
					<input id="sub" type="submit" value="确认提交" />
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
</div>