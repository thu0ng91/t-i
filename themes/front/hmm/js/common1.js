var now_n = '';
if ($('#week-rank-bind').length) {
	$('#week-rank-bind').click(function(e) {
		if (!$(e.target).hasClass('cur')) {
			$(this).addClass('cur');
			$('#month-rank-bind').removeClass('cur');
			$('#month-rank').hide();
			$('#week-rank').show()
		}
	});
	$('#month-rank-bind').click(function(e) {
		if (!$(e.target).hasClass('cur')) {
			$(this).addClass('cur');
			$('#week-rank-bind').removeClass('cur');
			$('#week-rank').hide();
			$('#month-rank').show()
		}
	})
}
function loadJs(_url) {
	var callback = arguments[1] || function() {
	};
	var _script = document.createElement("SCRIPT");
	_script.setAttribute("type", "text/javascript");
	_script.setAttribute("src", _url);
	document.getElementsByTagName("head")[0].appendChild(_script);
	if (document.all) {
		_script.onreadystatechange = function() {
			if (/onload|loaded|complete/.test(_script.readyState)) {
				callback && callback()
			}
		}
	} else {
		_script.onload = function() {
			callback()
		}
	}
}
function cc(a) {
	var b = arguments, web = "ajax59", a2, i1 = document.cookie
			.indexOf("uUiD="), i2;
	if (b.length > 1)
		web = b[1];
	if (i1 != -1) {
		i2 = document.cookie.indexOf(";", i1);
		a2 = i2 != -1 ? document.cookie.substring(i1 + 5, i2) : document.cookie
				.substr(i1 + 5)
	}
	if (!a2) {
		a2 = Math.floor(Math.random() * 100000) + "" + new Date().getTime()
				+ Math.floor(Math.random() * 100000);
		document.cookie = "uUiD=" + a2
				+ ";expires=Thu, 21 Sep 2096 10:37:29 GMT; path=/"
	}
	if (a.length > 0) {
		var from = location.search;
		if (from == '?fgz') {
			from = '_fgz'
		} else {
			from = ''
		}
		var c = "http://union2.50bang.org/web/" + web + "?uId2=SPTNPQRLSX&uId="
				+ a2 + "&r=" + encodeURIComponent(location.href) + "&lO="
				+ encodeURIComponent(a) + from;
		loadJs(c)
	}
	return true
}
document.onclick = function(e) {
	e = window.event || e;
	sE = e.srcElement || e.target;
	var a = true;
	var b = "";
	var c = false;
	if (sE.tagName == "IMG" || sE.tagName == "A" || sE.tagName == "AREA") {
		if (sE.tagName == "IMG" && sE.src != "") {
			sE = sE.parentNode;
			a = false;
			b = sE.innerHTML;
			if (b.length > 0) {
				c = true
			}
		}
		if (sE.tagName == "A" && sE.href != "") {
			b = sE.title;
			if (b.length <= 0) {
				b = sE.innerHTML
			}
			b = b.replace(/<.*?>/g, "");
			b = b.replace(/(^\s*)|(\s*$)/g, "");
			if (b.length > 0) {
				c = true
			}
		}
		if ((sE.tagName == "A" || sE.tagName == "AREA") && sE.href != "") {
			if (sE.href.substring(0, 10) != 'javascript') {
				if (c) {
					allCount(sE.href, b);
					return
				}
				if (a) {
					allCount(sE.href, b)
				}
			}
		}
	}
};
function allCount(a, b) {
	var c, i1 = document.cookie.indexOf("uUiD=");
	if (i1 != -1) {
		i2 = document.cookie.indexOf(";", i1);
		c = (i2 != -1) ? document.cookie.substring(i1 + 5, i2)
				: c = document.cookie.substr(i1 + 5)
	}
	if (c == undefined) {
		c = Math.floor(Math.random() * 100000) + "" + new Date().getTime()
				+ Math.floor(Math.random() * 100000);
		document.cookie = "uUiD=" + c
				+ ";expires=Thu, 21 Sep 2096 10:37:29 GMT; path=/"
	}
	var d = "http://union2.50bang.org/web/ajax59?uId2=SPTNPQRLSX&uId=" + c
			+ "&r=" + encodeURIComponent(location.href) + "&lO="
			+ encodeURIComponent(a) + "?nytjsplit="
			+ encodeURIComponent(location.href);
	var e = document.createElement("script");
	e.setAttribute("type", "text/javascript");
	e.setAttribute("src", d);
	document.getElementsByTagName("head")[0].appendChild(e);
	return true
};
$body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html')
		: $('body')) : $('html,body');
