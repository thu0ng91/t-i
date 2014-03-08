<link href="{$FW_THEME_URL}/css/list.css" rel="stylesheet" type="text/css">
<div class="bookstoretwo">
    <div class="twoleft">
        <div class="storelistbt">
            <div class="storelistbt1">{$category->title} 作品列表</div>
            <div class="storelistbt2">{$pages->currentPage+1}页/{$pages->pageCount}页</div>
        </div>
        <div class="storelistbt3">
            <div class="storelistbt3z">序号</div>
            <div class="storelistbt3b">小说书名 / 小说章节</div>
            <div class="storelistbt3c">点击量</div>
            <div class="storelistbt3d">小说作者</div>
            <div class="storelistbt3e">更新时间</div>
        </div>
        <div id="taoshumain">
            {foreach $list as $key => $book}
            <ul class="{if $key%2 == 1}a1{/if}">
                <li class="storelistbt3z">{$key+1}</li>
                <li class="storelistbt3b">
                    <a target="_blank" class="ts_font01" title="{$book->title}" href="{novel_book_link id=$book->id}">{$book->title}</a>
                    
                    <a title="{$book->title} {$book->lastchaptertitle}" target="_blank" href="{novel_chapter_link bookid=$book->id id=$book->lastchapterid}">{$book->lastchaptertitle}</a>
                </li>
                <li class="storelistbt3c">{$book->allclicks}</li>
                <li class="storelistbt3d">{$book->author}</li>
                <li class="storelistbt3e">{$book->updatetime|date_format:'Y-m-d'}</li>
            </ul>
            {/foreach}
            {if $pages->pageCount > 1}
            <div class="boxt"></div>
            <div class="pages boxm">
                <div class="pagelink" id="pagelink">
                    {widget name="CLinkPager" pages=$pages firstPageLabel="1" lastPageLabel=$pages->pageCount header="" prevPageLabel="<<" nextPageLabel=">>"}
                </div>
            </div>
            {/if}
        </div>
    </div>
    <div class="tworight">
        <div id="list1" class="list1a">
            <div style="CURSOR: pointer" id="heada" class="list3" onclick="listTab('list_a','heada')">最新更新</div>
            <div style="CURSOR: pointer" id="headb" class="list4" onclick="listTab('list_b','headb')">最新入库</div>
        </div>
        <div id="divStrong" class="list10">
            <span style="display: block;" id="list_a">
                <ul>
                    {$index = 1}
                    {novel_book  cid=[$category->id]  order="updatetime desc" limit=20}
                    <li>{$index++}. <a href="{novel_book_link id=$item->id}" target="_blank" title="{$item->title}">{$item->title}</a></li>
                    {/novel_book}
                </ul>
            </span>
            <span style="display: none;" id="list_b">
                <ul>
                    {$index = 1}
                    {novel_book  cid=[$category->id]  order="createtime desc" limit=20}
                    <li>{$index++}. <a href="{novel_book_link id=$item->id}" target="_blank" title="{$item->title}">{$item->title}</a></li>
                    {/novel_book}

                    
                </ul>
            </span>
        </div>

        <div class="listover"></div>
        <div class="list1">
            <div class="list2">点击榜</div>
        </div>
        <div class="list10">
            <ul>
               {$index = 1}
               {novel_book_rank cid=[$category->id] type="click" limit=20}
               <li>{$index++}. <a href="{novel_book_link id=$item->id}" target="_blank" title="{$item->title}">{$item->title}</a></li>
               {/novel_book_rank}
           </ul>
       </div>
       <div class="listover"></div>
   </div>
   <div class="clear"></div>
</div>