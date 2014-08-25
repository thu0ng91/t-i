<link href="{$FW_THEME_URL}/css/index.css" rel="stylesheet" type="text/css">
<div id="warpper">
    <div id="cont1">
        <div id="cont1_1">
            <div class="newfmx_jd">
                <div id="ifocus">
                    <div class="newjd_topbox">
                        <div id="ifocus_pic">
                            <div id="ifocus_piclist" style="left: 0px; top: 0px;">
                                <ul>
                                    {novel_book order="recommendlevel desc" recommend=[1,2,3,4,5,6,7,8,9] limit=4}
									<li>
                                        <a href="{novel_book_link id=$item->id}" title="{$item->title}" target="_blank">
                                            <img src="{$item->coverImageUrl}" alt="{$item->title}" original="{$item->coverImageUrl}">
                                        </a>
                                    </li>
                                    {/novel_book}
                                </ul>
                            </div>
                        </div>
                        <div id="ifocus_btn">
                            <ul>
                                {novel_book order="recommendlevel desc" recommend=[1,2,3,4,5,6,7,8,9] limit=4}
								 {if $block.first} 
								<li class="current">    
								 {else}
								<li>
								 {/if}								
                                 <a href="{novel_book_link id=$item->id}" title="{$item->title}" target="_blank">
                                    <img src="{$item->coverImageUrl}" alt="{$item->title}" original="{$item->coverImageUrl}">
                                </a>
                                </li>
                                {/novel_book}
                            </ul>
                        </div>
                    </div>
                    <div id="ifocus_tx">
                        <ul>
                            {novel_book order="recommendlevel desc" recommend=[1,2,3,4,5,6,7,8,9] limit=4}
							 {if $block.first} 
							<li class="current">    
							 {else}
							<li>
							 {/if}	                         
                               <h3><a href="{novel_book_link id=$item->id}" title="{$item->title}" target="_blank">{$item->title}</a></h3>
                               <span class="intro">简介：{$item->summary|trim|strip_tags|truncate:80:"...":true}</span>
                           </li>
                           {/novel_book}
                       </ul>
                   </div>
                </div>
                
            </div>
        </div>
        <div id="cont1_2">
            <div id="cont1_2_cont01">
                <h4>热门小说</h4>
                {novel_book order="recommendlevel desc,createtime desc" recommend=[1] limit=1}
                <h1><a href="{novel_book_link id=$item->id}" target="_blank" title="{$item->title}">{$item->title}</a></h1>
                <p>&nbsp;&nbsp;{$item->summary|trim|strip_tags|truncate:80:"...":true}<a href="{novel_book_link id=$item->id}" target="_blank">[详情]</a></p>
                {/novel_book}
                <ul>
                    {novel_book order="recommendlevel desc,createtime desc" recommend=[3] limit=6}
                    <li>&nbsp;&nbsp;<a href="{novel_category_link id=$item->category->id}">[{$item->category->title}]</a><a href="{novel_book_link id=$item->id}" title="{$item->title}" target="_blank">{$item->title}</a></li>
                    {/novel_book}
                </ul>
            </div>
            <div class="clear"></div>
            <div id="cont1_2_cont02">
                <h4>新闻公告</h4>
            </div>
        </div>
        <div id="cont1_3">
            <div class="ph_box">
                <div class="xx_top"><h5>小说点击榜</h5></div>
                <ul>
                    {novel_book_rank type="click" order="all" limit=10}
                    <li><a href="{novel_book_link id=$item->id}" target="_blank"  title="{$item->title}">{$item->title}</a></li>
                    {/novel_book_rank}
                </ul>
            </div>
        </div>
        <div class="clear"></div>
   </div>
   <div id="cont2">
        <div class="cont2_left" id="xinshu">
            <div class="l_top">
                <h4>新书佳作</h4>
            </div>
            <div class="l_cont">
                <div class="l_cont_left">
                    {novel_book order="recommendlevel desc,createtime desc" recommend=[4] limit=1}
                    <p class="p_img"><a href="{novel_book_link id=$item->id}" title="{$item->title}最新章节" target="_blank"><img src="{$item->coverImageUrl}" alt="{$item->title}最新章节" original="{$item->coverImageUrl}" style="display: inline-block;"></a></p>
                    <h5><a href="{novel_book_link id=$item->id}" title="{$item->title}最新章节" target="_blank">{$item->title}</a></h5>
                    <p class="p_name"><span>作者：</span>欹孤小蛇</p>
                    <p class="p_jianjie"><span>简介：</span>  {$item->summary|trim|strip_tags|truncate:80:"...":true}</p>
                    <p class="p_caozuo"><a href="{novel_book_link id=$item->id}" target="_blank">点击阅读</a></p>
                </div>
                {/novel_book}
                <div class="l_cont_right">
                    <ul>
                        {novel_book order="recommendlevel desc,createtime desc" recommend=[4,0] limit=7}
                        <li><span class="sp_01"><a href="{novel_book_link id=$item->id}" title="{$item->title}" target="_blank">{$item->title|truncate:16:"...":true}</a></span><span class="sp_02" style="cursor:pointer;">{$item->author}</span></li>
                        {/novel_book}
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
	        <div class="cont2_right">
            <div class="ph_box">
                <div class="xx_top" id="ph11">
                    <h5>新书点击榜</h5>
                </div>
                <div id="main11">
                    <ul>
                        {novel_book order="allclicks desc, createtime desc" limit=6}
                         <li><span class="sp_name"><a href="{novel_book_link id=$item->id}" target="_blank">{$item->title}</a></span><span class="sp_data">{$item->allclicks}</span></li>
                         {/novel_book}
                    </ul>
                </div>
            </div>
        </div>
    <div id="cont4">
        <div id="update">
            <div class="l_top">
                <h4>最近更新</h4>
                <span><a href="{novel_lastupdate_link}" target="_blank">更多&gt;&gt;</a></span>
            </div>
            <div class="updatetitle">
                <div class="uplist3z">序号</div>
                <div class="uplist3a">小说类别</div>
                <div class="uplist3b">小说书名 / 小说章节</div>
                <div class="uplist3c">小说点击量</div>
                <div class="uplist3d">小说作者</div>
                <div class="uplist3e">更新时间</div>
            </div>
            <div class="updatemain">
                {$i=1}
                {novel_book order="updatetime desc" limit=20}
                 <ul class="{if $i % 2 == 0}a1{/if}">
                    <li class="uplist3z">{$i++}</li>
                    <li class="uplist3a">{$item->category->title}</li>
                    <li class="uplist3b">
                        <a target="_blank" class="ts_font01" title="{$item->title}" href="{novel_book_link id=$item->id}">{$item->title}</a>
                        <a title="{$item->title} {$item->lastchaptertitle}" target="_blank" href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid}">{$item->lastchaptertitle}</a>
                        
                    </li>
                    <li class="uplist3c">{$item->allclicks}</li>
                    <li class="uplist3d">{$item->author}</li>  
                    <li class="uplist3e">{$item->updatetime|date_format:'Y-m-d'}</li>
                </ul>

                {/novel_book}
            </div>
            <div class="clear"></div>
        </div>
        <div id="cont4_bar">
            <div class="ph_box" id="boxbottom">
                <div class="xx_top"><h5>字数最多小说</h5></div>

                <ul>
                    {novel_book  order="wordcount desc" limit=10}
                    <li><a href="{novel_book_link id=$item->id}" target="_blank"  title="{$item->title}">{$item->title}</a></li>
                    {/novel_book}
                </ul>
            </div>
            <div class="clear"></div>
            <div class="ph_box">
                <div class="xx_top"><h5>最新入库小说</h5></div>
                <ul>
                    {novel_book  order="createtime desc" limit=10}
                    <li><a href="{novel_book_link id=$item->id}" target="_blank"  title="{$item->title}">{$item->title}</a></li>
                    {/novel_book}
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>