//获取刷新数据
function LoadData(novelid)
{
	$.ajax({
        url: "http://"+PTNovelHostName+"/ajax.php?action=noveldata",
		type: "get",
        dataType: "json",
        data: {novelid:novelid,refresh:Math.random()},
        complete: function(){
			$("#dataload").hide();
		},
        error: function(){
			alert("error");
		},
        success: function(data){
			$("#novelid").html(data.novelid);
			$("#allvisit").html(data.allvisit);
			$("#monthvisit").html(data.monthvisit);
			$("#weekvisit").html(data.weekvisit);
			$("#dayvisit").html(data.dayvisit);
			$("#allvote").html(data.allvote);
			$("#monthvote").html(data.monthvote);
			$("#weekvote").html(data.weekvote);
			$("#dayvote").html(data.dayvote);
			$("#alldown").html(data.alldown);
			$("#monthdown").html(data.monthdown);
			$("#weekdown").html(data.weekdown);
			$("#daydown").html(data.daydown);
			$("#allsale").html(data.allsale);
			$("#monthsale").html(data.monthsale);
			$("#weeksale").html(data.weeksale);
			$("#daysale").html(data.daysale);
			$("#visitnum").html(data.visitnum);
			$("#votenum").html(data.votenum);
			$("#marknum").html(data.marknum);
			$("#sharenum").html(data.sharenum);
			$("#searchnum").html(data.searchnum);
			$("#commentnum").html(data.commentnum);
			$("#goodnum").html(data.goodnum);
			$("#badnum").html(data.badnum);
			$("#giftnum").html(data.giftnum);
			$("#rewardnum").html(data.rewardnum);
			$("#starnum").html(data.starnum);
			$("#reward").html(data.reward);
			$("#star").html(data.star);
		}
	});
}