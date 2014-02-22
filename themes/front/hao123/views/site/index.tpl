<div class="indexboxone clearfix">
    <div class="indexboxonel">
        <div id="consone">
            {* 分类头条 *}
            <ul style="display: block;" class="">
                <div class="indexonell">
                    {novel_book id=[15]}
                    <a href="{novel_book_link id=$item->id type='info'}"><img src="{$item->coverImageUrl}"></a>
                    <h2><a href="{novel_book_link id=$item->id type='info'}">{$item->title}</a></h2>
					<span>{$item->summary|trim|truncate:50:'...'}
					<a href="{novel_book_link id=$item->id type='info'}" class="green">阅读&gt;&gt;</a>
					</span>
                    {/novel_book}
                </div>
                <div class="indexonelc">
                    {novel_book id=[13]}
                    <h3><a href="{novel_book_link id=$item->id type='info'}">{$item->title}</a></h3>
					<span>{$item->summary|trim|truncate:50:'...'}
					<a href="{novel_book_link id=$item->id type='info'}" class="green">阅读&gt;&gt;</a>
					</span>
                    {/novel_book}
                    <ul class="clearfix">
                        {novel_book cid=[10] order='allclicks desc' limit=8}
                        <li><a href="{novel_category_link id=$item->cid}" class="i1">[{$item->category->title}]</a><a href="{novel_book_link id=$item->id type='info'}" class="i2">{$item->title}</a></li>
                        {/novel_book}
                    </ul>
                    <h3><a href="/intro/37408">《武动乾坤》 天蚕土豆</a></h3>
					<span>修炼一途，乃窃阴阳，夺造化，转涅盘，握生死，掌轮回。武之极，破苍穹，动乾坤！新书求收藏，求推荐，谢大…<a href="/intro/37408" class="green">阅读&gt;&gt;</a>
					</span>
                    <ul class="clearfix">
                        <li><a href="/dushi" class="i1">[都市]</a><a href="/intro/18558" class="i2">官场之风流人生</a></li>
                        <li><a href="/lunli" class="i1">[伦理]</a><a href="/intro/132561" class="i2">官色：攀上女领导</a></li>
                        <li><a href="/wuxia" class="i1">[武侠]</a><a href="/intro/35471" class="i2">我的美女老师</a></li>
                        <li><a href="/xuanhuan" class="i1">[玄幻]</a><a href="/intro/143155" class="i2">异人射仙传</a></li>
                        <li><a href="/xuanhuan" class="i1">[玄幻]</a><a href="/intro/37491" class="i2">剑道独尊</a></li>
                        <li><a href="/xianxia" class="i1">[仙侠]</a><a href="/intro/37413" class="i2">遮天</a></li>
                        <li><a href="/xiuxian" class="i1">[修仙]</a><a href="/intro/37424" class="i2">凡人修仙传</a></li>
                        <li><a href="/xuanhuan" class="i1">[玄幻]</a><a href="/intro/130956" class="i2">大主宰</a></li>
                    </ul>
                </div>
            </ul>

            <ul class="hidden">
                <div class="indexonell">
                    <a href="intro/143968"><img src="http://imgs.imgshao123.net/UploadFile/20131031/20131031102899929992.jpg"></a>
                    <h2><a href="intro/143968">致命天尊1111</a></h2>
					<span>孔雀王朝青年阳天，二十出头，鬼才之名已经名扬天下，然而却因为痴迷练功身体尽废，命不久矣。天尊比武败北…
					<a href="intro/143968" class="green">阅读&gt;&gt;</a>
					</span>
                </div>
                <div class="indexonelc">
                    <h3><a href="/intro/250697">《英雄联盟之谁与争锋》 乱</a></h3>
					<span>
	当中国运动员嘲笑玩玩电子游戏也能拿冠军的时候，以电子竞技为生的你要做的是用自己42码的鞋子去量一量他…
					<a href="/intro/250697" class="green">阅读&gt;&gt;</a>
					</span>
                    <ul class="clearfix">
                        <li><a href="/xianxia" class="i1">[仙侠]</a><a href="/intro/41222" class="i2">莽荒纪</a></li>
                        <li><a href="/dushi" class="i1">[都市]</a><a href="/intro/37453" class="i2">校花的贴身高手</a></li>
                        <li><a href="/dushi" class="i1">[都市]</a><a href="/intro/143122" class="i2">在日本开澡堂的日子</a></li>
                        <li><a href="/dushi" class="i1">[都市]</a><a href="/intro/143138" class="i2">乡村禁爱</a></li>
                        <li><a href="/xuanhuan" class="i1">[玄幻]</a><a href="/intro/37407" class="i2">绝世唐门</a></li>
                        <li><a href="/zongcai" class="i1">[总裁]</a><a href="/intro/45397" class="i2">我的美女总裁老婆</a></li>
                        <li><a href="/yanqing" class="i1">[言情]</a><a href="/intro/45098" class="i2">豪门童养媳</a></li>
                        <li><a href="/dushi" class="i1">[都市]</a><a href="/intro/37604" class="i2">最强弃少</a></li>
                    </ul>
                    <h3><a href="/intro/37408">《武动乾坤》 天蚕土豆</a></h3>
					<span>修炼一途，乃窃阴阳，夺造化，转涅盘，握生死，掌轮回。武之极，破苍穹，动乾坤！新书求收藏，求推荐，谢大…<a href="/intro/37408" class="green">阅读&gt;&gt;</a>
					</span>
                    <ul class="clearfix">
                        <li><a href="/dushi" class="i1">[都市]</a><a href="/intro/18558" class="i2">官场之风流人生</a></li>
                        <li><a href="/lunli" class="i1">[伦理]</a><a href="/intro/132561" class="i2">官色：攀上女领导</a></li>
                        <li><a href="/wuxia" class="i1">[武侠]</a><a href="/intro/35471" class="i2">我的美女老师</a></li>
                        <li><a href="/xuanhuan" class="i1">[玄幻]</a><a href="/intro/143155" class="i2">异人射仙传</a></li>
                        <li><a href="/xuanhuan" class="i1">[玄幻]</a><a href="/intro/37491" class="i2">剑道独尊</a></li>
                        <li><a href="/xianxia" class="i1">[仙侠]</a><a href="/intro/37413" class="i2">遮天</a></li>
                        <li><a href="/xiuxian" class="i1">[修仙]</a><a href="/intro/37424" class="i2">凡人修仙传</a></li>
                        <li><a href="/xuanhuan" class="i1">[玄幻]</a><a href="/intro/130956" class="i2">大主宰</a></li>
                    </ul>
                </div>
            </ul>

        </div>
        <div class="indexonelr" id="tabsone">
            <ul>
                <li class="cur">热书</li>
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
            <div style="display: none;" class="rcenter">
                <div class="figure clearfix">
                    <a href="/intro/37453"><img src="http://imgs.imgshao123.net/UploadFile/2013422/20130422180035213521.jpg"></a>
                    <div class="figurer">
                        <h4><a href="/intro/37453">校花的贴身高手</a></h4>
                        <span>一个大山里走出来的绝世高手，一块能预知未来的神秘玉…</span><a href="/intro/37453" class="green">阅读&gt;&gt;</a>
                    </div>
                </div>
                <ul class="clearfix">
                    <li><a href="xianxia" class="i1">[仙侠]</a><a href="/intro/41222" class="i2">莽荒纪</a></li>
                    <li><a href="lunli" class="i1">[伦理]</a><a href="/intro/132561" class="i2">官色：攀上女领导</a></li>
                    <li><a href="zongcai" class="i1">[总裁]</a><a href="/intro/45397" class="i2">我的美女总裁老婆</a></li>
                    <li><a href="dushi" class="i1">[都市]</a><a href="/intro/142978" class="i2">尼姑庵的和尚</a></li>
                    <li><a href="dushi" class="i1">[都市]</a><a href="/intro/132120" class="i2">风流小农民</a></li>
                    <li><a href="yanqing" class="i1">[言情]</a><a href="/intro/10518" class="i2">豪门盛宠：冷情总裁的出逃妻</a></li>
                    <li><a href="dushi" class="i1">[都市]</a><a href="/intro/132154" class="i2">女公务员的日记</a></li>
                    <li><a href="dushi" class="i1">[都市]</a><a href="/intro/37604" class="i2">最强弃少</a></li>
                    <li><a href="xuanhuan" class="i1">[玄幻]</a><a href="/intro/130956" class="i2">大主宰</a></li>
                    <li><a href="yanqing" class="i1">[言情]</a><a href="/intro/45382" class="i2">夜夜强宠：恶魔，轻点爱</a></li>
                </ul>
            </div>
            <div style="display: block;" class="rcenter hidden">
                <div class="figure clearfix">
                    <a href="/intro/37453"><img src="http://imgs.imgshao123.net/UploadFile/2013422/20130422180035213521.jpg"></a>
                    <div class="figurer">
                        <h4><a href="/intro/37453">校花的贴身高手</a></h4>
                        <span>一个大山里走出来的绝世高手，一块能预知未来的神秘玉…</span>
                        <a href="/intro/37453" class="green">阅读&gt;&gt;</a>
                    </div>
                </div>
                <ul class="clearfix">
                    <li><a href="xianxia" class="i1">[仙侠]</a><a href="/intro/41222" class="i2">莽荒纪</a></li>
                    <li><a href="lunli" class="i1">[伦理]</a><a href="/intro/132561" class="i2">官色：攀上女领导</a></li>
                    <li><a href="zongcai" class="i1">[总裁]</a><a href="/intro/45397" class="i2">我的美女总裁老婆</a></li>
                    <li><a href="dushi" class="i1">[都市]</a><a href="/intro/142978" class="i2">尼姑庵的和尚</a></li>
                    <li><a href="dushi" class="i1">[都市]</a><a href="/intro/132154" class="i2">女公务员的日记</a></li>
                    <li><a href="dushi" class="i1">[都市]</a><a href="/intro/143138" class="i2">乡村禁爱</a></li>
                    <li><a href="dushi" class="i1">[都市]</a><a href="/intro/132120" class="i2">风流小农民</a></li>
                    <li><a href="yanqing" class="i1">[言情]</a><a href="/intro/10518" class="i2">豪门盛宠：冷情总裁的出逃妻</a></li>
                    <li><a href="dushi" class="i1">[都市]</a><a href="/intro/37604" class="i2">最强弃少</a></li>
                    <li><a href="yanqing" class="i1">[言情]</a><a href="/intro/45098" class="i2">豪门童养媳</a></li>
                </ul>
            </div>
            <div style="display: none;" class="rcenter hidden">
                <div class="figure clearfix">
                    <a href="/intro/37453"><img src="http://imgs.imgshao123.net/UploadFile/2013422/20130422180035213521.jpg"></a>
                    <div class="figurer">
                        <h4><a href="/intro/37453">校花的贴身高手</a></h4>
                        <span>一个大山里走出来的绝世高手，一块能预知未来的神秘玉…</span>
                        <a href="/intro/37453" class="green">阅读&gt;&gt;</a>
                    </div>
                </div>
                <ul class="clearfix">
                    <li><a href="lunli" class="i1">[伦理]</a><a href="/intro/132561" class="i2">官色：攀上女领导</a></li>
                    <li><a href="xianxia" class="i1">[仙侠]</a><a href="/intro/41222" class="i2">莽荒纪</a></li>
                    <li><a href="zongcai" class="i1">[总裁]</a><a href="/intro/45397" class="i2">我的美女总裁老婆</a></li>
                    <li><a href="dushi" class="i1">[都市]</a><a href="/intro/142978" class="i2">尼姑庵的和尚</a></li>
                    <li><a href="dushi" class="i1">[都市]</a><a href="/intro/132154" class="i2">女公务员的日记</a></li>
                    <li><a href="dushi" class="i1">[都市]</a><a href="/intro/132120" class="i2">风流小农民</a></li>
                    <li><a href="dushi" class="i1">[都市]</a><a href="/intro/143138" class="i2">乡村禁爱</a></li>
                    <li><a href="yanqing" class="i1">[言情]</a><a href="/intro/10518" class="i2">豪门盛宠：冷情总裁的出逃妻</a></li>
                    <li><a href="yanqing" class="i1">[言情]</a><a href="/intro/45098" class="i2">豪门童养媳</a></li>
                    <li><a href="dushi" class="i1">[都市]</a><a href="/intro/37604" class="i2">最强弃少</a></li>
                </ul>
            </div>
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
            <li><a href="intro/250023" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131230/20131230101814921492.jpg" alt="食色天下"></a>
                <h3><a href="intro/250023" target="_blank">食色天下</a></h3>
                左手菜刀，右手离骚<span class="lzzico"></span></li>
            <li><a href="intro/250514" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131230/20131230102412481248.jpg" alt="回到过去变成猫"></a>
                <h3><a href="intro/250514" target="_blank">回到过去变成猫</a></h3>
                灰常神奇的变成猫<span class="lzzico"></span></li>
            <li><a href="intro/149625" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131230/2013123010260416416.jpg" alt="完美世界"></a>
                <h3><a href="intro/149625" target="_blank">完美世界</a></h3>
                辰东出品，必属不凡。<span class="lzzico"></span></li>
            <li><a href="intro/131230" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131230/20131230102872807280.jpg" alt="星河大帝"></a>
                <h3><a href="intro/131230" target="_blank">星河大帝</a></h3>
                修行的真谛是什么？<span class="lzzico"></span></li>
            <li><a href="intro/247024" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131230/20131230102959555955.jpg" alt="天择"></a>
                <h3><a href="intro/247024" target="_blank">天择</a></h3>
                凡人一世，只争朝夕<span class="lzzico"></span></li>
            <li><a href="intro/45684" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131230/20131230103289298929.jpg" alt="奥术神座"></a>
                <h3><a href="intro/45684" target="_blank">奥术神座</a></h3>
                知识征服一切<span class="lzzico"></span></li>
            <li><a href="intro/45639" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131230/20131230103474127412.jpg" alt="天骄无双"></a>
                <h3><a href="intro/45639" target="_blank">天骄无双</a></h3>
                恶魔法则后传<span class="lzzico"></span></li>
            <li><a href="intro/130956" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131230/20131230103725962596.jpg" alt="大主宰"></a>
                <h3><a href="intro/130956" target="_blank">大主宰</a></h3>
                谁人终成大主宰<span class="lzzico"></span></li>
            <li><a href="intro/135103" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131230/20131230105215281528.jpg" alt="宝鉴"></a>
                <h3><a href="intro/135103" target="_blank">宝鉴</a></h3>
                一局百变，叵测人心<span class="lzzico"></span></li>
            <li><a href="intro/160787" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131230/20131230104080718071.jpg" alt="末法王座"></a>
                <h3><a href="intro/160787" target="_blank">末法王座</a></h3>
                穿越而来，问鼎王座<span class="lzzico"></span></li>
            <li><a href="intro/210882" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131230/20131230104357075707.jpg" alt="魔天记"></a>
                <h3><a href="intro/210882" target="_blank">魔天记</a></h3>
                忘语新作，值得一观。<span class="lzzico"></span></li>
            <li><a href="intro/46457" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131230/20131230104554445444.jpg" alt="花都十二衩"></a>
                <h3><a href="intro/46457" target="_blank">花都十二衩</a></h3>
                雇佣兵隐居都市<span class="lzzico"></span></li>
        </ul>
        <ul style="display: none;" class="clearfix imgitems hidden">
            <li><a href="intro/41222" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131120/20131120161840934093.jpg" alt="莽荒纪"></a>
                <h3><a href="intro/41222" target="_blank">莽荒纪</a></h3>
                为生存跟天地斗<span class="lzzico"></span></li>
            <li><a href="intro/37435" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131120/20131120164979217921.jpg" alt="圣堂"></a>
                <h3><a href="intro/37435" target="_blank">圣堂</a></h3>
                有装逼，有热血，有妹纸。<span class="lzzico"></span></li>
            <li><a href="intro/37413" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131120/20131120170184878487.jpg" alt="遮天"></a>
                <h3><a href="intro/37413" target="_blank">遮天</a></h3>
                登天路，踏歌行，弹指遮天<span class="lzzico"></span></li>
            <li><a href="intro/37479" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131120/20131120170233173317.jpg" alt="斗破苍穹"></a>
                <h3><a href="intro/37479" target="_blank">斗破苍穹</a></h3>
                关于斗气的世界<span class="lzzico"></span></li>
            <li><a href="intro/37411" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131122/20131122152929602960.jpg" alt="天才相师"></a>
                <h3><a href="intro/37411" target="_blank">天才相师</a></h3>
                通古今之变，为往圣继绝学<span class="lzzico"></span></li>
            <li><a href="intro/38003" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131120/2013112017110649649.jpg" alt="魔兽剑圣异界纵横"></a>
                <h3><a href="intro/38003" target="_blank">魔兽剑圣异界纵横</a></h3>
                刘枫的剑圣之旅<span class="lzzico"></span></li>
            <li><a href="intro/37444" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/2013618/20130618152829962996.jpg" alt="求魔"></a>
                <h3><a href="intro/37444" target="_blank">求魔</a></h3>
                全新的修真求魔之门<span class="lzzico"></span></li>
            <li><a href="intro/37407" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131120/201311201716009898.jpg" alt="绝世唐门"></a>
                <h3><a href="intro/37407" target="_blank">绝世唐门</a></h3>
                复兴唐门，能否实现？<span class="lzzico"></span></li>
            <li><a href="intro/37420" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131120/20131120171979797979.jpg" alt="光明纪元"></a>
                <h3><a href="intro/37420" target="_blank">光明纪元</a></h3>
                撕破黑幕，光笼大地
                <span class="lzzico"></span></li>
            <li><a href="intro/38260" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131120/20131120172265566556.jpg" alt="神游"></a>
                <h3><a href="intro/38260" target="_blank">神游</a></h3>
                集修真理论大成之作<span class="lzzico"></span></li>
            <li><a href="intro/37571" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131120/20131120172492239223.jpg" alt="官术"></a>
                <h3><a href="intro/37571" target="_blank">官术</a></h3>
                为官之道，玩尽权术。<span class="lzzico"></span></li>
            <li><a href="intro/24709" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131120/20131120172617331733.jpg" alt="火爆天王"></a>
                <h3><a href="intro/24709" target="_blank">火爆天王</a></h3>
                妖孽少年征服娱乐圈
                <span class="lzzico"></span></li>
        </ul>
        <ul style="display: none;" class="clearfix imgitems hidden">
            <li><a href="intro/149770" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131231/20131231161818421842.jpg" alt="凤倾天阑"></a>
                <h3><a href="intro/149770" target="_blank">凤倾天阑</a></h3>
                四面楚歌我高歌<span class="lzzico"></span></li>
            <li><a href="intro/41540" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131231/2013123116290188188.jpg" alt="纨绔世子妃"></a>
                <h3><a href="intro/41540" target="_blank">纨绔世子妃</a></h3>
                纨绔少女pk少年将军<span class="lzzico"></span></li>
            <li><a href="intro/42387" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131231/20131231162119601960.jpg" alt="九重紫"></a>
                <h3><a href="intro/42387" target="_blank">九重紫</a></h3>
                一个重生的故事<span class="lzzico"></span></li>
            <li><a href="intro/142211" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131231/20131231162443054305.jpg" alt="春闺记事"></a>
                <h3><a href="intro/142211" target="_blank">春闺记事</a></h3>
                家宅情仇，重生纠葛<span class="lzzico"></span></li>
            <li><a href="intro/45311" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131231/2013123116270662662.jpg" alt="嫡媒"></a>
                <h3><a href="intro/45311" target="_blank">嫡媒</a></h3>
                得一心人，白首不离<span class="lzzico"></span></li>
            <li><a href="intro/30161" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131231/20131231163111161116.jpg" alt="重生小地主"></a>
                <h3><a href="intro/30161" target="_blank">重生小地主</a></h3>
                勤劳致富奔小康<span class="lzzico"></span></li>
            <li><a href="intro/146730" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131231/20131231163469116911.jpg" alt="旧爱新欢，总统请离婚"></a>
                <h3><a href="intro/146730" target="_blank">旧爱新欢，总统请离婚</a></h3>
                总统大战总统夫人<span class="lzzico"></span></li>
            <li><a href="intro/133863" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131231/2013123116380182182.jpg" alt="小娇妻，大叔先婚后爱"></a>
                <h3><a href="intro/133863" target="_blank">小娇妻，大叔先婚后爱</a></h3>
                你合我的眼缘<span class="lzzico"></span></li>
            <li><a href="intro/398077" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131231/20131231163984778477.jpg" alt="最美的时候"></a>
                <h3><a href="intro/398077" target="_blank">最美的时候</a></h3>
                那段被尘封的往事<span class="lzzico"></span></li>
            <li><a href="intro/1483938" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131231/20131231164188608860.jpg" alt="早安，检察官娇妻"></a>
                <h3><a href="intro/1483938" target="_blank">早安，检察官娇妻</a></h3>
                谁是你命中的注定？<span class="lzzico"></span></li>
            <li><a href="intro/148858" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131231/20131231164795789578.jpg" alt="腹黑狂女-倾城召唤师"></a>
                <h3><a href="intro/148858" target="_blank">腹黑狂女-倾城召唤师</a></h3>
                名家玄幻，完结火文<span class="lzzico"></span></li>
            <li><a href="intro/142429" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131231/20131231165198719871.jpg" alt="豪门惊梦3 醉卧总裁怀"></a>
                <h3><a href="intro/142429" target="_blank">豪门惊梦3 醉卧总裁怀</a></h3>
                心理悬疑爱情小说<span class="lzzico"></span></li>
        </ul>
        <ul style="display: none;" class="clearfix imgitems hidden">
            <li><a href="intro/37604" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131121/20131121104845824582.jpg" alt="最强弃少"></a>
                <h3><a href="intro/37604" target="_blank">最强弃少</a></h3>
                意外重生，最强弃少<span class="lzzico"></span></li>
            <li><a href="intro/18596" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131121/20131121105112571257.jpg" alt="雪中悍刀行"></a>
                <h3><a href="intro/18596" target="_blank">雪中悍刀行</a></h3>
                刀剑交错，暗潮涌动<span class="lzzico"></span></li>
            <li><a href="intro/41779" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131121/20131121105992089208.jpg" alt="九星天辰诀"></a>
                <h3><a href="intro/41779" target="_blank">九星天辰诀</a></h3>
                蜗牛心中的玄幻传奇<span class="lzzico"></span></li>
            <li><a href="intro/38442" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131119/20131119153291109110.jpg" alt="阳神"></a>
                <h3><a href="intro/38442" target="_blank">阳神</a></h3>
                逆天神器改写命运<span class="lzzico"></span></li>
            <li><a href="intro/45397" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131121/20131121104677257725.jpg" alt="我的美女总裁老婆"></a>
                <h3><a href="intro/45397" target="_blank">我的美女总裁老婆</a></h3>
                一男N女，卫道士慎入<span class="lzzico"></span></li>
            <li><a href="intro/37558" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/2013115/20131105161115751575.jpg" alt="百炼成仙"></a>
                <h3><a href="intro/37558" target="_blank">百炼成仙</a></h3>
                仙路崎岖，百般磨练终成正<span class="lzzico"></span></li>
            <li><a href="intro/35494" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131121/20131121110376677667.jpg" alt="龙血战神"></a>
                <h3><a href="intro/35494" target="_blank">龙血战神</a></h3>
                掌无尽生灵，龙之传人<span class="lzzico"></span></li>
            <li><a href="intro/18558" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/2013422/20130422120040394039.jpg" alt="官场之风流人生"></a>
                <h3><a href="intro/18558" target="_blank">官场之风流人生</a></h3>
                平民附身官场豪门子弟<span class="lzzico"></span></li>
            <li><a href="intro/37457" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131120/20131120174082818281.jpg" alt="武炼巅峰"></a>
                <h3><a href="intro/37457" target="_blank">武炼巅峰</a></h3>
                一将功成万骨枯<span class="lzzico"></span></li>
            <li><a href="intro/37548" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131121/20131121101756385638.jpg" alt="首席御医"></a>
                <h3><a href="intro/37548" target="_blank">首席御医</a></h3>
                御医的仕途之路<span class="lzzico"></span></li>
            <li><a href="intro/37453" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131121/20131121102794969496.jpg" alt="校花的贴身高手"></a>
                <h3><a href="intro/37453" target="_blank">校花的贴身高手</a></h3>
                奉旨泡妞<span class="lzzico"></span></li>
            <li><a href="intro/37491" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131121/20131121101012421242.jpg" alt="剑道独尊"></a>
                <h3><a href="intro/37491" target="_blank">剑道独尊</a></h3>
                意外变成天才<span class="lzzico"></span></li>
        </ul>
        <ul style="display: none;" class="clearfix imgitems hidden">
            <li><a href="intro/37867" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131121/20131121100376867686.jpg" alt="江山美人志"></a>
                <h3><a href="intro/37867" target="_blank">江山美人志</a></h3>
                数风流人物，还看今朝。<span class="ywjico"></span></li>
            <li><a href="intro/37424" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/2013115/20131105152830413041.jpg" alt="凡人修仙传"></a>
                <h3><a href="intro/37424" target="_blank">凡人修仙传</a></h3>
                开创凡人流的先河<span class="ywjico"></span></li>
            <li><a href="intro/37481" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/2013715/20130715114780618061.jpg" alt="杀神"></a>
                <h3><a href="intro/37481" target="_blank">杀神</a></h3>
                在这人吃人的疯狂世界，神<span class="ywjico"></span></li>
            <li><a href="intro/37408" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/2013627/20130627150310171017.jpg" alt="武动乾坤"></a>
                <h3><a href="intro/37408" target="_blank">武动乾坤</a></h3>
                大炎皇朝天都郡炎城青阳镇<span class="ywjico"></span></li>
            <li><a href="intro/38215" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/2013115/20131105151614991499.jpg" alt="恶魔法则"></a>
                <h3><a href="intro/38215" target="_blank">恶魔法则</a></h3>
                用灵魂交换所有
                <span class="ywjico"></span></li>
            <li><a href="intro/37455" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/201372/20130702205123742374.jpg" alt="盘龙"></a>
                <h3><a href="intro/37455" target="_blank">盘龙</a></h3>
                少年的梦幻旅程。<span class="ywjico"></span></li>
            <li><a href="intro/44784" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/2013722/20130722165356385638.jpg" alt="斗罗大陆"></a>
                <h3><a href="intro/44784" target="_blank">斗罗大陆</a></h3>
                唐家三少所著经典长篇小说<span class="ywjico"></span></li>
            <li><a href="intro/37997" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/201372/20130702201369166916.jpg" alt="极品家丁"></a>
                <h3><a href="intro/37997" target="_blank">极品家丁</a></h3>
                萧家大宅光荣小家丁<span class="ywjico"></span></li>
            <li><a href="intro/37631" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/201372/20130702172862626262.jpg" alt="仙逆"></a>
                <h3><a href="intro/37631" target="_blank">仙逆</a></h3>
                顺为凡，逆则仙<span class="ywjico"></span></li>
            <li><a href="intro/37425" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/2013730/20130730143262836283.jpg" alt="吞噬星空"></a>
                <h3><a href="intro/37425" target="_blank">吞噬星空</a></h3>
                能吞噬星球的传奇<span class="ywjico"></span></li>
            <li><a href="intro/37497" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/20131121/20131121100782448244.jpg" alt="医道官途"></a>
                <h3><a href="intro/37497" target="_blank">医道官途</a></h3>
                怨气也能穿越<span class="ywjico"></span></li>
            <li><a href="intro/37659" class="imgcss"><img src="http://imgs.imgshao123.net/UploadFile/2013115/20131105162436443644.jpg" alt="神墓"></a>
                <h3><a href="intro/37659" target="_blank">神墓</a></h3>
                万年前的人从神墓复活<span class="ywjico"></span></li>
        </ul>
    </div>
