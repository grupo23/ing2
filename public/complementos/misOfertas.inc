
 <div class="wrapper " >
  <div>
  <form id="formularioverOfertas" action="controllers/misOfertas.php" name="formularioverOfertas" >
  <div class="misOfertas"><h2>Ofertas a mis productos</h2></div>
  <div class="contenedor2">
    <?php
    $idusu=$_SESSION['ID'];

$sql = "SELECT DISTINCT oferta.idOferta,oferta.idProducto,oferta.notificacionOferta FROM oferta INNER JOIN producto ON ( oferta.idProducto = producto.idProducto ) WHERE producto.idUsuario = '$idusu' AND producto.estado = 'en subasta' ORDER BY oferta.idOferta";
    $sth = $conexionPDO->prepare($sql);
    $sth->execute();
    $response = $sth->fetchAll(PDO::FETCH_ASSOC);

    
    foreach ($response as $oferta) {
        if ($oferta["notificacionOferta"] == 1) {
            $sql = "UPDATE oferta SET notificacionOferta=0 WHERE idOferta = :idOferta";
            $sth = $conexionPDO->prepare($sql);
            $sth->bindValue(":idOferta", $oferta["idOferta"]);
            $sth->execute();
            $response = $sth->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    $dt = new DateTime();
    $fechaActual = $dt->format('Y-m-d');
    $sql = "SELECT DISTINCT producto.idProducto, producto.imagen, producto.estado FROM oferta INNER JOIN producto ON ( oferta.idProducto = producto.idProducto ) WHERE producto.idUsuario = '$idusu' AND fechafin <= '".$fechaActual."'";
    $sth = $conexionPDO->prepare($sql);
    $sth->execute();
    $response = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($response as $producto) 
    {
      $elementos = $producto['idProducto'];
      $sth = $conexionPDO->prepare("SELECT * FROM oferta WHERE idProducto = $elementos ORDER BY idProducto" );
      $sth->execute();
      $res = $sth->fetchAll(PDO::FETCH_ASSOC);
      ?><div class="razonimagen"><?php
      ?><div class="fila"><div class="imagenprodofer"><img class="imagenimagen" src="pictures/productos/<?php echo $producto["imagen"]?>"></div></div><?php
      if($producto["estado"] == "en subasta")
      {
        foreach ($res as $razones)
        {
          ?><div class="col"><div class="razonganador"><div class="fila"><span><?php echo $razones["razon"];?></span></div>
          <div class="fila"><a href="javascript:void(0)" title="elegir ganador" onClick="elegirGanador('<?php echo $razones["idOferta"];?>')"><img src="pictures/sistema/elegir ganador.png"></a></div>
          <?php
        }
      }
      else
      {
        ?><div class="col"><div class="razonganador"><div class="fila estadoProducto"><span>&nbsp&nbsp<?php echo $producto["estado"];?></span></div>

        <?php
              $idProductoActual=$producto["idProducto"];
              $estadoProductoActual=$producto["estado"];
              $sthd = $conexionPDO->prepare("SELECT DISTINCT oferta.estado, oferta.idOferta, oferta.idUsuario FROM oferta INNER JOIN producto ON ( oferta.idProducto = producto.idProducto ) WHERE oferta.estado <> 'en espera' AND producto.idProducto = $idProductoActual");
              $sthd->execute();
              $resOferta = $sthd->fetchAll(PDO::FETCH_ASSOC);
              
              
              $idOfertaGanador=$resOferta[0]["idOferta"];

          $sthx = $conexionPDO->prepare("SELECT * FROM venta WHERE idOferta = $idOfertaGanador" );
          $sthx->execute();
          $venta = $sthx->fetchAll(PDO::FETCH_ASSOC);
          
          
          if(isset($venta[0]))
          {
            $venta=$venta[0];
          if($estadoProductoActual == "finalizado" & $venta["estado"] == "a confirmar")
          {
            ?>
              <?php
          }
          if($producto["estado"] == "finalizado" & $venta["estado"] == "finalizado")
          {
            ?>
              <?php
          }
          }
          ?>
          <div class="fila"><a href="contactar.php?idUsuario=<?php echo $resOferta[0]["idUsuario"];?>" title="contactar ganador"><img src="pictures/sistema/contactar ganador.png"></a></div><?php
      }
      ?> </div><br> <?php
      ?><hr style="height:3px;background-color:#080808;width:100%;"></div></div><div class="col" style="width:25px;"></div><?php
    }
    ?>
   </div>
  </form>
  </div>
</div>