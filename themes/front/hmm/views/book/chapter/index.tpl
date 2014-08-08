<link href="{$FW_THEME_URL}/css/sty1.css" rel="stylesheet">
<link href="{$FW_THEME_URL}/css/footer.css" rel="stylesheet" type="text/css"/>
<link href="{$FW_THEME_URL}/css/directory.css" rel="stylesheet" type="text/css"/>
<link href="{$FW_THEME_URL}/css/book_other.css" rel="stylesheet" />
<script type="text/javascript" src="{$FW_THEME_URL}/js/main.js"></script>
<script type="text/javascript" src="{$FW_THEME_URL}/js/xs.js"></script>
<script	type="text/javascript" src="{$FW_THEME_URL}/js/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="js/xs.js"></script>

<div class="main myset"><script>show_pagetop();</script></div>

<div id="a_main">
<div class="bdtop"></div>
<div class="bdsub" id="amain">
<dl>
	<dt>
	<p class="fr">	
		<a class="nofollow" href="javascript:;" onclick="uservote({$book->id})">推荐 </a>|
		<a class="nofollow" href="javascript:;" onclick="addbookcase({$book->id})">加入书架</a> |
		<a href="{novel_chapter_link bookid=$book->id id=$nextChapterId}">返回书页</a>
	</p>
<!--path begin-->
<div class="wrap_in path1">当前位置： <a href="{$FW_SITE_URL}">云阅首页 </a>&gt; <a
	href="{novel_category_link id=$book->category->id}">{$book->category->title}</a>&gt;
<a href="{novel_book_link id=$book->id}">{$book->title}</a></div>
<!--path end-->
	</dt>
	<dd>
		<h1>{$chapter->title}</h1>
		<h3>
			<a	href="{novel_chapter_link bookid=$book->id id=$prevChapterId}">上一章</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			<a	href="{novel_chapter_link bookid=$book->id id=$nextChapterId}" >返回目录</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			<a	href="{novel_chapter_link bookid=$book->id id=$nextChapterId}">下一章</a>
		</h3>
	</dd>
	<dd class="read_AD">
			<img src="{$FW_THEME_URL}/images/read/AD.jpg" />
	</dd>
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
	<a	href="{novel_chapter_link bookid=$book->id id=$prevChapterId}"	class="redbutt">上一章</a>
	<a	href="{novel_chapter_link bookid=$book->id id=$nextChapterId}" class="redbutt">返回章节目录</a>
	<a	href="{novel_chapter_link bookid=$book->id id=$nextChapterId}"	class="redbutt">下一章</a></dd>
	<dd id="tipsfoot"></dd>
</dl>
<div class="cl"></div>
</div>
</div>
<div class="cl" style="height: 8px;"></div>


<script language=javascript>
    //上一页链接
    var prevpage="{novel_chapter_link bookid=$book->id id=$prevChapterId}";
    //下一页链接
    var nextpage="{novel_chapter_link bookid=$book->id id=$nextChapterId}";
    //目录页链接
    var catalog="{novel_book_link id=$book->id}";

    var bid = '{$book->id}';
    var tid = '{$chapter->id}';
    var title = '{$book->title}';
    var texttitle = '{$chapter->title}';

    {literal}

//    document.onkeydown = gotNextPage;

    function gotNextPage(event)
    {
        event = event ? event : (window.event ? window.event : null);
        if (event.keyCode==39)
        {
            //alert("Next Page!")
            location=nextpage
        }
        if (event.keyCode==37)
        {
            //alert("Prevpage Page!");
            location=prevpage;
        }
        if (event.keyCode==13)
        {
            location=catalog
        }
    }

    $(document).bind("keydown", gotNextPage);

    $(document).ready(function () {
        LoadUserPro();
        window.lastread.set(bid,tid,title,texttitle);
    });
    {/literal}
</script>

<script type="text/javascript" src="{$FW_THEME_URL}/js/common.js"></script>