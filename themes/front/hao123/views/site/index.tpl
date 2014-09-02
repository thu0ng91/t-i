<script type="text/javascript">index_top();</script>
<div class="indexboxone clearfix">
    <div class="indexboxonel">
        <div id="consone">
            {* 分类头条 *}
            <ul style="display: block;" class="">
            {novel_book order='recommendlevel desc,createtime desc' where='recommendlevel<=9' limit=19}
            {if $block.first}
                <div class="indexonell">
                    <a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}"><img src="{$item->coverImageUrl}"></a>
                    <h2><a href="{novel_book_link id=$item->id type='index'}">{$item->title}</a></h2>
					<span>{$item->summary|trim|strip_tags|truncate:50:'...'}
					<a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}" class="green">阅读&gt;&gt;</a>
					</span>
                </div>
            {/if}
            {if $block.index == 1}
                <div class="indexonelc">
                    <h3><a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}">{$item->title}</a></h3>
					<span>{$item->summary|trim|strip_tags|truncate:50:'...'}
					<a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}" class="green">阅读&gt;&gt;</a>
					</span>
            {/if}
            {if $block.index == 2 && $block.total > 1}
                    <ul class="clearfix">
            {/if}
            {if $block.index >= 2 && $block.index <= 9}
                        <li><a href="{$item->category->url}" class="i1">[{$item->category->title}]</a><a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}" class="i2">{$item->title}</a></li>
            {/if}
            {if ($block.last && $block.index > 1 && $block.index <= 9) || $block.index == 9}
                    </ul>
            {/if}
            {if !$block.last && $block.index == 10}
                    <h3><a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}">{$item->title}</a></h3>
                    <span>{$item->summary|trim|strip_tags|truncate:50:'...'}
                    <a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}" class="green">阅读&gt;&gt;</a>
                    </span>           
                    <ul class="clearfix">
             {/if}

             {if $block.index > 10 && $block.index <= 18}
                        <li><a href="{$item->category->url}" class="i1">[{$item->category->title}]</a><a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}" class="i2">{$item->title}</a></li>
             {/if}                       
                {if ($block.last && $block.index > 10 && $block.index <= 18) || $block.index == 18}
                    </ul>
                {/if}
                {if $block.last && $block.total > 1}
                </div>
                {/if}
                {/novel_book}
            </ul>

            {foreach [1,2,4,5,6,7,8,9,10,11,12,13] as $v}
            {novel_book cid=[$v] order='recommendlevel desc,createtime desc' where='recommendlevel<=8' limit=19}
            {if $block.first}
            <ul class="hidden">
                <div class="indexonell">
                    <a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}"><img src="{$item->coverImageUrl}"></a>
                    <h2><a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}">{$item->title}</a></h2>
                    <span>{$item->summary|trim|strip_tags|truncate:50:'...'}
                    <a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}" class="green">阅读&gt;&gt;</a>
                    </span>
                </div>
            {/if}
            {if $block.index == 1}
                <div class="indexonelc">
                    <h3><a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}">{$item->title}</a></h3>
                    <span>{$item->summary|trim|strip_tags|truncate:50:'...'}
                    <a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}" class="green">阅读&gt;&gt;</a>
                    </span>
            {/if}
            {if $block.index == 2 && $block.total > 1}
                <ul class="clearfix">
            {/if}
            {if $block.index >= 2 && $block.index <= 9}
                        <li><a href="{$item->category->url}" class="i1">[{$item->category->title}]</a><a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}" class="i2">{$item->title}</a></li>
            {/if}
            {if ($block.last && $block.index > 1 && $block.index <= 9) || $block.index == 9}
                    </ul>
            {/if}
            {if !$block.last && $block.index == 10}
                    <h3><a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}">{$item->title}</a></h3>
                    <span>{$item->summary|trim|strip_tags|truncate:50:'...'}
                    <a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}" class="green">阅读&gt;&gt;</a>
                    </span>           
                    <ul class="clearfix">
             {/if}

             {if $block.index > 10 && $block.index <= 18}
                        <li><a href="{$item->category->url}" class="i1">[{$item->category->title}]</a><a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}" class="i2">{$item->title}</a></li>
             {/if}                       
                {if ($block.last && $block.index > 10 && $block.index <= 18) || $block.index == 18}
                    </ul>
                {/if}
                {if $block.last && $block.total > 1}
                </div>
            </ul>                
                {/if}
                {/novel_book}
            {/foreach}

        </div>
        <div class="indexonelr" id="tabsone">
            <ul>
                <li class="cur">热书</li>
                {foreach [1,2,4,5,6,7,8,9,10,11,12,13] as $v}
                {novel_category id=[$v]}
                <li>{$item->title}</li>
                {/novel_category}
                {/foreach}
            </ul>
        </div>
    </div>
    {*榜单*}
    <div class="indexboxoner">
        <div class="rtit" id="tabstwo">
            <h3>编辑推荐</h3>
            <ul>
                <li class="">日</li>
                <li class="cur">周</li>
                <li class="">月</li>
            </ul>
        </div>
        <div id="constwo">
        {foreach ["day", "week", "month"] as $v}
            <div style="display: {if $v == 'week'}block{else}none{/if};" class="rcenter">
        	{novel_book_rank order=$v limit=11}
            	{if $block.first}
                <div class="figure clearfix">
                    <a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}"><img src="{$item->coverImageUrl}"></a>
                    <div class="figurer">
                        <h4><a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}">{$item->title}</a></h4>
                        <span>{$item->summary|trim|strip_tags|truncate:15:'...'}</span><a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}" class="green">阅读&gt;&gt;</a>
                    </div>
                </div>
                <ul class="clearfix">
                {/if}
                {if !$block.first}
                    <li><a href="xianxia" class="i1">[{$item->category->title}]</a><a href="{novel_book_link id=$item->id type='index'  pinyin=$item->pinyin}" class="i2">{$item->title}</a></li>
                {/if}

                {if $block.last}
                </ul>
                {/if}
             {/novel_book_rank}
            </div>
        {/foreach}
        </div>
    </div>
