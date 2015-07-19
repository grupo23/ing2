<?php
require_once("../public/complementos/conexion.php");
session_start();
 $aux = $_SESSION['ID'];
 $oferta = $_GET["idOferta"];

if (isset($_GET["idOferta"])) 
{
		$sth = $conexionPDO->prepare("DELETE FROM oferta WHERE idOferta = $oferta"); 
		$sth->execute();
}
?><script> alert("la oferta ha sido eliminada");
            document.location = "../administrarMisOfertas.php";</script>
