<link href="{$FW_THEME_URL}/css/book_index.css" rel="stylesheet"/>
<!--container begin-->
<div class="container" style="margin-top: 11px;">
<div class="row_a clearfix">
<div class="col_aa clearfix">
<div id="J_slideContainer" class="col_slider">
<div class="slider_pic clearfix">
{novel_block id=8}
{novel_block id=15}
<div class="img_overview" style="top: 0"><i class="arrow"></i></div>
</div>
{novel_block id=9}
</div>
<div class="col_main">
{novel_block id=11}
{novel_block id=12}
</div>
</div>
<div class="col_b mod mod_a">
<div class="hd">
<div class="tab_hd">
<ul class="mod_tab clearfix">
<li class="cur" id="week-rank-bind"><span>周排行榜</span></li>
<li id="month-rank-bind"><span>月排行榜</span></li>
</ul>
</div>
</div>
<div class="bd">
<!-- 周排行榜 -->
{novel_block id=6}

<!-- 月排行榜 -->
{novel_block id=7}
</div>
</div>
<div class="row_b clearfix">
<div class="col_a">
<div class="mod_box free_book">
<div class="mod_hd">
<h3 class="tit">完结推荐</h3>
<a class="more" href="/list/wanjie.html" target="_blank">更多&gt;&gt;</a>
</div>
<div class="mod_bd img_scroll">
<a class="btn btn_lt btn_lt_none"id="prev" href="javascript:void(0);"></a> 
<a class="btn btn_rt" id="next" href="javascript:void(0);"></a>
<div class="show_box">
{novel_block id=10}
</div>
</div>
</div>
<!-- 最近更新 -->
{novel_block id=5}
</div>
<div class="col_b">
<!-- 总推荐 -->
{novel_block id=4}

<!-- 最近入库 -->
{novel_block id=3}
</div>
</div>
<dl class="famous clearfix" style="border: none">
<dt>友情连接：</dt>
{novel_friendlink}
<a href="{$item->url}" target="_blank">{$item->name}</a>
{/novel_friendlink}
<dd></dd>
</dl>
</div>
</div>