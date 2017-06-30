<?php 

/*Innclusion de librerias*/
include_once('../class/Usuario.php');

if(isset($_POST['Autorization'])){
	if($_POST['Autorization']=='92383af3b97f5e992ab9050693941816'){
		ejecutar($_POST['function']);
	}
	else{
		echo '{"status":"false", "message":"No tienes la autorizacion correcta"}';
	}
}
else{
	echo '{"status":"false", "message":"No tienes autorizacion"}';
}

function ejecutar($function){
	switch ($_POST['function']) {

	    case "ApiOlvidoPassword":
	    	$Usuario = new Usuario();
			print_r($Usuario->ApiOlvidoPassword($_POST['search']));
	    break;

	    default:
	    	echo '{"status":"true", "message":"No existe la funcion llamada"}';
	    break;
	 }
}



?>