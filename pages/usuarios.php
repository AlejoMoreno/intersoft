<?php 
session_start();

/*importar librerias*/
$server = 'C:/xampp/htdocs/intersoft';
include_once($server.'/class/Visual.php');
include_once($server.'/class/Usuario.php');

//creacion de objetos
$visual = new Visual();
$usuario = new Usuario();
echo $visual->encabezado('Administrador');


if(isset($_SESSION['Id_usuario'])){//verificar si la session esta habierta
	echo $visual->html_menu('administrador');
}
else{//mandar a error login
	echo $visual->html_error();
	header('Location: login.php');
}


?>

<body>

<div class="container">
  
  <?php echo $visual->html_administrador();?>

  <div class="tab-content">
    <!--   _____________________________-METODOs JS USUARIOS_______________________________ -->
    <div id="Usuarios" class="tab-pane fade in active">
      <center><h3><img src="https://image.flaticon.com/icons/svg/186/186333.svg" width="60px;"></h3></center>
      <?php //POST function
      if(isset($_POST['Autorization'])){
      	if(isset($_POST['guardarusuarios'])){
      		//crear objeto usuario
      		$usuario->construct('',$_POST['ncedula'],$_POST['Nombre'],$_POST['Apellido'],$_POST['Cargo'],$_POST['Telefono'],$_POST['Password'],$_POST['Correo'],$_POST['Estado']);
      		//insertar nuevo usuario
      		$usuario->Insert();
      	}
      	elseif(isset($_POST['actualizarUsuarios'])){
      		$Id_usuario = $_POST['Id_usuario'];
      		$getUser = $usuario->GetParticular(' where Id_usuario = '.$Id_usuario.' ;')[0];
      		$usuario->construct($getUser['Id_usuario'],$getUser['ncedula'],$getUser['Nombre'],$getUser['Apellido'],$getUser['Cargo'],$getUser['Telefono'],$getUser['Password'],$getUser['Correo'],$getUser['Estado']);
      		//$usuario->Insert(); para copiar registro
      		print_r($_POST);
      	}
      	elseif(isset($_POST['eliminarUsuarios'])){
      		$Id_usuario = $_POST['Id_usuario'];
      		$getUser = $usuario->GetParticular(' where Id_usuario = '.$Id_usuario.' ;')[0];
      		$usuario->construct($getUser['Id_usuario'],$getUser['ncedula'],$getUser['Nombre'],$getUser['Apellido'],$getUser['Cargo'],$getUser['Telefono'],$getUser['Password'],$getUser['Correo'],$getUser['Estado']);
      		//eliminar usuario
      		$usuario->Delete();
      		echo '<script>alert("Usuario '.$getUser['Nombre'].' eliminado");</script>';
      	}
      	else{
      		echo '<script>alert("No tienes Autorización para efectuar el cambio");</script>';
      	}
      }
      ?>
      <div class="panel panel-default scrollbar" id="style7" style="width: 100%;overflow-x: scroll;">
        <?php  echo $usuario->FormUser(); ?> 
      </div>
    </div>

    <div class="panel panel-default scrollbar" id="style7" style="width: 100%;overflow-x: scroll;">
      <form><label>Buscar:</label>
      <input id="searchTerm" type="text" onkeyup="doSearch()" style="border-radius: 10px 10px 10px 10px;-moz-border-radius: 10px 10px 10px 10px;-webkit-border-radius: 10px 10px 10px 10px;border: 0px solid #000000;border-bottom: 1px solid #207ce5; width: 50%; padding: 10px;" placeholder="Buscar" />
      </form>
      <?php echo $usuario->TableUsuario($usuario->GetAll()); ?> 
    </div> 
  </div>
  <!--   _____________________________-FIN METODOs JS USUARIOS_______________________________ -->



</div>

</body>

<script type="text/javascript">

$(document).ready(function(){

});

</script>

<!--METODOs JS USUARIOS -->
<script type="text/javascript">
function actualizarUsuarios(id,table){
//
}
function eliminarUsuarios(id){	
	post('administrador.php', {Id_usuario: id, Autorization: '92383af3b97f5e992ab9050693941816', eliminarUsuarios: '' });
}
</script>
