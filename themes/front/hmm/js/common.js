//取得一个对象，相当于getElementById()
function GetObjcet() {
  var elements = new Array();
  for (var i = 0; i < arguments.length; i++) {
    var element = arguments[i];
    if (typeof element == 'string') element = document.getElementById(element);
	Method.Element.apply(element);
    if (arguments.length == 1) return element;
    elements.push(element);
  }
  return elements;
}

//把它接收到的单个的参数转换成一个Array对象。
function GetObjcetA(list){
	var arr = [];
	for (var i=0,len=list.length; i<len; i++){arr[i] = list[i];}
	return arr;
}

//常用函数扩展
var Method = {
	Element	: function(){
		this.hide = function(){this.style.display="none"; return this;};
		this.show = function(){this.style.display=""; return this;};
		this.getValue = function(){if(this.value===undefined) return this.innerHTML; else return this.value;};
		this.setValue = function(s){if(this.value === undefined) this.setInnerHTML(s); else this.value = s;};
		this.subTag = function(){return GetObjcetA(this.getElementsByTagName(arguments[0])).each(function(n){GetObjcet(n);});};
		this.remove = function(){return this.parentNode.removeChild(this);};
		this.nextElement = function(){var n = this;	for(var i=0,n; n = n.nextSibling; i++) if(n.nodeType==1) return GetObjcet(n); return null;};
		this.previousElement = function(){var n = this;	for (var i=0,n; n = n.previousSibling; i++) if(n.nodeType==1) return GetObjcet(n); return null;};
		this.getPosition =  function(){var e = this; var t=e.offsetTop; var l=e.offsetLeft; while(e=e.offsetParent){if(GetObjcet(e).getStyle('position') == 'absolute' || GetObjcet(e).getStyle('position') == 'relative') break; t+=e.offsetTop; l+=e.offsetLeft;} return {x:l, y:t};};
		this.getStyle = function(name){ if(this.style[name]) return this.style[name]; else if(this.currentStyle) return this.currentStyle[name]; else if(document.defaultView && document.defaultView.getComputedStyle){ name = name.replace(/([A-Z])/g,"-GetObjcet1").toLowerCase(); var s = document.defaultView.getComputedStyle(this,""); return s && s.getPropertyValue(name); } else return null;};
		this.setInnerHTML = function(s){var ua = navigator.userAgent.toLowerCase();s = s.replace(/<script([^>]+)src\s*=\s*\"([^>\"\']*)\"([^>]*)>\s*<\/script>/gi,'');if (ua.indexOf('msie') >= 0 && ua.indexOf('opera') < 0){ s = '<div style="display:none">for IE</div>' + s; s = s.replace(/<script([^>]*)>/gi,'<scriptGetObjcet1 defer>'); this.innerHTML = '';this.innerHTML = s;	this.removeChild(this.firstChild);}else{var el_next = this.nextSibling; var el_parent = this.parentNode; el_parent.removeChild(this); this.innerHTML = s; if(el_next) el_parent.insertBefore(this, el_next); else el_parent.appendChild(this);}};

		
	},
	Array :	function(){
		this.indexOf = function(){for (i=0; i<this.length; i++) if (this[i]==arguments[0]) return i; return -1;};
		this.each = function(fn){for (var i=0,len=this.length; i<len; i++){	fn(this[i],i);} return this;};
	},
	String : function(){
		this.trim = function(){var _re,_argument = arguments[0] || " ";	typeof(_argument)=="string"?(_argument == " "?_re = /(^\s*)|(\s*GetObjcet)/g : _re = new RegExp("(^"+_argument+"*)|("+_argument+"*GetObjcet)","g")) : _re = _argument; return this.replace(_re,"");};
		this.stripTags = function(){return this.replace(/<\/?[^>]+>/gi, '');};
		this.cint = function(){return this.replace(/\D/g,"")*1;};
		this.hasSubString = function(s,f){if(!f) f="";return (f+this+f).indexOf(f+s+f)==-1?false:true;};
	}
};

Method.Array.apply(Array.prototype);
Method.String.apply(String.prototype);

//cookie处理
var Cookie = {
    get : function(n){
	    var dc = "; "+document.cookie+"; ";
	    var coo = dc.indexOf("; "+n+"=");
	    if (coo!=-1){
		    var s = dc.substring(coo+n.length+3,dc.length);
		    return unescape(s.substring(0, s.indexOf("; ")));
	    }else{
		    return null;
	    }
    },
    set : function(name,value,expires,path,domain,secure){
        var expDays = expires*24*60*60*3;
        var expDate = new Date();
        expDate.setTime(expDate.getTime()+expDays);
        var expString = expires ? "; expires="+expDate.toGMTString() : "";
        var pathString = "; path="+(path||"/");
		var domain = domain ? "; domain="+domain : "";
        document.cookie = name + "=" + escape(value) + expString + domain + pathString + (secure?"; secure":"");
    },
    del : function(n){
	    var exp = new Date();
	    exp.setTime(exp.getTime() - 1);
	    var cval=this.get(n);
	    if(cval!=null) document.cookie= n + "="+cval+";expires="+exp.toGMTString();
    }
}

//ajax处理
function jieqi_ajax() {
	this.init = function() {
		this.handler = null;
		this.method = "POST";
  		this.queryStringSeparator = "?";
		this.argumentSeparator = "&";
		this.URLString = "";
		this.encodeURIString = true;
  		this.execute = false;
		this.requestFile = null;
		this.vars = new Object();
		this.responseStatus = new Array(2);
		this.failed = false;
		this.response = "";
		this.asynchronous = true;

		this.onLoading = function() { };
  		this.onLoaded = function() { };
  		this.onInteractive = function() { };
  		this.onComplete = function() { };
  		this.onError = function() { };
		this.onFail = function() { };

		try {
			this.handler = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				this.handler = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {
				this.handler = null;
			}
		}

		if (! this.handler) {
			if (typeof XMLHttpRequest != "undefined") {
				this.handler = new XMLHttpRequest();
			} else {
				this.failed = true;
			}
		}
  	};
	this.setVar = function(name, value, encoded){
		this.vars[name] = Array(value, encoded);
	};
	this.encVar = function(name, value, returnvars) {
		if (true == returnvars) {
			return Array(encodeURIComponent(name), encodeURIComponent(value));
		} else {
			this.vars[encodeURIComponent(name)] = Array(encodeURIComponent(value), true);
		}
	};
	this.processURLString = function(string, encode) {
		//regexp = new RegExp(this.argumentSeparator + "|" + encodeURIComponent(this.argumentSeparator));
		regexp = new RegExp(this.argumentSeparator);
		varArray = string.split(regexp);
		for (i = 0; i < varArray.length; i++){
			urlVars = varArray[i].split("=");
			if (true == encode){
				this.encVar(urlVars[0], urlVars[1], false);
			} else {
				this.setVar(urlVars[0], urlVars[1], true);
			}
		}
	};
	this.createURLString = function(urlstring) {
		if (urlstring) {
			if (this.URLString.length) {
				this.URLString += this.argumentSeparator + urlstring;
			} else {
				this.URLString = urlstring;
			}
		}
		this.setVar("ajax_request", new Date().getTime(), false);
		urlstringtemp = new Array();
		for (key in this.vars) {
			if (false == this.vars[key][1] && true == this.encodeURIString) {
				encoded = this.encVar(key, this.vars[key][0], true);
				delete this.vars[key];
				this.vars[encoded[0]] = Array(encoded[1], true);
				key = encoded[0];
			}
			urlstringtemp[urlstringtemp.length] = key + "=" + this.vars[key][0];
		}
		if (urlstring){
			this.URLString += this.argumentSeparator + urlstringtemp.join(this.argumentSeparator);
		} else {
			this.URLString += urlstringtemp.join(this.argumentSeparator);
		}
	};
	this.runResponse = function() {
		eval(this.response);
	};
	this.runAJAX = function(urlstring) {
		if (this.failed) {
			this.onFail();
		} else {
			if(this.requestFile.indexOf(this.queryStringSeparator) > 0){
				var spoint = this.requestFile.indexOf(this.queryStringSeparator);
				this.processURLString(this.requestFile.substr(spoint + this.queryStringSeparator.length), false);
				this.requestFile = this.requestFile.substr(0, spoint);
			}
			this.createURLString(urlstring);
			if (this.handler) {
				var self = this;
				
				if (this.method == "GET") {
					totalurlstring = this.requestFile + this.queryStringSeparator + this.URLString;
					this.handler.open(this.method, totalurlstring, this.asynchronous);
				} else {
					this.handler.open(this.method, this.requestFile, this.asynchronous);
					try {
						this.handler.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
					} catch (e) { }
				}

				this.handler.onreadystatechange = function() {
					switch (self.handler.readyState) {
						case 1:
							self.onLoading();
							break;
						case 2:
							self.onLoaded();
							break;
						case 3:
							self.onInteractive();
							break;
						case 4:
							self.response = self.handler.responseText;
							self.responseXML = self.handler.responseXML;
							self.responseStatus[0] = self.handler.status;
							self.responseStatus[1] = self.handler.statusText;

							if (self.execute) {
								self.runResponse();
							}

							if (self.responseStatus[0] == "200") {
								self.onComplete();
							} else {
								self.onError();
							}

							self.URLString = "";
							break;
					}
				}
				this.handler.send(this.method == "GET" ? null : this.URLString);
			}
		}
	};
	this.submitForm = function(form) {
		if(this.requestFile == null) this.requestFile = GetObjcet(form).attributes["action"].value;
		this.runAJAX(Form.serialize(form));
	};
	this.init();
}

var Ajax = {
	Request	: function(vname, vars){
		var ajax = new jieqi_ajax();
		var param = {method:"",parameters:"",asynchronous:true,onLoading:function(){},onLoaded:function(){},onInteractive:function(){},onComplete:function(){},onError:function(){},onFail:function(){}};
		for (var key in vars) param[key] = vars[key];
		if(param["parameters"] != "") ajax.processURLString(param["parameters"], false);
		ajax.asynchronous = param["asynchronous"];
		ajax.onLoading = param["onLoading"];
		ajax.onLoaded = param["onLoaded"];
		ajax.onInteractive = param["onInteractive"];
		ajax.onError = param["onError"];
		ajax.onFail = param["onFail"];
		ajax.onComplete = param["onComplete"];
		if(GetObjcet(vname) != null && GetObjcet(vname).tagName.toLowerCase() == "form"){
			ajax.method = param["method"]=="" ? "POST" : param["method"];
			ajax.submitForm(vname);
		}else{
			ajax.method = param["method"]=="" ? "GET" : param["method"];
			ajax.requestFile = vname;
			ajax.runAJAX();
		}
	},
	Update : function(vname, vars){
		var param = {outid:"",tipid:"",onLoading:"", outhide:0, cursor:"wait", parameters:""};
		for (var key in vars) param[key] = vars[key];

		var isform = (GetObjcet(vname) != null && GetObjcet(vname).tagName.toLowerCase() == "form") ? true : false;

		if(typeof param["onLoading"] == 'function'){
			var doLoading = param["onLoading"];
		}else{
			var doLoading = function(){
				if(param["cursor"] != "") document.body.style.cursor=param["cursor"];
				if(param["tipid"] != null && param["tipid"] != "") {GetObjcet(param["tipid"]).setValue(param["onLoading"]);GetObjcet(param["tipid"]).show();}
				if(isform) Form.disable(vname);
			}
		}
		var doComplete = function(){
			if(param["cursor"] != "") document.body.style.cursor="auto";
			if(param["tipid"] != null && param["tipid"] != "") {GetObjcet(param["tipid"]).setValue("");GetObjcet(param["tipid"]).hide();}
			if(param["outid"] != "") {GetObjcet(param["outid"]).setValue(this.response);GetObjcet(param["outid"]).show();}
			if(param["outhide"] != "") {setTimeout(function(){GetObjcet(param["outid"]).hide()},param["outhide"]);}
			if(isform) Form.enable(vname);
		}
		var doError = function(){
			if(param["outid"] != "")  GetObjcet(param["outid"]).setValue("ERROR:"+this.responseStatus[1]+"("+this.responseStatus[0]+")");
			if(isform) Form.enable(vname);
		}
		var doFail = function() {
			alert("Your browser does not support AJAX!");
			if(isform) Form.enable(vname);
		}
		
		Ajax.Request(vname, {onLoading:doLoading, onComplete:doComplete, onError:doError, onFail:doFail, parameters:param["parameters"]});
	},
	Tip : function(event, url, timeout){
		event = event ? event : (window.event ? window.event : null);
		timeout = timeout ? timeout : 3000;
		var eid = event.srcElement ? event.srcElement.id : event.target.id;
		var tid = eid + "_tip";
		var ele = GetObjcet(eid);
		var pos = ele.getPosition();
		var atip  = GetObjcet(tid);
		if(!atip) {
			atip = document.createElement("div");
			atip.id = tid;
			atip.style.display = "none";
			atip.className = "ajaxtip";
			document.body.appendChild(atip);
			atip.onclick = function(){GetObjcet(tid).hide();};
		}
		atip.style.top = (pos.y + ele.offsetHeight + 2)  + "px";
		atip.style.left = pos.x + "px";
		atip.innerHTML = "";
		atip.style.display="";
		this.Update(url, {outid:tid, tipid:tid, onLoading:"Loading...", outhide:timeout, cursor:"wait"});
	}
}

function loadJs(url){
	if(arguments.length >= 2 && typeof arguments[1] == 'function') funload = arguments[1];
	if(arguments.length >= 3 && typeof arguments[2] == 'function') funerror = arguments[2];
	var ss=document.getElementsByTagName("script");
	for(i=0;i<ss.length;i++){
		if(ss[i].src && ss[i].src.indexOf(url) != -1){
			if(typeof funload == "function") funload();
			return;
		}
	}
	s=document.createElement("script");
	s.type="text/javascript";
	s.defer = "defer";
	s.src=url;
	document.getElementsByTagName("head")[0].appendChild(s);
	
	s.onload=s.onreadystatechange=function(){
		if(this.readyState && this.readyState=="loading") return;
		if(typeof funload == "function") funload();
	}
	s.onerror=function(){
		this.parentNode.removeChild(this);
		if(typeof funerror == "function") funerror();
	}
}


//通用功能
function GetObj(objName){
	if(document.getElementById){
		return eval('document.getElementById("' + objName + '")');
	}else if(document.layers){
		return eval("document.layers['" + objName +"']");
	}else{
		return eval('document.all.' + objName);
	}
}

//退出书签
//function bookmark()
//{
//if(readCookie("bookmark")!="yes") 
//{
//saveCookie("bookmark","yes",1);
//window.external.AddFavorite('http://www.shushaoye.com', '520xs');
//}
//}

function saveCookie(name,value,days) {
     if (days) {
         var date = new Date();
         date.setTime(date.getTime()+(days*24*60*60*3))
         var expires = "; expires="+date.toGMTString()
     }
     else expires = ""
     document.cookie = name+"="+value+expires+"; path=/"
}
function readCookie(name) {
     var nameEQ = name + "="
     var ca = document.cookie.split(';')
     for(var i=0;i<ca.length;i++) {
         var c = ca[i];
         while (c.charAt(0)==' ') c = c.substring(1,c.length)
         if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length)
     }
     return null
}
//书架
function addbook(bid)
{
	
	url="/modules/article/addbookcase.php?bid="+bid;
	Ajax.Request(url,{onComplete:function(){alert(this.response.replace(/<br[^<>]*>/g,'\n'));}});
	url2="/sendbookcase.php?id="+bid;
	Ajax.Request(url2);
}
function addbookcase(bid,cid)
{
	
	url="/modules/article/addbookcase.php?bid="+bid+"&cid="+cid;
	Ajax.Request(url,{onComplete:function(){alert(this.response.replace(/<br[^<>]*>/g,'\n'));}});
	//Ajax.Tip(event,url,3000);
}


function dlglogin()
{
	//openDialog("http://www.shushaoye.com/style/common/dlglogin.php",1);
}

function addfriend(uid)
{
	url="/addfriends.php?id="+uid;
	Ajax.Request(url,{onComplete:function(){alert(this.response.replace(/<br[^<>]*>/g,'\n'));}});
}

function LastRead(){
	this.bookList="bookList"
	}
LastRead.prototype={	
	set:function(bid,tid,title,texttitle){
		if(!(bid&&tid&&title&&texttitle))return;
		var v=bid+'#'+tid+'#'+title+'#'+texttitle;
		this.setItem(bid,v);
		this.setBook(bid)		
		},
	
	get:function(k){
		return this.getItem(k)?this.getItem(k).split("#"):"";						
		},
	
	remove:function(k){
		this.removeItem(k);
		this.removeBook(k)			
		},
	
	setBook:function(v){
		var reg=new RegExp("(^|#)"+v); 
		var books =	this.getItem(this.bookList);
		if(books==""){
			books=v
			}
		 else{
			 if(books.search(reg)==-1){
				 books+="#"+v				 
				 }
			 else{
				  books.replace(reg,"#"+v)
				 }	 
			 
			 }	
			this.setItem(this.bookList,books)
		
		},
	
	getBook:function(){
		var v=this.getItem(this.bookList)?this.getItem(this.bookList).split("#"):Array();
		var books=Array();
		if(v.length){
			
			for(var i=0;i<v.length;i++){
								 
				var tem=this.getItem(v[i]).split('#');	
				
				if (tem.length>3)	books.push(tem);					
				}		
			}
			return books		
		},
	
	removeBook:function(v){		
	    var reg=new RegExp("(^|#)"+v); 
		var books =	this.getItem(this.bookList);
		if(!books){
			books=""
			}
		 else{
			 if(books.search(reg)!=-1){	
			      books=books.replace(reg,"")
				 }	 
			 
			 }	
			this.setItem(this.bookList,books)		
		
		},
	
	setItem:function(k,v){
		if(!!window.localStorage){		
			localStorage.setItem(k,v);		
		}
		else{
			var expireDate=new Date();
			  var EXPIR_MONTH=30*24*3600*1000;			
			  expireDate.setTime(expireDate.getTime()+12*EXPIR_MONTH)
			  document.cookie=k+"="+encodeURIComponent(v)+";expires="+expireDate.toGMTString()+"; path=/";		
			}			
		},
		
	getItem:function(k){
		var value=""
		var result=""				
		if(!!window.localStorage){
			result=window.localStorage.getItem(k);
			 value=result||"";	
		}
		else{
			var reg=new RegExp("(^| )"+k+"=([^;]*)(;|\x24)");
			var result=reg.exec(document.cookie);
			if(result){
				value=decodeURIComponent(result[2])||""}				
		}
		return value
		
		},
	
	removeItem:function(k){		
		if(!!window.localStorage){
		 window.localStorage.removeItem(k);		
		}
		else{
			var expireDate=new Date();
			expireDate.setTime(expireDate.getTime()-1000)	
			document.cookie=k+"= "+";expires="+expireDate.toGMTString()							
		}
		},	
	removeAll:function(){
		if(!!window.localStorage){
		 window.localStorage.clear();		
		}
		else{
		var v=this.getItem(this.bookList)?this.getItem(this.bookList).split("#"):Array();
		var books=Array();
		if(v.length){
			for( i in v ){
				var tem=this.removeItem(v[k])				
				}		
			}
			this.removeItem(this.bookList)				
		}
		}	
	}

function showbook(){
var showbook=document.getElementById('banner');

//if(showbook.style.display=="none"){showbook.style.display="block";}else{showbook.style.display=="none";}

if(showbook.innerHTML==""){
	var bookhtml='';
	var books=lastread.getBook();
	var t = false;
	// window.console.log(siteUrl);
	siteUrl = (siteUrl.lastIndexOf("/") == (siteUrl.length - 1)) ? siteUrl : (siteUrl + "/");
	// window.console.log(siteUrl);
	if(books.length){
		if(books.length>20)
		{
			for(var i=0;i<books.length;i++){
			if(i>books.length-21)
			{
                bookhtml+='<li><a class="title" href="'+ siteUrl + 'book/detail/index/id/'+books[i][0]+'" title="访问：《'+books[i][2]+'》目录">《'+books[i][2]+'》</a><a href="'+ siteUrl + 'book/chapter/index/bookid/'+books[i][0]+'/id/'+books[i][1]+'.html" title="阅读：'+books[i][3]+'" class="chapter">'+books[i][3]+'</a><a href="javascript:removebook(\''+books[i][0]+'\')" class="delbook">删除</a></li>'
			}
			}
		}
		else
		{
			for(var i=0;i<books.length;i++){
                bookhtml+='<li><a class="title" href="'+ siteUrl + 'book/detail/index/id/'+books[i][0]+'" title="访问：《'+books[i][2]+'》目录">《'+books[i][2]+'》</a><a href="'+ siteUrl + 'book/chapter/index/bookid/'+books[i][0]+'/id/'+books[i][1]+'.html" title="阅读：'+books[i][3]+'" class="chapter">'+books[i][3]+'</a><a href="javascript:removebook(\''+books[i][0]+'\')" class="delbook">删除</a></li>'
			
			}
		}
			
     	}
	else{
		 	bookhtml+="<li class='li_noread' style='width:945px;text-align:center;'>-----您还没开始阅读呢！-----</li>";
		 }
		 showbook.style.display="block";
		 showbook.innerHTML=bookhtml;
	}
	else{
			showbook.innerHTML="";
			showbook.style.display="none";
		}
		
} 

function showbook_fordele(){
	var showbook=document.getElementById('banner');
	var bookhtml='';
	var books=lastread.getBook();
	// window.console.log(siteUrl);
	siteUrl = (siteUrl.lastIndexOf("/") == (siteUrl.length - 1)) ? siteUrl : (siteUrl + "/");
		if(books.length){
				if(books.length>20)
		{
			for(var i=0;i<books.length;i++){
			if(i>books.length-21)
			{					
				bookhtml+='<li><a class="title" href="'+ siteUrl + 'book/detail/id/'+books[i][0]+'/" title="访问：《'+books[i][2]+'》目录">《'+books[i][2]+'》</a><a href="'+ siteUrl + 'book/chapter/index/bookid/'+books[i][0]+'/id/'+books[i][1]+'.html" title="阅读：'+books[i][3]+'" class="chapter">'+books[i][3]+'</a><a href="javascript:removebook(\''+books[i][0]+'\')" class="delbook">删除</a></li>'
			}
			}
		}
		else
		{
			for(var i=0;i<books.length;i++){				
				bookhtml+='<li><a class="title" href="'+ siteUrl + 'book/detail/id/'+books[i][0]+'/" title="访问：《'+books[i][2]+'》目录">《'+books[i][2]+'》</a><a href="/book_'+books[i][0]+'/'+books[i][1]+'.html" title="阅读：'+books[i][3]+'" class="chapter">'+books[i][3]+'</a><a href="javascript:removebook(\''+books[i][0]+'\')" class="delbook">删除</a></li>'
			
			}
		}
			}
		else{
				bookhtml+="<li class='li_noread' style='width:945px;text-align:center;'>-----您还没开始阅读呢！-----</li>";
			 }
		showbook.innerHTML=bookhtml;
	
}

function removebook(k){
	lastread.remove(k);
	 showbook_fordele()
	}
	
function yuedu(){
document.writeln("<a href=\"javascript:showbook();\" style=\"font-weight:bold\">阅读记录</a>");
}

window.lastread = new LastRead();

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
