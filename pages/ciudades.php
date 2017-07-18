<?php 
session_start();

/*importar librerias*/
$server = 'C:/xampp/htdocs/intersoft';
include_once($server.'/class/Visual.php');
include_once($server.'/class/Ciudad.php');
include_once($server.'/class/Departamento.php');

//creacion de objetos
$visual = new Visual();
$ciudades = new Ciudad();
$departamento = new Departamento();
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

  <!--   _____________________________-METODOs JS DEPARTAMENTOS y CIUDADES_______________________________ -->
  <div id="" class="tab-pane" class="tab-pane fade in active">
    <center><h3><img src="https://image.flaticon.com/icons/svg/197/197575.svg" width="60px;"></h3></center>
    <?php //POST function
    if(isset($_POST['Autorization'])){
      if(isset($_POST['guardarCiudad'])){
        //crear objeto ciudades
        $ciudades->construct('',$_POST['Codigo_ciudad'],$_POST['Nombre'],$_POST['Id_departamento']);
        //guardar en la base de datos
        $ciudades->Insert();
      }
      elseif(isset($_POST['guardarDepartamento'])){
        //crear departamento
        $departamento->construct('',$_POST['Codigo_departamento'],$_POST['Nombredep']);
        //guardar en la base de datos
        $departamento->Insert();
      }
      else{
        echo '<script>alert("No tienes Autorización para efectuar el cambio");</script>';
      }
    }
    ?>
    <div class="panel panel-default scrollbar" id="style7" style="width: 100%;overflow-x: scroll;">
      <?php  echo $ciudades->FormUser(); ?> 
    </div>
    <div class="panel panel-default scrollbar" id="style7" style="width: 100%;overflow-x: scroll;">
      <div class="col-md-12" style="text-align:center"><br><br>
        <form><label>Buscar:</label>
        <input id="searchTerm" type="text" onkeyup="doSearch()" style="border-radius: 10px 10px 10px 10px;-moz-border-radius: 10px 10px 10px 10px;-webkit-border-radius: 10px 10px 10px 10px;border: 0px solid #000000;border-bottom: 1px solid #207ce5; width: 50%; padding: 10px;" placeholder="Buscar" />
        </form>
      </div>
      <?php echo $ciudades->TableCiudades($ciudades->GetAll()); ?>
      <hr>           
    </div>
  </div>      
</div>
<!--   _____________________________-FIN METODOs JS DEPARTAMENTOS y CIUDADES_______________________________ -->



</div>

</body>

<script type="text/javascript">

$(document).ready(function(){

});

</script>

<!--METODOs JS DEPARTAMENTOS y CIUDADES -->
<script type="text/javascript">
function actualizarCiudades(id,table){
//
}
function eliminarCiudades(id){  
  post('administrador.php', {Id_usuario: id, Autorization: '92383af3b97f5e992ab9050693941816', eliminarUsuarios: '' });
}
</script>
