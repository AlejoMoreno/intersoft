function Redirect(url) {
	$('#cargando').html('<img src="pages/images/cargando.gif" style="margin-top: 20%;">');
	setTimeout ("document.write('texto'); ", 2000);
	window.location="pages/"+url;
}

function html_login(){
	var cedula = $('#cedula').val();
	var password = $('#password').val();
	if(cedula=!''){$('#cedula').css('border':'1px solid green');}
	else{$('#cedula').css('border':'1px solid red'); alert();}
}