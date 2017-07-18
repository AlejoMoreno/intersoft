<?php 

/**
* copyrigth famc@2017
* autor Alejandro Moreno
*/

include_once('Departamento.php');

/*
	PARAMETROS PARA LAS CIUDADES
-----------------------------------
Id_ciudad
Codigo_ciudad
Nombre
Id_departamento
*/

class CIUDAD extends Departamento{
	var $Id_ciudad;
	var $Codigo_ciudad;
	var $Nombre;
	var $Id_departamento;

	var $conexion;

	public function __construct(){
		include_once('conexion.php');
		$this->conexion= conexion();
	}
	/*		CONTRUCCION DE FUNCIONES BASE DE DATOS			*/
	public function construct($Id_ciudad,$Codigo_ciudad,$Nombre,$Id_departamento){
		//constructor 
		$this->Id_ciudad = $Id_ciudad;
		$this->Codigo_ciudad = $Codigo_ciudad;
		$this->Nombre = $Nombre;
		$this->Id_departamento = $Id_departamento;
	}

	public function Insert(){
		$sql = "INSERT INTO `CIUDAD` (`Id_ciudad`, `Codigo_ciudad`, `Nombre`, `Id_departamento`) VALUES (
		NULL, 
		'$this->Codigo_ciudad', '$this->Nombre', '$this->Id_departamento');";
			mysqli_query($this->conexion, $sql) or die(mysqli_error($this->conexion));
	}

	public function Update(){
		$sql = "UPDATE `CIUDAD` SET 
			`Codigo_ciudad` 	= '$this->Codigo_ciudad',
			`Nombre` 			= '$this->Nombre',
			`Id_departamento` 	= '$this->Id_departamento'
			WHERE `CIUDAD`.`Id_ciudad` = $this->Id_ciudad;";
			mysqli_query($this->conexion, $sql) or die(mysqli_error($this->conexion));
	}

	public function GetAll(){
		$array = array();
		$bill = mysqli_query($this->conexion,"SELECT * FROM `CIUDAD`") or die(mysqli_error($this->conexion));
		while($row = $bill->fetch_assoc()){
			array_push($array, $row);
		}
		return $array;
	}

	public function GetParticular($sentence){
		$array = array();
		$bill = mysqli_query($this->conexion,"SELECT * FROM `CIUDAD` ".$sentence) or die(mysqli_error($this->conexion));
		while($row = $bill->fetch_assoc()){
			array_push($array, $row);
		}
		return $array;
	}

	public function sql($sql){
		$array = array();
		$bill = mysqli_query($this->conexion, $sql) or die(mysqli_error($this->conexion));
		while($row = $bill->fetch_assoc()){
			array_push($array, $row);
		}
		return $array;
	}

	/*		CONTRUCCION DE FUNCIONES varias			*/

	function GetId_ciudad(){return $this->Id_ciudad;}
	function GetCodigo_ciudad(){return $this->Codigo_ciudad;}
	function GetNombre(){return $this->Nombre;}
	function GetId_departamento(){return $this->Id_departamento;}
	function SetId_ciudad($Id_ciudad){$this->Id_ciudad = $Id_ciudad;}
	function SetCodigo_ciudad($Codigo_ciudad){$this->Codigo_ciudad = $Codigo_ciudad;}
	function SetNombre($Nombre){$this->Nombre = $Nombre;}
	function SetId_departamento($Id_departamento){$this->Id_departamento = $Id_departamento;}

	public function TableCiudades(){
		$data = Ciudad::sql(" SELECT CIUDAD.Codigo_ciudad, DEPARTAMENTO.Nombre as departamento, CIUDAD.Nombre as ciudad, CIUDAD.Id_ciudad FROM CIUDAD, DEPARTAMENTO WHERE CIUDAD.Id_departamento = DEPARTAMENTO.Id_departamento; ");

	?>
		<div class="container">         
		  <table class="table table-hover" id="datos">
		    <thead>
		      <tr>
		      	<th>#</th>
				<th>Código Ciudad</th>
				<th>Nombre Departamento</th>
				<th>Nombre Ciudad</th>
				<th></th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php 
		    $count = 0;
		    foreach ($data as $value) {
		    	echo "	<tr class='".$count."'>	    	
		        <div class='tabusuarios'>
		        <td class='TId_usuario".$count."'>".$count."</td>
		        <td class='Tncedula".$count."'>".$value['Codigo_ciudad']."</td>
		        <td class='TNombre".$count."'>".$value['departamento']."</td>
		        <td class='TApellido".$count."'>".$value['ciudad']."</td>
		        </div>
		        <td><button onclick='eliminarCiudad(".$value['Id_ciudad'].");' name='eliminarCiudad' class='btn btn-default'>Eliminar</button></td>
		    </tr>";
		    $count++;
		    }
		    ?>
		      
		    </tbody>
		  </table>
		</div>
	<?php
	}

	public function FormUser(){
	?>

		<div class="tab-content" style="width: 40%;float: left;padding:10px;margin: 10px;">
			<h2>Departamentos:</h2>
			<form action="" method="POST">
			<input type='hidden' id='Autorization' value='92383af3b97f5e992ab9050693941816' name='Autorization'>
			<div class="form-group">
			  <label for="Codigo_departamento">Codigo_departamento:</label>
			  <input type="text" class="form-control" id="Codigo_departamento" placeholder="Codigo departamento" name="Codigo_departamento">
			</div>
			<div class="form-group">
			  <label for="Nombre">Nombre:</label>
			  <input type="text" class="form-control" id="Nombredep" placeholder="Nombre" name="Nombredep">
			</div>
			<button type="submit" name="guardarDepartamento" class="btn btn-default">Guardar</button>
			</form>			
		</div>


		<div class="tab-content" style="width: 40%;float: left;padding:10px;margin: 10px;">
			<h2>Ciudades:</h2>
			<form action="" method="POST">
			<input type='hidden' id='Autorization' value='92383af3b97f5e992ab9050693941816' name='Autorization'>
			<div class="form-group">
			  <label for="Codigo_ciudad">Codigo_ciudad:</label>
			  <input type="text" class="form-control" id="Codigo_ciudad" placeholder="Codigo ciudad" name="Codigo_ciudad">
			</div>
			<div class="form-group">
			  <label for="Nombre">Nombre:</label>
			  <input type="text" class="form-control" id="Nombre" placeholder="Nombre" name="Nombre">
			</div>
			<div class="form-group">
			  <label for="Id_departamento">Id_departamento:</label>
			  <?php echo Departamento::selectDepartamentos(); ?>
			</div>
			<button type="submit" name="guardarCiudad" class="btn btn-default">Guardar</button>
			</form>			
		</div>
	<?php 
	}

}


/*$Ciudades = new CIUDAD();
print_r($Ciudades->GetAll());*/


?>