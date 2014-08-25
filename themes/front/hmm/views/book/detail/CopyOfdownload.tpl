<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{$book->title},{$book->title}TXT下载</title>
    <meta name="keywords" content="{$book->title}TXT下载,{$book->title}TXT全本下载" />
    <meta name="description" content="{$siteinfo->SiteName}为小说爱好者提供辰东大大的{$book->title}最近更新章节阅读，{$book->title}全文在线阅读，{$book->title}最新章节电子书下载（包括{$book->title}的TXT格式下载、 {$book->title}的JAR格式下载、 {$book->title}的JAD格式下载、 {$book->title}的UMD格式下载、 {$book->title}的CHM格式下载）" />
   
</head>
{literal}
<style>
body {font-family: "宋体";font-size: 12px;margin-top:20px;line-height:14pt;}
a {color:#2C78C5;text-decoration:none;}a:hover{color:#CC0000;text-decoration:underline;}
#TxtdownTop {width:70%;margin:auto;}#BookMl {margin:auto;margin-top:20px;width:70%;}
#Chapters {margin:auto;margin-top:20px;width:70%;}
#Chapters ul {list-style-type:circle;line-height:21px;margin:0 0 0 20px;padding:0 0 0 10px;}
#TxtdownFoot {margin:auto;margin-top:2px;width:70%;}
</style>
{/literal}
</head>
<body>
<DIV id="TxtdownTop">
    <div style="width: 950px">
        <div style="float: left;width: 360px">
            {$book->title}TXT下载<br />  ◎ <a href="{$FW_SITE_URL}">{$siteinfo->SiteName}</a> - 
            <a href="{novel_book_link id=$book->id}">{$book->title}在线阅读</a><br />  ◎
            <script src="http://pstatic.xunlei.com/js/webThunderDetect.js"></script>
            <script src="http://pstatic.xunlei.com/js/base64.js"></script>
            <script language="javascript">var thunder_url = "http://dl.qgzw.com/17/17365.txt";var thunder_pid = "130465";var restitle = ""; document.write('<a href="#" thunderHref="' + ThunderEncode(thunder_url) + '" thunderPid="' + thunder_pid + '" thunderResTitle="' + restitle + '" onClick="return OnDownloadClick_Simple(this,2,4)" oncontextmenu="ThunderNetwork_SetHref(this)"><b>{$book->title}TXT下载（迅雷专用高速下载1）</b></a> '); </script><BR>◎
            <script src="http://pstatic.xunlei.com/js/webThunderDetect.js"></script>
            <script src="http://pstatic.xunlei.com/js/base64.js"></script>
            <script language="javascript">var thunder_url = "http://dl.qgzw.com/17/17365.txt";var thunder_pid = "130465";var restitle = ""; document.write('<a href="#" thunderHref="' + ThunderEncode(thunder_url) + '" thunderPid="' + thunder_pid + '" thunderResTitle="' + restitle + '" onClick="return OnDownloadClick_Simple(this,2,4)" oncontextmenu="ThunderNetwork_SetHref(this)"><b>{$book->title}TXT下载（迅雷专用高速下载2）</b></a> '); </script><BR>◎ 
            <a href="{novel_book_download_link type='full' id=$book->id}">{$book->title}TXT下载（右键目标另存为）</a>
        </div>
        <div style="float: left;left:375px">
        </div>
    </div>
</DIV>
<DIV id="BookMl">
	《{$book->title}》
	<script language="javascript" type="text/javascript" src="{$FW_THEME_URL}/js/fx.js"></script>
	<br />
	 作者：{$book->author}|内容简介：&nbsp;&nbsp;&nbsp;&nbsp;{$book->summary|strip_tags}
</DIV>
<DIV id="Chapters">
	{$book->title}[章节列表]
	<UL>
		{foreach from=$chapters item=item}	
		<li><a href="{novel_chapter_link bookid=$book->id id=$item->id}">{$item->title}</a></li>
		{/foreach}
	</UL>
</DIV>
<DIV id="TxtdownFoot">
{$book->title}[列表底部]<BR>  ◎
</DIV>
</body>
</html>
