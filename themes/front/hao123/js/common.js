function uaredirect(f){try{if(document.getElementById("bdmark")!=null){return}var b=false;if(arguments[1]){var e=window.location.host;var a=window.location.href;if(isSubdomain(arguments[1],e)==1){f=f+"/#m/"+a;b=true}else{if(isSubdomain(arguments[1],e)==2){f=f+"/#m/"+a;b=true}else{f=a;b=false}}}else{b=true}if(b){var c=window.location.hash;if(!c.match("fromapp")){if((navigator.userAgent.match(/(iPhone|iPod|Android|ios)/i))){location.replace(f)}}}}catch(d){}}function isSubdomain(c,d){this.getdomain=function(f){var e=f.indexOf("://");if(e>0){var h=f.substr(e+3)}else{var h=f}var g=/^www\./;if(g.test(h)){h=h.substr(4)}return h};if(c==d){return 1}else{var c=this.getdomain(c);var b=this.getdomain(d);if(c==b){return 1}else{c=c.replace(".","\\.");var a=new RegExp("\\."+c+"$");if(b.match(a)){return 2}else{return 0}}}};
uaredirect("http://m.hao123.com/a/xiaoshuo?z=2&tn=hcppcxiaoshuo");
$(function(){
	$(".boxy").boxy();
});
  $(window).scroll(function(){
		   var sc=$(window).scrollTop();
		   var rwidth=$(window).width()
      	  if(sc>0){
				$(".go-top-btn").css("visibility","visible");
				}else{
			$(".go-top-btn").css("visibility","hidden");
				}
		  })
		  	
	  $(".go-top-btn").click(function(){
		  var sc=$(window).scrollTop();
		 $('body,html').animate({scrollTop:0},1000);
		  })	

$(document).ready(function(){	
	$("#kw").autocomplete('/search/ajaxsearck.asp', {
		minChars: 1,
		useDelimiter: true,
		selectFirst: false,
		autoFill: false,
		remoteDataType:'json',
		sortResults:false,
		filterResults:false,
		onItemSelect:function (data){window.location=data['data'];}
	});
});


function qrsearch(){
	if($("#kw").val()=='请输入小说名...'||$("#kw").val()==''){
		$("#kw").val('');
		$("#kw").focus();
		return false;

	}else{
		return true
	//document.location = '/search/?kw='+ encodeURIComponent($("#kw").val())+"";
	}
}



function clickjs(tit_id,box_id,cur){
	var g_tags=$(tit_id),
		g_conts=$(box_id),
		g_current=cur;
	g_tags.click(function(){
		var g_index=g_tags.index(this);
		$(this).addClass(g_current).siblings().removeClass(g_current);
		g_conts.eq(g_index).show().siblings().hide();
	})
}



function clicktabs(tit_id,box_id,cur){
	var g_tags=$(tit_id),
		g_conts=$(box_id),
		g_current=cur;
	g_tags.mouseover(function(){
		var g_index=g_tags.index(this);
		$(this).addClass(g_current).siblings().removeClass(g_current);
		g_conts.eq(g_index).show().siblings().hide();
	})
}

function lazyload(option){
		var settings={
		  defObj:null,
		  defHeight:0
		};
		settings=$.extend(settings,option||{});
		var defHeight=settings.defHeight,
			defObj=(typeof settings.defObj=="object")?settings.defObj.find("img"):$(settings.defObj).find("img");
		var pageTop=function(){
		  return document.documentElement.clientHeight+Math.max(document.documentElement.scrollTop,document.body.scrollTop)-settings.defHeight;
		};
		var imgLoad=function(){
		  defObj.each(function(i){               
		   if ($(this).offset().top<=pageTop()){
			var src2=$(this).attr("a");
			if (src2){
					$(this).attr('src',src2);
					$(this).removeAttr("a");
			}
		   }
		  });
		};
		imgLoad();
		$(window).bind("scroll", function(){
			imgLoad();
		});

}




//Add Site Favorites
$("#favmypage"),$("#fav").click(function() { 
	var ctrl = (navigator.userAgent.toLowerCase()).indexOf('mac') != -1 ? 'Command/Cmd' : 'CTRL',
		url =location.href,
		sitename =document.title; 
	if (document.all && window.external){ 
	  window.external.addFavorite(url,sitename); 
	  }else if (window.sidebar){ 
	 window.sidebar.addPanel(sitename,url, ""); 
   }else { 
		   alert('您可以尝试通过快捷键' + ctrl + ' + D 加入到收藏夹!'); 
   } 
   return false;
});


