<?php 
session_start();
if(sizeof($_SESSION) > 0) 
{
	
	if($_SESSION['TIPO'] == 0)
	{	include "../public/complementos/admin/cabeceraAdministrador.inc";
		include "../public/complementos/ayudaAdministrativos.inc";
		include "../public/complementos/admin/ayudasCategorias.inc";}
	else
	{	include "../public/complementos/cabeceraUsuario.inc";
		include "../public/complementos/posicionInvalida.inc";}
}
else
{include "../public/complementos/cabeceraPublico.inc";
include "../public/complementos/posicionInvalida.inc";}

include "../public/complementos/piePublico.inc";?>