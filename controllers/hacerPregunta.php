<?php
require_once("../public/complementos/conexion.php");


  if(isset($_POST["pregunta"])&&(isset($_POST["idOferta"])))
    {
        $ofert = $_POST["idOferta"];
        $sth = $conexionPDO->prepare("SELECT pregunta FROM consultaproducto WHERE idOferta = '$ofert'");
        $sth->execute();
        $ofer = $sth->fetchAll(PDO::FETCH_ASSOC);
        if(empty($ofer))
        {
           $data["idOferta"] = $ofert;
           $data["pregunta"] = $_POST["pregunta"]; 
           $data["notificacionPregunta"] = 1;
            $data["respuesta"] = ""; 
              ksort($data);
              $fieldNames = implode('`, `', array_keys($data));
              $filedValues = ':' . implode(', :', array_keys($data));
              $sth = $conexionPDO->prepare("INSERT INTO consultaproducto (`$fieldNames`) VALUES ($filedValues)");
              foreach ($data as $key => $value)
               {
                  $sth->bindValue(":$key",$value);
               }
              $sth->execute();
                 ?><script>alert("pregunta realizada!!");
                 document.location = "../administrarMisOfertas.php";</script><?php
              }
        else
        {
            ?><script> alert("Usted ya ha realizado una pregunta por este producto");
            document.location = "../administrarMisOfertas.php";</script><?php
            
        }
  }

?>