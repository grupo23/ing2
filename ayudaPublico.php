<?php 
session_start();
if(sizeof($_SESSION) > 0) 
{
	if($_SESSION['TIPO'] == 0)
	{	include "/public/complementos/cabeceraAdministrador.inc";}
	else
	{	include "/public/complementos/cabeceraUsuario.inc";}
include "/public/complementos/posicionInvalida.inc";}
else
{include "/public/complementos/cabeceraPublico.inc";
include "/public/complementos/serviciosAyudaPublico.inc";
include "/public/complementos/regresarinicio.inc";}
include "/public/complementos/piePublico.inc";?>