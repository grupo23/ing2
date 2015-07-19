<?php
require_once("../public/complementos/conexion.php");
session_start();
 $aux = $_SESSION['ID'];
 $producto = $_GET["idProducto"];

if (isset($_GET["idProducto"])) 
{
		$sth = $conexionPDO->prepare("DELETE FROM producto WHERE idProducto = $producto"); 
		$sth->execute();
}
?><script> alert("el producto ha sido eliminado");
            document.location = "../verMisProductosOfertados.php";</script>
