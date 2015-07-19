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

	if(isset($_POST["precio"]) && isset($_POST["razon"]))
         {
            $data["idOferta"] = $_POST["idOferta"];
            $data["idUsuario"] = $_POST["idUsuario"];
            $data["idProducto"] = $_POST["idProducto"];
            $data["precio"] = $_POST["precio"];
            $data["razon"] = $_POST["razon"]; 
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
            ?><script> alert("Los cambios fueron realizados exitosamente");
              document.location = "../administrarMisOfertas.php";</script><?php
            }
          else
         {
            ?><script> alert("no se han podido realizar los cambios");
            document.location = "../administrarMisOfertas.php";</script><?php
         } 
}

?>