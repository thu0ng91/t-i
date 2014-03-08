//设为首页
function SetHomepage($url){
	if(document.all){
        document.body.style.behavior='url(#default#homepage)';
		document.body.setHomePage($url);
	}else if(window.sidebar){
		if(window.netscape){
			try{
				netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
			}catch(e){
				alert( "该操作被浏览器拒绝，如果想启用该功能，请在地址栏内输入 about:config,然后将项 signed.applets.codebase_principal_support 值该为true" );
			}
		}
    var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components. interfaces.nsIPrefBranch);
		prefs.setCharPref('browser.startup.homepage',$url);
	}
}

//添加到收藏夹
function AddFavorite(url,title) {
	if(confirm("收藏名称："+title+"\n收藏网址："+url+"\n确定添加收藏？")) {
		var ua = navigator.userAgent.toLowerCase();
			if(ua.indexOf("msie 8")>-1) {
			external.AddToFavoritesBar(url, title);//IE8
		}else{
			try {
				window.external.addFavorite(url, title);
			} catch(e) {
				try {
					window.sidebar.addPanel(title, url, "");//firefox
				} catch(e) {
					alert("加入收藏失败，请使用Ctrl+D进行添加");
				}
			}
		}
	}
	return false;
}

//复制剪贴板
function CopyToClipBoard(txt) {
	if(window.clipboardData) {
			window.clipboardData.clearData();
			window.clipboardData.setData("Text", txt);
	} else if(navigator.userAgent.indexOf("Opera") != -1) {
		window.location = txt;
	} else if (window.netscape) {
		try {
			netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
		} catch (e) {
			alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support] 的值设置为 'true' ，双击即可。");
		}
		var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);
		if (!clip)
			return;
		var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable);
		if (!trans)
			return;
		trans.addDataFlavor('text/unicode');
		var str = new Object();
		var len = new Object();
		var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);
		var copytext = txt;
		str.data = copytext;
		trans.setTransferData("text/unicode",str,copytext.length*2);
		var clipid = Components.interfaces.nsIClipboard;
		if (!clip)
			return false;
		clip.setData(trans,null,clipid.kGlobalClipboard);
	}
	alert("复制成功！") ;
}

//cookie读取
function get_cookie_value(Name) {
	var search = Name + "=";
	var returnvalue = "";
	if (document.cookie.length > 0) {
		offset = document.cookie.indexOf(search)
		if (offset != -1) {
			offset += search.length
			end = document.cookie.indexOf(";", offset);
			if (end == -1) {
				end = document.cookie.length;
			}
			returnvalue=document.cookie.substring(offset, end);
		}
	}
	return returnvalue;
}

//ajax获取
function get_ajax_data(url) {
	var xmlhttp;
	xmlhttp=null;
	if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
	}else if (window.ActiveXObject){
		try{
			xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	if (xmlhttp!=null){
		xmlhttp.open("GET",url,false);// false 代表不使用异步加载，使用同步方式进行
		xmlhttp.send(null);
		if(xmlhttp.readyState==4){
			if(xmlhttp.status==200){
				return xmlhttp.responseText;
			}else{
				alert("AJAX ERROR");
				return false;
			}
		}
	}else{
		alert("Your browser does not support AJAX.");
		return false;
	}
}

/* 用户信息 */
//登录状态
var PTNovelHostName = location.hostname;
var PTNovelNowUrl = window.location.href;
var PTNovelUserId = 0;
var PTNovelUserName = '';
var PTNovelUserToken = '';
var PTNovelUserPmnum = 0;
var PTNovelUserBlockad = 0;
var PTNovelUserAjax = '';
var PTLoginStatus = 0;
if(document.cookie.indexOf('userid') >= 0){
	PTNovelUserId = get_cookie_value('userid');
}
if(document.cookie.indexOf('username') >= 0){
	PTNovelUserName = unescape(decodeURI(get_cookie_value('username')));
}
if(document.cookie.indexOf('usertoken') >= 0){
	PTNovelUserToken = get_cookie_value('usertoken');
}
if(document.cookie.indexOf('pmnum') >= 0){
	PTNovelUserPmnum = get_cookie_value('pmnum');
}
if(document.cookie.indexOf('userblockad') >= 0){
	PTNovelUserBlockad = get_cookie_value('userblockad');
}
if(document.cookie.indexOf('ajaxuser') >= 0){
	PTNovelUserAjax = get_cookie_value('ajaxuser');
}
if(PTNovelUserId != 0 && PTNovelUserName != '' && PTNovelUserToken != ''){
	var date = new Date();
	var now = "";
	now = date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate();
	if(PTNovelUserAjax != now){
		var AjaxUserCheck = get_ajax_data("http://"+PTNovelHostName+"/ajax.php?action=user&refresh="+Math.random());
		if(AjaxUserCheck=="ok"){
			PTLoginStatus = 1;
		}
	}else{
		PTLoginStatus = 1;
	}
}
