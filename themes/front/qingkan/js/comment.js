//顶踩操作
function commentactive(commentid, active){
	commentlog ='comment|'+PTNovelUserAjax;
	logstr = decodeURI(get_cookie_value(commentlog));
	updownlog = logstr.indexOf("|"+commentid+"|");
	if (updownlog>-1){
		alert("您已经投过票了！");
		return false;
	}
	$.ajax({
		type: "POST",
		url: "http://"+PTNovelHostName+"/ajax.php?action=commentupdown&active="+active,
		data: "commentid="+commentid,
		error:function(){alert("投票失败！");},
		success: function(msg){
			if(msg=="nologin"){
				OpenTipsWindow('login',0,0);
				return false;
			}else if(msg=="erroractive"){
				alert("投票操作错误！");
			}else if(msg=="errortype"){
				alert("投票模式错误！");
			}else if(msg=="errorcommentid"){
				alert("你要投票的评论不存在！");
			}else if(msg=="needrest"){
				alert("您已经投过票了！");
			}else if(msg=="error"){
				alert("投票失败，请您联系管理员！");
			}else{
				var ret=new Array();
				ret=msg.split(",||,");
				if(ret[2]=="success"){
				   alert("恭喜您，投票成功！")
				   $("#"+active+"_num"+ret[0]).html("<b>(" + ret[1] +")</b>");
				}else{
					alert("投票失败，请您联系管理员！");
				}
			}
		}
	});
}
//顶
function commentup(commentid){
	commentactive(commentid, 'up');
}
//踩
function commentdown(commentid){
	commentactive(commentid, 'down');
}

//统计输入字数
$(document).ready(function(){
	$("#xz_txt").keyup(function(){
		var pa = $(this).val().length;
		var nums = 500 - pa;
		$("#info").html("您还可以输入<b style='color:red;'>" + nums + "</b>个字符！");
		if (xz_txt.value.length>= 500){
			xz_txt.value=xz_txt.value.substring(0,500);
			$("#info").html("您还可以输入<b style='color:red;'>0</b>个字符！");
			alert( "字符输入已满！");
		}
	});
});

//发布评论
function postdata(){
	var title = $("#xz_title").val();
	var content = $("#xz_txt").val();
	var titlelength=0;
	var contentlength=0;
	for(var i=0;i<title.length;i++){
		var intCode=title.charCodeAt(i);
		if(intCode>=0&&intCode<=128){
			titlelength += 1; //非中文单个字符长度加 1
		}
		else{
			titlelength += 2; //中文字符长度则加 2
		}
	}
	for(var i=0;i<content.length;i++){
		var intCode=content.charCodeAt(i);
		if(intCode>=0&&intCode<=128){
			contentlength += 1; //非中文单个字符长度加 1
		}
		else{
			contentlength += 2; //中文字符长度则加 2
		}
	}
	if (titlelength<1){
		alert('标题不能为空！');
		return false;
	}
	if (titlelength>100){
		alert('标题过长，请不要超过50个字！');
		return false;
	}
	if (contentlength<1){
		alert('内容不能为空！');
		return false;
	}
	if (contentlength>1000){
		alert('内容过长，请不要超过500个字！');
		return false;
	}
	if(PTLoginStatus == 1){
		$.ajax({
			type: "POST",
			url: "http://"+PTNovelHostName+"/ajax.php?action=commentpost",
			data: "type="+$("#type").val()+"&title="+title+"&content="+content+"&typeid="+$("#typeid").val(),
			error:function(){alert("评论失败！");},
			success: function(msg){
				if(msg=="nologin"){
					OpenTipsWindow('login',0,0);
					return false;
				}else if(msg=="nopermission"){
					alert("您所在的用户组没有评论权限！");
				}else if(msg=="nocommentnum"){
					alert("您今天的评论次数已达上限！");
				}else if(msg=="errortype"){
					alert("评论模式错误！");
				}else if(msg=="errortypeid"){
					alert("你要评论的小说不存在！");
				}else if(msg=="notitle"){
					alert("标题不能为空！");
				}else if(msg=="longtitle"){
					alert("标题过长，请不要超过50个字！");
				}else if(msg=="nocontent"){
					alert("内容不能为空！");
				}else if(msg=="longcontent"){
					alert("内容过长，请不要超过500个字！");
				}else if(msg=="error"){
					alert("评论失败，请您联系管理员！");
				}else{
					var ret=new Array();
					ret=msg.split(",||,");
					if(ret[2]=="success"){
						document.getElementById("xz_title").value ="";
						document.getElementById("xz_txt").value ="";
						$("#add").after(ret[0]);
						$("#commentnum").html(ret[1]);
					}else{
						alert("评论失败，请您联系管理员！");
					}
				}
			}
		});
	} else {
		OpenTipsWindow('login',0,0);
	}
}

//插入表情
function Insert(tag) {
	var myField;
    if (document.getElementById('xz_txt') && document.getElementById('xz_txt').type == 'textarea') {
		myField = document.getElementById('xz_txt');
	} else {
		return false;
	}
	if (document.selection) {
		myField.focus();
		sel = document.selection.createRange();
		sel.text = tag;
		myField.focus();
	}
	else if (myField.selectionStart || myField.selectionStart == '0') {
		var startPos = myField.selectionStart;
		var endPos = myField.selectionEnd;
		var cursorPos = endPos;
		myField.value = myField.value.substring(0, startPos) + tag + myField.value.substring(endPos, myField.value.length);
		cursorPos += tag.length;
		myField.focus();
		myField.selectionStart = cursorPos;
		myField.selectionEnd = cursorPos;
	}
	else {
		myField.value += tag;
		myField.focus();
	}
}