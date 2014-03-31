<script type="text/javascript">index_top();</script>
<div class="indexboxone clearfix">
    <div class="indexboxonel">
        <div id="consone">
            {* 分类头条 *}
            <ul style="display: block;" class="">
            {novel_book order='recommendlevel desc,createtime desc' where='recommendlevel<=9' limit=19}
            {if $block.first}
                <div class="indexonell">
                    <a href="{novel_book_link id=$item->id type='index'}"><img src="{$item->coverImageUrl}"></a>
                    <h2><a href="{novel_book_link id=$item->id type='index'}">{$item->title}</a></h2>
					<span>{$item->summary|trim|truncate:50:'...'}
					<a href="{novel_book_link id=$item->id type='index'}" class="green">阅读&gt;&gt;</a>
					</span>
                </div>
            {/if}
            {if $block.index == 1}
                <div class="indexonelc">
                    <h3><a href="{novel_book_link id=$item->id type='index'}">{$item->title}</a></h3>
					<span>{$item->summary|trim|truncate:50:'...'}
					<a href="{novel_book_link id=$item->id type='index'}" class="green">阅读&gt;&gt;</a>
					</span>
            {/if}
            {if $block.index == 2 && $block.total > 1}
                    <ul class="clearfix">
            {/if}
            {if $block.index >= 2 && $block.index <= 9}
                        <li><a href="{novel_category_link id=$item->cid}" class="i1">[{$item->category->title}]</a><a href="{novel_book_link id=$item->id type='index'}" class="i2">{$item->title}</a></li>
            {/if}
            {if ($block.last && $block.index > 1 && $block.index <= 9) || $block.index == 9}
                    </ul>
            {/if}
            {if !$block.last && $block.index == 10}
                    <h3><a href="{novel_book_link id=$item->id type='index'}">{$item->title}</a></h3>
                    <span>{$item->summary|trim|truncate:50:'...'}
                    <a href="{novel_book_link id=$item->id type='index'}" class="green">阅读&gt;&gt;</a>
                    </span>           
                    <ul class="clearfix">
             {/if}

             {if $block.index > 10 && $block.index <= 18}
                        <li><a href="{novel_category_link id=$item->cid}" class="i1">[{$item->category->title}]</a><a href="{novel_book_link id=$item->id type='index'}" class="i2">{$item->title}</a></li>
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
                    <a href="{novel_book_link id=$item->id type='index'}"><img src="{$item->coverImageUrl}"></a>
                    <h2><a href="{novel_book_link id=$item->id type='index'}">{$item->title}</a></h2>
                    <span>{$item->summary|trim|truncate:50:'...'}
                    <a href="{novel_book_link id=$item->id type='index'}" class="green">阅读&gt;&gt;</a>
                    </span>
                </div>
            {/if}
            {if $block.index == 1}
                <div class="indexonelc">
                    <h3><a href="{novel_book_link id=$item->id type='index'}">{$item->title}</a></h3>
                    <span>{$item->summary|trim|truncate:50:'...'}
                    <a href="{novel_book_link id=$item->id type='index'}" class="green">阅读&gt;&gt;</a>
                    </span>
            {/if}
            {if $block.index == 2 && $block.total > 1}
                <ul class="clearfix">
            {/if}
            {if $block.index >= 2 && $block.index <= 9}
                        <li><a href="{novel_category_link id=$item->cid}" class="i1">[{$item->category->title}]</a><a href="{novel_book_link id=$item->id type='index'}" class="i2">{$item->title}</a></li>
            {/if}
            {if ($block.last && $block.index > 1 && $block.index <= 9) || $block.index == 9}
                    </ul>
            {/if}
            {if !$block.last && $block.index == 10}
                    <h3><a href="{novel_book_link id=$item->id type='index'}">{$item->title}</a></h3>
                    <span>{$item->summary|trim|truncate:50:'...'}
                    <a href="{novel_book_link id=$item->id type='index'}" class="green">阅读&gt;&gt;</a>
                    </span>           
                    <ul class="clearfix">
             {/if}

             {if $block.index > 10 && $block.index <= 18}
                        <li><a href="{novel_category_link id=$item->cid}" class="i1">[{$item->category->title}]</a><a href="{novel_book_link id=$item->id type='index'}" class="i2">{$item->title}</a></li>
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
                {*
                <li>玄幻</li>
                <li>奇幻</li>
                <li>武侠</li>
                <li>仙侠</li>
                <li>都市</li>
                <li>言情</li>
                <li>历史</li>
                <li>军事</li>
                <li>网游</li>
                <li>竞技</li>
                <li>科幻</li>
                <li>灵异</li>
                *}
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
                    <a href="{novel_book_link id=$item->id type='index'}"><img src="{$item->coverImageUrl}"></a>
                    <div class="figurer">
                        <h4><a href="{novel_book_link id=$item->id type='index'}">{$item->title}</a></h4>
                        <span>{$item->summary|trim|truncate:15:'...'}</span><a href="{novel_book_link id=$item->id type='index'}" class="green">阅读&gt;&gt;</a>
                    </div>
                </div>
                <ul class="clearfix">
                {/if}
                {if !$block.first}
                    <li><a href="xianxia" class="i1">[{$item->category->title}]</a><a href="{novel_book_link id=$item->id type='index'}" class="i2">{$item->title}</a></li>
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
            <li>最新上榜</li>
            <li class="last">全本小说</li>
        </ul>
    </div>
    <div id="conszxsb">
        <ul style="display: block;" class="clearfix imgitems">
  		{novel_book order='allclicks desc, createtime desc' limit=12}
            <li><a href="{novel_book_link id=$item->id}" class="imgcss"><img src="{$item->coverImageUrl}" alt="{$item->title}"></a>
                <h3><a href="{novel_book_link id=$item->id}" target="_blank">{$item->title}</a></h3>
                {$item->summary|trim|truncate:10:'...'}<span class="lzzico"></span></li>
       	{/novel_book}
        </ul>

        <ul style="display: none;" class="clearfix imgitems hidden">
  		{novel_book order='allclicks desc' limit=12} 
            <li><a href="{novel_book_link id=$item->id}" class="imgcss"><img src="{$item->coverImageUrl}" alt="{$item->title}"></a>
                <h3><a href="{novel_book_link id=$item->id}" target="_blank">{$item->title}</a></h3>
                {$item->summary|trim|truncate:10:'...'}<span class="lzzico"></span></li>
       	{/novel_book}
        </ul>


        <ul style="display: none;" class="clearfix imgitems hidden">
  		{novel_book cid=[10] limit=12} 
            <li><a href="{novel_book_link id=$item->id}" class="imgcss"><img src="{$item->coverImageUrl}" alt="{$item->title}"></a>
                <h3><a href="{novel_book_link id=$item->id}" target="_blank">{$item->title}</a></h3>
                {$item->summary|trim|truncate:10:'...'}<span class="lzzico"></span></li>
       	{/novel_book}
        </ul>


        <ul style="display: none;" class="clearfix imgitems hidden">
  		{novel_book order='lastchaptertime desc' limit=12} 
            <li><a href="{novel_book_link id=$item->id}" class="imgcss"><img src="{$item->coverImageUrl}" alt="{$item->title}"></a>
                <h3><a href="{novel_book_link id=$item->id}" target="_blank">{$item->title}</a></h3>
                {$item->summary|trim|truncate:10:'...'}<span class="lzzico"></span></li>
       	{/novel_book}
        </ul>

         <ul style="display: none;" class="clearfix imgitems hidden">
  		{novel_book order='lastchaptertime desc' limit=12} 
            <li><a href="{novel_book_link id=$item->id}" class="imgcss"><img src="{$item->coverImageUrl}" alt="{$item->title}"></a>
                <h3><a href="{novel_book_link id=$item->id}" target="_blank">{$item->title}</a></h3>
                {$item->summary|trim|truncate:10:'...'}<span class="lzzico"></span></li>
       	{/novel_book}
        </ul>       


	    </div>
