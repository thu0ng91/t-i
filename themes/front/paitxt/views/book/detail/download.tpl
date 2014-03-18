<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{$book->title},{$book->title}TXT下载</title>
    <meta name="keywords" content="{$book->title}TXT下载,{$book->title}TXT全本下载" />
    <meta name="description" content="{$siteinfo->SiteName}为小说爱好者提供辰东大大的{$book->title}最近更新章节阅读，{$book->title}全文在线阅读，{$book->title}最新章节电子书下载（包括{$book->title}的TXT格式下载、 {$book->title}的JAR格式下载、 {$book->title}的JAD格式下载、 {$book->title}的UMD格式下载、 {$book->title}的CHM格式下载）" />
    {*<script language="javascript" type="text/javascript" src="http://www.qingkan.net/static/script/ptcms.common.js"></script>*}

</head>
{literal}
<style>body {font-family: "宋体";font-size: 12px;margin-top:20px;line-height:14pt;}a {color:#2C78C5;text-decoration:none;}a:hover{color:#CC0000;text-decoration:underline;}#TxtdownTop {width:70%;margin:auto;}#BookMl {margin:auto;margin-top:20px;width:70%;}#Chapters {margin:auto;margin-top:20px;width:70%;}#Chapters ul {list-style-type:circle;line-height:21px;margin:0 0 0 20px;padding:0 0 0 10px;}#TxtdownFoot {margin:auto;margin-top:2px;width:70%;}</style>
{/literal}
</head>
<body><DIV id="TxtdownTop">
    <div style="width: 950px">
        <div style="float: left;width: 360px">
            {$book->title}TXT下载<BR>  ◎ <A href="{$FW_SITE_URL}">{$siteinfo->SiteName}</A> - <A href="{novel_book_link id=$book->id}">{$book->title}在线阅读</A><BR>  ◎ <script src="http://pstatic.xunlei.com/js/webThunderDetect.js"></script><script src="http://pstatic.xunlei.com/js/base64.js"></script><script language="javascript">var thunder_url = "http://dl.qgzw.com/17/17365.txt";var thunder_pid = "130465";var restitle = ""; document.write('<a href="#" thunderHref="' + ThunderEncode(thunder_url) + '" thunderPid="' + thunder_pid + '" thunderResTitle="' + restitle + '" onClick="return OnDownloadClick_Simple(this,2,4)" oncontextmenu="ThunderNetwork_SetHref(this)"><b>{$book->title}TXT下载（迅雷专用高速下载1）</b></a> '); </script><BR>◎ <script src="http://pstatic.xunlei.com/js/webThunderDetect.js"></script><script src="http://pstatic.xunlei.com/js/base64.js"></script><script language="javascript">var thunder_url = "http://dl.qgzw.com/17/17365.txt";var thunder_pid = "130465";var restitle = ""; document.write('<a href="#" thunderHref="' + ThunderEncode(thunder_url) + '" thunderPid="' + thunder_pid + '" thunderResTitle="' + restitle + '" onClick="return OnDownloadClick_Simple(this,2,4)" oncontextmenu="ThunderNetwork_SetHref(this)"><b>{$book->title}TXT下载（迅雷专用高速下载2）</b></a> '); </script><BR>◎ <a href="{novel_book_download_link type='full' id=$book->id}">{$book->title}TXT下载（右键目标另存为）</a></div>
        <div style="float: left;left:375px">
        </div>
    </div></DIV>{*<DIV id="BookMl"><script src="http://www.qingkan.net/file/script/960.js"></script></DIV>*}<DIV id="BookMl">{$book->title} <BR><script language="javascript" type="text/javascript" src="{$FW_THEME_URL}/js/fx.js"></script><BR><BR>  作者：{$book->author}|内容简介：&nbsp;&nbsp;&nbsp;&nbsp;{$book->summary}</DIV>
<DIV id="TxtdownTop"><iframe src="http://www.37cs.com/html/click/9066_2610.html" width="950" height="90" marginheight="0" marginwidth="0" scrolling="no" frameborder="0"></iframe></DIV>
<DIV id="TxtdownTop">
    <iframe src="http://www.37cs.com/html/click/9066_2795.html" width="300" height="250" marginheight="0" marginwidth="0" scrolling="no" frameborder="0"></iframe>
    <iframe src="http://www.37cs.com/html/click/9066_2796.html" width="300" height="250" marginheight="0" marginwidth="0" scrolling="no" frameborder="0"></iframe>
    <iframe src="http://www.37cs.com/html/click/9066_2797.html" width="300" height="250" marginheight="0" marginwidth="0" scrolling="no" frameborder="0"></iframe></DIV>
<DIV id="Chapters">{$book->title}[章节列表]

<UL>
{foreach $chapters as $item}	
<li><a href="{novel_chapter_link bookid=$book->id id=$item->id}">{$item->title}</a></li>
{/foreach}
</UL>
</DIV><DIV id="TxtdownFoot">{$book->title}[列表底部]<BR>  ◎
    <script src="http://www.qingkan.net/file/script/12.js"></script> <script src="http://s22.cnzz.com/z_stat.php?id=1000172410&web_id=1000172410" language="JavaScript"></script></p>
</DIV></body></html>