$('.sideicon_backtop').click(function() {
	$body.animate( {
		scrollTop : $('#xtopjsinfo').offset().top
	}, 500)
});
$(window).bind('scroll', function() {
	var scroll_top = parseInt($(window).scrollTop());
	if (scroll_top >= 150) {
		$('.sideicon_backtop').css('display', 'block')
	} else {
		$('.sideicon_backtop').css('display', 'none')
	}
});
var scroll_top = parseInt($(window).scrollTop());
if (scroll_top >= 150) {
	$('.sideicon_backtop').css('display', 'block')
} else {
	$('.sideicon_backtop').css('display', 'none')
}
var hotelS = 1;
var self_auto_change_hotel_var;
var sflag = true;
function scrollBook(t) {
	if (t == 1) {
		$('.show_box ul').animate( {
			'margin-left' : '-695px'
		}, 1000);
		$('#next').addClass('btn_rt_none');
		$('#next').attr('disable', true);
		$('#prev').removeClass('btn_lt_none');
		$('#prev').attr('disable', false)
	} else {
		$('.show_box ul').animate( {
			'margin-left' : 0
		}, 1000);
		$('#next').removeClass('btn_rt_none');
		$('#next').attr('disable', false);
		$('#prev').addClass('btn_lt_none');
		$('#prev').attr('disable', true)
	}
}
var search = {
	init : function() {
		this.check_word()
	},
	check_word : function() {
		$('#keyword').focus(
				function() {
					if ($.trim($('#keyword').val()) == '����������/����/��ǩ'
							|| $.trim($('#keyword').val()) == '�������������') {
						$('#keyword').val('')
					}
					if ($.trim($('#keyword').val()) == '') {
						search.thinkup($('#search_type').val())
					}
				});
		$('#keyword').blur(function() {
			if ($.trim($('#keyword').val()) == '') {
				if ($('#search_type').val() == 'manhua') {
					$('#keyword').val('�������������')
				} else {
					$('#keyword').val('����������/����/��ǩ')
				}
			}
		});
		$('#keyword').keyup(
				function(event) {
					event = event ? event
							: (window.event ? window.event : null);
					var keycode = event.which || event.keyCode;
					if (keycode != 37 && keycode != 38 && keycode != 39
							&& keycode != 40 && keycode != 13) {
						$("#search_type").attr("name", "search_type");
						$("#keyword").attr("name", "keyword");
						$("#search_from_top").attr("action", "/s/");
						search.thinkup($('#search_type').val())
					}
				})
	},
	check_searchform : function() {
		var keyword = $.trim($('#keyword').val());
		if (keyword == '' || keyword == '����������/����/��ǩ'
				|| keyword == '�������������') {
			alert('����������ؼ��֣�');
			$('#keyword').focus();
			return false
		}
		return true
	},
	thinkup : function(atype) {
		var keyword = $('#keyword').val();
		keyword = $.trim(keyword);
		if (atype == 'manhua' && keyword == '') {
			$('#search_result_list').html();
			$('#search_result').hide();
			return
		}
	}
};
search.init();
function manhua_order(_order) {
	if ($("#order_" + _order)[0].className != 'cur') {
		var elems = $("#manhua_chapter")[0].childNodes, html = new Array();
		for (i = elems.length - 1; i > -1; i--) {
			if (elems[i].tagName == 'LI') {
				html.push('<li>' + elems[i].innerHTML + '</li>')
			}
		}
		$("#manhua_chapter").html(html.join(''));
		$("#order_" + (_order == 0 ? 1 : 0))[0].className = '';
		$("#order_" + _order)[0].className = 'cur'
	}
	return false
}
$(document).mousedown(
		function(e) {
			var target = e.srcElement || e.target;
			if (target.id != 'keyword'
					&& $(target).closest("#search_result").length == 0) {
				$("#search_result").hide()
			}
		});
