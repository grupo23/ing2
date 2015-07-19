<div class="contenedorgeneral">
<div id="zonaFechasB" class="fechasUsers">
           <form name="forFechas" method="post" action="listadodeusuariosentredosfechas.php">
                                                fechaDesde:<input name="fechaDesde" type="date"  size="8" required><br>
                                                fechaHasta:  <input name="fechaHasta" type="date"  size="8" required><br>
                                                <input id="confirmar" type="submit" value="buscar usuarios"; >
                   <input type="button" value="visualizar todos los usuarios" onclick="document.location= 'listadodeusuarios.php';">


           </form>
</div>
<br>

<div class="containerUsers">
   <?php
     $fechaDesde=$_POST["fechaDesde"];
     $fechaHasta=$_POST["fechaHasta"];
     $Query= $conexionPDO->prepare("SELECT * FROM usuario WHERE( tipoUsuario=1 AND fechaRegistracion BETWEEN '$fechaDesde' AND '$fechaHasta') ORDER BY fechaRegistracion DESC");
     $Query->execute();
    $consulta= $Query->fetchAll(PDO::FETCH_ASSOC);
    
    if(!isset($consulta[0])){
    	echo "<h2>la consulta no devolvio nada</h2>";
    }
    else{
     ?>
      <table  align="center" width="700" height="150" font-size="100%" id="tabla">
                                  <tr style=" background-color:#666666; color:#FFFFFF; font-weight:bold;height:100">

                                 <td width="4" align="center" valign="top">
                                       <font size="4">id</font> 
                                   </td>
                                 <td width="30" align="center" valign="top">
                                            <font size="3">nombre y apellido</font>
                                 </td>
                                 <td width="12" align="center" valign="top">
                                           <font size="3"> dni</font>
                                </td>
                                    <td width="20" align="center" valign="top">
                                            <font size="3">mail</font>
                                   </td>
                                    <td width="35" align="center" valign="top">
                                            <font size="3">direccion</font>
                                   </td> 
                                   <td width="15" align="center" valign="top">
                                            <font size="3">telefono</font>
                                   </td> 
                                   <td width="15" align="center" valign="top">
                                            <font size="3">fecha registracion</font>
                                   </td>  
                                   
                                     <td width="64" align="center" valign="top">
                                            <font size="3">imagen</font>
                                     </td> 
                                  


                                 </tr>
                  
                                <?php

                                foreach($consulta as $usuario)
                                {
                                    ?>
                                <tr id="<?php echo $usuario["idUsuario"];?>" style="background-color:#f0f0f0" onmousemove="cambiar('<?php echo $usuario["idUsuario"];?>','#cccccc')" onmouseout="cambiar('<?php echo $usuario["idUsuario"];?>','#f0f0f0')">
                                  <td width="4" align="center" valign="middle">
                                    <div align="justify">
                                        <font size="4"> <?php echo $usuario["idUsuario"];?></font>
                                    </div>
                                  </td>
                                  <td width="30" align="center" valign="middle">
                                    <div align="justify">
                                        <font size="3"> <?php echo $usuario["nomyap"];?></font>
                                    </div>
                                  </td>
                                  <td width="12" align="center" valign="middle">
                                           <font size="3"><?php echo $usuario["dni"];?></font>
                                  </td>
                                   <td width="20" align="center" valign="middle">
                                         <font size="3"> <?php echo $usuario["mail"];?></font>
                                  </td>
                                  <td width="35" align="center" valign="middle">
                                         <font size="3"> <?php echo $usuario["direccion"];?></font>
                                  </td>
                                  <td width="15" align="center" valign="middle">
                                          <font size="3"><?php echo $usuario["telefono"];?></font>
                                  </td>
                                  <td width="15" align="center" valign="middle">
                                          <font size="3"><?php echo $usuario["fechaRegistracion"];?></font>
                                  </td>
                                 
                                  <td width="64" align="center">
                                       <img src="../pictures/Users/<?php echo $usuario["imagen"]?>" width="128" height="128" border="0">
                                         
                                  </td>
                                 </tr>
                               <?php
                               }
                              ?>
                 
                           </table>
                           <?php

    }
    ?>
                          <!-- <?php
   ?>                     -->
</div>

</div>