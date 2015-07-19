<?php
require_once("../public/complementos/conexion.php");
session_start();
 $aux=$_GET["idUsuario"];

if (isset($_GET["idUsuario"])) 
{
		$sth = $conexionPDO->prepare("DELETE FROM usuario WHERE idUsuario = $aux"); 
		$sth->execute();
        session_destroy();
}
?><script> alert("el usuario ha sido eliminado");
            document.location = "../index.php";</script>


