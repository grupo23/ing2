<div class="formWrapper " >
                <div>
                    <form id="formularioverOfertas" action="controllers/responderPregunta.php" name="formularioverOfertas" >
                    <div class="formGral">
                    <div class="formTitle" >Preguntas para el producto<br> <?php echo $_GET["nombre"]; ?> <br><br></div>
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
                                ?><h3><span>pregunta: <?php echo $preguntas["pregunta"];?></span></h3><br><?php
                                ?><h3><span>respuesta: <?php echo $preguntas["respuesta"];?></span></h3><br><?php
                              }
                            else
                            {
                                if($preguntas["respuesta"]=="")
                                {
                             ?>
                                <h3><span>pregunta: <?php echo $preguntas["pregunta"];?></span></h3>
                                <div class="pregunta">
                                <form method="get" action="controllers/responderPregunta.php" name="formPregunta">
                                <input class="recuadro" name="idOferta" type="hidden" value="<?php echo $preguntas["idOferta"]; ?>" required/>
                                <input class="recuadro" name="idConsulta" type="hidden" value="<?php echo $preguntas["idConsulta"]; ?>" required/>
                                <textarea class="recuadro" name="respuesta" type="text" placeholder="escriba su respuesta" required></textarea>
                                <input class="botonofertando" id="ofertando" name="ofertando" type="submit" value="enviar" required/>
                                </form>
                                </div>
                              <?php
                                }
                            }
                        ?> <br> <?php
                        }//end del for
                      }
                      else
                      {
                        echo("Este producto no posee preguntas");
                      }
                      }
                       ?>
                       
                       
                   </div>
                 </form>
                 <a href="javascript:history.back(-1);" ><img class="volver" src="pictures/sistema/volver.png"></a>
              </div>
    </div>