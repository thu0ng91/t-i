{if $Yii->user->isGuest}
document.write('<form action="{novel_link url='/member/do/ajaxlogin'}" method="POST">用户名：<input type="text" id="username" name="LoginForm[username]" value="" /><br>密码：<input type="password" id="pwd" name="LoginForm[password]"/><button id="btn-submit" class="btn-submit2" type="submit">登录</button></form>');
{else}
document.write('欢迎您，{$Yii->user->name} <a  href="{novel_link url='/member/my/information'}">个人中心</a> | <a href="{novel_link url='/member/do/ajaxlogout'}">退出</a>');
{/if}
