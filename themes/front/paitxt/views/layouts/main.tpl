<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$title}</title>
<meta name="keywords" content="{$keywords}">
<meta name="description" content="{$description}">
<link rel="shortcut icon" href="favicon.ico" />
<link href="{$FW_THEME_URL}/css/style.css" rel="stylesheet" type="text/css">
<script src="{$FW_THEME_URL}/js/msc_common.js" type="text/javascript" language="javascript"></script>
</head>
<body>
<script type="text/javascript" src="{$FW_THEME_URL}/js/common.js"></script>

<div class="head">
  <div class="header">
    <div class="logo"><a href="http://www.paitxt.com" title="派小说网"></a></div>
    <ul class="menu">
      <li class="on"><a href="http://www.paitxt.com" title="派小说网">首页</a></li>
      <li><a href="http://www.paitxt.com/class/1.html" >玄幻</a></li>
      <li><a href="http://www.paitxt.com/class/2.html" >修真</a></li>
      <li><a href="http://www.paitxt.com/class/3.html" >都市</a></li>
      <li><a href="http://www.paitxt.com/class/4.html" >穿越</a></li>
      <li><a href="http://www.paitxt.com/class/5.html" >异界</a></li>
      <li><a href="http://www.paitxt.com/class/6.html" >网游</a></li>
      <li><a href="http://www.paitxt.com/class/7.html" >科幻</a></li>
      <li><a href="http://www.paitxt.com/lastupdate/1.html" >最近更新</a></li>
      <li><a href="http://www.paitxt.com/modules/article/index.php?fullflag=1" >全本</a></li>
    </ul>
    <div class="search">
      <form id="searcharticle" name="searcharticle" method="post" action="/modules/article/search.php">
        <input name="searchkey" style="width:190px; float:left; border:0px; height:24px;padding:2px 5px 2px 5px;" value="" size="28" onclick="this.focus();checkKeywords(this,1)" onblur="checkKeywords(this,0)" type="text">
        <input type="hidden" name="action" value="login">
        <input class="search-submit" name="button" id="button" value="" type="submit">
        <span id="advancedSearch"></a>&nbsp;&nbsp;&nbsp;&nbsp;</span> <span id="hot_keywords" style="width: 150px; margin-left: 5px;"></span>
      </form>
    </div>
    
    <!--<ul class="nav">

                <li><a href="/modules/article/bookcase.php" target="_blank">我的书架</a></li>

			</ul>--> 
    
  </div>
</div>
<div class="u_tips">
  <div class="info_login">
    <div class="cs1">亲爱的小说迷，上次看到哪了，请查看<script type="text/javascript">yuedu();</script></div>
    <div class="cs2">
      {*<iframe width="380" height="20" scrolling="no" frameborder="0" src="/loginframe.php" marginwidth=0 marginheight=0 frameborder="0" allowTransparency="true">*}
      {*</iframe>*}
    </div>
  </div>
  <div id="banner" style="display:none;"></div>
  <div style="clear:both;height:0px;"></div>
</div>
</div>


{$content}


<div class="foot">

		<span style="font-family:arial;">Copyright &copy; 2013 <a href="http://www.paitxt.com" target="_blank">www.paitxt.com</a> </span> 派小说网 版权所有  </a></p>



<p>

<a href="#" target="_blank"><font color="#FE0101">手机阅读</font></a> - <a href="#" target="_blank">Pad阅读</font></a> - <a target="_blank" href="#" style="text-decoration:none;">站长E-mail</a> - <a href="#" target="_blank">网站简介</a> - <a href="#" target="_blank">免责声明</a> -</p>

</body>
</html>
{$TIME}
{debug}