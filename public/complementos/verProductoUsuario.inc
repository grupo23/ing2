<?php include "categorias.inc";?>
<div class="datosprod">
<img class="imagenProducto" src="pictures/productos/<?php echo $_GET["imagen"];?>">
</div>
<div class="descrip">
    <h2>nombre del producto: <?php echo $_GET["nombre"];?></h2><br>
    <span>descripcion: <?php echo $_GET["descripcion"];?></span><br>
    <span>cantidad: <?php echo $_GET["cantidad"];?></span><br>
    <span>fecha de finalizacion: <?php echo $_GET["fechaFin"];?></span><br>
    <a href="ofertar.php?idProducto=<?php echo $_GET["idProducto"];?>" ><img class="postularse" src="pictures/sistema/ofertar.png"></a> 
    <a href="index.php" ><img class="volver" src="pictures/sistema/volver.png"></a> 
</div>
