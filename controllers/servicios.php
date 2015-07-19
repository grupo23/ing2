<?php 
if(isset($_SESSION)) 
{include "../public/complementos/cabeceraUsuario.inc";
include "../public/complementos/posicionInvalida.inc";
include "../public/complementos/piePublico.inc";}
else
{
	if($('#myDataButton').click(function ()))
    {
        ?><script> alert("correo ya registrado, intente con otro");
            document.location = "../modificarDatos.php";</script><?php
    }
    else
    {
        if(isset($_POST["newproductButton"]))
         {
            ?><script> alert("correo ya registrado, intente con otro");
            document.location = "../registrarProducto.php";</script><?php
         }
         else
          if(isset($_POST["myofertButton"]))
         {
            ?><script> alert("correo ya registrado, intente con otro");
            document.location = "../misOfertas.php";</script><?php
         }  
    }
   }     
?>