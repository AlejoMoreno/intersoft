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
			$array = array("status"=>"true","message"=>$olvido[0]);
			return $array;
		}
		else{
			$array = array("status"=>"false","message"=>"No se encontraron coincidencias");
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

	public function FormUser(){
	?>
		<div class="container">
		  <div class="container">         
		  <table class="table table-hover" style="width: 95%;">
		    <thead>
		      <tr><form action="" method="POST">
		      	<input type='hidden' id='Autorization' value='92383af3b97f5e992ab9050693941816' name='Autorization'>
		      	<th><div class="form-group">
		      	<label for="Id_usuario">Id_usuario:</label>
		      	<input type="number" value="" class="form-control" id="Id_usuario" placeholder="ej.(1)" name="Id_usuario" disabled="">
		      </tr><tr></div></th>
				<th><div class="form-group">
				<label for="ncedula">ncedula:</label>
				<input type="text" class="form-control" id="ncedula" placeholder="ej.(1030570356)" name="ncedula">
				</div></th>
				<th><div class="form-group">
				<label for="Nombre">Nombre:</label>
				<input type="text" class="form-control" id="Nombre" placeholder="ej.(Alejandro)" name="Nombre">
				</div></th>
				<th><div class="form-group">
				<label for="Apellido">Apellido:</label>
				<input type="text" class="form-control" id="Apellido" placeholder="ej.(Moreno)" name="Apellido">
				</div></th>
			  </tr><tr><th><div class="form-group">
				<label for="Telefono">Telefono:</label>
				<input type="text" class="form-control" id="Telefono" placeholder="Ingresa el Télefono" name="Telefono">
				</div></th>
				<th><div class="form-group">
				<label for="Password">Password:</label>
				<input type="password" class="form-control" id="Password" placeholder="Ingresa el Password" name="Password">
				</div></th>
				<th><div class="form-group">
				<label for="Correo">Correo:</label>
				<input type="text" class="form-control" id="Correo" placeholder="Ingresa el Correo" name="Correo">
				</div></th>
			   </tr><tr><th><div class="form-group">
				<label for="Cargo">Cargo:</label>
				<select class="form-control" id="Cargo" placeholder="ej.()" name="Cargo">
			      	<option value="">SELECCIONE CARGO</option>
			      	<option value="ADMINISTRADOR">ADMINISTRADOR</option>
			      	<option value="SUPERADMINISTRADOR">SUPER ADMINISTRADOR</option>
			      	<option value="VENDEDOR">VENDEDOR</option>
			      	<option value="BODEGA">BODEGA</option>
			      	<option value="CONTADOR">CONTADOR</option>
			      	<option value="TESORERIA">TESORERIA</option>
			      	<option value="VISITANTE">VISITANTE</option>
			    </select>
			    </div></th>
				<th><div class="form-group">
				<label for="Estado">Estado:</label>
				<select class="form-control" id="Estado" placeholder="ej.(ACTIVO,DESAC)" name="Estado">
			      	<option value="">SELECCIONE ESTADO</option>
			      	<option value="ACTIVO">ACTIVO</option>
			      	<option value="INACTIVO">INACTIVO</option>
			      	<option value="PENDIENTE">PENDIENTE</option>
			    </select>
			    </div></th>
				</tr><tr><th><div class="form-group">
				<button type="submit" name="guardarusuarios" id="guardarusuarios" class="btn btn-default">Agregar</button></form>
		      	</div></th>
		    </thead>
		    <tbody>
		    			      
		    </tbody>
		  </table>
		</div>
	<?php
	}
	public function TableUsuario($data){
	?>
		<div class="container">         
		  <table class="table table-hover" id="datos">
		    <thead>
		      <tr>
		      	<th>Id_usuario</th>
				<th>Cédula</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Cargo</th>
				<th>Télefono</th>
				<th>Password</th>
				<th>Correo</th>
				<th>Estado</th>
				<th>Botón Actualizar</th>
				<th>Botón Eliminar</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php 
		    $count = 0;
		    foreach ($data as $value) {
		    	echo "	<tr class='".$count."'>	    	
		        <div class='tabusuarios'>
		        <td class='TId_usuario".$count."'>".$value['Id_usuario']."</td>
		        <td class='Tncedula".$count."'>".$value['ncedula']."</td>
		        <td class='TNombre".$count."'>".$value['Nombre']."</td>
		        <td class='TApellido".$count."'>".$value['Apellido']."</td>
		        <td class='TCargo".$count."'>".$value['Cargo']."</td>
		        <td class='TTelefono".$count."'>".$value['Telefono']."</td>
		        <td class='TPassword".$count."'>".$value['Password']."</td>
		        <td class='TCorreo".$count."'>".$value['Correo']."</td>
		        <td class='TEstado".$count."'>".$value['Estado']."</td>
		        </div>
		        
		        <td><button onclick='actualizarUsuarios(".$value['Id_usuario'].",".$count.");' name='actualizarUsuarios' class='btn btn-default'>Editar</button></td>
		        <td><button onclick='eliminarUsuarios(".$value['Id_usuario'].");' name='eliminarUsuarios' class='btn btn-default'>Eliminar</button></td>
		    </tr>";
		    $count++;
		    }
		    ?>
		      
		    </tbody>
		  </table>
		</div>
	<?php
	}


}

?>