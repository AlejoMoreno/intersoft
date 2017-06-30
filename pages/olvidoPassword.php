<?php 

/*importar librerias*/
include_once('../class/Visual.php');

//creacion de objetos
$visual = new Visual();

echo $visual->encabezado('Olvido Contraseña'); 
echo $visual->html_Olvido();


?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#search').focus();
	});
	$("#search").keypress(function(e) {
       if(e.which == 13) {
          // Acciones a realizar, por ej: enviar formulario.
          $('#boton').focus();
       }
    });
	function validar(id,texto){
		if(texto=='' || texto==' '){$('#resultado').html('<p style="color:red">Los campos no pueden estar vacios</p>');}
		else{$('#resultado').html('<p style="color:green">'+id+' ok</p>');}
	}
	function html_olvido(){
		var parametros = {
		"Autorization" : "92383af3b97f5e992ab9050693941816",
		"function" : "ApiOlvidoPassword",
		"search" : $('#search').val()
		};
		$.ajax({
	            data:  parametros,
	            url:   '../api/controller.php',
	            type:  'post',
	            beforeSend: function () {
	            	$('#resultado').html('<center><div id="cargando" style="position: absolute;width: 100%;height: 100%;background: black;top: 0px;left: 0px;opacity: 0.8;z-index:100"><img src="images/cargando.gif" style="margin-top: 20%;"></div></center>');
	            },
	            success:  function (response) {
	                $('#resultado').html(response);
	            }
	    });
	}

</script>

<style type="text/css">
body{
	-webkit-animation: myfirst 20s infinite; /* Safari 4.0 - 8.0 */
    -webkit-animation-direction: alternate; /* Safari 4.0 - 8.0 */
    animation: myfirst 20s infinite;
    animation-direction: alternate;
}
/* Safari 4.0 - 8.0 */
@-webkit-keyframes myfirst {
    0%   {background: white;}
    25%  {background: #207ce5;}
    50%  {background: #20e337;}
    75%  {background: #207ce5;}
    100% {background: white;}
}

@keyframes myfirst {
    0%   {background: white;}
    25%  {background: #207ce5;}
    50%  {background: #20e337;}
    75%  {background: #207ce5;}
    100% {background: white;}
}
</style>