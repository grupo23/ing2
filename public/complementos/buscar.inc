<?php
/*
$sql="";$stmt;
$idaccor=$_POST["idcategoriap"];
if($idaccor==" ")
{$sql = "SELECT * FROM producto WHERE nombre LIKE ? OR descripcion LIKE ? ORDER BY fechaIni ASC";
$stmt = $conexionPDO->prepare($sql);
$param=$_POST["barrabusqueda"];
$stmt->execute(array("%$param%", "%$param%"));}
else
{$sql = "SELECT * FROM producto WHERE idCategoria = ? AND nombre LIKE ? OR descripcion LIKE ? ORDER BY fechaIni ASC";
$stmt = $conexionPDO->prepare($sql);
$stmt->bindValue(":idCategoria",$idaccor);
$param=$_POST["barrabusqueda"];
$stmt->execute(array("$idaccor","%$param%", "%$param%"));}
$res=$stmt->fetchAll(PDO::FETCH_ASSOC);
*/
$dt = new DateTime();
$fechaActual = $dt->format('Y-m-d');
$idcat="";$barbus="";
if(isset($_GET["idCategoria"]))
    {$idcat=$_GET["idCategoria"];}
if(isset($_POST["idCategoria"]))
    {$idcat=$_POST["idCategoria"];}
if(!isset($_POST["barrabusqueda"]))
    {$barbus="";}
else{$barbus=$_POST["barrabusqueda"];}

if($idcat=="")
{$sql="SELECT * FROM producto WHERE estado = 'en subasta' AND fechafin > '".$fechaActual."' AND ( nombre LIKE '%".$barbus."%' OR descripcion LIKE '%".$barbus."%' ) ORDER BY fechaIni ASC";}
else
{$sql="SELECT * FROM producto WHERE estado = 'en subasta' AND fechafin > '".$fechaActual."' AND (nombre LIKE '%".$barbus."%' OR descripcion LIKE '%".$barbus."%') AND idCategoria IN (SELECT producto.idCategoria FROM producto INNER JOIN categoria ON producto.idCategoria = categoria.idCategoria WHERE categoria.idCategoria = '".$idcat."' OR categoria.idPadre = '".$idcat."') ORDER BY fechaIni ASC";}
$res=mysql_query($sql);



?>
<!--*************************************************************************-->               
            <div class= "subastas">
<!--*************************************************************************-->
  <div class="busquedas">
        <form id="buscar" name="buscar" action="busquedas.php?idCategoria=<?php echo $idcat;?>" method="post" >
            <input id="barrabusqueda" class="barrabusqueda" name="barrabusqueda" type="text" value="<?php echo $barbus;?>" placeholder="Escriba nombre o descripcion" />
            <input id="idcategoriap" class="idcategoriap" name="idcategoriap" type="hidden" value="<?php echo $idcat;?>" required/>
            <input id="botonbusqueda" class="botonbusqueda" name="botonbusqueda" type="submit" value="buscar" required/>
        </form>
  </div>  
    <br><br><br><br>    
<?php
$cont=0;
while($f=mysql_fetch_array($res))
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