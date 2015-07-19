<?php
require_once("../public/complementos/conexion.php");


if(isset($_SESSION)) 
{include "../public/complementos/cabeceraUsuario.inc";
include "../public/complementos/posicionInvalida.inc";
include "../public/complementos/piePublico.inc";}
else
{
	if(isset($_POST["mensaje"]))
    {
		if(sizeof($_POST["mensaje"])>0)
        {
            ?><script> alert("se envio el mensaje");
                document.location = "../misOfertas.php";</script><?php
        }
        else
        {
            ?><script> alert("escriba un mensaje");
            document.location = "../misOfertas.php";</script><?php
            
        }
    }
    else
    {
        ?><script> alert("dato nulo");
        document.location = "../misOfertas.php";</script><?php
    }
}
?>