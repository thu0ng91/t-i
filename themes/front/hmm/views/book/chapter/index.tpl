<link href="{$FW_THEME_URL}/css/sty1.css" rel="stylesheet">
<link href="{$FW_THEME_URL}/css/footer.css" rel="stylesheet" type="text/css"/>
<link href="{$FW_THEME_URL}/css/directory.css" rel="stylesheet" type="text/css"/>
<link href="{$FW_THEME_URL}/css/book_other.css" rel="stylesheet" />
<script	type="text/javascript" src="{$FW_THEME_URL}/js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="{$FW_THEME_URL}/js/main.js"></script>
<script type="text/javascript" src="{$FW_THEME_URL}/js/xs.js"></script>
<script type="text/javascript" src="{novel_link url='/book/chapter/updatebookcase' params=['id'=>{$book->id},'cid'=>{$chapter->id},'readtitle'=>{$chapter->title}]}"></script>
<script language="javascript" type="text/javascript">
  var preview_page = "{if $prevChapterId}{novel_chapter_link bookid=$book->id id=$prevChapterId pinyin=$book->pinyin}{else}{novel_book_link id=$book->id pinyin=$book->pinyin}{/if}";
  var next_page = "{if $nextChapterId}{novel_chapter_link bookid=$book->id id=$nextChapterId pinyin=$book->pinyin}{else}{novel_book_link id=$book->id pinyin=$book->pinyin}{/if}";
  var index_page = "{novel_book_link id=$book->id pinyin=$book->pinyin}";
  var bookid = "{$book->id}";
  var readid = "{$chapter->id}";
  function jumpPage() {
	var event = document.all ? window.event: arguments[0];
	if (event.keyCode == 37) document.location = preview_page;
	if (event.keyCode == 39) document.location = next_page;
	if (event.keyCode == 13) document.location = index_page;
  }
  document.onkeydown = jumpPage;
  </script>
<SCRIPT language=JavaScript>
	var currentpos,timer;
	function initialize(){
		timer=setInterval("scrollwindow()",10);
	}
	function sc(){
		clearInterval(timer);
	}
	function scrollwindow(){
		currentpos=document.body.scrollTop;
		window.scroll(0,++currentpos);
		if (currentpos != document.body.scrollTop)
			sc();
	}
	document.onmousedown=sc
	document.ondblclick=initialize
</script>
<div class="main myset"><script>show_pagetop();</script><script>show_pagebottom();</script></div>

<div id="a_main">
<div class="bdtop"></div>
<div class="bdsub" id="amain">
<dl>
	<dt>
	<p class="fr">	
		<a class="nofollow" href="javascript:;" onclick="uservote({$book->id})">推荐 </a>|
		<a class="nofollow" href="javascript:;" onclick="addbookcase({$book->id},{$chapter->id},'{$chapter->title}')">加入书架</a>
	</p>
<!--path begin-->
<div class="wrap_in path1">当前位置： <a href="{$FW_SITE_URL}">{$siteinfo->SiteName}首页 </a>&gt; <a
	href="{novel_category_link id=$book->category->id}">{$book->category->title}</a>&gt;
<a href="{novel_book_link id=$book->id}">{$book->title}</a></div>
<!--path end-->
	</dt>
	<dd>
		<h1>{$chapter->title}</h1>
		<h3>
			<a	href="{if $prevChapterId}{novel_chapter_link bookid=$book->id id=$prevChapterId pinyin=$book->pinyin}{else}{novel_book_link id=$book->id pinyin=$book->pinyin}{/if}">上一章</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			<a	href="{novel_book_link id=$book->id pinyin=$book->pinyin}" >返回目录</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			<a	href="{if $nextChapterId}{novel_chapter_link bookid=$book->id id=$nextChapterId pinyin=$book->pinyin}{else}{novel_book_link id=$book->id pinyin=$book->pinyin}{/if}">下一章</a>
		</h3>
	</dd>
	<div style="height: 10px;width: 96%;margin:0 auto;border-bottom:1px #e4e4e4 solid;"> </div>
	 <div id="contents"><!--go-->{$chapter->content|replace:"\n":"<br />&nbsp;&nbsp;&nbsp;&nbsp;"} <!--over--></div>
	</dd>
	
<!-- 
	<dd id="contfoot">
		<a href="Javascript:void(0);"	class="keep"><span class="read_keep" >&nbsp;</span>没看完？将本书加入收藏</a>
		<a rel="nofollow"	href="Javascript:void(0);" class="case" target="_blank"><span class="read_case" >&nbsp;</span>我是会员，将本书放入书架</a>
		<a href="Javascript:void(0);" class="copy"><span class="read_copy" >&nbsp;</span>复制本书地址，传给QQ/MSN上的好友</a>
		<a rel="nofollow"	href="Javascript:void(0);" class="report" target="_blank"><span class="read_report" >&nbsp;</span>章节错误？点此举报</a>
	</dd>
 -->
	<dd id="tipscent"></dd>
	<dd id="footlink">
	<a	href="{if $prevChapterId}{novel_chapter_link bookid=$book->id id=$prevChapterId pinyin=$book->pinyin}{else}{novel_book_link id=$book->id pinyin=$book->pinyin}{/if}"	class="redbutt">上一章</a>
	<a	href="{novel_book_link id=$book->id pinyin=$book->pinyin}" class="redbutt">返回目录</a>
	<a	href="{if $nextChapterId}{novel_chapter_link bookid=$book->id id=$nextChapterId pinyin=$book->pinyin}{else}{novel_book_link id=$book->id pinyin=$book->pinyin}{/if}"	class="redbutt">下一章</a></dd>
	<dd id="tipsfoot"></dd>
</dl>
<div class="cl"></div>
</div>
</div>
<div class="cl" style="height: 8px;"></div>