Date.prototype.format = function(format){
	var o = {
	"M+" : this.getMonth()+1, //month
	"d+" : this.getDate(),    //day
	"h+" : this.getHours(),   //hour
	"m+" : this.getMinutes(), //minute
	"s+" : this.getSeconds(), //second
	"q+" : Math.floor((this.getMonth()+3)/3),  //quarter
	"S" : this.getMilliseconds() //millisecond
	}
	if(/(y+)/.test(format)) format=format.replace(RegExp.$1,
	(this.getFullYear()+"").substr(4 - RegExp.$1.length));
	for(var k in o)if(new RegExp("("+ k +")").test(format))
	format = format.replace(RegExp.$1,
	RegExp.$1.length==1 ? o[k] :
	("00"+ o[k]).substr((""+ o[k]).length));
	return format;
}


var UserData = {
    userData: null,
    name: '*.hao123.com',
    init: function() {
        if (!UserData.userData) {
            try {
                UserData.userData = document.createElement('INPUT');
                UserData.userData.type = "hidden";
                UserData.userData.style.display = "none";
                UserData.userData.addBehavior("#default#userData");
                document.body.appendChild(UserData.userData);
                var expires = new Date();
                expires.setDate(expires.getDate() + 365);
                UserData.userData.expires = expires.toUTCString()
            } catch(e) {
                return false
            }
        }
        return true
    },
    setItem: function(key, value) {
        if (UserData.init()) {
            UserData.userData.load(UserData.name);
            UserData.userData.setAttribute(key, value);
            UserData.userData.save(UserData.name)
        }
    },
    getItem: function(key) {
        if (UserData.init()) {
            UserData.userData.load(UserData.name);
            return UserData.userData.getAttribute(key)
        }
    },
    remove: function(key) {
        if (UserData.init()) {
            UserData.userData.load(UserData.name);
            UserData.userData.removeAttribute(key);
            UserData.userData.save(UserData.name)
        }
    }
},
hsgames_length = 100;
function getmygame(){
    var myhsgames = ordergame(gethsgames()),
    hscontent = new Array();
    for (var i in myhsgames) {
			hscontent.push('<a href="' + myhsgames[i][1] + '"><span>' + myhsgames[i][2] + '</span>' + myhsgames[i][0] + '</a>');
    }
    hscontent = hscontent.join('');
    if (hscontent) {
        $("#recorconid").html('<div class="recordlist"><p>' + hscontent + '</p></div><div id="clearrecord">清除历史记录</div>');
    }
}

function ordergame(h) {
    var newgames = new Array();
    for (var i in h) {
        var ogame = h[i].split("||");
        newgames[i] = ogame;
    }
    return newgames.sort(function(a, b) {
        return b[5] - a[5];
    })
}
function gethsgames() {
    var c = window.localStorage ? localStorage.getItem('gvalues') : UserData.getItem('gvalues');
    if(!c) return new Array();
    var t = c.split("|||");
    if (t[0] !== "2144.cn") return new Array();
    t.shift();
    return t;
}
function getlastgame(){
    var b_tits=b_tit,
		b_subtits=b_subtit,
		b_urls=b_url,
		b_suburls=b_suburl,
		f_vars= Number(window.localStorage ? localStorage.getItem('gb'+b_id) : UserData.getItem('gb'+b_id)),
		d = new Date(),
		f_times=d.format('yyyy-MM-dd'),
		lastgame = [b_tits,b_urls,b_subtits,b_suburls,f_vars,f_times];
    return lastgame;
}




$("#favconid code").live('click',function(e){
    var tp = $(this),
		c = window.localStorage ? localStorage.getItem('gv') : UserData.getItem('gv'),
    txt = tp.parent().find('em').text(),
    reg = new RegExp("\\|{3}" + txt + "(?!\\|{3})"),
    cook_now = c.replace(reg, '');
    window.localStorage ? localStorage.setItem('gv', cook_now) : UserData.setItem('gv', cook_now);
    tp.parent().remove();
    if($("#favconid").html()=='') {
		$("#favconid").html('<i>暂无收藏记录...</i>');
	}
	 return false;
});






