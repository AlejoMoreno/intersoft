<?php 

/*
	PARAMETROS PARA LAS CIUDADES
-----------------------------------
Id_ciudad
Codigo_ciudad
Nombre
Id_departamento
*/

class CIUDAD{
	var $Id_ciudad;
	var $Codigo_ciudad;
	var $Nombre;
	var $Id_departamento;

	var $conexion;

	public function __construct(){
		include_once('conexion.php');
		$this->conexion= conexion();
	}

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
			'$this->Codigo_ciudad', 
			'$this->Nombre, 
			'$this->Id_departamento');";
			mysqli_query($this->conexion, $sql) or die(mysqli_error($this->conexion));
	}

	public function Update($id){
		$sql = "UPDATE `CIUDAD` SET 
			`Codigo_ciudad` = '$this->Codigo_ciudad',
			`Nombre` = '$this->Nombre',
			`Id_departamento` = '$this->Id_departamento'
			WHERE `CIUDAD`.`Id_ciudad` = $id;";
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

}

/*$Ciudades = new CIUDAD();
print_r($Ciudades->GetAll());*/


?>