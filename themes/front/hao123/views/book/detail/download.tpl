<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{$book->title},{$book->title}TXT下载</title>
    <meta name="keywords" content="{$book->title}TXT下载,{$book->title}TXT全本下载" />
    <meta name="description" content="{$siteinfo->SiteName} {$book->title}" />

</head>
{literal}
<style>body {font-family: "宋体";font-size: 12px;margin-top:20px;line-height:14pt;}a {color:#2C78C5;text-decoration:none;}a:hover{color:#CC0000;text-decoration:underline;}#TxtdownTop {width:70%;margin:auto;}#BookMl {margin:auto;margin-top:20px;width:70%;}#Chapters {margin:auto;margin-top:20px;width:70%;}#Chapters ul {list-style-type:circle;line-height:21px;margin:0 0 0 20px;padding:0 0 0 10px;}#TxtdownFoot {margin:auto;margin-top:2px;width:70%;}</style>
{/literal}
</head>
<body>
<DIV id="TxtdownTop">
    <div style="width: 950px">
        <div style="float: left;width: 560px">
            {$book->title}TXT下载<br />  ◎ 
			<A href="{$FW_SITE_URL}">{$siteinfo->SiteName}</A> - 
			<A href="{novel_book_link id=$book->id}">{$book->title}在线阅读</A>
			<a href="{novel_book_download_link type='full' id=$book->id}">{$book->title}TXT下载（右键目标另存为）</a>
		</div>
    </div>
</DIV>
<DIV id="BookMl">
<div style="height:auto;width:100%">
<script language="javascript" type="text/javascript" src="{$FW_THEME_URL}/js/fx.js"></script>
</div><br /><br /><br />
<div style="float:left;width:100%;height:auto;">
<span style="color:red">{$book->title}</span> <br />作者：<span style="color:red">{$book->author}</span><br />内容简介：<br />&nbsp;&nbsp;&nbsp;&nbsp;{$book->summary|trim|strip_tags}
</div>
<br />
</DIV>
<DIV id="Chapters">{$book->title}[章节列表]
<UL>
{foreach $chapters as $item}	
<li><a href="{novel_chapter_link bookid=$book->id id=$item->id}">{$item->title}</a></li>
{/foreach}
</UL>
</DIV></body></html>
