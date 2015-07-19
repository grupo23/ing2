<div class="formWrapper " >
                <div>
                    <form id="formularioverOfertas" action="controllers/verMisProductosRegistrados.php" name="formularioverOfertas" >
                    <div class="formTitle">Mis Productos Registrados</div>
                    <div class="contenedor2">
                        <?php
                        $idusu=$_SESSION['ID']; 
                        $sth = $conexionPDO->prepare("SELECT * FROM producto WHERE idUsuario = $idusu AND estado = 'en subasta'");
                        $sth->execute();
                        $response = $sth->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($response as $producto) 
                        {
                            ?><input name="idProducto" type="hidden" value="<?php echo $producto["idProducto"]?>"/>
                             <div class="imagenprodofer"><img class="imagenimagen" src="pictures/productos/<?php echo $producto["imagen"]?>"></div><?php
                             ?><div class="razonganador"><div class="col"><span></span></div>
                             <div class="col"><a href="javascript:void(0)" title="Eliminar Producto" onClick="eliminarProducto('<?php echo $producto["idProducto"]?>')"><img src="pictures/sistema/eliminar producto.png"></a></div>
                             <div class="col"><a href="responderPregunta.php?idUsuario=<?php echo $idusu;?>& idProducto=<?php echo $producto["idProducto"];?>&nombre=<?php echo $producto["nombre"];?>"><img src="pictures/sistema/responder pregunta.png"></a></div></div>
                             <?php
                        }
                        ?>
                       
                   </div>
                 </form>
              </div>
    </div>