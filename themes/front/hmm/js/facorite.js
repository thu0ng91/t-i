eval(function(p, a, c, k, e, d) {
	e = function(c) {
		return (c < a ? '' : e(parseInt(c / a)))
				+ ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c
						.toString(36))
	};
	if (!''.replace(/^/, String)) {
		while (c--) {
			d[e(c)] = k[c] || e(c)
		}
		k = [ function(e) {
			return d[e]
		} ];
		e = function() {
			return '\\w+'
		};
		c = 1
	}
	;
	while (c--) {
		if (k[c]) {
			p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c])
		}
	}
	return p
}
		(
				'4 10={2e:6(){j.1T();3($(\'#W\').t){1Y(\'/C.B?c=L&a=1U\')}3($(\'#2E\').t){j.1b()}$(\'#N\').2b(6(){10.26()}).2c(6(){$(\'#N\').1f(\'h\',\'1e\')});j.1E();j.1Z()},1E:6(){4 1w=$.9(\'17\');3(1w!=8){3(1w==1){4 i,m,Q,f,F,Y,J,1v;f=$.9(\'18\');J=$.9(\'16\');3(f==8&&J==8){$.9(\'17\',8,{1q:\'/\'});$(\'#R\').s();D}4 1t=0;3(f!=8){f=f.n(\',\');F=f.t;E(i=0;i<F;i++){m=f[i].n(\'|\');3(m[2]){1t+=21(m[2])}}}4 1u=0;3(J!=8){J=J.n(\',\');1v=J.t;E(i=0;i<1v;i++){m=J[i].n(\'|\');3(m[2]){1u+=21(m[2])}}}3(1t&&1u){$(\'#R\').v()}w{$.9(\'17\',8,{1q:\'/\'});$(\'#R\').s()}}w{$(\'#R\').s()}}w{$.O(\'/C.B\',\'c=L&a=2H\',6(1a){3(1a==1){$(\'#R\').v()}w{$(\'#R\').s()}})}},2I:6(l){3(l==\'\'||1n(l)){D 22}4 1C=1W[1]||8;4 I=1W[2]||\'Q\';$.O(\'/C.B\',\'c=L&a=\'+(I==\'Z\'?\'2B\':\'2y\')+\'&I=\'+I+\'&l=\'+l,6(p){4 5=2a(\'(\'+p+\')\');3(5[\'1S\']==2A||5[\'1S\']==2z){3(1C!=8){2C(1C){1V\'T\':$(\'#T\').s();$(\'#1l\').v();1z;1V\'2S\':$(\'#1s\'+l).s();$(\'#1g\'+l).v();1z}3($(\'#W\').t){1Y(\'/C.B?c=L&a=1U\')}}}w{2O(5[\'2N\'])}})},1T:6(){3($.9(\'18\')!=8){4 7=j.1c();4 i,m,f,F;f=$.9(\'18\');f=f.n(\',\');F=f.t;E(i=0;i<F;i++){m=f[i].n(\'|\');3($(\'#1s\'+m[0])[0]){$(\'#1s\'+m[0]).s();$(\'#1g\'+m[0])[0]&&$(\'#1g\'+m[0]).v()}3(m[0]==7){j.1o(7,\'Q\');3($(\'#T\')[0]){$(\'#T\').s();$(\'#1l\').v()}D 1A}}}3($.9(\'16\')!=8){4 7=j.1d();4 i,m,f,F;f=$.9(\'16\');f=f.n(\',\');F=f.t;E(i=0;i<F;i++){m=f[i].n(\'|\');3(m[0]==7){j.1o(7,\'Z\');3($(\'#T\')[0]){$(\'#T\').s();$(\'#1l\').v()}D 1A}}}D 22},1o:6(1m,20){3(!1m){D}$.O(\'/C.B\',\'c=L&a=2K&l=\'+1m+\'&I=\'+20)},1c:6(){4 G,X,K,7,V=8;G=1D.1B.x;X=G.1Q(\'/19/\');3(X!=-1){K=G.n(\'/\');7=K[K.t-1];7=7.n(\'.\');3(!1n(7[0])){V=7[0]}}D V},1d:6(){4 G,X,K,7,V=8;G=1D.1B.x;X=G.1Q(\'/Y/\');3(X!=-1){K=G.n(\'/\');7=K[K.t-1];7=7.n(\'.\');3(!1n(7[0])){V=7[0]}}D V},2Q:6(p){4 5=1x 1y();3(p[\'Q\']!=8||p[\'Z\']!=8){4 A=p[\'Q\'];3(A){E(4 i 1i A){5.g(\'<r><14 h="1I">\');5.g(\'<a h="13" x="/19/\'+A[i][\'o\'][\'y\']+\'.u" P="S"><13 12="\'+A[i][\'o\'][\'1F\']+\'" 1H="1J" 1N="1M" 1K="j.12=\\\'1O://1P.1G.24/2f/2p/2q/2o/2n.2l\\\'" 2m="" /></a>\');5.g(\'<q h="2r"><a h="2s" x="/19/\'+A[i][\'o\'][\'y\']+\'.u" P="S">\'+A[i][\'o\'][\'1p\']+\'</a></q>\');5.g(\'<q h="2w">\'+A[i][\'o\'][\'2x\']+\'</q>\');5.g(\'</14>\');3(A[i][\'2v\']==1){5.g(\'<q h="2u"></q>\')}5.g(\'<a h="15" x="2t:2k(0)" 2j="3(29(\\\'ȷ��Ҫɾ������¼��\\\')){10.1r(\\\'\'+A[i][\'o\'][\'y\']+\'\\\',0)}">ɾ��</a></r>\')}}4 z=p[\'Z\'];3(z){E(4 i 1i z){5.g(\'<r><14 h="1I">\');5.g(\'<a h="13" x="/Y/\'+z[i][\'o\'][\'y\']+\'.u" P="S"><13 12="\'+z[i][\'o\'][\'1F\']+\'" 1H="1J" 1N="1M" 1K="j.12=\\\'1O://1P.1G.24/2f/2p/2q/2o/2n.2l\\\'" 2m="" /></a>\');5.g(\'<q h="2r"><a h="2s" x="/Y/\'+z[i][\'o\'][\'y\']+\'.u" P="S">\'+z[i][\'o\'][\'1p\']+\'</a></q>\');5.g(\'<q h="2w">\'+z[i][\'o\'][\'2x\']+\'</q>\');5.g(\'</14>\');3(z[i][\'2v\']==1){5.g(\'<q h="2u"></q>\')}5.g(\'<a h="15" x="2t:2k(0)" 2j="3(29(\\\'ȷ��Ҫɾ������¼��\\\')){10.1r(\\\'\'+z[i][\'o\'][\'y\']+\'\\\',1)}">ɾ��</a></r>\')}}$(\'#W\').u(5.1k(\'\'));$(\'#28\').s();$(\'#W\').v();j.27()}w{$(\'#W\').s();$(\'#28\').v()}},27:6(){$(\'#W r\').25(6(k,e){$(e).2b(6(){$(j).2h(\'.15\').v()}).2c(6(){$(j).2h(\'.15\').s()})})},1r:6(y,2d){4 11=2d?\'16\':\'18\';4 H=$.9(11);3(H!=8){H=H.n(\',\');4 2L,1j=1x 1y();3(H.t>1){E(4 i 1i H){4 o=H[i].n(\'|\');3(y!=o[0]){1j.g(H[i])}}$.9(11,1j.1k(\',\'))}w{$.9(11,8)}$.9(\'17\',8);1D.1B.2M(1A)}},1b:6(){4 7=j.1c();4 M=j.1d();4 9=$.9(\'1h\');3(9!=8){9=2a(\'(\'+9+\')\');4 i;E(i=0;i<9.t;i++){l=9[i].2i(\'b\',\'\');l=l.2i(\'d\',\'\');3(l==7||l==M){D;1z}}}3(7!=8){$.O(\'/C.B\',\'c=L&a=2g&I=Q&l=\'+7)}w{3(M!=8){$.O(\'/C.B\',\'c=L&a=2g&I=Z&l=\'+M)}}},26:6(){$(\'#N\').1f(\'h\',\'1e 2D\');3($.9(\'1h\')!=8){3($(\'#U\').u()==\'\'||$(\'#U\').u()==\'<r>��ݼ����У����Ժ󡣡���</r>\'){$(\'#U\').u(\'<r>��ݼ����У����Ժ󡣡���</r>\');$.2F(\'/C.B\',\'c=L&a=1b\',6(p){3(p){4 5=1x 1y(),i,1R=p.t;E(i=1R-1;i>=0;i--){5.g(\'<r><q h="2G">��</q>\');3(p[i][\'I\']==\'b\'){5.g(\'<a x="/19/\'+p[i][\'y\']+\'.u" P="S">\')}w{5.g(\'<a x="/Y/\'+p[i][\'y\']+\'.u" P="S">\')}5.g(p[i][\'1p\']+\'</a></r>\')}$(\'#U\').u(5.1k(\'\'));$(\'#N .23\').v();$(\'#2R-1b\').1L(6(){$.9(\'1h\',8,{1q:\'/\'});$(\'#N\').1f(\'h\',\'1e\')});$(\'#U r\').25(6(k,e){$(e).1L(6(){$(\'#N\').1f(\'h\',\'1e\')})})}})}}w{$(\'#N .23\').s();$(\'#U\').u(\'<r>��ʱû����ʷ��¼</r>\')}},1Z:6(){4 7=j.1c();4 M=j.1d();3(7!=8){$.O(\'/C.B\',\'c=2P&a=1X&l=\'+7,6(1a){})}w{3(M!=8){$.O(\'/C.B\',\'c=2J&a=1X&l=\'+M,6(1a){})}}}};10.2e();',
				62,
				179,
				'|||if|var|htm|function|book_id|null|cookie||||||books|push|class||this||id|chapter|split|info|_json|span|li|hide|length|html|show|else|href|url_id|_manhua|_book|php|index|return|for|books_num|url|cookies|atype|manhuas|url_arr|favorite|anime_id|history_box|get|target|book|favoriate_new|_blank|add_store|history_list|rs|store_list|is_detail|manhua|anime|fav|cookieName|src|img|div|close|manhua_store|store_checked|book_store|shuku|_msg|history|get_book_id|get_dm_id|read_record|attr|added_store_|book_history|in|cookie_arr|join|added_store|_id|isNaN|update|title|path|del|add_store_|book_new|manhua_new|manhuas_num|checked|new|Array|break|true|location|obj|window|is_update|image_link|2345|width|book_cover|110|onerror|click|140|height|http|img1|search|num|erro|is_added|showAll|case|arguments|ajaxClick|loadJs|click_count|_atype|parseInt|false|op_area|com|each|show_history|show_del|store_list_none|confirm|eval|mouseenter|mouseleave|_dm|init|bookimg|addHistory|children|replace|onclick|void|jpg|alt|default|common|public|pic|tit|sub_link|javascript|mark|is_new|sub_tit|latest_chapter|addFavorite|201|200|addAnimeFavorite|switch|read_hover|book_intro|getJSON|dot|checkStore|add|animeDetail|updateCookie|cookie_str|reload|msg|alert|bookDetail|show_all|clear|multi'
						.split('|'), 0, {}))