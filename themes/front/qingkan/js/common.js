//显示搜索菜单
function xs_cc(){
	document.getElementById("sp_menu").style.display="block";
}
//关闭搜索菜单
function gb_cc(){
	document.getElementById("sp_menu").style.display="none";
}

//选项卡效果
function settab1(m,n){
	var tli=document.getElementById("ph"+m).getElementsByTagName("span"); /*获取选项卡的LI对象*/
	var mli=document.getElementById("main"+m).getElementsByTagName("div"); /*获取主显示区域对象*/
	for(i=0;i<tli.length;i++){
	  tli[i].className=i==n?"hover":""; /*更改选项卡的LI对象的样式，如果是选定的项则使用.hover样式*/
	  mli[i].style.display=i==n?"block":"none"; /*确定主区域显示哪一个对象*/
	}
}
function settab(m,n){
	var tli=document.getElementById("ph"+m).getElementsByTagName("span"); /*获取选项卡的LI对象*/
	var mli=document.getElementById("main"+m).getElementsByTagName("ul"); /*获取主显示区域对象*/
	for(i=0;i<tli.length;i++){
	  tli[i].className=i==n?"hover":""; /*更改选项卡的LI对象的样式，如果是选定的项则使用.hover样式*/
	  mli[i].style.display=i==n?"block":"none"; /*确定主区域显示哪一个对象*/
	}
}
function wytab(m,n){
	var tli=document.getElementById("tab_left").getElementsByTagName("li"); 
	var mli=document.getElementById("tab_right").getElementsByTagName("div");
	for(i=0;i<tli.length;i++){
	  tli[i].className=i==n?"hover":"";
	  mli[i].style.display=i==n?"block":"none";
	}
}
function bar_tab(m,n){
	var tli=document.getElementById("cont2_right").getElementsByTagName("em"); 
	var mli=document.getElementById("cont2_right").getElementsByTagName("ul"); 
	for(i=0;i<tli.length;i++){
	  tli[i].className=i==n?"hover":""; 
	  mli[i].style.display=i==n?"block":"none"; 
	}
}
function changesearch(typeid)
{
	var typename=new Array();
	typename[1]="书名";typename[2]="作者";
	var typevid=new Array();
	typevid[1]="novelname";typevid[2]="author";
	document.getElementById("searchtype").value=typevid[typeid];
	document.getElementById("searchtypename").innerHTML=typename[typeid];
	gb_cc();
}

