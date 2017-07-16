<?php 
session_start();

/*importar librerias*/
$server = 'C:/xampp/htdocs/intersoft';
include_once($server.'/class/Visual.php');

//creacion de objetos
$visual = new Visual();
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

</div>

</body>

<script type="text/javascript">

$(document).ready(function(){

});

</script>
