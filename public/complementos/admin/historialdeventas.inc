<div class="conthisven">
<div class="containerHistorialVentas">
      <?php
     $Query= $conexionPDO->prepare("SELECT v.idVenta,v.fecha,v.precioTotal,usuarioVendedor.nomyap AS nomVendedor ,p.nombre,usuarioComprador.nomyap AS nomComprador,usuarioVendedor.imagen AS imagenVendedor,usuarioComprador.imagen AS imagenComprador ,p.imagen FROM venta v  INNER JOIN oferta o INNER JOIN  usuario usuarioVendedor INNER JOIN producto p INNER JOIN usuario usuarioComprador ON(v.idOferta = o.idOferta AND o.idUsuario = usuarioComprador.idUsuario AND o.idProducto = p.idProducto AND p.idUsuario = usuarioVendedor.idUsuario AND p.estado = 'finalizado')");

      
     $Query->execute();
     $consulta= $Query->fetchAll(PDO::FETCH_ASSOC);
     if(!isset($consulta[0])){
     	echo "<h1>no se realizo ninguna venta</h1>";
     }
     else{
    
   $cont=0;
foreach($consulta as $venta)
{
if($cont==0)
  {
    
    ?><div class="fila"><?php
  } 
	
?>

<div class="col">
        <!--<div class="espacioDeVenta"></div>-->
       <div class="cajaVenta" id="<?php echo $venta["idVenta"];?>" style="background-color:#f0f0f0" onmousemove="cambiar('<?php echo $venta["idVenta"];?>','#cccccc')" onmouseout="cambiar('<?php echo $venta["idVenta"];?>','#f0f0f0')">
            <!--<div class="espacioDeVenta"></div>-->
            <div class="filaVenta">
             <div class="cuadradoVenta">
                   fecha de la venta:<?php echo " ".$venta['fecha'];?>
                   <br>
                   precio final de venta:<?php echo " $".$venta["precioTotal"]?>

             </div>

             <div class="cuadradoVenta">
                   vendedor:<?php echo $venta["nomVendedor"]?>
                   <br>
                   <img class="imagenCuadradoVenta" src="../pictures/Users/<?php echo $venta["imagenVendedor"];?>">

             </div>
            </div>
           
           <div class="filaVenta">
             <div class="cuadradoVenta">
                     nombre de producto:<?php echo $venta["nombre"]?>
                   <br>
                   <img class="imagenCuadradoVenta" src="../pictures/productos/<?php echo $venta["imagen"];?>">
             </div>
             <div class="cuadradoVenta">
                    Comprador:<?php echo $venta["nomComprador"]?>
                   <br>
                   <img class="imagenCuadradoVenta" src="../pictures/Users/<?php echo $venta["imagenComprador"];?>">

             </div>
           </div>
      </div>
</div>
<?php
	 
  $cont++;
  if($cont==2)
  {
    $cont=0;
    ?></div><?php
  } 
 }
}

?>
        

 </div>

</div>







 



































</div>