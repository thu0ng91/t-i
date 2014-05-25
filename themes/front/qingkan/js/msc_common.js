function addBookmark(title,url) {
  if(!title){title =document.title};
  if(!url){url=window.location.href}
  if (window.sidebar) {
	window.sidebar.addPanel(title,url ,"");
  } else if( document.all ) {
	window.external.AddFavorite(url,title);
  } else if( window.opera || window.print ) {
  	alert('');
  	return true;
  }
}

/**
 * 加入书架
 * @param bookId
 * @param chapterId
 * @param callback
 */
function addBookcase(bookId, chapterId, callback)
{
    var url = SiteUrl + "/member/my/ajaxAddBookcase/bookId/" + bookId + "/chapterId/" + chapterId;
    $.post(url, function(data) {
        if (typeof callback == 'function') callback(data);
    },'json');
}

/**
 * 获取登陆用户信息
 * @param callback
 */
function getLoginInfo(callback)
{
    var url = SiteUrl + "/member/do/ajaxCheckLogin";
    $.post(url, function(data) {
        if (typeof callback == 'function') callback(data);
    },'json');
}

/**
 * 显示对话框
 * @param title
 * @param url
 */
function showDialog(title, url)
{
    if (typeof art  != 'function') return;
    art.dialog.open(url, {
        title: title,
//            ok: function(topWin){
////                art.dialog('hello world');
//            },
//            close: function(){
//                art.dialog.tips('close')
//            }
        width: "60%"
    }, false);

}
function killErrors() {
    return true;
}
window.onerror = killErrors;