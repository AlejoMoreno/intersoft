<?php 
session_start();

/*importar librerias*/
include_once('../class/Visual.php');

//creacion de objetos
$visual = new Visual();
echo $visual->encabezado('Inicio');

if(isset($_GET['json'])){//si es recien logueado registtrar la session
	/*{"result":"true","message":{"Id_usuario":"1","ncedula":"1234","Nombre":"admin","Apellido":"admin","Cargo":"administrador","Telefono":"3219045297","Password":"123","Correo":"fredymoreno@uan.edu.co","Estado":"activo"}}*/
	$data = json_decode($_GET['json']);
	$_SESSION['Id_usuario'] = $data->message->Id_usuario;
	$_SESSION['ncedula'] 	= $data->message->ncedula;
	$_SESSION['Nombre'] 	= $data->message->Nombre;
	$_SESSION['Cargo'] 		= $data->message->Cargo;
	$_SESSION['Correo'] 	= $data->message->Correo;
	$_SESSION['Estado'] 	= $data->message->Estado;
	//vista del profile
	echo $visual->html_menu('profile');
	echo $visual->html_profile();
}
else{ //si no es recien llegado
	if(isset($_SESSION['Id_usuario'])){//verificar si la session esta habierta
		echo $visual->html_menu();
	}
	else{//mandar a error login
		echo $visual->html_error();
		
		header('Location: login.php');
	}
}


?>