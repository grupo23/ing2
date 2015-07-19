<div class="formWrapper " >
                <div>
                    <form id="formularioverOfertas" action="controllers/misOfertas.php" name="formularioverOfertas" >
                    <div class="formTitle">Mis Postulaciones</div>
                    <div class="contenedor2">
                        <?php
                        $idusu=$_SESSION['ID'];
                        $sql = "SELECT DISTINCT producto.idProducto, producto.imagen, oferta.razon FROM oferta INNER JOIN producto ON ( oferta.idProducto = producto.idProducto ) WHERE oferta.idUsuario = '$idusu' AND producto.estado = 'en subasta'";
                        $sth = $conexionPDO->prepare($sql);
                        $sth->execute();
                        $response = $sth->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($response as $producto) 
                        {
                           $elementos = $producto['idProducto'];
                           $sth = $conexionPDO->prepare("SELECT * FROM oferta WHERE idProducto = $elementos AND idUsuario = $idusu" );
                           $sth->execute();
                           $res = $sth->fetchAll(PDO::FETCH_ASSOC);
                           foreach ($res as $razones)
                           { 
                            ?><div class="razonimagen"><?php
                           ?><div class="imagenprodofer"><img class="imagenimagen" src="pictures/productos/<?php echo $producto["imagen"]?>"></div><?php
                            ?>
                            <div class="col"><a href="modificarOferta.php?idUsuario=<?php echo $idusu;?>& idProducto=<?php echo $elementos;?>&razon=<?php echo $razones["razon"];?>"><img src="pictures/sistema/modificar oferta.png"></a></div>
                            <div class="col"><a href="verRespuestas.php?idUsuario=<?php echo $idusu;?>& idProducto=<?php echo $elementos;?>"><img src="pictures/sistema/ver respuestas.png"></a></div>
                            <div class="col"><a href="hacerPregunta.php?idUsuario=<?php echo $idusu;?>& idProducto=<?php echo $elementos;?>"><img src="pictures/sistema/hacer pregunta.png"></a></div><?php
                            }
                        ?> </div><br> <?php
                        }
                       ?>
                       
                       
                   </div>
                 </form>
              </div>
    </div>