// 封推焦点图
function $_get(A){return document.getElementById(A)}function addLoadEvent(A){var B=window.onload;if(typeof window.onload!="function"){window.onload=A}else{window.onload=function(){B();A()}}}function moveElement(H,I,G,C){if(!document.getElementById){return false}if(!document.getElementById(H)){return false}var D=document.getElementById(H);if(D.movement){clearTimeout(D.movement)}if(!D.style.left){D.style.left="0px"}if(!D.style.top){D.style.top="0px"}var E=parseInt(D.style.left);var B=parseInt(D.style.top);if(E==I&&B==G){return true}if(E<I){var F=Math.ceil((I-E)/10);E=E+F}if(E>I){var F=Math.ceil((E-I)/10);E=E-F}if(B<G){var F=Math.ceil((G-B)/10);B=B+F}if(B>G){var F=Math.ceil((B-G)/10);B=B-F}if(!atuokey){D.style.left=E+"px";D.style.top=B+"px";var A="moveElement('"+H+"',"+I+","+G+","+C+")";D.movement=setTimeout(A,C)}else{D.style.left=I+"px";D.style.top=G+"px"}}function classNormal(C,E){var B=$_get(C).getElementsByTagName("li");var D=$_get(E).getElementsByTagName("li");for(var A=0;A<B.length;A++){B[A].className="normal";D[A].className="normal"}}function classCurrent(B,E,D){var A=$_get(B).getElementsByTagName("li");var C=$_get(E).getElementsByTagName("li");A[D].className="current";C[D].className="current"}function iFocusChange(){if(!$_get("ifocus")){return false}$_get("ifocus").onmouseover=function(){atuokey=true};$_get("ifocus").onmouseout=function(){atuokey=false};var A=$_get("ifocus_btn").getElementsByTagName("li");var B=A.length;A[0].onmouseover=function(){moveElement("ifocus_piclist",0,0,5);classNormal("ifocus_btn","ifocus_tx");classCurrent("ifocus_btn","ifocus_tx",0)};if(B>=2){A[1].onmouseover=function(){moveElement("ifocus_piclist",0,-275,5);classNormal("ifocus_btn","ifocus_tx");classCurrent("ifocus_btn","ifocus_tx",1)}}if(B>=3){A[2].onmouseover=function(){moveElement("ifocus_piclist",0,-550,5);classNormal("ifocus_btn","ifocus_tx");classCurrent("ifocus_btn","ifocus_tx",2)}}if(B>=4){A[3].onmouseover=function(){moveElement("ifocus_piclist",0,-825,5);classNormal("ifocus_btn","ifocus_tx");classCurrent("ifocus_btn","ifocus_tx",3)}}}setInterval("autoiFocus()",5000);var atuokey=false;function autoiFocus(){if(!$_get("ifocus")){return false}if(atuokey){return false}var D=$_get("ifocus_btn").getElementsByTagName("li");var C=D.length;for(var A=0;A<C;A++){if(D[A].className=="current"){var B=A}}if(B==0&&C!=1){moveElement("ifocus_piclist",0,-275,5);classNormal("ifocus_btn","ifocus_tx");classCurrent("ifocus_btn","ifocus_tx",1)}if(B==1&&C!=2){moveElement("ifocus_piclist",0,-550,5);classNormal("ifocus_btn","ifocus_tx");classCurrent("ifocus_btn","ifocus_tx",2)}if(B==2&&C!=3){moveElement("ifocus_piclist",0,-825,5);classNormal("ifocus_btn","ifocus_tx");classCurrent("ifocus_btn","ifocus_tx",3)}if(B==3){moveElement("ifocus_piclist",0,0,5);classNormal("ifocus_btn","ifocus_tx");classCurrent("ifocus_btn","ifocus_tx",0)}if(B==1&&C==2){moveElement("ifocus_piclist",0,0,5);classNormal("ifocus_btn","ifocus_tx");classCurrent("ifocus_btn","ifocus_tx",0)}if(B==2&&C==3){moveElement("ifocus_piclist",0,0,5);classNormal("ifocus_btn","ifocus_tx");classCurrent("ifocus_btn","ifocus_tx",0)}}addLoadEvent(iFocusChange)

//总排行页切换
function tab(listpid,nodepid,id){
	$('#'+listpid+' >li').removeClass();
	$('#'+nodepid+' >ul').css('display','none');
	$('#'+listpid+ '>li').eq(id-1).addClass('hover');
	$('#'+nodepid+' >ul').eq(id-1).css('display','block');
}

//书库排行切换
function listTab(list,head){
	$('#list1 >div').removeClass();
	$('#list1 >div').addClass('list4');
	$('#'+head).removeClass();
	$('#'+head).addClass('list3');
	$('#divStrong >span').css('display','none');
	$('#'+list).css('display','block');
}

//分类封推
var myid=2;
function onchageid(pram){
	if(pram!=null&&pram!=0){
		myid=pram;
		doClick_jy();
	}
}
function doClick_jy(){
	document.getElementById("jy"+myid).className="Contiguous etn";
	var j;
	var id;
	var e;
	for(var i=1;i<=4;i++){
		id ="jy"+i;
		j = document.getElementById(id);
		e = document.getElementById("jy_con"+i);
		if(id != "jy"+myid){
			j.className="jstxtbox etn";
			e.style.display = "none";
		}else{	
			e.style.display = "block";
		}
	}
	myid++;
	if(myid>4){
		myid=1;	
	}
}
function TabList(){
  setInterval(doClick_jy,4000)//时间//;
}
var myid1=0;
function onchageid1(pram){
	if(pram!=null){
		myid1=pram;
		doClick_jy1();
	}
}
function doClick_jy1(){
	document.getElementById("jy"+myid).className="on";
	var j;
	var id;
	var e;
	for(var i=0;i<=3;i++){
		id ="jy"+i;
		j = document.getElementById(id);
		e = document.getElementById("jy_con"+i);
		if(id != "jy"+myid1){
			j.className="";
			e.style.display = "none";
		}else{	
			e.style.display = "block";
			j.className="on";
		}
	}
	myid1++;
	if(myid1>3){
		myid1=0;	
	}
}
function TabList1(){
  setInterval(doClick_jy1,5000)//时间//;
}

