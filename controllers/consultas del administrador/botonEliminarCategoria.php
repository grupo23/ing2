<?php
require_once("../../public/complementos/conexion.php");
if(isset($_POST["idCategoria"]))
{
		$sth = $conexionPDO->prepare("SELECT * FROM producto WHERE idCategoria = :idCategoria");
		$sth->bindValue(":idCategoria",$_POST["idCategoria"]);
		$sth->execute();
		$respuesta= $sth->fetchAll(PDO::FETCH_ASSOC);
	if(!isset($respuesta[0]))
	{

		$sth = $conexionPDO->prepare("SELECT * FROM categoria WHERE idPadre = :idCategoria");
		$sth->bindValue(":idCategoria",$_POST["idCategoria"]);
		$sth->execute();
		$respuesta2= $sth->fetchAll(PDO::FETCH_ASSOC);
		if(!isset($respuesta2[0]))
		{

		$sth = $conexionPDO->prepare("DELETE FROM categoria WHERE idCategoria = :idCategoria");
		$sth->bindValue(":idCategoria",$_POST["idCategoria"]);
		$sth->execute();
		?><script> alert("se elimino la categoria con exito!!"); document.location = "../../admin/gestioncategorias.php";</script><?php
		}
		else
		{
			?><script> alert("no se puede eliminar por que esta categoria tiene subcategorias"); document.location = "../../admin/gestioncategorias.php";</script><?php
		}
	}
    else
    {
        ?><script> alert("no se puede eliminar por que tiene productos asociados"); document.location = "../../admin/gestioncategorias.php";</script><?php
    }     
}
else
{
	?><script> alert("uno o mas datos son nulos"); document.location = "../../admin/gestioncategorias.php";</script><?php
}
?>