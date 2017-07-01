<?php 

/**
* copyrigth famc@2017
* autor Alejandro Moreno
*/

/*
@parameters	
Id_usuario
ncedula
Nombre
Apellido
Cargo
Telefono
Password
Correo
Estado



*/


class Usuario{
	var $Id_usuario;
	var $ncedula;
	var $Nombre;
	var $Apellido;
	var $Cargo;
	var $Telefono;
	var $Password;
	var $Correo;
	var $Estado;
	var $conexion;

	public function __construct()	{
		include_once('conexion.php');
		$this->conexion= conexion();	
	}

	/*		CONTRUCCION DE FUNCIONES BASE DE DATOS			*/

	public function construct($Id_usuario,$ncedula,$Nombre,$Apellido,$Cargo,$Telefono,$Password,$Correo,$Estado){
		//constructor 
		$this->Id_usuario 	= $Id_usuario;
		$this->ncedula 		= $ncedula;
		$this->Nombre 		= $Nombre;
		$this->Apellido 	= $Apellido;
		$this->Cargo 		= $Cargo;
		$this->Telefono 	= $Telefono;
		$this->Password 	= md5($Password); /*encritado con md5*/
		$this->Correo 		= $Correo;
		$this->Estado 		= $Estado;
	}
	public function Insert(){
		$sql = "INSERT INTO `USUARIO` (`Id_usuario`, `ncedula`, `Nombre`, `Apellido`, `Cargo`, `Telefono`, `Password`, `Correo`, `Estado`) VALUES (
			NULL, 
			'$this->ncedula', 
			'$this->Nombre', 
			'$this->Apellido', 
			'$this->Cargo', 
			'$this->Telefono', 
			'$this->Password', 
			'$this->Correo', 
			'$this->Estado');";
			mysqli_query($this->conexion, $sql) or die(mysqli_error($this->conexion));
	}
	public function Update(){
		$sql = "UPDATE `USUARIO` 
		`ncedula` 	= '$this->ncedula', 
		`Nombre` 	= '$this->Nombre', 
		`Apellido` 	= '$this->Apellido', 
		`Cargo` 	= '$this->Cargo', 
		`Telefono` 	= '$this->Telefono', 
		`Password` 	= '$this->Password', 
		`Correo` 	= '$this->Correo', 
		`Estado` 	= '$this->Estado'
		WHERE `USUARIO`.`Id_usuario` = $this->Id_usuario;";
			mysqli_query($this->conexion, $sql) or die(mysqli_error($this->conexion));
	}
	public function Delete(){
		$sql = "DELETE FROM `famcnetc_intersoft`.`USUARIO` WHERE `USUARIO`.`Id_usuario` = $this->Id_usuario";
		mysqli_query($this->conexion, $sql) or die(mysqli_error($this->conexion));
	}
	public function GetAll(){
		$array = array();
		$bill = mysqli_query($this->conexion,"SELECT * FROM `USUARIO`") or die(mysqli_error($this->conexion));
		while($row = $bill->fetch_assoc()){
			array_push($array, $row);
		}
		return $array;
	}
	public function GetParticular($sentence){
		$array = array();
		$bill = mysqli_query($this->conexion,"SELECT * FROM `USUARIO` ".$sentence) or die(mysqli_error($this->conexion));
		while($row = $bill->fetch_assoc()){
			array_push($array, $row);
		}
		return $array;
	}

	/*		CONTRUCCION DE FUNCIONES varias			*/

	function GetId_usuario(){return $this->Id_usuario;}
	function Getncedula(){return $this->ncedula;}
	function GetNombre(){return $this->Nombre;}
	function GetApellido(){return $this->Apellido;}
	function GetCargo(){return $this->Cargo;}
	function GetTelefono(){return $this->Telefono;}
	function GetPassword(){return $this->Password;}
	function GetCorreo(){return $this->Correo;}
	function GetEstado(){return $this->Estado;}
	function SetId_usuario($Id_usuario){$this->Id_usuario = $Id_usuario;}
	function Setncedula($ncedula){$this->ncedula = $ncedula;}
	function SetNombre($Nombre){$this->Nombre = $Nombre;}
	function SetApellido($Apellido){$this->Apellido = $Apellido;}
	function SetCargo($Cargo){$this->Cargo = $Cargo;}
	function Telefono($Telefono){$this->Telefono = $Telefono;}
	function SetPassword($Password){$this->Password = md5($Password);}
	function SetCorreo($Correo){$this->Correo = $Correo;}
	function SetEstado($Estado){$this->Estado = $Estado;}

	public function ApiOlvidoPassword($search){
		$olvido = Usuario::GetParticular(" WHERE `ncedula` LIKE '".$search."' OR `Correo` LIKE '".$search."'  ;");
		//hacer el envio a correo de la clave
		if(sizeof($olvido)!=0 ){
			$array = array("result"=>"true","message"=>$olvido[0]);
			return $array;
		}
		else{
			$array = array("result"=>"false","message"=>"No se encontraron coincidencias");
			return $array;
		}
	}

	public function ApiLogin($user,$password){
		//$password = md5($password);
		$login = Usuario::GetParticular(" WHERE `ncedula` LIKE '$user' AND `Password` LIKE '$password' ");
		if(sizeof($login)!=0){
			$array = array("result"=>"true","message"=>$login[0]);
			return $array;
		}
		else{
			$array = array("result"=>"false","message"=>"No se encontro ningun registro");
			return $array;
		}
	}


}

?>