<div class="formWrapper " >
                <div>
                    <form id="formularioverOfertas" name="formularioverOfertas" >
                    <div class="formGral">
                    <div class="formTitle" >Preguntas para el producto<br><br></div>
                        <?php
                        $idusu = $_GET["idUsuario"];
                        $prod = $_GET["idProducto"];
                        $sql = "SELECT DISTINCT oferta.idOferta FROM oferta INNER JOIN producto ON ( oferta.idProducto = producto.idProducto ) INNER JOIN consultaproducto ON ( consultaproducto.idOferta = oferta.idOferta ) WHERE producto.idProducto = $prod AND producto.estado = 'en subasta' ORDER BY oferta.idOferta";
                        $sth = $conexionPDO->prepare($sql);
                        $sth->execute();
                        $response = $sth->fetchAll(PDO::FETCH_ASSOC);
                        
                        foreach ($response as $oferta) 
                        {
                          
                           $ofert = $oferta["idOferta"];
                           $sth = $conexionPDO->prepare("SELECT * FROM consultaproducto WHERE idOferta = $ofert" );
                           $sth->execute();
                           $res = $sth->fetchAll(PDO::FETCH_ASSOC);
                           if(!empty($res))
                           { 
                           
                           foreach ($res as $preguntas)
                           {
                            if($preguntas["respuesta"]!="")
                              {  
                                ?><h3><span>pregunta: <?php echo $preguntas["pregunta"];?></span><br>
                                <span>respuesta: <?php echo $preguntas["respuesta"];?></span></h3><br><?php
                                $datos["notificacionRespuesta"] = 0;
                                ksort($datos);
                               $fieldDetails = NULL;
                               foreach ($datos as $key => $values) 
                               {
                                $fieldDetails .= "$key=:$key,";
                               }
                               $idOferta = $preguntas["idOferta"];
                               $fieldDetails = rtrim($fieldDetails, ',');
                                 $sth = $conexionPDO->prepare("UPDATE consultaproducto SET $fieldDetails WHERE idOferta = $idOferta");
                               foreach ($datos as $key => $value) 
                               {
                                $sth->bindValue(":$key", $value);
                               }
                               $sth->execute();

                              }
                             
                            }
                            
                          }
                        else
                        {
                           echo("Este producto no posee respuestas");
                         }
                     }

                       ?>
                       
                       
                   </div>
                 </form>

                 <a href="javascript:history.back(-1);" ><img class="volver" src="pictures/sistema/volver.png"></a>
              </div>
    </div>