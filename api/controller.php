<?php 

/*Innclusion de librerias*/
include_once('../class/Usuario.php');
include_once('../class/Mail.php');

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
			$mail = new Mail();
			$data = $Usuario->ApiOlvidoPassword($_POST['search']);
			if($data['status']=='true'){
				$mail->setData($data);
				$mail->sendMail('fredymoreno@uan.edu.co');
				echo '{"status":"true", "message":"Se envio correo, olvido contraseña"}';
			}
			else{
				echo '{"status":"false", "message":"No se encontro coincidencias"}';
			}
			
	    break;

	    case "ApiLogin":
	    	$Usuario = new Usuario();
			echo json_encode($Usuario->ApiLogin($_POST['cedula'],$_POST['password']));
	    break;

	    default:
	    	echo '{"status":"true", "message":"No existe la funcion llamada"}';
	    break;
	 }
}



?>