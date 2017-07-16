<?php 

Class Mail{
	var $data;
	function __construct(){
		//configuracion de correo
	}
	function getHtml($url){
		return '';
	}
	function sendMail($to){
		//enviar mail
	}
	function getData(){
		return $this->data;
	}
	function setData($data){
		$this->data = $data;
	}
}

?>