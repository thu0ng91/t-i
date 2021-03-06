<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$title}</title>
<meta name="keywords" content="{$keywords}">
<meta name="description" content="{$description}">
<link rel="shortcut icon" href="favicon.ico" />
<link href="{$FW_THEME_URL}/css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
    var SiteUrl = '{$FW_SITE_URL}';
</script>

<script type="text/javascript" src="{$FW_THEME_URL}/js/jquery.min.js"></script>
<script src="{$FW_THEME_URL}/js/msc_common.js" type="text/javascript" language="javascript"></script>
</head>
<body>
<script type="text/javascript" src="{$FW_THEME_URL}/js/common.js"></script>

<div class="head">
  <div class="header">
    <div class="logo"><a href="{$FW_SITE_URL}" title="{$siteinfo->SiteName}"><img style="height:45;width:110px;" src="{$FW_THEME_URL}/images/logo.png" /></a></div>
    <ul class="menu">
      <li {if $this->id == 'site' && $this->action->id == 'index'}class="on"{/if}><a href="{$FW_SITE_URL}" title="{$siteinfo->SiteName}">首页</a></li>
      {novel_menu}
      <li {if $this->id == 'list' && $this->action->id == 'index' && $category->id == $item->id}class="on"{elseif $this->id == 'detail' && $this->action->id == 'index' && $book->category->id == $item->id}class="on"{/if}><a href="{$item->url}">{$item->title}</a></li>
      {/novel_menu}
      <li {if $this->id == 'list' && $this->action->id == 'lastupdate'}class="on"{/if}><a href="{novel_lastupdate_link}" >最近更新</a></li>
      <li {if $this->id == 'list' && $this->action->id == 'rank'}class="on"{/if}><a href="{novel_rank_link}" >排行榜</a></li>
    </ul>
    <div class="search">
      <form id="searcharticle" name="searcharticle" method="get" action="{novel_search_link}">
        <input name="keyword" style="width:190px; float:left; border:0px; height:24px;padding:2px 5px 2px 5px;" value="请输入书名或作者名搜索小说" size="28" onclick="this.focus();if (this.value
         == '请输入书名或作者名搜索小说') this.value='';" onblur="if (this.value == '') this.value='请输入书名或作者名搜索小说';"  type="text">
        <input class="search-submit" name="button" id="button" value="" type="submit">
        <span id="advancedSearch"></a>&nbsp;&nbsp;&nbsp;&nbsp;</span> <span id="hot_keywords" style="width: 150px; margin-left: 5px;"></span>
      </form>
    </div>
  </div>
</div>
<div class="u_tips">
  <div class="info_login">
    <div class="cs1">亲爱的小说迷，上次看到哪了，请查看<script type="text/javascript">yuedu();</script>&nbsp;&nbsp; <span id="loginPannel">当前你还没有登录，登录后可查看收藏在云端书架中的小说！<a href="{novel_link url="member/do/login"}">点击这里登陆</a></span></div>
    <div class="cs2">
    </div>
  </div>
  <div id="banner" style="display:none;"></div>
  <div style="clear:both;height:0px;"></div>
</div>
</div>
{$content}
<div class="foot">
        <p>本站为演示站点，所有小说及章节均由网友上传，转载至本站只是为了宣传本书让更多读者欣赏。</p>
		<span style="font-family:arial;">Copyright &copy; 2014 <a href="{$FW_SITE_PUB_URL}" target="_blank">{$FW_SITE_PUB_URL}</a> </span> {$siteinfo->SiteName}</a></p>
<script>
    {literal}
    $(document).ready(function () {

        function showLoginInfo(r)
        {
            if (typeof r == 'object' && r.result)  {
                var p = $("#loginPannel");
                var bookcaseUrl = SiteUrl + "/member/my/bookcase";
                p.html(r.data.username + " 你好，你可以访问 <a href='" + bookcaseUrl + "'>我的书架</a> 快速找到上次阅读过的章节");
            }
        }
        getLoginInfo(showLoginInfo);
    });
    {/literal}
</script>
</body>
</html>
<!-- spend time {$TIME} -->