</div>

{*分类推荐*}
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
            <li><span class="recnums_r">01</span><span class="r_spanone"><a href="/intro/37454">历史 | 明朝伪君子 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37454/chapter-666.html">推荐一本极好的书</a></span><span class="r_spanthree">2014/2/22 17:26:28</span><span class="r_spanfour">55745</span><span class="r_spanfive"><a href="/intro/37454/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">02</span><span class="r_spanone"><a href="/intro/37457">玄幻 | 武炼巅峰 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37457/chapter-1385.html">第一千三百五十三章 鏖战</a></span><span class="r_spanthree">2014/2/22 17:26:07</span><span class="r_spanfour">86488</span><span class="r_spanfive"><a href="/intro/37457/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">03</span><span class="r_spanone"><a href="/intro/37495">都市 | 超神系统 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37495/chapter-713.html">第691章 大肆破坏</a></span><span class="r_spanthree">2014/2/22 17:25:04</span><span class="r_spanfour">52393</span><span class="r_spanfive"><a href="/intro/37495/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">04</span><span class="r_spanone"><a href="/intro/37509">科幻 | 末世之黑暗召唤师 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37509/chapter-1373.html">第一千三百二十九章 染红霞的绿帽刀</a></span><span class="r_spanthree">2014/2/22 17:21:52</span><span class="r_spanfour">115204</span><span class="r_spanfive"><a href="/intro/37509/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">05</span><span class="r_spanone"><a href="/intro/37518">历史 | 晚明 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37518/chapter-569.html">第五十四章 动摇</a></span><span class="r_spanthree">2014/2/22 17:21:17</span><span class="r_spanfour">22617</span><span class="r_spanfive"><a href="/intro/37518/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">06</span><span class="r_spanone"><a href="/intro/37543">历史 | 北宋小厨师 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37543/chapter-884.html">第八百七十八章 富可敌国（求月票！）</a></span><span class="r_spanthree">2014/2/22 17:18:41</span><span class="r_spanfour">6763</span><span class="r_spanfive"><a href="/intro/37543/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">07</span><span class="r_spanone"><a href="/intro/37579">玄幻 | 雄霸蛮荒 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37579/chapter-925.html">第九百一十章 战斗傀儡</a></span><span class="r_spanthree">2014/2/22 17:17:59</span><span class="r_spanfour">88945</span><span class="r_spanfive"><a href="/intro/37579/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">08</span><span class="r_spanone"><a href="/intro/37614">仙侠 | 斩仙 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37614/chapter-1652.html">第八百二十章 玄仙高手吃暗亏（上）</a></span><span class="r_spanthree">2014/2/22 17:12:22</span><span class="r_spanfour">67551</span><span class="r_spanfive"><a href="/intro/37614/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">09</span><span class="r_spanone"><a href="/intro/37643">玄幻 | 剑道独神 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37643/chapter-1089.html">22 扬我手中剑</a></span><span class="r_spanthree">2014/2/22 17:10:15</span><span class="r_spanfour">25596</span><span class="r_spanfive"><a href="/intro/37643/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">10</span><span class="r_spanone"><a href="/intro/37748">历史 | 远东之虎 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37748/chapter-1221.html">第一千一百七十四章  没价值</a></span><span class="r_spanthree">2014/2/22 17:06:45</span><span class="r_spanfour">39521</span><span class="r_spanfive"><a href="/intro/37748/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">11</span><span class="r_spanone"><a href="/intro/37844">都市 | 误入官场 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37844/chapter-2025.html">第一千九百四十一章  参与</a></span><span class="r_spanthree">2014/2/22 17:04:00</span><span class="r_spanfour">44950</span><span class="r_spanfive"><a href="/intro/37844/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">12</span><span class="r_spanone"><a href="/intro/37866">历史 | 辛亥大英雄 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37866/chapter-1051.html">第1021章 大战役（五）</a></span><span class="r_spanthree">2014/2/22 17:01:57</span><span class="r_spanfour">29252</span><span class="r_spanfive"><a href="/intro/37866/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">13</span><span class="r_spanone"><a href="/intro/37920">都市 | 绝世高手在都市 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37920/chapter-1597.html">第一千五百九十三章  你也中了毒</a></span><span class="r_spanthree">2014/2/22 17:00:31</span><span class="r_spanfour">46294</span><span class="r_spanfive"><a href="/intro/37920/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">14</span><span class="r_spanone"><a href="/intro/37929">玄幻 | 官路弯弯 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37929/chapter-2108.html">第八卷 第五百四十九章 亿万富翁的生产摇篮</a></span><span class="r_spanthree">2014/2/22 16:59:01</span><span class="r_spanfour">35219</span><span class="r_spanfive"><a href="/intro/37929/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">15</span><span class="r_spanone"><a href="/intro/37988">科幻 | 希灵帝国 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37988/chapter-1506.html">第一千四百八十四章 一切顺利？</a></span><span class="r_spanthree">2014/2/22 16:56:01</span><span class="r_spanfour">44751</span><span class="r_spanfive"><a href="/intro/37988/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">16</span><span class="r_spanone"><a href="/intro/38015">玄幻 | 魔界的女婿 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/38015/chapter-1158.html">第一千一百一十六章  吞噬（第一更）</a></span><span class="r_spanthree">2014/2/22 16:55:37</span><span class="r_spanfour">47707</span><span class="r_spanfive"><a href="/intro/38015/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">17</span><span class="r_spanone"><a href="/intro/21531">玄幻 | 全能修炼系统 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/21531/chapter-915.html">
                        第八百九十六章 俘虏
                    </a></span><span class="r_spanthree">2014/2/22 16:51:15</span><span class="r_spanfour">25120</span><span class="r_spanfive"><a href="/intro/21531/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">18</span><span class="r_spanone"><a href="/intro/38076">科幻 | 生化末世的幸福生活 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/38076/chapter-924.html">第九百十六章　平衡之道</a></span><span class="r_spanthree">2014/2/22 16:50:00</span><span class="r_spanfour">81606</span><span class="r_spanfive"><a href="/intro/38076/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">19</span><span class="r_spanone"><a href="/intro/38159">玄幻 | 最后人类 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/38159/chapter-1079.html">第一千零三十一章 玉刀的真面目(今天第二章，求月票和赞)</a></span><span class="r_spanthree">2014/2/22 16:48:13</span><span class="r_spanfour">3779</span><span class="r_spanfive"><a href="/intro/38159/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">20</span><span class="r_spanone"><a href="/intro/38174">科幻 | 殖装 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/38174/chapter-948.html">第九二六节 特里乌斯的副本首刷</a></span><span class="r_spanthree">2014/2/22 16:47:23</span><span class="r_spanfour">64100</span><span class="r_spanfive"><a href="/intro/38174/chapterlist.html">了解本书&gt;&gt;</a></span></li>
        </ul>
        <ul style="display: none;" class="hidden">
            <li><span class="recnums_r">01</span><span class="r_spanone"><a href="/intro/250697">游戏 | 英雄联盟之谁与争锋 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/250697/chapter-416.html">第241章 土豪之战</a></span><span class="r_spanthree">2014/2/22 14:18:54</span><span class="r_spanfour">8253383</span><span class="r_spanfive"><a href="/intro/250697/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">02</span><span class="r_spanone"><a href="/intro/41222">仙侠 | 莽荒纪 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/41222/chapter-822.html">第二十五卷 九源神雷 第一章 天一道君</a></span><span class="r_spanthree">2014/2/22 16:02:26</span><span class="r_spanfour">2150699</span><span class="r_spanfive"><a href="/intro/41222/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">03</span><span class="r_spanone"><a href="/intro/37453">都市 | 校花的贴身高手 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37453/chapter-3412.html">第3337章 又是能量石</a></span><span class="r_spanthree">2014/2/17 8:38:16</span><span class="r_spanfour">1787516</span><span class="r_spanfive"><a href="/intro/37453/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">04</span><span class="r_spanone"><a href="/intro/143122">都市 | 在日本开澡堂的日子 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/143122/chapter-603.html">第六百零三章 玩火的木叶西</a></span><span class="r_spanthree">2014/2/22 14:04:50</span><span class="r_spanfour">1323117</span><span class="r_spanfive"><a href="/intro/143122/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">05</span><span class="r_spanone"><a href="/intro/143138">都市 | 乡村禁爱 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/143138/chapter-136.html">第一百三十三章 调皮…</a></span><span class="r_spanthree">2013/12/12 16:53:46</span><span class="r_spanfour">1292830</span><span class="r_spanfive"><a href="/intro/143138/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">06</span><span class="r_spanone"><a href="/intro/37407">玄幻 | 绝世唐门 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37407/chapter-1191.html">第三百七十五章 日升城（上）</a></span><span class="r_spanthree">2014/2/22 16:19:08</span><span class="r_spanfour">1152478</span><span class="r_spanfive"><a href="/intro/37407/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">07</span><span class="r_spanone"><a href="/intro/45397">总裁 | 我的美女总裁老婆 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/45397/chapter-1652.html">第1618章 【封神】</a></span><span class="r_spanthree">2014/2/21 9:11:46</span><span class="r_spanfour">1069131</span><span class="r_spanfive"><a href="/intro/45397/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">08</span><span class="r_spanone"><a href="/intro/45098">言情 | 豪门童养媳 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/45098/chapter-667.html">错位的时光之恋——用男人的安慰方式，去看内衣秀</a></span><span class="r_spanthree">2014/2/15 15:50:11</span><span class="r_spanfour">1064523</span><span class="r_spanfive"><a href="/intro/45098/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">09</span><span class="r_spanone"><a href="/intro/37604">都市 | 最强弃少 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37604/chapter-2193.html">第二零二三章 诡异的阶梯</a></span><span class="r_spanthree">2014/2/17 16:47:11</span><span class="r_spanfour">1009777</span><span class="r_spanfive"><a href="/intro/37604/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">10</span><span class="r_spanone"><a href="/intro/37408">玄幻 | 武动乾坤 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37408/chapter-1341.html">大结局活动、1744、欢迎大家。【土59</a></span><span class="r_spanthree">2014/1/8 18:53:06</span><span class="r_spanfour">980686</span><span class="r_spanfive"><a href="/intro/37408/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">11</span><span class="r_spanone"><a href="/intro/18558">都市 | 官场之风流人生 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/18558/chapter-974.html">
                        第九百五十五章 你行你上
                    </a></span><span class="r_spanthree">2014/2/22 15:59:24</span><span class="r_spanfour">953374</span><span class="r_spanfive"><a href="/intro/18558/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">12</span><span class="r_spanone"><a href="/intro/132561">伦理 | 官色：攀上女领导 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/132561/chapter-2101.html">又渴又饿</a></span><span class="r_spanthree">2014/2/22 13:57:27</span><span class="r_spanfour">798020</span><span class="r_spanfive"><a href="/intro/132561/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">13</span><span class="r_spanone"><a href="/intro/35471">武侠 | 我的美女老师 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/35471/chapter-2033.html">3月1日新书预告，凌晨12点准时开书！</a></span><span class="r_spanthree">2013/11/13 9:54:01</span><span class="r_spanfour">776467</span><span class="r_spanfive"><a href="/intro/35471/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">14</span><span class="r_spanone"><a href="/intro/143155">玄幻 | 异人射仙传 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/143155/chapter-778.html">七百九十八章    阴阳双流</a></span><span class="r_spanthree">2014/1/22 21:01:34</span><span class="r_spanfour">772016</span><span class="r_spanfive"><a href="/intro/143155/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">15</span><span class="r_spanone"><a href="/intro/37491">玄幻 | 剑道独尊 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37491/chapter-1325.html">第一千二百五十八章 半神</a></span><span class="r_spanthree">2014/2/15 2:06:17</span><span class="r_spanfour">725791</span><span class="r_spanfive"><a href="/intro/37491/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">16</span><span class="r_spanone"><a href="/intro/37413">仙侠 | 遮天 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37413/chapter-1865.html">我的新书《完美世界》已上传，请兄弟姐妹来观看</a></span><span class="r_spanthree">2013/8/20 23:01:18</span><span class="r_spanfour">707573</span><span class="r_spanfive"><a href="/intro/37413/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">17</span><span class="r_spanone"><a href="/intro/37424">修仙 | 凡人修仙传 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37424/chapter-2596.html">《凡人》还有不到一万票，就可在推荐总榜上登顶第一了哦！</a></span><span class="r_spanthree">2014/1/19 14:34:58</span><span class="r_spanfour">673922</span><span class="r_spanfive"><a href="/intro/37424/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">18</span><span class="r_spanone"><a href="/intro/130956">玄幻 | 大主宰 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/130956/chapter-661.html">第四百九十一章 战利品</a></span><span class="r_spanthree">2014/2/17 9:08:02</span><span class="r_spanfour">617924</span><span class="r_spanfive"><a href="/intro/130956/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">19</span><span class="r_spanone"><a href="/intro/37479">玄幻 | 斗破苍穹 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37479/chapter-1680.html">新书大主宰已发。</a></span><span class="r_spanthree">2013/7/7 18:13:44</span><span class="r_spanfour">616371</span><span class="r_spanfive"><a href="/intro/37479/chapterlist.html">了解本书&gt;&gt;</a></span></li>
            <li><span class="recnums_r">20</span><span class="r_spanone"><a href="/intro/37867">玄幻 | 江山美人志 </a></span><span class="r_spantwo"><i>更新至</i>&nbsp;&nbsp;<a href="/intro/37867/chapter-1601.html">第三篇 横扫六合 第三章 立马横刀 算是一节狗尾巴</a></span><span class="r_spanthree">2013/5/23 7:00:06</span><span class="r_spanfour">608209</span><span class="r_spanfive"><a href="/intro/37867/chapterlist.html">了解本书&gt;&gt;</a></span></li>
        </ul>
    </div>
