<?php
require_once("../public/complementos/conexion.php");


if(isset($_SESSION)) 
{include "../public/complementos/cabeceraUsuario.inc";
include "../public/complementos/posicionInvalida.inc";
include "../public/complementos/piePublico.inc";}
else
{
	if(isset($_GET["idVenta"]))
    {
        $sql="SELECT * FROM venta WHERE idVenta = :idVenta";
		$sth = $conexionPDO->prepare($sql);
		$sth->bindValue(":idVenta",$_GET["idVenta"]);
		$sth->execute();
		$response = $sth->fetchAll(PDO::FETCH_ASSOC);
		if(isset($response[0]))
        {
            $response = $response[0];
            $data["estado"] = "finalizado";
            ksort($data);
            $fieldDetails = NULL;

            foreach ($data as $key => $values)
             {
                 $fieldDetails .= "$key=:$key,";
             }
            $fieldDetails = rtrim($fieldDetails, ',');
            $venta=$_GET["idVenta"];
            $sth = $conexionPDO->prepare("UPDATE venta SET $fieldDetails WHERE idVenta = $venta");
            foreach($data as $key => $value)
            {
               $sth->bindValue(":$key", $value);
            }
            $sth->execute();
                        ?><script>alert("se cobro la venta con exito");
                        document.location = "../misOfertas.php";</script><?php
           
        }
        else
        {
            ?><script> alert("no se encontro la venta");
            document.location = "../misOfertas.php";</script><?php
            
        }
    }
    else
    {
        ?><script> alert("uno o mas datos son nulos");
        document.location = "../misOfertas.php";</script><?php
    }
}
?>