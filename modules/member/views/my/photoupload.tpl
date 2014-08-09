<link href="{$FW_THEME_URL}/css/user.css" rel="stylesheet" />
<div id="btod">
<div id="user">
	<div id="userinfo_left">
		<div id="user_head">
			<img class="user_imt" src="{$avatar}" />
			<span class="userxx">{$username}</span>
			<span style="padding-left:10px;">{$level}</span>
			<p id="userid">　用户ID：{$uid}</p>
		</div>
		<div style="border-top:0px;background-color:#EEE7E1;border-bottom:1px solid #D9D7D8;">
			<span id="titleimg"> </span><p id="title">会员中心</p>
		</div>
		<div id="user_cur">
			<div style="border-top:0px;"><span id="img1"> </span><a href="{$Yii->createUrl('member/my/information')}" class="user_f">用户资料</a></div>
			<div style="background-color:white"><span id="img2"> </span><a href="{$Yii->createUrl('member/my/photoupload')}"id="user_fcur">设置头像</a></div>
			<div><span id="img3"> </span><a href="{$Yii->createUrl('member/my/pwdupdate')}" class="user_f">修改密码</a></div>
			<div><span id="img4"> </span><a href="{$Yii->createUrl('member/my/bookcase')}" class="user_f">我的书架</a></div>
			<div><span id="img5"> </span><a style="border-bottom:0px;" href="{$Yii->createUrl('member/do/logout')}" class="user_f" >退出登录</a></div>
		</div>
	</div>
	<div id="userinfo_right">
		<div id="user_title">修改头像</div>
		<div id="user_colo">
			<form action="" method="post" enctype="multipart/form-data">  
			<div id="user_tconter">
				<div class="user_im">
					<p>当前头像：</p>
					<img class="imgs" src="{$avatar}" style="margin-left:20px;" />
				</div>
				<div class="user_im">
					<p>修改头像：</p>
					<input type="file" nama="userimg" style="margin-top:30px;margin-left:20px;height:25px;"/>
					<div>　&nbsp;图片尺寸：小于200K ， 格式可为：JPG、GIF、PNG</div>
				</div>
				<div id="subd">
					<input id="sub" type="submit" value="确认修改" />
				</div>
			</div>
			</form>
			<div class="user_tom"></div>
		</div>
		</div>
	</div>
	<div id="userinfo_right">
		
	</div>
</div>
</div>