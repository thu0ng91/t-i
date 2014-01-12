function addBookmark(title,url) {
  if(!title){title =document.title};
  if(!url){url=window.location.href}
  if (window.sidebar) {
	window.sidebar.addPanel(title,url ,"");
  } else if( document.all ) {
	window.external.AddFavorite(url,title);
  } else if( window.opera || window.print ) {
  	alert('');
  	return true;
  }
}
function killErrors() {
return true;
}
window.onerror = killErrors;