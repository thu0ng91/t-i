
$(function(){
	function topbananer(){
		var autoPlay,
			timer=2000,
			boxNum=$("#autoid a").length,
			doPlay;
		doPlay=function(){
			var index=parseInt(boxNum * Math.random());
			$("#autoid a").eq(index).addClass("cur").siblings().removeClass("cur");
		};
		autoPlay=setInterval(doPlay,timer);

		$("#autoid a").hover(function(){
			clearInterval(autoPlay);
			$(this).addClass("cur").siblings().removeClass("cur");
		},function(){
			autoPlay=setInterval(doPlay,timer);
		});
	}
	topbananer();


	
	$("#recently_btn").live('click',function(){
		if($("#recently_id").attr('class')=='recently_read'){
			$("#recently_id").attr('class','recently_read moreed');
		}else{
			$("#recently_id").attr('class','recently_read');
		}
	  });

	clicktabs("#tabsone li","#consone>ul","cur");
	clicktabs(".tittwo li",".olwrap>ol","cur");
	clicktabs("#tabstwo li","#constwo>div","cur");
	clicktabs("#tabsthree li","#consthree>ul","cur");
	clicktabs("#tabszxsb li","#conszxsb>ul","cur");

	

	function getmygame_all(){
		var myhsgames = ordergame(gethsgames()),
		hscontent = new Array();
		for (var i in myhsgames) {
			
				hscontent.push('<li><span class="r_spanone"><a href="' + myhsgames[i][1] + '">' + myhsgames[i][0] + '</a></span><span class="r_spantwo">最近观看时间：' + myhsgames[i][5] + '</span><span class="r_spanthree">看到：' + myhsgames[i][2] + '</span><span class="r_spanfour"><a href="' + myhsgames[i][3] + '">接着阅读</a></span><span class="dxx"></span></li>');
		}
		hscontent = hscontent.join('');
		if (hscontent) {
			$("#recbigbox").html('<div class="r_tline"></div><div class="recently_read"  id="recently_id"><h5>我最近看的</h5><div class="recently_list"><ul>' + hscontent + '</ul></div></div><div class="r_bline"></div>');
		}
	}

	$(".dxx").live('click',function(){
		var tp = $(this),
			c = window.localStorage ? localStorage.getItem('gvalues') : UserData.getItem('gvalues'),
		txt = tp.parent().find('.r_spanone').text(),
		reg = new RegExp("\\|{3}" + txt + "(?!\\|{3})"),
		cook_now = c.replace(reg, '');
		window.localStorage ? localStorage.setItem('gvalues', cook_now) : UserData.setItem('gvalues', cook_now);
		tp.parent().remove();
		getmygame_all();
	});

	getmygame_all();
	if($("#recently_id li").length>3){
		$("#recently_id").append('<span id="recently_btn" class="recently_more"></span>');
	}
	

});
