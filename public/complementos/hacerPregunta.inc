<?php 
    $user = $_GET["idUsuario"];
    $prod = $_GET["idProducto"];
    $sth = $conexionPDO->prepare("SELECT idOferta FROM oferta WHERE idProducto = $prod AND idUsuario = $user");
    $sth->execute();
    $response = $sth->fetchAll(PDO::FETCH_ASSOC);
    $response = $response[0];
?>
  <div class="pregunta">
	<form method="post" action="controllers/hacerPregunta.php" name="formPregunta">
                  <div class="formTitle">Realizar Pregunta</div>
		            <input class="recuadro" name="idOferta" type="hidden" value="<?php echo $response["idOferta"]; ?>" required/>
    	            <textarea class="recuadro" name="pregunta" type="text" placeholder="escriba su pregunta" required></textarea>
    	            <input class="botonofertando" id="ofertando" name="ofertando" type="submit" value="enviar" required/>
	          </form>
	             <a href="javascript:history.back(-1);" ><img class="volver" src="pictures/sistema/volver.png"></a>
</div>
