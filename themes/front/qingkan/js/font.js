(function(a){a.cookie=function(d,e,c){if(arguments.length>1){var f=a.extend({},a.cookieOptions,c);if(e===null||e===undefined){e="";f.expires=-1}if(f.expires.constructor!=Date){var b=new Date();b.setDate(b.getDate()+f.expires);f.expires=b}document.cookie=d+"="+e+"; expires="+f.expires.toUTCString()+(f.path?"; path="+(f.path):"")+(f.domain?"; domain="+(f.domain):"")+(f.secure?"; secure":"")}else{if(result=new RegExp(d+"=(.*?)(?:;|$)").exec(document.cookie)){return decodeURIComponent(result[1])}return false}};a.cookieOptions={expires:365,path:"/"}})(jQuery);function $D(a){return decodeURIComponent(a)}function $E(a){return encodeURIComponent(a)};
function TplTextSelect(){
	document.writeln("	<div id=\"TextSelect\">");
	document.writeln("	<div class=\"ts1\">");
	document.writeln("	<span>选择背景颜色：<\/span>");
	document.writeln("	<a href=\"javascript:void(0)\" onclick=\"SetBgColor(\'#dcecf5\')\"><img src=\"\/images\/icon01.gif\" width=\"15\" height=\"18\" border=\"0\" alt=\"\" \/><\/a>");
	document.writeln("	<a href=\"javascript:void(0)\" onclick=\"SetBgColor(\'#e7f4fe\')\"><img src=\"\/images\/icon02.gif\" width=\"15\" height=\"18\" border=\"0\" alt=\"\" \/><\/a>");
	document.writeln("	<a href=\"javascript:void(0)\" onclick=\"SetBgColor(\'#edf6d0\')\"><img src=\"\/images\/icon03.gif\" width=\"15\" height=\"18\" border=\"0\" alt=\"\" \/><\/a>");
	document.writeln("	<a href=\"javascript:void(0)\" onclick=\"SetBgColor(\'#f5f1e7\')\"><img src=\"\/images\/icon04.gif\" width=\"15\" height=\"18\" border=\"0\" alt=\"\" \/><\/a>");
	document.writeln("	<a href=\"javascript:void(0)\" onclick=\"SetBgColor(\'#eae8f7\')\"><img src=\"\/images\/icon05.gif\" width=\"15\" height=\"18\" border=\"0\" alt=\"\" \/><\/a>");
	document.writeln("	<a href=\"javascript:void(0)\" onclick=\"SetBgColor(\'#fef4f0\')\"><img src=\"\/images\/icon06.gif\" width=\"15\" height=\"18\" border=\"0\" alt=\"\" \/><\/a>");
	document.writeln("	<a href=\"javascript:void(0)\" onclick=\"SetBgColor(\'#ebf4ef\')\"><img src=\"\/images\/icon07.gif\" width=\"15\" height=\"18\" border=\"0\" alt=\"\" \/><\/a>");
	document.writeln("	<a href=\"javascript:void(0)\" onclick=\"SetBgColor(\'#fafafa\')\"><img src=\"\/images\/icon08.gif\" width=\"15\" height=\"18\" border=\"0\" alt=\"\" \/><\/a>");
	document.writeln("	<\/div>");
	document.writeln("	<div class=\"ts2\">");
	document.writeln("	<span>选择字体：<\/span>");
	document.writeln("	<a href=\"javascript:void(0)\" onclick=\"SetfontSize(17)\"><img src=\"\/images\/icon09.gif\" width=\"21\" height=\"21\" border=\"0\" alt=\"\" \/><\/a>");
	document.writeln("	<a href=\"javascript:void(0)\" onclick=\"SetfontSize(12)\"><img src=\"\/images\/icon10.gif\" width=\"21\" height=\"21\" border=\"0\" alt=\"\" \/><\/a>");
	document.writeln("	<a href=\"javascript:void(0)\" onclick=\"SetfontSize(10)\"><img src=\"\/images\/icon11.gif\" width=\"21\" height=\"21\" border=\"0\" alt=\"\" \/><\/a><\/div>");
	document.writeln("	<div class=\"ts3\">");
	document.writeln("	<span>滚动速度：<\/span>");
	document.writeln("	<a href=\"javascript:void(0)\" onclick=\"SetSpeed(1)\"><img src=\"\/images\/icon12.gif\" width=\"21\" height=\"21\" border=\"0\" alt=\"\" \/><\/a>");
	document.writeln("	 <a href=\"javascript:void(0)\" onclick=\"SetSpeed(20)\"><img src=\"\/images\/icon13.gif\" width=\"21\" height=\"21\" border=\"0\" alt=\"\" \/><\/a>");
	document.writeln("	<a href=\"javascript:void(0)\" onclick=\"SetSpeed(40)\"><img src=\"\/images\/icon14.gif\" width=\"21\" height=\"21\" border=\"0\" alt=\"\" \/><\/a><\/div>");
	document.writeln("	<div class=\"ts4\">");
	document.writeln("	<a href=\"javascript:void(0)\" onclick=\"YaHei()\">雅黑字体<\/a>&nbsp;");
	document.writeln("	<a href=\"javascript:void(0)\" onclick=\"SetDefault()\">默认字体<\/a>&nbsp;");
	document.writeln("	<a href=\"javascript:void(0)\" onclick=\"SetFont()\">设置字体<\/a>&nbsp;");
	document.writeln("      <a href=\"javascript:addBookmarkAjax(\'"+article_id+"\', \'"+chapter_id+"\');\">加入书签<\/a><\/div> ");
	document.writeln("	<\/div>");
}
// ---
function CopyText() {
	var ttx = m(document.getElementById("booktext").innerHTML);
	ttx = tbooktitle + " " + tcptitle + "\r\n\r\n" + location.href + "\r\n\r\n" + ttx + "\r\n\r\n" + location.href;
	window.clipboardData.setData("text",ttx);
	alert("章节内容已经复制到剪贴板 ^_^");
}
function addBookmarkAjax(bid,cid) {
$.post("/modules/article/addbookcase.php", { bid: bid, cid: cid,ajax_request:1},
   function(data){
	alert(data);
})
}
function FormatText()
{
	var body = document.getElementById("booktext").innerText;
        body = m(body);
        document.getElementById("booktext").innerText = body;
}
function m(key){
	var str = key;
	var reStr;
	//去掉一些非法字符，如空格，制表符等等
	reStr = /[\f\t\v　 ]/ig;
	str = str.replace(reStr,"");
	
	//将带有1个或多个的回车换行符替换成1个回车换行+4个空格
	reStr = /(\r\n){1,}/ig;
	str = str.replace(reStr,"\r\n\r\n　　");
	
	//去掉开头的回车换行以及空白字符
	reStr = /^\s*/ig;
	str = str.replace(reStr,"");
	
	//去掉结尾的回车换行以及空白字符
	reStr = /\s*$/ig;
	str = str.replace(reStr,"");
	
	reStr = /<BR>/ig;
	str = str.replace(reStr,"\r\n");

	reStr = /&nbsp;|<!--go-->|<!--over-->/ig;
	str = str.replace(reStr,"");
	//首位加4个空格
	return("　　"+str);
}
function GotoCpList(o) {
	//alert(o);
	location.href = o;
}
function isNum(s) {
	var pattern = /^\d+(\.\d+)?$/;
	return pattern.test(s)
}
var timer;
function StopScroll() {
	clearInterval(timer);
}
function BeginScroll() {
	timer = setInterval("Scrolling()", $.cookie("cp_speed_8x"));
}
function SetSpeed(o) {
	$.cookie("cp_speed_8x", o);
}
function Scrolling() {
	currentpos = document.documentElement.scrollTop;
	window.scroll(0, ++currentpos);
	if (currentpos != document.documentElement.scrollTop) {
		clearInterval(timer);
	}
}
function LoadUserPro() {
	if ($.cookie("cp_speed_8x") == false) {
		SetSpeed(20);
	} else {
		SetSpeed($.cookie("cp_speed_8x"));
	}
	if ($.cookie("cp_fontsize_8x") == false) {
		SetfontSize(12);
	} else {
		SetfontSize($.cookie("cp_fontsize_8x"));
	}
	if ($.cookie("cp_bg_8x") == false) {
		SetBgColor("#FAFAFA");
	} else {
		SetBgColor($.cookie("cp_bg_8x"));
	}
	if ($.cookie("cp_fontFamily_8x") != false) {
		G('booktext').style.fontFamily = $.cookie("cp_fontFamily_8x");
	}
}
function SetfontSize(o) {
	var Divs = G('booktext');
	if (Divs != null) {
		Divs.style.fontSize = o + "pt";
	}
	$.cookie("cp_fontsize_8x", o);
}
function SetBgColor(o) {
	document.getElementById("bgdiv").style.backgroundColor = o;
	$.cookie("cp_bg_8x", o);
}
function SetFont() {
	var tempA = window.prompt("请输入您喜欢的字体,默认为微软雅黑,如果不存在则为宋体.", "微软雅黑");
	if (tempA == "") {
		tempA = "微软雅黑";
	}
	G('booktext').style.fontFamily = tempA;
	$.cookie("cp_fontFamily_8x", tempA);
	tempA = window.prompt("请输入字体大小,默认为 12PX .", "12");
	if (tempA == "" || !isNum(tempA)) {
		tempA = 12;
	}
	SetfontSize(tempA);
}
function SetDefault() {
	SetSpeed(20);
	SetfontSize(12);
	$.cookie("cp_fontFamily_8x", "宋体");
	G('booktext').style.fontFamily = $.cookie("cp_fontFamily_8x");
}

function YaHei(){
	$.cookie("cp_fontFamily_8x", "微软雅黑");
	G('booktext').style.fontFamily = $.cookie("cp_fontFamily_8x");
}
function G(obj) {return document.getElementById(obj); }
document.onmousedown = StopScroll;
document.ondblclick = BeginScroll;