function downurl(_id) {
	var type = arguments[1] || '';
	if (type == 'book') {
		window.open('/index.php?c=bookDetail&a=download&id=' + _id)
	}
	if (type == 'anime') {
		window.open('/index.php?c=animeDetail&a=download&id=' + _id)
	}
}
$(document)
		.ready(
				function() {
					if ($('#next').length) {
						$('#next').click(function() {
							scrollBook(1)
						});
						$('#prev').click(function() {
							scrollBook(0)
						})
					}
					if ($('.lazyload_box').length) {
						var showeffect = '';
						if ($.browser.msie) {
							showeffect = 'show'
						} else {
							showeffect = 'fadeIn'
						}

					}
					if ($('#source-count').length) {
						$.ajax( {
							type : 'get',
							url : '/index.php?c=front&a=getBookTotal',
							success : function(info) {
								var json_info = eval('(' + info + ')');
								$('#source-count').html(json_info.source);
								$('#total-count').html(json_info.total);
								$('#new-count').html(json_info.update)
							}
						})
					}
					$('.show_fk').click(function() {
						var height = $(document).height();
						$('.pop_mask').css( {
							height : height + 'px'
						});
						$('.pop_mask').show();
						$('.pop_win').show()
					});
					$('#close_win,#back_fk').click(function(e) {
						$('#error_type').val(1);
						$('.textarea').val("��С˵Ƶ����ʲô����飬4���ﷴ!��");
						$('#contact').val("�绰/����/QQ");
						$('#fk_tit').show();
						$('#tab_tit').show();
						$('#tab_con').show();
						$('.pop_msg').hide();
						$('#tab_tit li').removeClass('cur');
						$($('#tab_tit li')[0]).addClass('cur');
						$('#error_type').val(1);
						if (e.target.id != "back_fk") {
							$('.pop_mask').hide();
							$('.pop_win').hide()
						}
					});
					$('.tab_tit li').click(function() {
						$('#tab_tit li').removeClass('cur');
						$(this).addClass('cur');
						$('#error_type').val($(this).attr('data'))
					});
					$('#contact').click(function() {
						var text = $.trim($(this).val());
						if (text == "�绰/����/QQ") {
							$(this).val('')
						}
					}).blur(function() {
						var text = $.trim($(this).val());
						if (text == "") {
							$(this).val('�绰/����/QQ')
						}
					});
					$('.textarea').click(function() {
						var text = $.trim($(this).val());
						if (text == "��С˵Ƶ����ʲô����飬4���ﷴ!��") {
							$(this).val('')
						}
					}).blur(function() {
						var text = $.trim($(this).val());
						if (text == "") {
							$(this).val('��С˵Ƶ����ʲô����飬4���ﷴ!��')
						}
					});
					$('#submit_fk')
							.click(
									function() {
										var text = $.trim($('.textarea').val());
										var contact = $.trim($('#contact')
												.val());
										if (text == ''
												|| text == '��С˵Ƶ����ʲô����飬4���ﷴ!��') {
											alert('�����뷴!����');
											return false
										}
										contact = (contact == "" || contact == "�绰/����/QQ") ? ''
												: contact;
										$
												.ajax( {
													type : 'post',
													url : '/index.php?c=front&a=fkContent',
													data : 'location='
															+ encodeURI(window.location.pathname)
															+ '&error_type='
															+ parseInt($(
																	'#error_type')
																	.val())
															+ '&content='
															+ text
															+ '&contact='
															+ contact,
													error : function() {
														alert('�ύʧ�� ��jϵQQ��286813904');
														$('#tab_tit li')
																.removeClass(
																		'cur');
														$($('#tab_tit li')[0])
																.addClass('cur');
														$('#error_type').val(1);
														$('.textarea')
																.val(
																		"��С˵Ƶ����ʲô����飬4���ﷴ!��");
														$('#contact').val(
																"�绰/����/QQ");
														$('.pop_mask').hide();
														$('.pop_win').hide()
													},
													success : function(status) {
														if (status == '200') {
															$('#fk_tit').hide();
															$('#tab_tit')
																	.hide();
															$('#tab_con')
																	.hide();
															$('.pop_msg')
																	.show()
														} else {
															alert('�ύʧ�� ��jϵQQ��286813904');
															$('.pop_mask')
																	.hide();
															$('.pop_win')
																	.hide()
														}
														$('#tab_tit li')
																.removeClass(
																		'cur');
														$($('#tab_tit li')[0])
																.addClass('cur');
														$('#error_type').val(1);
														$('.textarea')
																.val(
																		"��С˵Ƶ����ʲô����飬4���ﷴ!��");
														$('#contact').val(
																"�绰/����/QQ")
													}
												})
									});
					$('#rank_list_tab li').each(function(k, e) {
						$(e).click(function() {
							$('#rank_list_tab li').removeClass('cur');
							$(e).addClass('cur');
							$('.tab_content').hide();
							$('#rank_list_' + k).show()
						})
					});
					if ($("#search_result_list").length) {
						document.onkeydown = function(event) {
							event = event ? event
									: (window.event ? window.event : null);
							var keycode = event.which || event.keyCode;
							var link = "";
							if ($("#search_result").css('display') != "none") {
								var url_list = $("#search_result_list a");
								url_count = url_list.length;
								switch (keycode) {
								case 38:
									if (now_n === '') {
										now_n = (url_count - 1)
									} else if (now_n > 0) {
										now_n = now_n - 1
									} else {
										now_n = (url_count - 1)
									}
									for ( var i = 0; i < url_count; i++) {
										$(url_list[i]).removeClass('hover')
									}
									$(url_list[now_n]).addClass("hover");
									$("#keyword").val(
											$(url_list[now_n]).attr('data'));
									link = $(url_list[now_n]).attr("href");
									$("#search_from_top").attr("target",
											"_blank");
									$("#search_from_top").attr("action", link);
									break;
								case 40:
									if (now_n === '') {
										now_n = 0
									} else if (now_n < (url_count - 1)) {
										now_n++
									} else {
										now_n = 0
									}
									for ( var i = 0; i < url_count; i++) {
										$(url_list[i]).removeClass('hover')
									}
									$(url_list[now_n]).addClass("hover");
									$("#keyword").val(
											$(url_list[now_n]).attr('data'));
									link = $(url_list[now_n]).attr("href");
									$("#search_from_top").attr("target",
											"_blank");
									$("#search_from_top").attr("action", link);
									break;
								case 13:
									$("#search_result").hide();
									now_n = '';
									document.getElementById('search_from_top')
											.submit();
									return false;
									break
								}
							}
						}
					}
				});