//简介显示隐藏
function doShrink(F, C) {
    if (F) {
        var B = (F.clientHeight || F.offsetHeight);
        if (B > C) {
            var D = document.createElement("a");
            var E = document.createElement("div");
            E.id = "morediv" + F.id;
            E.className = "wb_more";
            text = document.createTextNode("[\u70b9\u51fb\u67e5\u770b\u66f4\u591a\u5185\u5bb9]");
            D.href = "javascript:void(0)";
            D.onclick = function(G) {
                shrinkShow(this, F, C)
            };
            D.appendChild(text);
            E.appendChild(D);
            var A = F.nextSibling;
            if (A) {
                F.parentNode.insertBefore(E, A)
            } else {
                F.parentNode.appendChild(E)
            }
            F.srcHeight = B;
            F.style.cssText = "overflow-y: hidden; max-height: " + C + "px; *_height: " + C + "px; "
        }
    }
}
var shrinkInterval = false;
function shrinkShow(C, F, B) {
    var E = C.parentNode;
    var D = E.previousSibling;
    shrinkInterval = window.setInterval(function() {
        shrinkStep(D)
    },
    10);
    var A = "<A href=\"javascript:void(0)\" onclick=\"shoudoShrink(document.getElementById('" + F.id + "')," + B + ")\">[\u6536\u8d77\u5185\u5bb9]</A>";
    document.getElementById("morediv" + F.id).innerHTML = A;
    if (objectexist("articledescandeit")) {
        if (document.getElementById("articledescandeit").parentNode.className == "sy_nr02_right") {
            document.getElementById("articledescandeit").style.height = "auto"
        }
    }
}
function shrinkStep(C) {
    var A = C.srcHeight;
    var B = (C.clientHeight || C.offsetHeight);
    if (B < A) {
        C.style.height = B + 20 + "px";
        C.style.maxHeight = B + 20 + "px"
    } else {
        if (shrinkInterval) {
            window.clearInterval(shrinkInterval);
            shrinkInterval = false
        }
    }
}
function shoudoShrink(D, C) {
    if (D) {
        var B = (D.clientHeight || D.offsetHeight);
        if (B > C) {
            var A = "<A href=\"javascript:void(0)\" onclick=\"shrinkShow(this,document.getElementById('" + D.id + "')," + C + ")\">[\u70b9\u51fb\u67e5\u770b\u66f4\u591a\u5185\u5bb9]</A>";
            document.getElementById("morediv" + D.id).innerHTML = A;
            D.srcHeight = B;
            D.style.cssText = "overflow-y: hidden; max-height: " + C + "px; *_height: " + C + "px; "
        }
    }
    if (objectexist("articledescandeit")) {
        if (document.getElementById("articledescandeit").parentNode.className == "sy_nr02_right") {
            document.getElementById("articledescandeit").style.height = "200px"
        }
    }
}
function objectexist(B) {
    var A = document.getElementById(B);
    if (A) {
        return true
    } else {
        return false
    }
}

//搜索切换
function SearchTab(m,n){
	var tli=document.getElementById("menu").getElementsByTagName("span"); /*获取选项卡的span对象*/
	for(i=0;i<tli.length;i++){
		tli[i].className=i==n?"hover":""; /*更改选项卡的LI对象的样式，如果是选定的项则使用.hover样式*/
	}
	if(n==0){
		document.getElementById("searchtype").value="novelname";
	}else if(n==1){
		document.getElementById("searchtype").value="novelname";
	}else if(n==2){
		document.getElementById("searchtype").value="author";
	}
}

