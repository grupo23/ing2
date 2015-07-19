<?php 
session_start();
if(sizeof($_SESSION) > 0) 
{
	include "/public/complementos/cabeceraUsuario.inc";
	include "/public/complementos/modificarDatos.inc"
	include "/public/complementos/delete.inc";
}
else
{
	include "/public/complementos/cabeceraPublico.inc";
	include "/public/complementos/posicionInvalida.inc";
}
include "/public/complementos/piePublico.inc";
?>