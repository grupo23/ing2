<div class="ofer">
	<form method="post" action="controllers/ofertando.php" name="formOfertando">
		<input class="recuadro" name="precio" type="number" min="1" placeholder="escriba un precio" required/>
		<input class="recuadro" name="idProducto" type="hidden" value="<?php echo $_GET["idProducto"];?>" required/>
    	<textarea class="recuadro" name="razon" type="text" placeholder="escriba su razon" required></textarea>
    	<input class="botonofertando" id="ofertando" name="ofertando" type="submit" value="enviar" required/>
	</form>
	<a href="javascript:history.back(-1);" ><img class="volver" src="pictures/sistema/volver.png"></a> 
</div>