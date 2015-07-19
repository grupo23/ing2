<?php
require_once("../public/complementos/conexion.php");
if(isset($_SESSION)) 
{
    include "../public/complementos/cabeceraUsuario.inc";
    include "../public/complementos/posicionInvalida.inc";
    include "../public/complementos/piePublico.inc";
}
else
{

	if(isset($_GET["idOferta"]))
    {
        $sql="SELECT * FROM oferta WHERE idOferta = :idOferta";
		$sth = $conexionPDO->prepare($sql);
		$sth->bindValue(":idOferta",$_GET["idOferta"]);
		$sth->execute();
		$response = $sth->fetchAll(PDO::FETCH_ASSOC);
		if(isset($response[0]))
        {
            $data["idOferta"] = $_GET["idOferta"];
            $data["estado"] = "a confirmar";
             
          ksort($data);
         $fieldDetails = NULL;
         foreach ($data as $key => $values)
         {
            $fieldDetails .= "$key=:$key,";
         }
         $fieldDetails = rtrim($fieldDetails, ',');
         $sth = $conexionPDO->prepare("UPDATE oferta SET $fieldDetails WHERE idOferta = :idOferta");
         foreach($data as $key => $value)
         {
            $sth->bindValue(":$key", $value);
         }
         $sth->execute();

            $sql="SELECT * FROM producto WHERE idProducto = :idProducto";
            $sthh = $conexionPDO->prepare($sql);
            $sthh->bindValue(":idProducto",$response[0]["idProducto"]);
            $sthh->execute();
            $respuesta = $sthh->fetchAll(PDO::FETCH_ASSOC);
            if(isset($respuesta[0]))
            {
                $dataProd["idProducto"] = $response[0]["idProducto"];
                $dataProd["estado"] = "a confirmar";
                ksort($dataProd);
                $fieldDetails = NULL;
                foreach ($dataProd as $key => $values)
                {
                    $fieldDetails .= "$key=:$key,";
                }
                $fieldDetails = rtrim($fieldDetails, ',');
                $sthh = $conexionPDO->prepare("UPDATE producto SET $fieldDetails WHERE idProducto = :idProducto");
                foreach($dataProd as $key => $value)
                {
                    $sthh->bindValue(":$key", $value);
                }
                $sthh->execute();
                ?><script> alert("se eligio el ganador con exito");
            document.location = "../misOfertas.php";</script><?php
            }
            else
             {
            ?><script> alert("no se encontro el producto");
            document.location = "../misOfertas.php";</script><?php
            } 

         
          }
          else
         {
            ?><script> alert("no se encontro la oferta");
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