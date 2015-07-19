<div class="formWrapper " >
                <div>
                    
                    <div class="formTitle">Mis Ofertas a Confirmar</div>
                    <div class="contenedor2">
                        <?php
                        $idusu=$_SESSION['ID'];
                        $sql = "SELECT DISTINCT producto.idProducto, producto.imagen, oferta.razon FROM oferta INNER JOIN producto ON ( oferta.idProducto = producto.idProducto ) WHERE oferta.idUsuario = '$idusu' AND producto.estado = 'a confirmar'";
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
                            <div class="col"><a href="confirmando.php?idOferta=<?php echo $razones["idOferta"];?>"><img src="pictures/sistema/confirmar oferta.png"></a></div>
                            <?php
                            }
                        ?> </div><br> <?php
                        }
                       ?>
                       
                       
                   </div>
                 <a href="javascript:history.back(-1);" ><img class="volver" src="pictures/sistema/volver.png"></a>
              </div>
    </div>