//打开弹出框
function OpenTipsWindow(type, var1, var2){
	if(type=="login"){
		title = "登录";
		url = "http://www.qingkan.net/template/default/script/user.php?action=loginframe";
	}else if(type=="mark"){
		title = "书架";
		url = "user.php?action=markadd&novelid="+var1+"&chapterid="+var2;
	}else if(type=="star"){
		title = "评分";
		url = "user.php?action=star&novelid="+var1;
	}else if(type=="vote"){
		title = "推荐";
		url = "user.php?action=vote&novelid="+var1;
	}else if(type=="reward"){
		title = "打赏";
		url = "user.php?action=reward&novelid="+var1;
	}else{
		alert("参数错误");
		parent.location.reload();
		return false;
	}
	$.XYTipsWindow({
		___title:title,
		___content:"iframe:http://"+PTNovelHostName+"/"+url,
		___width:"620",
		___height:"350",
		___boxBdOpacity:"0.2",
		___boxBdColor:"#000",
		___boxWrapBdColor:"#ababab",
		___drag:"___boxTitle",
		___showbg:true
	});
}
//关闭弹出框
function CloseTipsWindow(){
	parent.$.XYTipsWindow.removeBox();
}

//推荐
function Vote(novelid) {
    if(PTLoginStatus == 1){
		OpenTipsWindow('vote',novelid,0);
    } else {
		OpenTipsWindow('login',0,0);
	}
}
//打赏
function Reward(novelid) {
    if(PTLoginStatus == 1){
		OpenTipsWindow('reward',novelid,0);
    } else {
		OpenTipsWindow('login',0,0);
	}
}
//评分
function Star(novelid) {
    if(PTLoginStatus == 1){
		OpenTipsWindow('star',novelid,0);
    } else {
		OpenTipsWindow('login',0,0);
	}
}
//书签
function AddMark(novelid,chapterid) {
    if(PTLoginStatus == 1){
		OpenTipsWindow('mark',novelid,chapterid);
    } else {
		OpenTipsWindow('login',0,0);
	}
}

//获取最后阅读
function getLastRead()
{
	$.ajax({
        url: "http://"+PTNovelHostName+"/ajax.php?action=readhistory",
		type: 'get',
        success : function(data){
			$("#outputhtml").html(data);
		}
	});
}

//获取刷新评论
function GetComment(novelid)
{
	$.ajax({
		url: "http://"+PTNovelHostName+"/ajax.php?action=getcomment&type=novel&typeid="+novelid+"&refresh="+Math.random(),
		type: 'get',
		success : function(data){
			$("#ajax_comment").html(data);
		}
	});
}
//获取刷新打赏
function GetReward(novelid)
{
	$.ajax({
		url: "http://"+PTNovelHostName+"/ajax.php?action=getreward&novelid="+novelid+"&refresh="+Math.random(),
		type: 'get',
		success : function(data){
			$("#ajax_reward").html(data);
		}
	});
}
//获取刷新推荐
function GetVote(novelid)
{
	$.ajax({
		url: "http://"+PTNovelHostName+"/ajax.php?action=getvote&novelid="+novelid+"&refresh="+Math.random(),
		type: 'get',
		success : function(data){
			$("#ajax_vote").html(data);
		}
	});
}
//获取刷新评分
function GetStar(novelid)
{
	$.ajax({
		url: "http://"+PTNovelHostName+"/ajax.php?action=getstar&novelid="+novelid+"&refresh="+Math.random(),
		type: 'get',
		success : function(data){
			$("#ajax_star").html(data);
		}
	});
}
//进行评分操作
function dostar(novelid,starnum)
{
	document.getElementById("wfpf_cont").style.display="none";
	if(PTLoginStatus == 1){
		$.get("http://"+PTNovelHostName+"/ajax.php", { action:"star",novelid:novelid,score:starnum },
		function(data){
			if (data=="nologin"){
				OpenTipsWindow('login',0,0);
			}else if(data=="nopermission"){
				alert("您所在的用户组没有评分权限！");
			}else if(data=="needrest"){
				alert("您今天已经对该书进行过评分！");
			}else if(data=="nostarnum"){
				alert("您今天的评分机会已经用完！");
			}else if(data=="errorscore"){
				alert("您填写的分数错误！");
			}else if(data=="errornovelid"){
				alert("您要评分的小说不存在或未通过审核！");
			}else if(data=="error"){
				alert("您的评分失败了！");
			}else{
				var ret=new Array();
				ret=data.split(",||,");
				if(ret[2]=="success"){
					alert("您的评分成功了！");
					GetStar(novelid);
					LoadData(novelid);
				}else{
					alert("您的评分失败了！");
				}
			}
		});
	} else {
		OpenTipsWindow('login',0,0);
	}
}