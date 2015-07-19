<?php 
session_start();
if(sizeof($_SESSION) > 0) 
{
	
	if($_SESSION['TIPO'] == 0)
	{	include "/public/complementos/cabeceraAdministrador.inc";
		include "/public/complementos/verProductoPublico.inc";}
	else
	{	include "/public/complementos/cabeceraUsuario.inc";
		include "/public/complementos/verProductoUsuario.inc";}
}
else
{include "/public/complementos/cabeceraPublico.inc";
include "/public/complementos/verProductoPublico.inc";}

include "/public/complementos/piePublico.inc";?>