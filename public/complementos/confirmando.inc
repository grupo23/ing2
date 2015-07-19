<div class="tablaDatosTargeta">
<form method="post" action="controllers/creandoVenta.php">
<input type="hidden" name="idOferta" value="<?php echo $_GET["idOferta"];?>" required>
<div class="fila">
	<div class="col textotargeta"><span>tipo de tarjeta</span></div>
	<div class="col">
		<label for="varon"> visa: </label><input type="radio" name="tarjeta" id="visa" value="visa" required>&nbsp&nbsp&nbsp
		<label for="mujer"> mastercad: </label><input type="radio" name="tarjeta" id="mastercad" value="mastercad" required>
	</div>
</div>
<div class="fila">
	<div class="col textotargeta"><span>propietario de la tarjeta</span></div>
	<div class="col"><input name="nombreTarjeta" type="text" required></div>
</div>
<div class="fila">
	<div class="col textotargeta"><span>numero de tarjeta</span></div>
	<div class="col"><input name="numeroTarjeta" type="number" required></div>
</div>
<div class="fila">
	<div class="col textotargeta"><span>valida hasta</span></div>
	<div class="col"><input name="fechaTarjeta" type="date" required></div>
</div>
<div class="fila">
	<div class="col textotargeta"><span>CVV/CVC</span></div>
	<div class="col"><input name="cvvTarjeta" type="text" required></div>
</div>
<div class="fila">
	<div class="col textotargeta"><span></span></div>
	<div class="col"><img src="pictures/sistema/cvc.png"></div>
</div>
<div class="fila">
	<div class="col"><input name="botonTarjeta" type="submit" value="enviar"></div>
</div>
</form>
</div>