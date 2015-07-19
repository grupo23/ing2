<?php require_once("/public/complementos/conexion.php");?>
<!doctype html>
<html lang="es">

	<head>
		<title></title>
		<meta http equiv="Content Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="public/css/general.css">
		<link rel="stylesheet" type="text/css" href="public/css/categorias.css" />
        <script src="public/js/jquery-1.11.2.js"></script>
        <script src="public/js/busquedas.js" type="text/javascript"></script> 
        <script src="public/js/general.js" type="text/javascript"></script>
	</head>
<body>
		<header>
		<?php
                $id = $_SESSION["ID"];
                
                //Notificación de ganador
                $sql = "SELECT DISTINCT oferta.idOferta FROM oferta WHERE oferta.idUsuario = '$id' AND oferta.estado = 'a confirmar' ORDER BY oferta.idOferta";
                $sth = $conexionPDO->prepare($sql);
                $sth->execute();
                $response = $sth->fetchAll(PDO::FETCH_ASSOC);
                $cantGanador = 0;

                foreach ($response as $oferta) {
                        $cantGanador++;
                }

                //Notificación de ofertas
                $sql = "SELECT DISTINCT oferta.idOferta, oferta.notificacionOferta FROM oferta INNER JOIN producto ON ( oferta.idProducto = producto.idProducto ) WHERE producto.idUsuario = '$id' AND producto.estado = 'en subasta' ORDER BY oferta.idOferta";
                $sth = $conexionPDO->prepare($sql);
                $sth->execute();
                $response = $sth->fetchAll(PDO::FETCH_ASSOC);
                $cantOferta = 0;

                //print_r($response);

                foreach ($response as $oferta) {
                    if ($oferta["notificacionOferta"] == 1) {
                        $cantOferta++;
                        //print_r($cantOferta);
                    }
                }

                //Notificación de preguntas a mis productos
                $sql = "SELECT DISTINCT oferta.idOferta,consultaproducto.notificacionPregunta FROM oferta INNER JOIN producto ON ( oferta.idProducto = producto.idProducto ) INNER JOIN consultaproducto ON ( consultaproducto.idOferta = oferta.idOferta ) WHERE producto.idUsuario = '$id' AND producto.estado = 'en subasta' ORDER BY oferta.idOferta";
                $sth = $conexionPDO->prepare($sql);
                $sth->execute();
                $response = $sth->fetchAll(PDO::FETCH_ASSOC);
                $cantPregunta = 0;

                //print_r($response);

                foreach ($response as $oferta) {
                    if ($oferta["notificacionPregunta"] == 1) {
                        $cantPregunta++;
                        //print_r($cantPregunta);
                    }
                }
                
                //Notificación de respuestas a mis pregutas por oferta
                $sql = "SELECT DISTINCT oferta.idOferta,consultaproducto.notificacionRespuesta FROM oferta INNER JOIN consultaproducto ON ( consultaproducto.idOferta = oferta.idOferta ) WHERE oferta.idUsuario = '$id' ORDER BY oferta.idOferta";
                $sth = $conexionPDO->prepare($sql);
                $sth->execute();
                $response = $sth->fetchAll(PDO::FETCH_ASSOC);

                $cantRespuesta = 0;
                
                foreach ($response as $notificaciones) {
                    if ($notificaciones["notificacionRespuesta"] == 1) {
                        $cantRespuesta++;
                        //print_r($cantRespuesta);
                    }
                }
                $hayNotificaciones = $cantPregunta + $cantRespuesta + $cantOferta; 
                ?>
		<?php 
		$sql="SELECT * FROM usuario WHERE idUsuario = :idUsuario";
        $sth = $conexionPDO->prepare($sql);
        $sth->bindValue(":idUsuario",$_SESSION['ID']);
        $sth->execute();
        $response = $sth->fetchAll(PDO::FETCH_ASSOC);
        $response=$response[0];
		?>
			<div class="cabecera">
				<a href="index.php" ><img class="logosubasta" src="pictures/sistema/bestnid.png"></a>
				<a href="index.php" ><img class="bestnid" src="pictures/sistema/bestnid logo.png"></a>
				<a href="contactenos.php" ><img class="contactoUsuario" src="pictures/sistema/contactenos.png"></a>
				<a href="modificardatos.php" ><div class="servicios"><span><?php echo $response["nomyap"];?></span></div></a> 
				<a href="controllers/cerrarsesion.php" ><img class="salir" src="pictures/sistema/salir.png"></a> 
				<a href="ayudaUsuario.php" ><img class="ayuda" src="pictures/sistema/ayuda.png"></a> 
				<?php
				if($hayNotificaciones != 0){?>
				<a href="verMisNotificaciones.php"><img class="notificaciones" src="pictures/sistema/notificacion de alerta.png"></a>

					<?php
					}?>
        	</div>
		</header>
	<section>
	<br><br><br><br><br><br>
	<div id="contenedor">