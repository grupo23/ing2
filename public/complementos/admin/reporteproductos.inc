<div class="containerProductos">
   <?php
     $Query= $conexionPDO->prepare("SELECT  p.idProducto,p.nombre AS nombreProducto,p.descripcion,p.estado,p.fechaFin,c.nombre AS nombreCategoria,u.idUsuario,u.nomyap,u.mail,p.imagen FROM producto p INNER JOIN usuario u INNER JOIN categoria c ON(p.idUsuario = u.idUsuario AND p.idCategoria = c.idCategoria) ORDER BY p.estado");
     $Query->execute();
    $consulta= $Query->fetchAll(PDO::FETCH_ASSOC);
   // print_r($consulta);

   if (!isset($consulta[0])) {
        echo "<h2>la consulta no devolvio nada</h2>";
   }
  else{
     ?>
      <table  align="center" width="700" height="200" font-size="100%" id="tabla">
                                  <tr style=" background-color:#666666; color:#FFFFFF; font-weight:bold;height:100">

                                 <td width="10" align="center" valign="top">
                                            <font size="3">nombre</font>
                                 </td>
                                 <td width="20" align="center" valign="top">
                                           <font size="3"> descripcion</font>
                                </td>
                                 <td width="10" align="center" valign="top">
                                            <font size="3">categoria</font>
                                 </td>

                                    <td width="20" align="center" valign="top">
                                            <font size="3">estado</font>
                                   </td>
                                    <td width="35" align="center" valign="top">
                                            <font size="3">fecha fin</font>
                                   </td> 
                                   <td width="20" align="center" valign="top">
                                            <font size="3">datos subastador</font>
                                   </td> 
                                   
                                   
                                     <td width="64" align="center" valign="top">
                                            <font size="3">imagen</font>
                                     </td> 
                                  


                                 </tr>
                  
                                <?php

                                foreach($consulta as $producto)
                                {
                                    ?>
                                <tr id="<?php echo $producto["idProducto"];?>" style="background-color:#f0f0f0" onmousemove="cambiar('<?php echo $producto["idProducto"];?>','#cccccc')" onmouseout="cambiar('<?php echo $producto["idProducto"];?>','#f0f0f0')">
                            
                                  <td width="10" align="center" valign="middle">
                                    <div align="justify">
                                        <font size="3"> <?php echo $producto["nombreProducto"];?></font>
                                    </div>
                                  </td>
                                  <td width="20" align="center" valign="middle">
                                           <font size="3"><?php echo $producto["descripcion"];?></font>
                                  </td>

                                  <td width="10" align="center" valign="middle">
                                           <font size="3"><?php echo $producto["nombreCategoria"];?></font>
                                  </td>
                                   <td width="20" align="center" valign="middle">
                                         <font size="3"> <?php echo $producto["estado"];?></font>
                                  </td>
                                  <td width="35" align="center" valign="middle">
                                         <font size="3"> <?php echo $producto["fechaFin"];?></font>
                                  </td>
                                  <td width="20" align="center" valign="middle">
                                          <font size="3"><?php echo "usuario#".$producto["idUsuario"]."<br>";
                                            echo $producto["nomyap"]."<br>";
                                            echo $producto["mail"];
                                             ?></font>
                                  </td>
                                  
                                 <!--   <td width="64" align="center" >
                                         <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $usuario['imagen'] ).'" width="64" height="64" border="0"/>';?>
                                  </td>
                                  -->
                                  <td width="64" align="center">
                                       <img src="../pictures/productos/<?php echo $producto["imagen"]?>" style="max-width: 128px;max-height: 128px;" border="0">
                                         
                                  </td>
                                 </tr>
                               <?php
                               }
                              ?>
                 
                           </table>
                            <?php

    }
    ?>
                        <!--   <?php


   ?>                        -->


</div>
