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
		<div style="background-color:#EEE7E1;border-bottom:1px solid #D9D7D8;">
			<span id="titleimg"> </span><p id="title">会员中心</p>
		</div>
		<div id="user_cur">
			<div style="border-top:0px;background-color:white"><span id="img1"> </span><a href="{$Yii->createUrl('member/my/information')}" id="user_fcur">用户资料</a></div>
			<div><span id="img2"> </span><a href="{$Yii->createUrl('member/my/photoupload')}" class="user_f">设置头像</a></div>
			<div><span id="img3"> </span><a href="{$Yii->createUrl('member/my/pwdupdate')}" class="user_f">修改密码</a></div>
			<div><span id="img4"> </span><a href="{$Yii->createUrl('member/my/bookcase')}" class="user_f">我的书架</a></div>
			<div><span id="img5"> </span><a style="border-bottom:0px;" href="{$Yii->createUrl('member/do/logout')}" class="user_f" >退出登录</a></div>
		</div>
	</div>
	<div id="userinfo_right">
		<div id="user_title">用户资料</div>
		<div id="user_colo">
			<form action="" method="POST">
			<div id="user_tconter">
				<div class="user_imts"><img src="{$avatar}" /></div>
				<div class="user_texs">
					<div class="user_ceet">* 昵称：</div><div class="user_seec"><input type="text" name="realname" value="{$realname}" size="30" maxlength="30" /></div>
					<div class="user_ceet">* 性别：</div><div class="user_seec"><input type="radio" value="1" {if $gender == 1}checked{/if} name="gender" /><span style="float:left;">男</span><input type="radio" value="2" {if $gender == 2}checked{/if} name="gender" /><span>女</span></div>
					<div class="user_ceet">* 邮箱：</div><div class="user_seec"><input tyep="text" value="{$email}" name="email" size="60" maxlength="60" /></div>
					<div class="user_ceet">Q Q：</div><div class="user_seec"><input tyep="text" value="{$qq}" name="qq" size="60" maxlength="60" /></div>
					<div class="user_ceet">手机号码：</div><div class="user_seec"><input tyep="text" value="{$telephone}" name="telephone" size="60" maxlength="60" /></div>
					<div class="user_ceet">目前所在地：</div><div class="user_seec"><input type="text" value="{$address}" name="address" size="30" maxlength="30" /></div>
					<div id="subd">
						<input id="sub" type="submit" value="确认提交" />
					</div>
				</div>
			</div>
			</form>
			<div class="user_tom"></div>
		</div>
	</div>
</div>
</div>