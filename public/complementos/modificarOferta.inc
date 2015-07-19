<?php 
    $user = $_GET["idUsuario"];
    $prod = $_GET["idProducto"];
    $razon = $_GET["razon"];
    $sth = $conexionPDO->prepare("SELECT * FROM oferta WHERE idProducto = $prod AND idUsuario = $user AND razon = '$razon'");
    $sth->execute();
    $response = $sth->fetchAll(PDO::FETCH_ASSOC);
    $response = $response[0];

?>
  <div class="formWrapper" >
                <form id="formulariomodificar" name="formulariomodificar" action="controllers/modificarOferta.php" enctype="multipart/form-data" method="post">
                    <div class="formTitle">Modificar Ofertas</div>
                    <input class="recuadro" name="idOferta" type="hidden" value="<?php echo $response["idOferta"]; ?>" required/>
                    <input class="recuadro" name="idUsuario" type="hidden" value="<?php echo $response["idUsuario"]; ?>" required/>
                    <input class="recuadro" name="idProducto" type="hidden" value="<?php echo $response["idProducto"]; ?>" required/>
                    <input class="recuadro" name="precio" type="text" pattern="[0-9]*" value="<?php echo $response["precio"]; ?>" required/>
                    <input class="recuadro" name="razon" type="text" value="<?php echo $response["razon"]; ?>" required/>
                    <input id="myDataButton" name="myDataButton" type="submit" value="actualizar" required/>
                    
                    </form> 
                    <a href="javascript:void(0)" title="Eliminar" onClick="eliminarOferta('<?php echo $response["idOferta"];?>')"><img src="pictures/sistema/eliminar oferta.png"></a>
                    
                
</div>

              