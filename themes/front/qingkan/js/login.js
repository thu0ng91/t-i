if(PTLoginStatus == 1){
	document.write('<span id="loginhead"><img src="http://'+PTNovelHostName+'/user.php?action=avatar&userid='+PTNovelUserId+'&size=small" width="18" height="18" onerror="this.onerror=null;this.src=\'http://'+PTNovelHostName+'/static/image/noavatari.jpg\'"></span><span id="logintxt"> 欢迎回来！ <font color="red">'+PTNovelUserName+'</font>&nbsp;&nbsp;<a href="http://%27+ptnovelhostname+%27/user.php?action=index">用户中心</a> | <a href="http://%27+ptnovelhostname+%27/user.php?action=mark">我的书架</a>');
	document.write(' | <a href="http://%27+ptnovelhostname+%27/author.php?action=register"><font color="blue">申请作家</font></a>');
	document.write(' | <a href="http://'+PTNovelHostName+'/user.php?action=logout&jumpurl='+escape(PTNovelNowUrl)+'">退出登陆</a></span>');
}else{
	document.write('<span id="logintxt">欢迎您！ <a href="javascript:OpenTipsWindow(\'login\',0,0);">登录即可享受特权</a>&nbsp;&nbsp;');
	document.write('<a href="javascript:;" onclick="window.open(\'http://'+PTNovelHostName+'/user.php?action=register\')">立即免费注册</a></span>');
	document.write('　<a href="http://%27+ptnovelhostname+%27/user.php?action=qqlogin" target="_blank"><img src="../../../../%27+ptnovelhostname+%27/static/image/qq_login.png"/*tpa=http://%27+ptnovelhostname+%27/static/image/qq_login.png*/ /></a>');
}