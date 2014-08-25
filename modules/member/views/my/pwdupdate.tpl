<script>$(document)[0].title = '修改密码_' + $(document)[0].title; </script>
<link href="{$FW_THEME_URL}/css/user.css" rel="stylesheet" />
<div id="btod">
<div id="user">
	<div id="userinfo_left">
		<div id="user_head">
			<img class="user_imt" src="{if $avatar == false}{$FW_THEME_URL}/images/touxiang.png{else}{$avatar}{/if}"  onerror="this.src='{$FW_THEME_URL}/images/avatar.bmp'" />
			<span class="userxx">{$username}</span>
			<span style="padding-left:10px;">{$level}</span>
			<p id="userid">　用户ID：{$uid}</p>
		</div>
		<div style="border-top:0px;background-color:#EEE7E1;border-bottom:1px solid #D9D7D8;">
			<span id="titleimg"> </span><p id="title">会员中心</p>
		</div>
		<div id="user_cur">
			<div style="border-top:0px;"><span id="img1"> </span><a href="{novel_link url='member/my/information'}" class="user_f">用户资料</a></div>
			<div><span id="img2"> </span><a href="{novel_link url='member/my/photoupload'}" class="user_f">设置头像</a></div>
			<div style="background-color:white"><span id="img3"> </span><a href="{novel_link url='member/my/pwdupdate'}" id="user_fcur">修改密码</a></div>
			<div><span id="img4"> </span><a href="{novel_link url='member/my/bookcase'}" class="user_f">我的书架</a></div>
			<div><span id="img5"> </span><a style="border-bottom:0px;" href="{novel_link url='member/do/logout'}" class="user_f" >退出登录</a></div>
		</div>
	</div>
		<div id="userinfo_right">
		<div id="user_title">修改密码</div>
		<div id="user_colo">
			<form action="" method="POST">
			<div id="user_tconter">
				<div class="user_texs">
					<div class="user_pwd"">
						<div class="user_ie"><p>当前密码：</p><span><input type="password" name="opwd" size="32" maxlength="32" /></span></div>
						<div class="user_ie"><p>新密码：</p><span><input type="password" name="npwd" size="32" maxlength="32" /></span></div>
						<div class="user_ie"><p style="border-bottom:0px;">再次输入新密码：</p><span style="border-bottom:0px;"><input type="password" name="rpwd" size="32" maxlength="32" /></span></div>
					</div>
					<div id="subd">
						<input id="sub" type="submit" value="确认修改" />
					</div>
				</div>
			</div>
			</form>
			<div class="user_tom"></div>
		</div>
	</div>

</div>
</div>