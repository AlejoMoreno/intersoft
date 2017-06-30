function Redirect(url) {
	$('#cargando').html('<img src="pages/images/cargando.gif" style="margin-top: 20%;">');
	setTimeout ("document.write('texto'); ", 2000);
	window.location="pages/"+url;
}