function get_hsgames() {
    var c = window.localStorage ? localStorage.getItem('gv') : UserData.getItem('gv');
    if(!c) return new Array();
    var t = c.split("|||");
    if (t[0] !== "book.hao123.com") return new Array();
    t.shift();
    return t;
}
function get_lastgame(){
	 var b_tits=b_tit,
		b_urls=b_url,
		b_isicos=b_isico,
		 lastgame = [b_tits,b_urls,b_isicos];
    return lastgame;
}
function seths_cookie() {
    var lastgame = get_lastgame(),
		hsgames = get_hsgames(),
		rp = false;
    for (var i in hsgames) {
        var ohsgame = hsgames[i].split("||");
        if (ohsgame.slice(0, 2).join() == (lastgame[0] + "," + lastgame[1])) {
            hsgames[i] = ohsgame.join("||");
            rp = true;
			alert('你已收藏过了');
            break;
        }
    }
    if (!rp) {
        hsgames.unshift(lastgame.join("||"));
        if(hsgames.length > hsgames_length) hsgames.pop();
		alert('已成功收藏!');
    }
    hsgames.unshift("nt52.com");
    var hscookie = hsgames.join("|||");
    window.localStorage ? localStorage.setItem('gv', hscookie) : UserData.setItem('gv', hscookie);
	
}

$("#favbooks,.sccs").click(function(){
	window.localStorage ? localStorage.setItem('gb'+b_id,1) : UserData.setItem('gb'+b_id,1);
	seths_cookie();
});

function order_game(h) {
    var newgames = new Array();
    for (var i in h) {
        var ogame = h[i].split("||");
        newgames[i] = ogame;
    }
    return newgames;
}

function get_mygame(){
    var myhsgames = order_game(get_hsgames()),
    hscontent = new Array();
    for (var i in myhsgames) {
			hscontent.push('<a href="' + myhsgames[i][1] + '"><span>' + myhsgames[i][2] + '</span><code></code><em>' + myhsgames[i][0] + '</em></a>');
    }
    hscontent = hscontent.join('');
    if (hscontent) {
        $("#favconid").html('<div class="recordlist"><p>' + hscontent + '</p></div>');
    }
}
// getmygame();


$(function(){

		$("#readid").hover(
			function(){
				$(this).addClass('readrecord_cur');
			},
			function(){
				$(this).removeClass('readrecord_cur');
			}
		);
		$("#favid").hover(
			function(){
				$(this).addClass('favboxs_cur');
				get_mygame();

			},
			function(){
				$(this).removeClass('favboxs_cur');
			}
		);


	$("#clearrecord").click(function(){
		$("#recorconid").html('<i>暂无阅读记录...</i>');
		 window.localStorage ? localStorage.setItem('gvalues','') : UserData.setItem('gvalues','')
	});
	
});


$(function(){
	$("#show-chapter a").click(function(){
	var urlid_hand=$(this).attr('urlid');
	var bookid_hand=$(this).attr('bookid');
	var webid_hand=$(this).attr('webid');//取得数据id号
	$.ajax({  
			url:"/inc/OutClick.asp",  
			type:"get",  
			data:"urlid="+urlid_hand+"&webid="+webid_hand+"&bookid="+bookid_hand+"",  
			success:function(jsonp){
			}
		});
	});
});

    var touched = false;
    $("#page-header .top-bar .list .item.more").mouseenter(function(){
      touched || $("#page-header .top-bar .list .sites-as-type-layer").show();
    }).on("keypress",function(e){
      if(e.keyCode == 13){
        $("#page-header .top-bar .list .sites-as-type-layer").show().children(".more").attr("tabindex","1").focus();
      }
    }).on("touchstart", function(e){
      touched = true;
      $("#page-header .top-bar .list .sites-as-type-layer").show();
    });

    $(".more.exp").on("touchstart", function(e){
      touched = true;
      $("#page-header .top-bar .list .sites-as-type-layer").hide();
    });

    $("#page-header .top-bar .list .sites-as-type-layer").mouseleave(function(){
      touched || $(this).hide();   
    }).on("keydown",function(e){
      if(e.keyCode == 27){
        $(this).hide();
      }
    }).on("keypress", ".more", function(e){
      if(e.keyCode == 13){
        $("#page-header .top-bar .list .sites-as-type-layer").hide();
      }
    });
/*反馈*/

$(function(){
function feedbacktabs(tit_id,box_id,cur){
		var g_tags=$(tit_id),
			g_conts=$(box_id),
			g_current=cur;
		g_tags.click(function(){
			var li_id=$(this).attr('id');
			if(li_id==1){
$("#message").val('提示：对我们的产品有什么意见和建议，来这里反馈吧~');
$("#classid").val('1');
}
		if(li_id==2){
$("#message").val('提示：如果在本站有没找到的小说名称，请在此输入相关信息~');
$("#classid").val('2');
}if(li_id==3){
$("#message").val('提示：欢迎各大小说站与我们进行资源合作~\n为方便尽快与你联系，资源合作请联系请发邮件至hao123xiaoshuo@gmail.com\n邮件写明：1：合作网站\n 2：联系方式');
$("#classid").val('3');
}if(li_id==4){
$("#message").val('提示：HAO123现征集优秀小说站友情连接~');
$("#classid").val('4');
}	
			
			var g_index=g_tags.index(this);
			$(this).addClass(g_current).siblings().removeClass(g_current);
			g_conts.eq(g_index).show().siblings().hide();
		})
	}
   feedbacktabs("#feedbacktag li","#feedbackcon>ul","on");
});