</div>

<script type="text/javascript">index_middle();</script>
{*分类推荐*}
{*
<div class="blinebgs"></div>
<div class="clearfix wraptwo wrapfive">
    <div class="w690">
        <div class="titone">
            <h2 id="t2"><a href="/index/type-wuxia">武侠</a>-<a href="/index/type-xianxia">仙侠</a></h2>
            <span><a href="/intro/247001">仙逆苍穹</a>|<a href="/intro/247000">五行仙帝</a>|<a href="/intro/246997">剑本凡铁</a>|<a href="/intro/2469968">狩猎荒古</a>|<a href="/intro/229878">飘渺寻仙传</a>|<a href="/intro/229861">大炼气士</a></span>
        </div>
        <ul class="clearfix imgitems imgitemstwo">
            <li><a href="/intro/37614" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/2013422/20130422121926082608.jpg" alt=""><strong>任怨</strong></a>
                <h3><a href="/intro/37614">斩仙</a></h3>
                前世，杨晨与人为善</li>
            <li><a href="/intro/44829" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/2013422/20130422120473177317.jpg" alt=""><strong>宅猪      </strong></a>
                <h3><a href="/intro/44829">帝尊</a></h3>
                武道可以通神！武道</li>
            <li><a href="/intro/37532" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/2013422/20130422120370707070.jpg" alt=""><strong>说梦者</strong></a>
                <h3><a href="/intro/37532">大圣传</a></h3>
                妖魔中的至高无上者</li>
            <li><a href="/intro/41222" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/2013422/20130422120245714571.jpg" alt=""><strong>我吃西红柿</strong></a>
                <h3><a href="/intro/41222">莽荒纪</a></h3>
                在《莽荒纪》这个世</li>
            <li><a href="/intro/12636" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/2013422/20130422120282708270.jpg" alt=""><strong>曳光</strong></a>
                <h3><a href="/intro/12636">无仙</a></h3>
                请看：一个小道士的</li>
        </ul>
        <div class="clearfix fontitems">
            <ul>
                <li><a href="/intro/162231">华山三弟子</a>：不学独孤九剑，不练吸星大法。华山武功天下第一。</li>
                <li><a href="/intro/46879">死人经</a>：为不善乎显明之中者，人得而诛之；为不善于幽闭之中者</li>
                <li><a href="/intro/37558">百炼成仙</a>：仙路崎岖，百般磨练终成正果一个没有灵根的少年，一个</li>
                <li><a href="/intro/37639">新格物致道</a>：科学虽揭示外物规律，却无助于性命；天地万物自蕴大道</li>
            </ul>
        </div>
    </div>
    <div class="w246">
        <div class="tittwo">
            <h2>热门排行</h2>
            <ul>
                <li class="">日</li>
                <li>周</li>
                <li class="cur">月</li>
            </ul>
        </div>
        <div class="clearfix olwrap">
            <ol style="display: none;">
                <li><a href="/intro/41222">莽荒纪</a>：在《莽荒纪》这个世界</li>
                <li><a href="/intro/43995">少年医仙</a>：阎王判你三更死，我能</li>
                <li><a href="/intro/35471">我的美女老师</a>：刚毕业的大学生秦朝，</li>
                <li><a href="/intro/37413">遮天</a>：冰冷与黑暗并存的宇宙</li>
                <li><a href="/intro/44731">极品修真邪少</a>：
                    逆天妖孽陈青帝，以
                </li>
                <li><a href="/intro/44901">我的狐仙老婆</a>：普普通通的高中生刘弈</li>
                <li><a href="/intro/37982">星辰变</a>：一名孩童，天生无法修</li>
                <li><a href="/intro/37435">圣堂</a>：一次裸奔捡到半神神格</li>
                <li><a href="/intro/37444">求魔</a>：
                    《求魔》是耳根继《
                </li>
                <li><a href="/intro/37631">仙逆</a>：修道，修仙，修真。神</li>
            </ol>
            <ol style="display: none;" class="hidden">
                <li><a href="/intro/41222">莽荒纪</a>：在《莽荒纪》这个世界</li>
                <li><a href="/intro/35471">我的美女老师</a>：刚毕业的大学生秦朝，</li>
                <li><a href="/intro/43995">少年医仙</a>：阎王判你三更死，我能</li>
                <li><a href="/intro/37413">遮天</a>：冰冷与黑暗并存的宇宙</li>
                <li><a href="/intro/44901">我的狐仙老婆</a>：普普通通的高中生刘弈</li>
                <li><a href="/intro/44731">极品修真邪少</a>：
                    逆天妖孽陈青帝，以
                </li>
                <li><a href="/intro/37435">圣堂</a>：一次裸奔捡到半神神格</li>
                <li><a href="/intro/37444">求魔</a>：
                    《求魔》是耳根继《
                </li>
                <li><a href="/intro/37982">星辰变</a>：一名孩童，天生无法修</li>
                <li><a href="/intro/37631">仙逆</a>：修道，修仙，修真。神</li>
            </ol>
            <ol style="display: block;" class="hidden">
                <li><a href="/intro/41222">莽荒纪</a>：在《莽荒纪》这个世界</li>
                <li><a href="/intro/35471">我的美女老师</a>：刚毕业的大学生秦朝，</li>
                <li><a href="/intro/43995">少年医仙</a>：阎王判你三更死，我能</li>
                <li><a href="/intro/37413">遮天</a>：冰冷与黑暗并存的宇宙</li>
                <li><a href="/intro/44901">我的狐仙老婆</a>：普普通通的高中生刘弈</li>
                <li><a href="/intro/44731">极品修真邪少</a>：
                    逆天妖孽陈青帝，以
                </li>
                <li><a href="/intro/37435">圣堂</a>：一次裸奔捡到半神神格</li>
                <li><a href="/intro/37444">求魔</a>：
                    《求魔》是耳根继《
                </li>
                <li><a href="/intro/37982">星辰变</a>：一名孩童，天生无法修</li>
                <li><a href="/intro/37631">仙逆</a>：修道，修仙，修真。神</li>
            </ol>
        </div>
    </div>
</div>
*}

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
        <ul style="display: block;">
        {novel_book order='lastchaptertime desc' limit=20}
            <li><span class="recnums_r">{$block.iteration}</span><span class="r_spanone"><a href="{novel_category_link id=$item->category->id}">{$item->category->title}</a> | <a href="{novel_book_link id=$item->id}">{$item->title} </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid}">{$item->lastchaptertitle}</a></span><span class="r_spanthree">{$item->lastchaptertime|date_format:"Y-m-d H:i:s"}</span><span class="r_spanfour">{$item->allclicks}</span><span class="r_spanfive"><a href="{novel_book_download_link id=$item->id}">TXT下载&gt;&gt;</a></span></li>
        {/novel_book}
        </ul>
        <ul style="display: none;" class="hidden">
        {novel_book_rank order="all" limit=20}
            <li><span class="recnums_r">{$block.iteration}</span><span class="r_spanone"><a href="{novel_book_link id=$item->id}">{$item->category->title}</a> | <a href="{novel_book_link id=$item->id}">{$item->title} </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="{novel_chapter_link bookid=$item->id id=$item->lastchapterid}">{$item->lastchaptertitle}</a></span><span class="r_spanthree">{$item->lastchaptertime|date_format:"Y-m-d H:i:s"}</span><span class="r_spanfour">{$item->allclicks}</span><span class="r_spanfive"><a href="{novel_book_download_link id=$item->id}">TXT下载&gt;&gt;</a></span></li>
        {/novel_book_rank} 
        </ul>
    </div>
