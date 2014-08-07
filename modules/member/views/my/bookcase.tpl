<link href="{$FW_THEME_URL}/css/user.css" rel="stylesheet" />
<div id="btod">
<div id="user">
	<div id="userinfo_left">
		<span id="title">个人中心</span>
		<div id="user_cur">
			<a href="/member/my/information" class="user_f">用户资料</a>
			<a href="/member/my/photoupload.html" class="user_f">设置头像</a>
			<a href="/member/my/pwdupdate.html" class="user_f">修改密码</a>
			<a href="/member/my/bookcase.html" id="user_fcur">我的书架</a>
			<a href="/member/do/actionLogout" class="user_f">退出登录</a>
		</div>
	</div>
	<div id="userinfo_right">
		<div id="user_title_bookcase"><ul><li class="li_cur" id="li_cur" onclick="stb(2)">我的书架</li><li class="li_uncur"  id="li_uncur" onclick="stb(1)">最近阅读</li></ul></div>
		<div id="user_colo">
			<form action="" method="">
			<div id="user_tconter">
				<table width="100%" class="bookcase" id="bookcase" >
	                <tr>
	                <th width="65%">　[作品名称]&nbsp;最新章节</th>
	                <th width="25%">上次阅读时间</th>
	                <th width="10%">操作</th>
	                </tr>
	               {foreach from=$list item=it}
	                	<tr>
	                    <td>　<a href="{novel_book_link id=$it->book_id}">[{$it->title}]</a>
	                    	<a href="{novel_chapter_link bookid=$it->book_id id=$it->lastchapterid}">{$it->lastchaptertitle}</a></td>
	                        <td>{$it->lastviewtime|date_format:'Y-m-d H:i'}</td>
	                        <td><a href="/member/my/deletebookcase/id/{$it->id}">删除</a></td>
	                        </tr>
	                {foreachelse}
	                     <tr>
	                         <td colspan="4">还没有小说在书架中，赶快去添加吧！</td>
	                     </tr>
	                {/foreach}
                </table>
				<!--	最近阅读		-->
                <table width="100%" class="bookcase" id="bookcases" style="display:none">
	                <tr>
	                <th width="65%">　[作品名称]&nbsp;最新章节</th>
	                <th width="25%">上次阅读时间</th>
	                <th width="10%">操作</th>
	                </tr>
	               {foreach from=$list item=it}
	                	<tr>
	                    <td>　<a href="{novel_book_link id=$it->book_id}">[{$it->title}]</a>
	                    	<a href="{novel_chapter_link bookid=$it->book_id id=$it->lastchapterid}">{$it->lastchaptertitle}</a></td>
	                        <td>{$it->lastviewtime|date_format:'Y-m-d H:i'}</td>
	                        <td><a href="/member/my/deletebookcase/id/{$it->id}">删除</a></td>
	                        </tr>
	                {foreachelse}
	                     <tr>
	                         <td colspan="4">您已经很久没有看过书了 -_^!</td>
	                     </tr>
	                {/foreach}
                </table>
			</div>
			</form>
		</div>
	</div>
</div>
</div>
