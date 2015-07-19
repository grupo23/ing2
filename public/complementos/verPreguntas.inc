<div class="formWrapper " >
                <div>
                    <form id="formularioverOfertas" action="controllers/responderPregunta.php" name="formularioverOfertas" >
                    <div class="formGral">
                    <div class="formTitle" >Ver preguntas</div>
                       <?php
                        $idusu = $_GET["idUsuario"];
                        $prod = $_GET["idProducto"];
                        $sql = "SELECT DISTINCT oferta.idOferta FROM oferta INNER JOIN producto ON ( oferta.idProducto = producto.idProducto ) INNER JOIN consultaproducto ON ( consultaproducto.idOferta = oferta.idOferta ) WHERE producto.idProducto = $prod AND producto.estado = 'en subasta' ORDER BY oferta.idOferta";
                        $sth = $conexionPDO->prepare($sql);
                        $sth->execute();
                        $response = $sth->fetchAll(PDO::FETCH_ASSOC);
                        print_r($response);
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
                            if($preguntas["pregunta"]!="")
                              {  
                                ?><h3><span>pregunta: <?php echo $preguntas["pregunta"];?></span></h3><br><?php
                              }
                            }
                          }
                            else
                            {
                                if($preguntas["pregunta"]=="")
                                {
                                 echo("Este producto no posee preguntas");
                                }
                            }
                         }
                         ?>
                   </div>
                 </form>
                 <a href="javascript:history.back(-1);" ><img class="volver" src="pictures/sistema/volver.png"></a>
              </div>
    </div>