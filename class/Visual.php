<?php 
/*
Clase para pages visuales.
	2017@FAMC.net.co


Visual es una clase en php unicamente para las primeras vistas: Index, Login, Register,
*/

class Visual{
	var $titulo;
	function __construct(){
		//vacio
	}
	function encabezado($titulo){
		$this->titulo = $titulo;
		return '<!DOCTYPE html>
		<html>
		<head>
			<title>Login</title>
			<link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
			<html lang="en">
			<title>'.$this->titulo.'</title>
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
		<img style="width: 150px;position: absolute;" src="images/logo.png">
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
				<button type="button" onclick="html_login();" class="btn btn-success" style="width: 200px;animation: myfirst 20s infinite;">Entrar</button>
			</div>
			<div style="padding-top: 25px;" onclick="setTimeout (`Redirect('olvidoPassword.php')`, 1000);"><a href="#"> Olvido de Contraseña</a></div>
		</form>
		</center>
		<center><div id="cargando" style="position: absolute;width: 100%;height: 100%;background: black;top: 0px;left: 0px;opacity: 0.8;display: none;z-index: 100"></div></center>
		</body>
		</html>
	<?php 
	}

	function html_olvido(){
	?>
		<body>
			<a href="login.php"><img style="width: 150px;position: absolute;" src="images/logo.png"></a>
			<div class="jumbotron text-center" style="background: #207ce5;color: white;">
				<h1 style="font-family: 'Amatic SC', cursive;"><?php echo $this->titulo;?></h1>
			</div>
			<center style="padding-top:5%;padding-left: 5%;padding-right: 5%;"><div class="well text" style="width: 80%;">
				<label style="padding: 10px;">Escribe tu correo o usuario, para que intersoft envie tu clave al correo registrado.</label>
				<div class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
					<input id="search" type="text" class="form-control has-success" name="search" onkeyup="validar('search',this)" placeholder="Cédula o Correo">
				</div>
				<div class="input-group"><br>
					<button type="button" id="boton" onclick="html_olvido();" class="btn btn-success" style="width: 200px;animation: myfirst 20s infinite;">Recordarme</button>
				</div>
				<div id="resultado" style="padding: 10px;color:red;"></div>
			</div></center>
		</body>


	<?php
	}

}

?>