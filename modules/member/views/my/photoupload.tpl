<script>$(document)[0].title = '上传头像_' + $(document)[0].title; </script>
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
			<div style="background-color:white"><span id="img2"> </span><a href="{novel_link url='member/my/photoupload'}"id="user_fcur">设置头像</a></div>
			<div><span id="img3"> </span><a href="{novel_link url='member/my/pwdupdate'}" class="user_f">修改密码</a></div>
			<div><span id="img4"> </span><a href="{novel_link url='member/my/bookcase'}" class="user_f">我的书架</a></div>
			<div><span id="img5"> </span><a style="border-bottom:0px;" href="{novel_link url='member/do/logout'}" class="user_f" >退出登录</a></div>
		</div>
	</div>
	<div id="userinfo_right">
		<div id="user_title">修改头像</div>
		<div id="user_colo">
			<div id="user_tconter">
			<form action="" method="POST" enctype="multipart/form-data">
			<div class="user_im">
					<div class="user_im">
						<p>当前头像：</p>
						<img class="imgs" src="{if $avatar == false}{$FW_THEME_URL}/images/touxiang.png{else}{$avatar}{/if}" style="margin-left:20px;" onerror="this.src='{$FW_THEME_URL}/images/avatar.bmp'" />
					</div>
					<div class="user_im">
						<p>修改头像：</p>
						<input type="file" name="userimg" id="file"/> 
						<div>　&nbsp;图片尺寸：小于200K ， 格式可为：JPG、GIF、PNG</div>
					</div>	
					<div id="subd">
						<input id="sub" type="submit" value="确认提交" />
					</div>
				</div>
			</div>
			</form>
			<div class="user_tom"></div>
		</div>
	</div>
	<div id="userinfo_right">
		
	</div>
</div>
</div>