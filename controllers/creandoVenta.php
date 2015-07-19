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

	if(isset($_POST["idOferta"]))
    {
        $sql="SELECT * FROM oferta WHERE idOferta = :idOferta";
		$sth = $conexionPDO->prepare($sql);
		$sth->bindValue(":idOferta",$_POST["idOferta"]);
		$sth->execute();
		$response = $sth->fetchAll(PDO::FETCH_ASSOC);
		if(isset($response[0]))
        {
            $data["idOferta"] = $_POST["idOferta"];
            $data["estado"] = "finalizado";
             
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
                $dataProd["estado"] = "finalizado";
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

            $sql="SELECT * FROM porcentaje";
            $sthhh = $conexionPDO->prepare($sql);
            $sthhh->execute();
            $porcentaje = $sthhh->fetchAll(PDO::FETCH_ASSOC);

            $data["idOferta"] = $_POST["idOferta"];
            $data["precioTotal"] = $response[0]["precio"];
            $data["porcentajeAplicado"] = $porcentaje[0]["valor"];
            
            $dt = new DateTime();
            $data["fecha"] = $dt->format('Y-m-d');
            $data["estado"] = "finalizado";
            ksort($data);
            $fieldNames = implode('`, `', array_keys($data));
            $filedValues = ':' . implode(', :', array_keys($data));
            $sth = $conexionPDO->prepare("INSERT INTO venta (`$fieldNames`) VALUES ($filedValues)");
            foreach ($data as $key => $value)
            {
                $sth->bindValue(":$key",$value);
            }
            $sth->execute();

                ?><script> alert("se pago por el producto con exito");
            document.location = "../index.php";</script><?php
            }
            else
             {
            ?><script> alert("no se encontro el producto");
            document.location = "../index.php";</script><?php
            } 

         
          }
          else
         {
            ?><script> alert("no se encontro la oferta");
            document.location = "../index.php";</script><?php
         } 
         
        }
        else
        {
            ?><script> alert("uno o mas datos son nulos");
            document.location = "../index.php";</script><?php
        }
}

?>