</div>

{* 友情链接 *}
<div class="link">
    <div class="linktop clearfix">
        <h3>精品小说网站</h3>
    </div>
    <div class="linkbody">
    {*
        <a href="http://book.hao123.com" targdt="_blank">小说</a>|<a href="http://book.hao123.com/index/ph" targdt="_blank">小说排行榜</a>|<a href="http://www.kanshu.com" targdt="_blank">看书网</a>|<a href="http://www.zhaoxiaoshuo.com" targdt="_blank">找小说</a>|<a href="http://b.faloo.com" targdt="_blank">飞卢小说</a>|<a href="http://www.bxwx.org" targdt="_blank">笔下文学</a>|<a href="http://read.guanhuaju.com/" targdt="_blank">冠华居小说网 </a>|<a href="http://www.wjsw.com/" targdt="_blank">万卷书屋</a>|<a href="http://www.hongshu.com/" targdt="_blank">红薯小说网</a>|<a href="http://www.fmx.cn" targdt="_blank">凤鸣轩小说网</a>|<a href="http://www.xs8.cn/" targdt="_blank">言情小说吧</a>|<a href="http://www.cc222.com" targdt="_blank">烟雨红尘</a>|<a href="http://www.qwsy.com/" targdt="_blank">蔷薇言情小说</a>|<a href="http://www.feiku.com" targdt="_blank">飞库电子书</a>|<a href="http://www.tusuu.com/" targdt="_blank">txt小说下载</a>|<a href="http://www.yuncheng.com" targdt="_blank">云中书城</a>|<a href="http://www.huanxia.com " targdt="_blank">幻侠小说网</a>|<a href="http://www.motie.com" targdt="_blank">磨铁中文网</a>|<a href="http://www.shuhai.com" targdt="_blank">书海小说网</a>|<a href="http://www.txt8.net" targdt="_blank">txt小说下载吧</a>|<a href="http://www.sxcnw.net " targdt="_blank">书香电子书</a>|<a href="http://www.abada.com" targdt="_blank">小说下载网</a>|<a href="http://www.bookbao.com/" targdt="_blank">书包网</a>|<a href="http://www.cuiweiju.com/" targdt="_blank">翠微居小说</a>|<a href="http://www.duwenzhang.com/" targdt="_blank">文章阅读网</a>|<a href="http://www.3gsc.com.cn/" targdt="_blank">3G小说网</a>|<a href="http://bbs.txtnovel.com/" targdt="_blank">书香门第TXT</a>|<a href="http://www.msxf.net" targdt="_blank">陌上香坊</a>|<a href="http://www.txtbook.com.cn" targdt="_blank">乐读电子书</a>|<a href="http://www.2kxs.com" targdt="_blank">2k小说</a>|<a href="http://www.juyit.com" targdt="_blank">君子聚义</a>|<a href="http://www.ibook8.com/" targdt="_blank">txt电子书下载</a>|<a href="http://www.tadu.com/?cid=1914" targdt="_blank">塔读文学</a>|<a href="http://www.paipaitxt.com" targdt="_blank">派派小说论坛</a>|<a href="http://www.feifantxt.com" targdt="_blank">非凡小说网</a>|<a href="http://www.zongheng.com " targdt="_blank">纵横中文网 </a>|<a href="http://www.rain8.com/ " targdt="_blank">雨枫轩小说</a>|<a href="http://www.bayueju.com" targdt="_blank">八月居小说网</a>|<a href="http://www.17k.com/ " targdt="_blank">17K小说网</a>|
    *}
    </div>
</div>
<div class="blinebgs"></div>

{* 回到顶部*}
<div id="fix-area" class="fix-area">
    <a style="visibility: visible;" class="go-top-btn" href="#" target="_self">返回顶部</a>
    {*
    <a class="feedback-btn boxy" href="#feedback">反馈</a>
    <div id="shortcut-goerwei" class="shortcut-erweiwrap" style="height:120px;">
        <a class="g_icon clz"></a><a class="shortcut-goerwei" href="http://www.hao123.com/shouji"><span class="top">万本小说免费读</span><span class="shortcut-goerwei-pic"><img src="http://imgs.imgshao123.net/images/1233459.png" border="0" height="70px" width="70px"></span><span>点击或扫描下载</span></a>
    </div>
    *}
</div>