$(document).ready(function()    {   
	 $('#message').focus(function() {   
        if($("#message").val().indexOf('提示')>=0){   
            $("#message").val("");   
        }   
    });					   
						   
    $('#contact').focus(function() {   
        if($(this).val() == 'QQ/邮箱/电话') {   
            $(this).val("");   
        }   
    });   
    $('#contact').blur(function(){   
        if($(this).val() == "") {   
            $(this).val('QQ/邮箱/电话');   
        }   
    });   
});  


	function f_submit(){
		var data={
			message:$('#message').val(),
			contact:$('#contact').val(),
			classid:$('#classid').val(),
			curl:document.URL,
			op:'f_submit'
		};
		 $.ajax({
			type: "POST",
			url: '/feedbacksub',
			data:data,
			success: function(result)
			{
				//alert(result);
				if(result.indexOf('成功')!=-1)
				{  
				$("#feedbackform").hide();
				$("#feedback_success").show();	
				}
				else
				{
				$("#feedback_hit").show();	
				}
			}
		});
	}
		function feedback_return(){
		$("#feedbackform").show();
		$("#feedback_success").hide();	
}




var fixvar=false;
	function returntop(){
			var recimgs=1200,
				scrollheight=$(document).scrollTop()+$(window).height();
			if(scrollheight>recimgs){
				if(!fixvar){
					fixvar=true;
					// $("body").append('<div id="fixedwrap"><span class="fixicos"></span><div class="clearfix fixtopbox"><div class="fixtopa"><h6>分类</h6><a href="http://book.hao123.com/index/type-dushi" target="_blank">都市</a><a href="http://book.hao123.com/index/type-yanqing" target="_blank">言情</a><a href="http://book.hao123.com/index/type-xianxia" target="_blank">仙侠</a><a href="http://book.hao123.com/index/type-wuxia" target="_blank">武侠</a><a href="http://book.hao123.com/index/type-qihuan" target="_blank">奇幻</a><a href="http://book.hao123.com/index/type-youxi" target="_blank">网游</a><a href="http://book.hao123.com/index/type-lingyi" target="_blank">灵异</a><a href="http://book.hao123.com/index/type-junshi" target="_blank">军事</a><a href="http://book.hao123.com/index/type-lishi" target="_blank">历史</a><a href="http://book.hao123.com/index/type-xuanhuan" target="_blank">玄幻</a></div><a href="http://book.hao123.com/#recbigbox" class="gonows" target="_self">我最近看的</a></div><a href="#" target="_self" class="fixbottoma">TOP</a></div>');	
					// $("body").append('<div id="fixedwrap"><span class="fixicos"></span><div class="clearfix fixtopbox"><div class="fixtopa"></div></div><a href="#" target="_self" class="fixbottoma">TOP</a></div>');	
					$("#fixedwrap").css("left",(($(window).width()-980)/2)-100);
				}else{
					$("#fixedwrap").show();	
				}
				
			}else{
				$("#fixedwrap").hide();
			}
	}
	$(window).bind('scroll',returntop);

$(function(){
	$(".clz").click(function(){

		$("#shortcut-goerwei").hide();
			
	});
});
// document.writeln("<div style=\" display:none; width:0; height:0; overflow:hidden; white-space:nowrap\"><script src=\'http://w.cnzz.com/c.php?id=30028099\' language=\'JavaScript\'></script></div>");
document.writeln("<!-- Baidu Button BEGIN -->");
document.writeln("<script type=\"text/javascript\" id=\"bdshare_js\" data=\"type=slide&amp;img=1&amp;pos=right&amp;uid=0\" ></script>");
document.writeln("<script type=\"text/javascript\" id=\"bdshell_js\"></script>");
document.writeln("<script type=\"text/javascript\">");
document.writeln("var bds_config={\"bdTop\":262};");
document.writeln("document.getElementById(\"bdshell_js\").src = \"http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=\" + Math.ceil(new Date()/3600000);");
document.writeln("</script>");
document.writeln("<!-- Baidu Button END -->");


