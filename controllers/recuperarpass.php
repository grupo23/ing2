<?php
require_once("../public/complementos/conexion.php");


if(isset($_SESSION)) 
{include "../public/complementos/cabeceraUsuario.inc";
include "../public/complementos/posicionInvalida.inc";
include "../public/complementos/piePublico.inc";}
else
{
   if (isset($_POST["mail"])) 
   {
     
    $sql="SELECT * FROM usuario WHERE mail = :mail";
		$sth = $conexionPDO->prepare($sql);
		$sth->bindValue(":mail",$_POST["mail"]);
		$sth->execute();
		$response = $sth->fetchAll(PDO::FETCH_ASSOC);
      if (!isset($response[0])) 
         {
            ?><script> alert("No se encuentra registrado con ese correo.Intente nuevamente");
            document.location = "../recuperarpass.php";</script><?php
         } 
         else 
          {
            ?><script> alert("Se ha enviado la clave a tu correo electronico!");
            document.location = "../index.php";</script><?php
          }
        }
  }
	
?>