<?php 

/**
* copyrigth famc@2017
* autor Alejandro Moreno
*/

/*
	PARAMETROS PARA LAS dEPARTAMENTO
-----------------------------------
Id_departamento
Codigo_departamento
Nombre
*/

class DEPARTAMENTO {
	var $Id_departamento;
	var $Codigo_departamento;
	var $Nombre;
	
	var $conexion;

	public function __construct(){
		include_once('conexion.php');
		$this->conexion= conexion();
	}
	/*		CONTRUCCION DE FUNCIONES BASE DE DATOS			*/
	public function construct($Id_departamento,$Codigo_departamento,$Nombre){
		//constructor 
		$this->Id_departamento = $Id_departamento;
		$this->Codigo_departamento = $Codigo_departamento;
		$this->Nombre = $Nombre;
	}

	public function Insert(){
		$sql = "INSERT INTO `DEPARTAMENTO` (`Id_departamento`, `Codigo_departamento`, `Nombre`) VALUES (
			NULL, 
			'$this->Codigo_departamento', 
			'$this->Nombre');";
			mysqli_query($this->conexion, $sql) or die(mysqli_error($this->conexion));
	}

	public function Update(){
		$sql = "UPDATE `DEPARTAMENTO` SET 
			`Codigo_departamento`= '$this->Codigo_departamento',
			`Nombre` 			 = '$this->Nombre'
			WHERE `DEPARTAMENTO`.`Id_departamento` = $this->Id_departamento;";
			mysqli_query($this->conexion, $sql) or die(mysqli_error($this->conexion));
	}

	public function GetAll(){
		$array = array();
		$bill = mysqli_query($this->conexion,"SELECT * FROM `DEPARTAMENTO`") or die(mysqli_error($this->conexion));
		while($row = $bill->fetch_assoc()){
			array_push($array, $row);
		}
		return $array;
	}

	public function GetParticular($sentence){
		$array = array();
		$bill = mysqli_query($this->conexion,"SELECT * FROM `DEPARTAMENTO` ".$sentence) or die(mysqli_error($this->conexion));
		while($row = $bill->fetch_assoc()){
			array_push($array, $row);
		}
		return $array;
	}

	/*		CONTRUCCION DE FUNCIONES varias			*/

	function GetId_departamento(){return $this->Id_departamento;}
	function GetCodigo_departamento(){return $this->Codigo_departamento;}
	function GetNombre(){return $this->Nombre;}
	function SetId_departamento($Id_departamento){$this->Id_departamento = $Id_departamento;}
	function SetCodigo_departamento($Codigo_departamento){$this->Codigo_departamento = $Codigo_departamento;}
	function SetNombre($Nombre){$this->Nombre = $Nombre;}

}

/*$Ciudades = new CIUDAD();
print_r($Ciudades->GetAll());*/


?>