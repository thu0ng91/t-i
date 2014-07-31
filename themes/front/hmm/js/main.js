// 设置为主页 
function SetHome(obj,vrl){ 
try{ 
obj.style.behavior='url(#default#homepage)';obj.setHomePage(vrl); 
} 
catch(e){ 
if(window.netscape) { 
try { 
netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect"); 
} 
catch (e) { 
alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。"); 
} 
var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch); 
prefs.setCharPref('browser.startup.homepage',vrl); 
}else{ 
alert("您的浏览器不支持，请按照下面步骤操作：1.打开浏览器设置。2.点击设置网页。3.输入："+vrl+"点击确定。"); 
} 
} 
} 
// 加入收藏 兼容360和IE6 
function shoucang(sTitle,sURL) 
{ 
try 
{ 
window.external.addFavorite(sURL, sTitle); 
} 
catch (e) 
{ 
try 
{ 
window.sidebar.addPanel(sTitle, sURL, ""); 
} 
catch (e) 
{ 
alert("加入收藏失败，请使用Ctrl+D进行添加"); 
} 
} 
}


function IsNum(e) {
	var k = window.event ? e.keyCode : e.which;
	if (((k >= 48) && (k <= 57)) || k == 8 || k == 0) {
	} else {
		if (window.event) {
			window.event.returnValue = false;
		}
		else {
			e.preventDefault(); //for firefox 
		}
	}
} 


//tab效果
function selecttab(obj){
	var i = 0;
	var n = 0;
	var tabs = obj.parentNode.parentNode.getElementsByTagName("li"); 
	for(i=0; i<tabs.length; i++){
		tmp = tabs[i].getElementsByTagName("a")[0];
		if(tmp == obj){
			tmp.className="selected";
			n=i;
		}else{
			tmp.className="";
		}
 	}
	var tabchilds = obj.parentNode.parentNode.parentNode.parentNode.childNodes;
	var tabcontent;
	for(i=tabchilds.length-1; i>=0; i--){
		if(typeof tabchilds[i].tagName != "undefined" && tabchilds[i].tagName.toLowerCase() == "div"){
			tabcontent = tabchilds[i];
			break;
		}
	}
	var contents = tabcontent.childNodes;
	var k = 0;
	for(i=0; i<contents.length; i++){
		if(typeof contents[i].tagName != "undefined" && contents[i].tagName.toLowerCase() == "div"){
			contents[i].style.display = k==n ? "block" : "none";
			k++;
		}
 	}
}


function ck()
{
    var input = document.getElementsByTagName("input");
	
    for (var i=0;i<input.length ;i++ )
    {
        if(input[i].type=="checkbox")
		{
			if(input[i].checked == true) 
			{
				input[i].checked = false;
			}
			else 
			{
				input[i].checked = true;
			}
		}
    }
}