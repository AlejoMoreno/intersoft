<?php 
/*importar librerias*/
include_once('../class/Visual.php');

//creacion de objetos
$visual = new Visual();

echo $visual->encabezado('Login'); 
echo $visual->html_login();

?>


<script type="text/javascript">
    function Redirect(url) {
        $('#cargando').show();
        window.location=url;
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