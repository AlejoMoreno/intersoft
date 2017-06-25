<?php 
/*importar librerias*/
include_once('../class/Visual.php');

//creacion de objetos
$visual = new Visual();

?>

<!DOCTYPE html>
<html>
<?php echo $visual->encabezado('Login'); ?>
<body>
	<center style="padding-top:15%;padding-left: 15%;padding-right: 15%;">
	<form style="background: white;padding: 30px;border-radius: 10px 10px 10px 10px;-moz-border-radius: 10px 10px 10px 10px;-webkit-border-radius: 10px 10px 10px 10px;border: 0px solid #000000;">
	  <p style="font-family: 'Amatic SC', cursive;font-size: 30px;">Bienvenido a Intersoft</p>
	  <div class="input-group">
	    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	    <input id="cedula" type="text" class="form-control" name="cedula" placeholder="Cédula">
	  </div>
	  <div class="input-group">
	    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	    <input id="password" type="password" class="form-control" name="password" placeholder="Password">
	  </div>
	  <div class="input-group"><br>
	    <button type="button" class="btn btn-success" style="width: 200px;animation: myfirst 10s infinite;">Entrar</button>
	  </div>
	</form>
	</center>
</body>
</html>

<script type="text/javascript">
	function Redirect(url) {
	   setTimeout ("document.write('texto'); ", 2000);
       window.location="pages/"+url;
    }
</script>

<style type="text/css">
body{
	-webkit-animation: myfirst 10s infinite; /* Safari 4.0 - 8.0 */
    -webkit-animation-direction: alternate; /* Safari 4.0 - 8.0 */
    animation: myfirst 10s infinite;
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