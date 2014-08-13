<link href="{$FW_THEME_URL}/css/sty1.css" rel="stylesheet">
<link href="{$FW_THEME_URL}/css/footer.css" rel="stylesheet" type="text/css"/>
<link href="{$FW_THEME_URL}/css/directory.css" rel="stylesheet" type="text/css"/>
<link href="{$FW_THEME_URL}/css/book_other.css" rel="stylesheet" />
<div id="a_main">
<div class="bdtop"></div>
<div class="bdsub" id="amain">
<dl>
	<dt>
<!--path begin-->
<div class="wrap_in path1">
	当前位置： <a href="{$FW_SITE_URL}">云阅首页 </a>&gt; 

	<a href="{novel_link url='/notice/detail/index' params=['id'=>$notice->id]}">{$notice->title}</a>

</div>
<!--path end-->
	</dt>
	<dd>
		<h1>{$notice->title}</h1>
		<div id="ninfo">
			<span>发布时间：{$notice->dateline|date_format:'Y-m-d H:i:s'}</span>
			<span style="float:right">查看数:{$notice->views}</span>
		</div>
	</dd>
	 <div id="contents"><!--go-->{$notice->content|replace:"\n":"<br />&nbsp;&nbsp;&nbsp;&nbsp;"} <!--over--></div>
	</dd>

</dl>

</div>
</div>