</div>

{* 友情链接 *}
<div class="link">
    <div class="linktop clearfix">
        <h3>精品小说网站</h3>
    </div>
    <div class="linkbody">
        <a href="http://book.hao123.com" targdt="_blank">小说</a>|<a href="http://book.hao123.com/index/ph" targdt="_blank">小说排行榜</a>|<a href="http://www.kanshu.com" targdt="_blank">看书网</a>|<a href="http://www.zhaoxiaoshuo.com" targdt="_blank">找小说</a>|<a href="http://b.faloo.com" targdt="_blank">飞卢小说</a>|<a href="http://www.bxwx.org" targdt="_blank">笔下文学</a>|<a href="http://read.guanhuaju.com/" targdt="_blank">冠华居小说网 </a>|<a href="http://www.wjsw.com/" targdt="_blank">万卷书屋</a>|<a href="http://www.hongshu.com/" targdt="_blank">红薯小说网</a>|<a href="http://www.fmx.cn" targdt="_blank">凤鸣轩小说网</a>|<a href="http://www.xs8.cn/" targdt="_blank">言情小说吧</a>|<a href="http://www.cc222.com" targdt="_blank">烟雨红尘</a>|<a href="http://www.qwsy.com/" targdt="_blank">蔷薇言情小说</a>|<a href="http://www.feiku.com" targdt="_blank">飞库电子书</a>|<a href="http://www.tusuu.com/" targdt="_blank">txt小说下载</a>|<a href="http://www.yuncheng.com" targdt="_blank">云中书城</a>|<a href="http://www.huanxia.com " targdt="_blank">幻侠小说网</a>|<a href="http://www.motie.com" targdt="_blank">磨铁中文网</a>|<a href="http://www.shuhai.com" targdt="_blank">书海小说网</a>|<a href="http://www.txt8.net" targdt="_blank">txt小说下载吧</a>|<a href="http://www.sxcnw.net " targdt="_blank">书香电子书</a>|<a href="http://www.abada.com" targdt="_blank">小说下载网</a>|<a href="http://www.bookbao.com/" targdt="_blank">书包网</a>|<a href="http://www.cuiweiju.com/" targdt="_blank">翠微居小说</a>|<a href="http://www.duwenzhang.com/" targdt="_blank">文章阅读网</a>|<a href="http://www.3gsc.com.cn/" targdt="_blank">3G小说网</a>|<a href="http://bbs.txtnovel.com/" targdt="_blank">书香门第TXT</a>|<a href="http://www.msxf.net" targdt="_blank">陌上香坊</a>|<a href="http://www.txtbook.com.cn" targdt="_blank">乐读电子书</a>|<a href="http://www.2kxs.com" targdt="_blank">2k小说</a>|<a href="http://www.juyit.com" targdt="_blank">君子聚义</a>|<a href="http://www.ibook8.com/" targdt="_blank">txt电子书下载</a>|<a href="http://www.tadu.com/?cid=1914" targdt="_blank">塔读文学</a>|<a href="http://www.paipaitxt.com" targdt="_blank">派派小说论坛</a>|<a href="http://www.feifantxt.com" targdt="_blank">非凡小说网</a>|<a href="http://www.zongheng.com " targdt="_blank">纵横中文网 </a>|<a href="http://www.rain8.com/ " targdt="_blank">雨枫轩小说</a>|<a href="http://www.bayueju.com" targdt="_blank">八月居小说网</a>|<a href="http://www.17k.com/ " targdt="_blank">17K小说网</a>|
    </div>
</div>
<div class="blinebgs"></div>

{* 回到顶部*}
<div id="fix-area" class="fix-area">
    <a style="visibility: visible;" class="go-top-btn" href="#" target="_self">返回顶部</a>
    <a class="feedback-btn boxy" href="#feedback">反馈</a>
    <div id="shortcut-goerwei" class="shortcut-erweiwrap" style="height:120px;">
        <a class="g_icon clz"></a><a class="shortcut-goerwei" href="http://www.hao123.com/shouji"><span class="top">万本小说免费读</span><span class="shortcut-goerwei-pic"><img src="http://imgs.imgshao123.net/images/1233459.png" border="0" height="70px" width="70px"></span><span>点击或扫描下载</span></a>
    </div>
</div>