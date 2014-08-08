<link href="{$FW_THEME_URL}/css/user.css" rel="stylesheet" />
<div id="btod">
<div id="user">
	<div id="userinfo_left">
		<span id="title">个人中心</span>
		<div id="user_cur">
			<a href="/member/my/information.html" class="user_f">用户资料</a>
			<a href="/member/my/photoupload.html" id="user_fcur">设置头像</a>
			<a href="/member/my/pwdupdate.html" class="user_f">修改密码</a>
			<a href="/member/my/bookcase.html" class="user_f">我的书架</a>
			<a href="/member/do/logout" class="user_f">退出登录</a>
		</div>
	</div>
	<div id="userinfo_right">
		<div id="user_title">修改头像</div>
		<div id="user_colo">
			<form action="" method="post" enctype="multipart/form-data">  
			<div id="user_tconter">
				<div class="user_imt">当前头像：</div><div class="user_imts"><img src="" /></div>
				<div class="user_imt">修改头像：</div><div class="user_imts"><input id="uimg" type="file" value="上传头像" name="userimg" /><p style="margin-left:10px">图片大小不能超过200K，图片类型为.PNG, .JPG ,.JPEG, .GIF<p></div>
				<div id="subd">
					<input id="sub" type="submit" value="确认提交" />
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
</div>