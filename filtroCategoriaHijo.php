<?php 
session_start();
if(sizeof($_SESSION) > 0) 
{
	if($_SESSION['TIPO'] == 0)
	{	include "/public/complementos/cabeceraAdministrador.inc";}
	else
	{	include "/public/complementos/cabeceraUsuario.inc";}
}
else
{include "/public/complementos/cabeceraPublico.inc";}
include "/public/complementos/filtroCategoriaHijo.inc";
include "/public/complementos/piePublico.inc";
?>