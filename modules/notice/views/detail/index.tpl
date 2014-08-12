
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
	{php}
	$p = array('id' => $this->_tpl_vars['notice']->id);
	$this->_tpl_vars['p'] = $p;
	{/php}
	<a href="{$Yii->createUrl('/notice/detail/index',$p)}">{$notice->title}</a>
</div>
<!--path end-->
	</dt>
	<dd>
		<h1>{$notice->title}</h1>
	</dd>

	 <div id="contents"><!--go-->{$notice->content|replace:"\n":"<br />&nbsp;&nbsp;&nbsp;&nbsp;"} <!--over--></div>
	</dd>

</dl>

</div>
</div>



