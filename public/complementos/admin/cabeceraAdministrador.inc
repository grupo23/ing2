<?php require_once("../public/complementos/conexion.php");?>
<!doctype html>
<html lang="es">

	<head>
		<title></title>
		<script type="text/javascript">
	     function cambiar(id,color)
          {
                document.getElementById(id).style.backgroundColor=color;
          }
        </script>
		<meta http equiv="Content Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="../public/css/general.css">
		<link rel="stylesheet" type="text/css" href="../public/css/categorias.css" />
        <script src="../public/js/jquery-1.11.2.js"></script>
        <script src="../public/js/busquedas.js" type="text/javascript"></script> 
        <script src="../public/js/general.js" type="text/javascript"></script>
	</head>
<body>
		<header>
			<div class="cabecera">
				<a href="../index.php" ><img class="logosubasta" src="../pictures/sistema/bestnid.png"></a>
				<a href="../index.php" ><img class="bestnid" src="../pictures/sistema/bestnid logo.png"></a>
				<a href="../admin/gestioncategorias.php" ><img class="admin" src="../pictures/sistema/administrar.png"></a> 
				<a href="../controllers/cerrarsesion.php" ><img class="salir" src="../pictures/sistema/salir.png"></a> 
				<a href="../admin/ayudasCategorias.php" ><img class="ayuda" src="../pictures/sistema/ayuda.png"></a> 
        	</div>
		</header>
	<section>
	<br><br><br><br><br><br>
	<div id="contenedor">