</div>

{*属性类别*}
<div class="c_bline">
</div>
<div class="wrapone">
    <div class="tabstit" id="tabszxsb">
        <ul>
            <li class="cur">最新大作</li>
            <li class="">畅销小说</li>
            <li class="">言情推荐</li>
            <li class="">最新上榜</li>
            <li class="last">全本小说</li>
        </ul>
    </div>
    <div id="conszxsb">
        <ul style="display: block;" class="clearfix imgitems">
  		{novel_book order='allclicks desc, createtime desc' limit=12}
            <li><a href="{novel_book_link id=$item->id  pinyin=$item->pinyin}" class="imgcss"><img src="{$item->coverImageUrl}" alt="{$item->title}"></a>
                <h3><a href="{novel_book_link id=$item->id  pinyin=$item->pinyin}" target="_blank">{$item->title}</a></h3>
                {$item->summary|trim|strip_tags|truncate:10:'...'}<span class="lzzico"></span></li>
       	{/novel_book}
        </ul>

        <ul style="display: none;" class="clearfix imgitems hidden">
  		{novel_book order='allclicks desc' limit=12} 
            <li><a href="{novel_book_link id=$item->id  pinyin=$item->pinyin}" class="imgcss"><img src="{$item->coverImageUrl}" alt="{$item->title}"></a>
                <h3><a href="{novel_book_link id=$item->id  pinyin=$item->pinyin}" target="_blank">{$item->title}</a></h3>
                {$item->summary|trim|strip_tags|truncate:10:'...'}<span class="lzzico"></span></li>
       	{/novel_book}
        </ul>


        <ul style="display: none;" class="clearfix imgitems hidden">
  		{novel_book cid=[10] limit=12} 
            <li><a href="{novel_book_link id=$item->id  pinyin=$item->pinyin}" class="imgcss"><img src="{$item->coverImageUrl}" alt="{$item->title}"></a>
                <h3><a href="{novel_book_link id=$item->id  pinyin=$item->pinyin}" target="_blank">{$item->title}</a></h3>
                {$item->summary|trim|strip_tags|truncate:10:'...'}<span class="lzzico"></span></li>
       	{/novel_book}
        </ul>


        <ul style="display: none;" class="clearfix imgitems hidden">
  		{novel_book order='lastchaptertime desc' limit=12} 
            <li><a href="{novel_book_link id=$item->id  pinyin=$item->pinyin}" class="imgcss"><img src="{$item->coverImageUrl}" alt="{$item->title}"></a>
                <h3><a href="{novel_book_link id=$item->id  pinyin=$item->pinyin}" target="_blank">{$item->title}</a></h3>
                {$item->summary|trim|strip_tags|truncate:10:'...'}<span class="lzzico"></span></li>
       	{/novel_book}
        </ul>

         <ul style="display: none;" class="clearfix imgitems hidden">
  		{novel_book order='lastchaptertime desc' limit=12 where="flag = 0"} 
            <li><a href="{novel_book_link id=$item->id  pinyin=$item->pinyin}" class="imgcss"><img src="{$item->coverImageUrl}" alt="{$item->title}"></a>
                <h3><a href="{novel_book_link id=$item->id  pinyin=$item->pinyin}" target="_blank">{$item->title}</a></h3>
                {$item->summary|trim|strip_tags|truncate:10:'...'}<span class="lzzico"></span></li>
       	{/novel_book}
        </ul>       
	    </div>
</div>

<script type="text/javascript">index_middle();</script>
{* 最新、最热*}
<div class="blinebgs"></div>
<div class="clearfix wrapone bitems">
    <div id="tabsthree" class="tabstit">
        <ul>
            <li class="cur">最新更新</li>
            <li class="last">热门小说</li>
        </ul>
    </div>
    <div class="recently_list" id="consthree">
        {novel_block id=17}
        {novel_block id=18}
    </div>
</div>

{* 友情链接 *}
<div class="link">
    <div class="linktop clearfix">
        <h3>精品小说网站</h3>
    </div>
    <div class="linkbody">
    </div>
</div>
<div class="blinebgs"></div>

{* 回到顶部*}
<div id="fix-area" class="fix-area">
    <a style="visibility: visible;" class="go-top-btn" href="#" target="_self">返回顶部</a>
</div>