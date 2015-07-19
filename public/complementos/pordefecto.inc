<?php include "categorias.inc";?>
<!--***************************pre consulta**********************************--> 
<?php
//SELECT * FROM producto WHERE nombre LIKE ? OR descripcion LIKE ? ORDER BY fechaIni ASC
$dt = new DateTime();
$fechaActual = $dt->format('Y-m-d');

$sql = "SELECT * FROM producto WHERE estado = 'en subasta' AND fechafin > '".$fechaActual."' AND ( nombre LIKE ? OR descripcion LIKE ? ) ORDER BY fechaIni ASC";
$stmt = $conexionPDO->prepare($sql);
$stmt->execute(array("%%", "%%"));

$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!--*************************************************************************-->               
            <div class= "subastas">
<!--*************************************************************************-->
  <div class="busquedas">
        <form id="buscar" name="buscar" action='busquedas.php' method="post" >
            <input id="barrabusqueda" class="barrabusqueda" name="barrabusqueda" type="text" value="" placeholder="Escriba nombre o descripcion" />
            <input id="idcategoriap" class="idcategoriap" name="idcategoriap" type="hidden" value="" required/>
            <input id="botonbusqueda" class="botonbusqueda" name="botonbusqueda" type="submit" value="buscar" required/>
        </form>
  </div>  
    <br><br><br><br>    
<?php
$cont=0;
foreach($res as $f)
{$cont++;
?>
    <div class="espacio"></div>
    <div class="prod"><h2><?php echo $f["nombre"];?></h2><br>
    <a class="vistaProducto" href="verProducto.php?idProducto=<?php echo $f["idProducto"];?>
    &nombre=<?php echo $f["nombre"];?>
    &descripcion=<?php echo $f["descripcion"];?>
    &cantidad=<?php echo $f["cantidad"];?>
    &fechaFin=<?php echo $f["fechaFin"];?>
    &imagen=<?php echo $f["imagen"];?>
    " title="<?php echo $f["descripcion"];?>">
    <img class="imagenProducto" src="pictures/productos/<?php echo $f["imagen"];?>"></a>
    </div>
<?php
	if($cont>=4)
	{
		$cont=0;
		?><br><?php
	}   
}

?>
        
<!--*************************************************************************-->
                </div> <!-- fin bloque subastas-->