<?php
require_once("../public/complementos/conexion.php");


if(isset($_SESSION)) 
{include "../public/complementos/cabeceraUsuario.inc";
include "../public/complementos/posicionInvalida.inc";
include "../public/complementos/piePublico.inc";}
else
{
	if(isset($_POST["reguntaconsulta"]) & isset($_POST["correo"]) & isset($_POST["contenido"]))
    {
            ?><script> alert("se envio la pregunta o sujerencia");
                document.location = "../index.php";</script><?php
    }
    else
    {
        ?><script> alert("uno o mas datos son nulos");
        document.location = "../index.php";</script><?php
    }
}
?>