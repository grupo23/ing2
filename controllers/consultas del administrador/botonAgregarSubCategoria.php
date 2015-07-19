<?php
require_once("../../public/complementos/conexion.php");
if(isset($_POST["nombreCategoria"]))
{
	if($_POST["idPadrecategoria"] > 0)
	{
		$sth = $conexionPDO->prepare("SELECT * FROM categoria WHERE nombre = :nombre");
		$sth->bindValue(":nombre",$_POST["nombreCategoria"]);
		$sth->execute();
		$respuesta= $sth->fetchAll(PDO::FETCH_ASSOC);
	if(!isset($respuesta[0]))
	{
		$data["idPadre"] = $_POST["idPadrecategoria"];
		$data["nombre"] = $_POST["nombreCategoria"];

		ksort($data);
		$fieldNames = implode('`, `', array_keys($data));
		$filedValues = ':' . implode(', :', array_keys($data));

		$sth = $conexionPDO->prepare("INSERT INTO categoria (`$fieldNames`) VALUES ($filedValues)");

		foreach ($data as $key => $value)
		{
			$sth->bindValue(":$key",$value);
		}
		$sth->execute();
		?><script> alert("se agregó la subcategoria con exito"); document.location = "../../admin/gestioncategorias.php";</script><?php
	}
    else
    {
        ?><script> alert("el nombre de esa categoria ya esta en uso"); document.location = "../../admin/gestioncategorias.php";</script><?php
    }
	}
	else
	{
		?><script> alert("seleccione una categoria padre"); document.location = "../../admin/gestioncategorias.php";</script><?php
	}
                  
}
else
{
	?><script> alert("uno o mas datos son nulos"); document.location = "../../admin/gestioncategorias.php";</script><?php
}
?>