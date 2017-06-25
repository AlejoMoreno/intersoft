<?php 
/*
Clase para pages visuales.
	2017@FAMC.net.co
*/

class Visual{
	function __construct(){
		//vacio
	}
	function encabezado($titulo){
		return '<!DOCTYPE html>
		<html>
		<head>
			<title>Login</title>
			<link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
			<html lang="en">
			<title>'.$titulo.'</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
			<script src="js/index.js"></script>
		</head>';
	}
	function html_login(){
	?>
		<body>
		<center style="padding-top:15%;padding-left: 15%;padding-right: 15%;">
		<form style="background: white;padding: 30px;border-radius: 10px 10px 10px 10px;-moz-border-radius: 10px 10px 10px 10px;-webkit-border-radius: 10px 10px 10px 10px;border: 0px solid #000000;">
			<p style="font-family: 'Amatic SC', cursive;font-size: 30px;">Bienvenido a Intersoft</p>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
				<input id="cedula" type="text" class="form-control has-success" name="cedula" placeholder="Cédula">
			</div>
			<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input id="password" type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<div class="input-group"><br>
				<button type="button" onclick="html_login();" class="btn btn-success" style="width: 200px;animation: myfirst 10s infinite;">Entrar</button>
			</div>
		</form>
		</center>
		<center><div id="cargando" style="position: absolute;width: 100%;height: 100%;background: black;top: 0px;left: 0px;opacity: 0.8;display: none;"></div></center>
		</body>
		</html>
	<?php 
	}
}

?>