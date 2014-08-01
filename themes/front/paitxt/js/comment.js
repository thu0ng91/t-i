$(function(){
		var $userName = $("#userName");
		var $conBox = $("#conBox");
		var $sendBtn = $("#sendBtn");
		var ie = jQuery.support.htmlSerialize;//如果浏览器通过innerHTML插入链接元素的时候会序列化这些链接，则返回true，目前IE中返回false。
		var str = 0;
		var abcnum = 0;
		var maxNum = 280;
		var texts = 0;
		$conBox.val("");
		$userName.val("");
		//文本框获取焦点
		$("#userName,#conBox").focus(function(){
			$(this).addClass("active");
		})
		$("#userName,#conBox").blur(function(){
			$(this).removeClass("active");
		})

		//文本框字数计算和提示改变   标准浏览器用oninput,而IE则使用onpropertychange ，这两个事件的发生条件，是文本框的值发生改变。
		if(ie){
			$conBox[0].oninput = changeNum;
		}else{
			$conBox[0].onpropertychange  = changeNum;
		}
		function changeNum(){
			//汉字的个数
			str = ($conBox.val().replace(/\w/g,"")).length;
			//非汉字的个数
			abcnum = $conBox.val().length-str;
			var total = str*2+abcnum;
			if(total < maxNum || total == maxNum){
				texts =Math.ceil((maxNum - (str*2+abcnum))/2);
				$(".tr span").html("<span class='coutTxt'>还能输入</span><strong class='maxNum'>" + texts + "</strong><span>个字</span>");
				$sendBtn.attr("disabled",false);
			}
			else if(total > maxNum){
				texts =Math.ceil(((str*2+abcnum)-maxNum)/2);
				$(".tr span").html("<span class='coutTxt'>您输入的字数超过了</span><strong class='maxNum colorF00'>" + texts + "</strong><span>个字</span>");
				$sendBtn.attr("disabled",true);
			}
			
		}
			
			//格式化时间, 如果为一位数时补0
			function format(str){return str.toString().replace(/^(\d)$/,"0$1")}
			//发送广播
			$sendBtn.click(function(){
				
				//var oLi = document.createElement("li");
				var oLi=$("<li></li>");
				var imgSrc = $("#face img").attr("src");
				var oDate = new Date();
				oLi.html("<div class='userPic'><img src='" + imgSrc + "'/></div><div class='content'><div class='userName'><a href='javascript:void(0);'>" + $userName.val() + "</a>:</div><div class='msgInfo'>" + $conBox.val() + "</div><div class='times'><span>" + format((oDate.getMonth() + 1)) + "月" + format(oDate.getDate()) + "日 " + format(oDate.getHours()) + ":" + format(oDate.getMinutes()) + "</span><a class='del' href='javascript:void(0);'>删除</a></div></div>");
				$conBox.val('');
				if($(".list ul li").length == 0){
					$(".list ul").append(oLi);
				}else{
					$(".list ul li:eq(0)").before(oLi);
				}
				//li鼠标滑过样式
				$(".list ul li").mousemove(function(){
					$(this).find(".times a.del").show();
				//	$(this).find(".times a").text("删除");
				})
				$(".list ul li").mouseleave(function(){
					$(".list ul li").find(".times a").hide();
				})
				//删除
				$(".del").click(function(){
					$(this).parents("li").remove();
				})
			})
				
		})
//1、css3样式，目前ie浏览器不支持css3，pie.htc文件可使ie兼容css3; 
//2、js效果：文本框、头像获取焦点  文本框字数限制和提示改变  动态添加内容
