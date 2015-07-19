<?php 
if(isset($_GET["idUsuario"]))
{
	$usu=$_GET["idUsuario"];
	$sql = "SELECT * FROM usuario WHERE idUsuario = $usu";
    $sth = $conexionPDO->prepare($sql);
    $sth->execute();
    $response = $sth->fetchAll(PDO::FETCH_ASSOC);
    if(isset($response[0]))
    {
    	$response=$response[0];
    	?>
    	<div class="tablacontacto">
    		<h3><div class="fila">
				<div class="col"><span>nombre: </span></div> 
				<div class="col"><span><?php echo $response["nomyap"]?></span></div>		
    		</div>
    		<div class="fila">
				<div class="col"><span>correo electronico: </span></div> 
				<div class="col"><span><?php echo $response["mail"]?></span></div>			
    		</div>
    		<div class="fila">
				<div class="col"><span>direccion: </span></div> 
				<div class="col"><span><?php echo $response["direccion"]?></span></div>   		
    		</div>
    		<div class="fila">  
				<div class="col"><span>telefono: </span></div> 
				<div class="col"><span><?php echo $response["telefono"]?></span></div>			
    		</div></h3>
    		<form action="controllers/contactar.php" method="POST">
    		<div class="fila">  
				<div class="col espacio"><span> </span></div> 	 		
    		</div>
    		<div class="fila">  
    			<textarea class="col mensaje" name="mensaje" type="text" placeholder="escriba su mensaje" required></textarea>
    		</div>
    		<div class="fila">  
    			<input class="col" name="botoncontacto" type="submit" value="contactar" required>
    		</div>
    		</form>
    	</div>
    	<?php
    }
    else
    {
    	?><script> alert("no se encontro l usuario");
        document.location = "misOfertas.php";</script><?php
    }
}
else
{
    ?><script> alert("uno o mas datos son nulos");
    document.location = "misOfertas.php";</script><?php
}
?>