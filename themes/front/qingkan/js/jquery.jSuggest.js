(function($) {
    $.fn.jSuggest = function(options) {
        var opts = $.extend({},
        $.fn.jSuggest.defaults, options);
        var jH = ".jSuggestHover";
        var jsH = "jSuggestHover";
        var iniVal = this.value;
        var textBox = this;
        var textVal = this.value;
        var jC = "#jSuggestContainer";
        $("body").append('<div id="jSuggestContainer"></div>');
        $(jC).hide();
        $(this).bind("keyup click",
        function(e) {
            textBox = this;
            textVal = this.value;
            if (this.value.length >= opts.minchar && $.trim(this.value) != "Search Terms") {
                var offSet = $(this).offset();
                $(jC).css({
                    position: "absolute",
                    top: offSet.top + $(this).outerHeight() + "px",
                    left: offSet.left,
                    width: $(this).outerWidth() - 2 + "px",
                    opacity: opts.opacity,
                    zIndex: opts.zindex
                }).show();
                if (e.keyCode == 27) {
                    $(jC).hide()
                } else if (e.keyCode == 13) {
                    if ($(jH).length == 1) $(textBox).val($(jH).text().substr(0, $(jH).text().indexOf(" ")));
                    $(jC).hide();
                    iniVal = textBox.value
                } else if (e.keyCode == 40) {
                    if ($(jH).length == 1) {
                        if (!$(jH).next().length == 0) {
                            $(jH).next().addClass(jsH);
                            $(".jSuggestHover:eq(0)").removeClass(jsH);
                            if (opts.autoChange) {
								if ($("#searchtype").val()=='author'){
									$(textBox).val(textVal.substring(textVal.indexOf(" ")+1))
								}else{
									$(textBox).val(textVal.substr(0, textVal.indexOf(" ")))
								}
							}
                        }
                    } else {
                        $("#jSuggestContainer ul li:first-child").addClass(jsH);
                        if (opts.autoChange) {
							if ($("#searchtype").val()=='author'){
								$(textBox).val(textVal.substring(textVal.indexOf(" ")+1))
							}else{
								$(textBox).val(textVal.substr(0, textVal.indexOf(" ")))
							}
						}
                    }
                } else if (e.keyCode == 38) {
                    if ($(jH).length == 1) {
                        if (!$(jH).prev().length == 0) {
                            $(jH).prev().addClass(jsH);
                            $(".jSuggestHover:eq(1)").removeClass(jsH);
                            if (opts.autoChange) {
								if ($("#searchtype").val()=='author'){
									$(textBox).val(textVal.substring(textVal.indexOf(" ")+1))
								}else{
									$(textBox).val(textVal.substr(0, textVal.indexOf(" ")))
								}
							}
                        } else {
                            $(jH).removeClass(jsH);
                            $(textBox).val(iniVal)
                        }
                    }
                } else if (textBox.value != iniVal) {
                    iniVal = textBox.value;
                    if ($(".jSuggestLoading").length == 0) $('<div class="jSuggestLoading"><img src="' + opts.loadingImg + '" align="bottom" /> ' + opts.loadingText + '</div>').prependTo("#jSuggestContainer");
                    $(".jSuggestLoading").show();
                    $(jC).find('ul').remove();
                    if (opts.data == '') opts.data = $(this).serialize();
                    else opts.data = opts.data + "=" + $(this).val();
                    setTimeout(function() {
                        $.ajax({
                            type: opts.type,
                            url: opts.url+"&searchtype="+$("#searchtype").val(),
                            data: opts.data,
                            success: function(msg) {
                                $(jC).find('ul').hide();
                                $(jC).append(msg);
                                $("#jSuggestContainer ul li").bind("mouseover",
                                function() {
                                    $(jH).removeClass(jsH);
                                    $(this).addClass(jsH);
                                    textVal = $(this).text();
                                    if (opts.autoChange) {
										if ($("#searchtype").val()=='author'){
											$(textBox).val(textVal.substring(textVal.indexOf(" ")+1))
										}else{
											$(textBox).val(textVal.substr(0, textVal.indexOf(" ")))
										}
									}
                                });
                                $("#jSuggestContainer ul li").click(function() {
                                    $(this).addClass(jsH);
									if ($("#searchtype").val()=='author'){
										$(textBox).val(textVal.substring(textVal.indexOf(" ")+1))
									}else{
										$(textBox).val(textVal.substr(0, textVal.indexOf(" ")))
									}                                    
                                });
                                $(".jSuggestLoading").hide()
                            }
                        })
                    },
                    opts.delay)
                }
            } else {
                $(jH).removeClass(jsH);
                $(jC).hide()
            };
            return false
        });
        $(document).bind("click",
        function() {
            $(jC).hide();
            iniVal = textBox.value
        })
    }
})(jQuery);
$(function() {
    $("#searchkey").jSuggest({
        url: "http://"+PTNovelHostName+"/ajax.php?action=searchresult",
        type: "POST",
        data: "searchkey",
        autoChange: true,
        minchar: 2,
        zindex: 20000,
        opacity: 1,
        loadingImg: "http://"+PTNovelHostName+"/static/image/loading2.gif",
        loadingText: "\u6b63\u5728\u52a0\u8f7d...",
        delay: 1000
    })
});