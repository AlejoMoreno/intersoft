<?php 
session_start();

/*importar librerias*/
include_once('../class/Visual.php');

//creacion de objetos
$visual = new Visual();
echo $visual->encabezado('Login');

if(isset($_GET['json'])){//si es recien logueado registtrar la session
	print_r($_GET['json']);
}
else{ //si no es recien llegado
	if(isset($_SESSION['Id_usuario'])){//verificar si la session esta habierta

	}
	else{//mandar a error login
		echo $visual->html_error();
		
		header('Location: login.php');
	}
}


?>