﻿function changeNum(){
	var conBox = $("#conBox").val();
	var str = 0;
	var abcnum = 0;
	var maxNum = 280;
	var texts = 0;
	//汉字的个数
	str = (conBox.replace(/\w/g,"")).length;
	//非汉字的个数
	abcnum = conBox.length-str;
	var total = str*2+abcnum;
	if(total < maxNum || total == maxNum){
		texts =Math.ceil((maxNum - (str*2+abcnum))/2);
		$(".tr span").html("<span class='coutTxt'>还能输入</span><strong class='maxNum'>" + texts + "</strong><span>个字</span>");
		$("#sendBtn").attr("disabled",false);
	}
	else if(total > maxNum){
		texts =Math.ceil(((str*2+abcnum)-maxNum)/2);
		$(".tr span").html("<span class='coutTxt'>您输入的字数超过了</span><strong class='maxNum colorF00'>" + texts + "</strong><span>个字</span>");
		$("#sendBtn").attr("disabled",true);
	}
	
}

$(function(){
		

		//文本框获取焦点
		$("#conBox").focus(function(){
			$(this).addClass("active");
		})
		$("#conBox").blur(function(){
			$(this).removeClass("active");
		})
		
		
			
			//格式化时间, 如果为一位数时补0
			function format(str){return str.toString().replace(/^(\d)$/,"0$1")}
			//发送广播
			$("#sendBtn").click(function(){
				var userName = $("#userName").val();
				if(userName == "Guest"){
					alert('请先登录');return;
				}
				var conBox = $("#conBox").val();
				//var oLi = document.createElement("li");
				var oLi=$("<li></li>");
				var imgSrc = $("#user_avatar").attr("src");
				var oDate = new Date();
				oLi.html("<div class='userPic'><img src='" + imgSrc + "'/></div><div class='content' style='text-align:left'><div class='userName'>" + userName + ":</div><div class='msgInfo'>" + conBox + "</div><div class='times'><span>" + format((oDate.getMonth() + 1)) + "月" + format(oDate.getDate()) + "日 " + format(oDate.getHours()) + ":" + format(oDate.getMinutes()) + "</span></div></div>");
				
				var maxNum = 140;
				$(".tr span").html("<span class='coutTxt'>还能输入</span><strong class='maxNum'>" + maxNum + "</strong><span>个字</span>");
				if($(".list ul li").length == 0){
					$(".list ul").append(oLi);
				}else{
					$(".list ul li:eq(0)").before(oLi);
				}
				//li鼠标滑过样式
				$(".list ul li").mousemove(function(){
					$(this).find(".times a.del").show();
				})
				$(".list ul li").mouseleave(function(){
					$(".list ul li").find(".times a").hide();
				});
				var bookid = $("#bookid").val();
				
				$.post('/book/commend/ajaxsubmitcommend/bookid/' + bookid,{content:conBox},function(data){
					alert(data);
				});
				$("#conBox").val("");
			})
				
		});

//1、css3样式，目前ie浏览器不支持css3，pie.htc文件可使ie兼容css3; 
//2、js效果：文本框、头像获取焦点  文本框字数限制和提示改变  动态添加内容
