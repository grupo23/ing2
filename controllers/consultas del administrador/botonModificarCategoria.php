<?php
require_once("../../public/complementos/conexion.php");
if(isset($_POST["idCategoria"]) && isset($_POST["idPadre"]) && isset($_POST["nombreCategoria"]))
{
		$sth = $conexionPDO->prepare("SELECT * FROM categoria WHERE nombre = :nombre");
		$sth->bindValue(":nombre",$_POST["nombreCategoria"]);
		$sth->execute();
		$respuesta= $sth->fetchAll(PDO::FETCH_ASSOC);
	if(!isset($respuesta[0]))
	{
		$data["idCategoria"] = $_POST["idCategoria"];
        $data["idPadre"] = $_POST["idPadre"];
		$data["nombre"] = $_POST["nombreCategoria"];

		ksort($data);
		$fieldDetails = NULL;
		foreach ($data as $key => $values)
		{
			$fieldDetails .= "$key=:$key,";
		}
		$fieldDetails = rtrim($fieldDetails, ',');
		$sth = $conexionPDO->prepare("UPDATE categoria SET $fieldDetails WHERE idCategoria = :idCategoria");
		foreach($data as $key => $value)
		{
			$sth->bindValue(":$key", $value);
		}
		$sth->execute(); 

	?><script> document.location = "../../admin/gestioncategorias.php";</script><?php
	}
    else
    {
        ?><script> alert("el nombre de esa categoria ya esta en uso"); document.location = "../../admin/gestioncategorias.php";</script><?php
    }
                  
}
else
{
	?><script> alert("uno o mas datos son nulos"); document.location = "../../admin/gestioncategorias.php";</script><?php
}
?>