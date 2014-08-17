<script>$(document)[0].title = '我的书架_' + $(document)[0].title; </script>
<link href="{$FW_THEME_URL}/css/user.css" rel="stylesheet" />
<div id="btod">
<div id="user">
	<div id="userinfo_left">
		<div id="user_head">
			<img class="user_imt" src="{if $avatar == false}{$FW_THEME_URL}/images/touxiang.png{else}{$avatar}{/if}" />
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
			<div><span id="img3"> </span><a href="{novel_link url='member/my/pwdupdate'}" class="user_f">修改密码</a></div>
			<div style="background-color:white"><span id="img4"> </span><a href="{novel_link url='member/my/bookcase'}" id="user_fcur">我的书架</a></div>
			<div><span id="img5"> </span><a style="border-bottom:0px;" href="{novel_link url='member/do/logout'}" class="user_f" >退出登录</a></div>
		</div>
	</div>
<!--		<div id="user_title_bookcase"><ul><li class="li_cur" id="li_cur" onclick="stb(2)">我的书架</li><li class="li_uncur"  id="li_uncur" onclick="stb(1)">最近阅读</li></ul></div>-->
			<div id="userinfo_right">
		<div id="user_title">我的书架</div>
		<div id="user_colo">
						<form action="" method="">
			<div id="user_tconter">
				<table width="100%" class="bookcase" id="bookcase" >
	                <tr style="background-color:#D4EEFF">
	                <th width="65%">　[作品名称]　最新章节</th>
	                <th width="20%">上次阅读时间</th>
	                <th width="15%">操作</th>
	                </tr><input type="hidden" value="{$i}" />
	               {foreach from=$list item=it}
	                	<tr {if ($i++) % 2 == 1} style="background-color:#F2F2F2"{/if}>
		                    <td>
		                    	<a href="{novel_book_link id=$it->book_id}">　[{$it->title}]　</a>
		                    	<a href="{novel_chapter_link bookid=$it->book_id id=$it->lastchapterid}">{$it->lastchaptertitle}</a>{if $it->readchapterid < $it->lastchapterid}<font color=red>(新)</font>{/if}</td>
		                        <td>{$it->lastviewtime|date_format:'Y-m-d H:i'}</td>
		                        <td><a href="{novel_link url='member/my/deletebookcase' params=['id'=>$it->id]}">删除</a> | <a href="{novel_chapter_link bookid=$it->book_id id=$it->readchapterid}">继续阅读</a>
		                    </td>
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
			<div class="user_tom"></div>
		</div>
	</div>
</div>
</div>
